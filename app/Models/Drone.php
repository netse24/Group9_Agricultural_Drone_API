<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    use HasFactory;

    protected $fillable = [
        'drone_name',
        'battery',
        'payload',
        'farmer_id',
        'location_id',
    ];
}
