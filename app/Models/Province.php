<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Farm;
use App\Models\Map;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function farms():HasMany{
        return $this->hasMany(Farm::class);
    }
    public function maps():HasMany{
        return $this->hasMany(Map::class);
    }
}
