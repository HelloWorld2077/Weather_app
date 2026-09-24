<?php

namespace App\Http\Controllers;

use App\Models\Current;
use App\Models\Forecast;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class currentController extends Controller
{

    private $key = '';

    public function getKey() {
        return $this->key;
    }
    
    public function index() {
        return view('index',[
            'hasError' => false,
            'message' => null,
        ]);
    }

    public function entryForForecast() {
        return view('entry_forecast',[
            'hasError' => false,
            'message' => null,
        ]);
    }

    public function about() {
        return view('about');
    }

    public function collectLocation() {

        request()->validate([
            'place' => 'required|max:255',
        ]);

        $data = Location::create([
            'place' => request('place'),
        ]);

        return redirect('/current');
    }

    public function gatherInfo() {

    $location = Location::orderByDesc('id')->first();

    $response = Http::get('http://api.weatherapi.com/v1//current.json',[
        'key' => $this->getKey(),
        'q' => $location->place,
    ]);

    $dataGathered = json_decode($response->body(), true);

    if(array_key_exists('error', $dataGathered)) {
        return view('index',[
            'hasError' => true,
            'message' => $dataGathered['error']['message'],
        ]);
    }

    
    $curData = Current::create([
        'city' => $dataGathered['location']['name'],
        'state_or_province' => $dataGathered['location']['region'],
        'country' => $dataGathered['location']['country'],

        'temperature' => $dataGathered['current']['temp_c'],
        'feels_like' => $dataGathered['current']['feelslike_c'],
        'wind_kph' => $dataGathered['current']['wind_kph'],
        'chance_of_rain' => $dataGathered['current']['chance_of_rain'],
        'chance_of_snow' => $dataGathered['current']['chance_of_snow'],
    ]);     
    
    return view('current_weather', [
        'city' => $dataGathered['location']['name'],
        'state_or_province' => $dataGathered['location']['region'],
        'country' => $dataGathered['location']['country'],

        'temperature' => $dataGathered['current']['temp_c'],
        'feels_like' => $dataGathered['current']['feelslike_c'],
        'wind_kph' => $dataGathered['current']['wind_kph'],
        'chance_of_rain' => $dataGathered['current']['chance_of_rain'],
        'chance_of_snow' => $dataGathered['current']['chance_of_snow'],
    ]);

    }

    public function gatherForecastInfo() {

    $days = 3;
    
    $location = Location::orderByDesc('id')->first();

    $response = Http::get('http://api.weatherapi.com/v1//forecast.json',[
        'key' => $this->getKey(),
        'q' => $location->place,
        'days' => $days,
    ]);     

    $dataGathered = json_decode($response->body(), true);

    $curData = null;

    for($i = 0; $i < $days; $i++) {
        $curData = Forecast::create([
        'city' => $dataGathered['location']['name'],
        'state_or_province' => $dataGathered['location']['region'],
        'country' => $dataGathered['location']['country'],

        'temperature_max' => $dataGathered['forecast']['forecastday'][$i]['day']['maxtemp_c'],
        'temperature_min' => $dataGathered['forecast']['forecastday'][$i]['day']['mintemp_c'],
        'wind_kph_max' => $dataGathered['forecast']['forecastday'][$i]['day']['maxwind_kph'],
        'chance_of_rain' => $dataGathered['forecast']['forecastday'][$i]['day']['daily_chance_of_rain'],
        'chance_of_snow' => $dataGathered['forecast']['forecastday'][$i]['day']['daily_chance_of_snow'],
    ]);

        $temperature_max[$i] = $dataGathered['forecast']['forecastday'][$i]['day']['maxtemp_c'];
        $temperature_min[$i] = $dataGathered['forecast']['forecastday'][$i]['day']['mintemp_c'];
        $wind_kph_max[$i] = $dataGathered['forecast']['forecastday'][$i]['day']['maxwind_kph'];
        $chance_of_rain[$i] = $dataGathered['forecast']['forecastday'][$i]['day']['daily_chance_of_rain'];
        $chance_of_snow[$i] = $dataGathered['forecast']['forecastday'][$i]['day']['daily_chance_of_snow'];
    }

    return view('forecast',[
        'days' => $days,

        'city' => $dataGathered['location']['name'],
        'state_or_province' => $dataGathered['location']['region'],
        'country' => $dataGathered['location']['country'],

        'temperature_max' => $temperature_max,
        'temperature_min' => $temperature_min,
        'wind_kph_max' => $wind_kph_max,
        'chance_of_rain' => $chance_of_rain,
        'chance_of_snow' => $chance_of_snow,

    ]);

    }
    
}
