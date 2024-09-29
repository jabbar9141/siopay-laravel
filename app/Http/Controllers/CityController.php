<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities($stateId)
    {
        $cities = City::select('name', 'id')->where('state_id', $stateId)->orderBy('name')->get();
        return response()->json([
            'success' => true,
            'cities' => $cities->toArray(),
        ], 200);
    }

    public function getCountryCities($countryId)
    {
        $cities = City::select('name', 'id')->where('country_id', $countryId)->orderBy('name')->get();
        return response()->json([
            'success' => true,
            'cities' => $cities->toArray(),
        ], 200);
    }

    public function getCountryState($countryId)
    {
        $states = State::select('name', 'id')->where('country_id', $countryId)->orderBy('name')->get();
        return response()->json([
            'success' => true,
            'cities' => $states->toArray(),
        ], 200);
    }


    public function editCountriy()
    {
        $countries = Country::select('name', 'id')->get();
        return response()->json([
            'success' => true,
            'countries' => $countries->toArray(),
        ], 200);
    }

   
}
