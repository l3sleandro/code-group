<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model{

  use HasFactory;

  protected $fillable = [
    'date',
    'situation',
    'confirmed'
  ];

  private static $situations = [
    '1' => 'Ativo',
    '2' => 'Cancelado',
    '3' => 'Adiado'
  ];

  public static function getInputSituations(){
    return self::$situations;
  }

}
