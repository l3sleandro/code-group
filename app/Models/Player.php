<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model{

  use HasFactory;

  protected $fillable = [
    'name',
    'phone',
    'level',
    'is_goalkeeper'
  ];

  private static $inputLevel = [
    '1' => '1 - Entusiasta',
    '2' => '2 - Amador',
    '3' => '3 - Peladeiro',
    '4' => '4 - Atleta',
    '5' => '5 - Profissional'
  ];

  private static $inputBoolean = [
    true => 'Sim',
    false => 'Não'
  ];

  public static function getInputLevel(){
    return self::$inputLevel;
  }

  public static function getInputBoolean(){
    return self::$inputBoolean;
  }

  public function schedules(){
      return $this->belongsToMany(Schedule::class, 'schedule_players');
  }
}

