<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $table = 'location_table';

    protected $fillable = [
        'place', 
    ];
}
