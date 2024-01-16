<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchedulePlayer extends Model{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'player_id',
        'confirmed'
    ];
}
