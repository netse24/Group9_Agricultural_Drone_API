<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Instruction;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Farmer;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_job',
        'date_time',
        'area',
        'farmer_id',
    ];
    public function instructions():HasMany{
        return $this->hasMany(Instruction::class);
    }
    public function farmer():BelongsTo{
        return $this->belongsTo(Farmer::class);
    }
}
