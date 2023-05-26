<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Drone;
use App\Models\Farm;
use App\Models\Province;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'drone_id',
        'farm_id',
        'province_id',
    ];

    public function drone(): BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }
}
