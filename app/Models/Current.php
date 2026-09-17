<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class current extends Model
{
    public $table = 'current';

    protected $fillable = [
        'city', 'state_or_province',
        'country', 'temperature',
        'feels_like', 'wind_kph',
        'chance_of_rain', 'chance_of_snow', 
    ];

}
