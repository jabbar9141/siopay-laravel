<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;
use App\Models\UserLoginLog;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;
use Jenssegers\Agent\Agent;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required',
            'country_code' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Registration not successful',
                'errors' => $validator->getMessageBag()
                    ->toArray()
            ], Response::HTTP_BAD_REQUEST);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'country_code' => $request->country_code,
            'photo' => null,
            'user_type' => 'mobile'
        ]);

        return response()->json(['status' => true, 'message' => 'User registeration successfully']);
    }

    public function login(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'status' => false,
                'error' => 'Unauthorized'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = auth('api')->user();

        // Capture the login details
        $ip = $request->ip();
        $agent = new Agent();
        $device = $agent->device() . '--' . $agent->browser() . '--' . $agent->platform();
        // Check if the IP is reserved
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            $location = 'Local/Reserved IP';
            $country = 'Local';
        } else {
            $locationData = file_get_contents("http://ip-api.com/json/{$ip}");
            $locationInfo = json_decode($locationData);

            if ($locationInfo && $locationInfo->status !== 'fail') {
                $location = $locationInfo->city . ', ' . $locationInfo->country;
                $country = $locationInfo->countryCode;
            } else {
                $location = 'Unknown';
                $country = 'Unknown';
            }
        }

        // Log the details
        UserLoginLog::create([
            'user_id' => $user->id,
            'ip_address' => $ip,
            'device' => $device,
            'location' => $location,
            'country' => $country,
        ]);

        // Check for previous login in the last 6 hours from a different country
        $lastLogin = UserLoginLog::where('user_id', $user->id)->latest()->first();
        if ($lastLogin) {
            $lastLoginTime = Carbon::parse($lastLogin->created_at);
            $currentTime = Carbon::now();

            if ($currentTime->diffInHours($lastLoginTime) < 6 && $lastLogin->country !== $country) {
                return response()->json([
                    'status' => false,
                    'error' => 'Your country has changed, please wait 6 hrs before attempting login again'
                ], 400);
            }
        }


        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'country_code' => $user->country_code,
            'photo' => $user->photo,
            'status' => $user->status
        ];



        return $this->respondWithToken($token, $userData);
    }

    public function requestPasswordReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $otp = strval(mt_rand(1000, 9999));

        $user->update(['otp' => $otp]);

        // Send the OTP to the user's email
        $data = ['otp' => $otp];
        Log::info("Sending OTP to {$user->email}: $otp");

        // Mail::to($user->email)->send(new PasswordResetMail($data));

        return response()->json(['status' => true, 'message' => 'OTP sent to your email']);
    }

    public function passwordResetOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric|digits:4',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($user->otp != $request->otp) {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }

        $user->update(['otp' => null]);

        return response()->json(['status' => true, 'message' => 'OTP verified successfully']);
    }

    public function passwordResetChange(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $user->update(['password' => Hash::make($request->password)]);

        return response()->json([
            'status' => true,
            'message' => 'Password reset successfully'
        ]);
    }

    public function user()
    {
        return response()->json(auth('api')->user());
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    // public function refresh()
    // {
    //     return $this->respondWithToken(auth('api')->refresh());
    // }

    protected function respondWithToken($token, $userData = [])
    {
        return response()->json([
            'status' => true,
            'user' => $userData,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60
        ]);
    }


    public function updatePassword(Request $request, $user_id = null){
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        if($user_id){
            $user = User::find($user_id);
        } else {
            $user = Auth::user();
        }
        $user->update(['password' => Hash::make($request->password)]);
        return back()->with(['message' => 'Password updated successfully', 'message_type' => 'success']);
    }

   
}
