<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Company;
use App\Models\User;


class AppController extends Controller
{

    protected $countryName = "Canada";

    public function index() 
    {
        $country = $this->getCountryByName($this->countryName);
        if($country) {
            echo $this->countryName."<br>";
            $companies = $this->getCompaniesByCountryId($country->id);
            if($companies->count())
            {
                //echo $companies;
                foreach ($companies as $company) {
                    $users  = $company->users;
                    echo $company->name."<br>";
                    if($users->count())
                    {
                        foreach ($users as $user) 
                            echo '&nbsp&nbsp'.$user->name." ".$user->pivot->created_at."<br>";
                    } else 
                    return response()->json([
                        'error' => "No users for company ".$company->name
                    ], 404);
                }
            } else 
            return response()->json([
                'error' => "No Companies for country ".$this->countryName
            ], 404);

        } else 
        return response()->json([
            'error' => "Country ".$this->countryName." Doesn't Exist"
        ], 404);
        
    }

    public function getAllCountries() 
    {
        return Country::get();
    }

    public function getCountryByName($countryName) 
    {
        return Country::where("name" , '=', $countryName)->first();
    }

    public function getCompaniesByCountryId($countryId) 
    {
        return Country::with('companies')->find($countryId)->companies;
    }
    
}
