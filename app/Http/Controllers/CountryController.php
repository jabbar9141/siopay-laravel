<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCountries()
    {
        $countries = Country::select('name', 'id')->get();
        return response()->json([
            'success' => true,
            'countries' => $countries->toArray(),
        ], 200);
    }


    public function getEUCountries()
    {
        $countries = Country::select('name', 'id')->where('is_count_eu', 1)->get();
        return response()->json([
            'success' => true,
            'countries' => $countries->toArray(),
        ], 200);
    }
}
