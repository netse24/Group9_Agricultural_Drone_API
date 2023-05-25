<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Farmer;
use App\Models\Map;
use App\Models\Province;


class Farm extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'farmer_id',
        'province_id',
    ];

    public function maps():HasMany{
        return $this->hasMany(Map::class);
    }
    public function province():BelongsTo{
        return $this->belongsTo(Province::class);
    }
    public function farmer():BelongsTo{
        return $this->belongsTo(Farmer::class);
    }
}
