<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Drone;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Plan;

class Instruction extends Model
{
    use HasFactory;

    protected $fillable = [
        'drone_id',
        'plan_id',
    ];

    public function drone(): BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
    public function plan(): BelongsTo{
        return $this->belongsTo(Plan::class);
    }
}
