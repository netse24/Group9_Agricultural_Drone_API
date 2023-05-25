<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Farmer;
use App\Models\Location;

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
    public function farmer(): BelongsTo
    {
        return $this->belongsTo(Farmer::class);
    }
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
