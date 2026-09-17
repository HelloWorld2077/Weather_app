<?php

namespace App\Http\Controllers;

use App\Models\Current;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class currentController extends Controller
{
    
    public function index() {
        return view('index',[
            'hasError' => false,
            'message' => null,
        ]);
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
        'key' => 'your key here',
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
    
}
