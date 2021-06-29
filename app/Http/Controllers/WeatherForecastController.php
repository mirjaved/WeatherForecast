<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherForecastController extends Controller
{
    public function index(Request $request)
    {    
        // Get city name from the form
        $cityname = $request->input('cityname');

        // From URL to get webpage contents 
        $url = "https://api.openweathermap.org/data/2.5/weather?q=$cityname&appid=37d993830b37049c272c7429ea55881d&units=metric"; 
        
        // Initialize a CURL session.
        $ch = curl_init(); 
        
        // Return Page contents. 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        // Grab URL and pass it to the variable 
        curl_setopt($ch, CURLOPT_URL, $url); 
        
        $cityData = curl_exec($ch);
        
        // Close a CURL session.
        curl_close($ch);

        // Covert json to object
        $cityData = json_decode($cityData);

        return view('index', ['cityData' => $cityData]);
    }    
}