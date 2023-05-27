<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Instruction;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_time',
        'area',
        'user_id',
    ];
    public function instructions():HasMany{
        return $this->hasMany(Instruction::class);
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
