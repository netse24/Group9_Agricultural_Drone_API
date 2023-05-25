<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Drone;

class Location extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'latitude',
        'longitude',
    ];

    public function drone():BelongsTo{
        return $this->belongsTo(Drone::class);
    }
}
