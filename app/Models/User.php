<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'country_code',
        'photo',
        'password',
        'user_type',
        'blocked',
        'user_unique_id',
        'currecy_id',
        'kyc_manager_id',
        'account_manager_id',
        'gender',
        'date_of_birth',
        'tax_code',
        'city_id',
        'surname',
        'address',
        'registration_doc',
        'full_doc'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id', 'id');
    }

    public function dispatcher()
    {
        return $this->hasOne(Dispatcher::class, 'user_id', 'id');
    }

    public function courier()
    {
        return $this->hasOne(Courier::class, 'user_id', 'id');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }
    public function agent()
    {
        return $this->hasOne(Agent::class, 'user_id', 'id');
    }
    public function mobile()
    {
        return $this->hasOne(MobileAppUser::class, 'user_id', 'id');
    }

    public function kyc()
    {
        return $this->hasOne(Kyc::class);
    }

    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function country(){
        return $this->belongsTo('countries', 'country');
    }

    public function getJWTCustomClaims()
    {
        return [
            'role' => $this->role,
            'permission' => $this->permission,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
