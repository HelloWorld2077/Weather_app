<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    public $table = 'forecast';

    protected $fillable = [
        'city', 'state_or_province',
        'country', 'temperature_max',
        'temperature_min', 'wind_kph_max',
        'chance_of_rain', 'chance_of_snow', 
    ];
}
