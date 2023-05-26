<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Instruction;
use App\Models\Map;

class Drone extends Model
{
    use HasFactory;

    protected $fillable = [
        'drone_name',
        'battery',
        'payload',
        'user_id',
        'location_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
    public function instructions(): HasMany
    {
        return $this->hasMany(Instruction::class);
    }
    public function maps(): HasMany
    {
        return $this->hasMany(Map::class);
    }
}
