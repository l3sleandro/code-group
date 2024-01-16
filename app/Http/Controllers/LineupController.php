<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Player;

class LineupController extends Controller{

  public function index(Request $request){

    $times     = [];
    $inputLevel= Player::getInputLevel();
    $schedules = Schedule::where('confirmed', '>', 2)->get();
    $form      = $request->all();
    if ($request->isMethod('get') && !empty($form)) {

      $schedule = Schedule::with('players')->find($form['schedule_id']);
      if (!$schedule) {
        return redirect()->route('lineups.list')->with('error', 'Jogo não encontrado!');
      }

      //Não permitir o sorteio, caso o número total de confirmados seja menor que Nj*2
      $tms = $schedule->confirmed/$form['nplayers'];
      if($tms < 2){
        return redirect()->route('lineups.list')->with('error', 'Não é possível gerar dois times!');
      }

      //Divide os jogadores em goleiros e jogadores de linha
      $goalkeepers = $schedule->players->where('is_goalkeeper', true);
      $playersLine = $schedule->players->where('is_goalkeeper', false);

      
      while (!$playersLine->isEmpty()) {

        //verifica se tem goleiro
        $goalkeeper = $goalkeepers->shift();
        if( $goalkeeper == null ){
          $limit   = min($form['nplayers'], $playersLine->count());
          $times[] = $this->balancePlayers($playersLine->splice(0, $limit)->all());
        }else{
          $limit   = min($form['nplayers']-1, $playersLine->count());
          $times[] = array_merge([$goalkeeper], $this->balancePlayers($playersLine->splice(0, $limit)->all()));
        }
      }
    }

    return view('lineup.index', compact('schedules','times','inputLevel'));
  }

  //Função para balancear os jogadores entre os times
  private function balancePlayers($players){

    //Ordena os jogadores por habilidade de forma descendente
    usort($players, function ($a, $b) {
        return $b->level - $a->level;
    });

    //Divide os jogadores em dois grupos
    $group1 = [];
    $group2 = [];

    //Distribui os jogadores de forma balanceada entre os grupos
    foreach ($players as $index => $jogador) {
      if ($index % 2 == 0) {
        $group1[] = $jogador;
      } else {
        $group2[] = $jogador;
      }
    }

    // Junta os grupos para formar um time balanceado
    $time = array_merge($group1, $group2);

    return $time;
  }
}
