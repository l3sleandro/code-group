<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Player;
use App\Models\SchedulePlayer;

class ScheduleController extends Controller{

  public function index(){
    $schedules = Schedule::where('date', '>=', Carbon::now())->orderBy('date')->get();
    $situations = Schedule::getInputSituations();
    return view('schedule.index', compact('schedules', 'situations'));
  }

  public function add(Request $request){

    $inputSituations = Schedule::getInputSituations();

    if ($request->isMethod('post')) {
      $form       = $request->all();
      $carbonDate = Carbon::createFromFormat('d/m/Y', $form['date']);
      if (!$carbonDate || $carbonDate->format('d/m/Y') !== $form['date']) {
        return redirect()->route('schedules.list')->with('error', "Data inválida");
      }

      Schedule::create(array_merge($form, [
          'date' => $carbonDate->format('Y-m-d'),
      ]));

      return redirect()->route('schedules.list')->with('success', 'Jogo cadastrado com sucesso!');
    }

    return view('schedule.add', compact('inputSituations'));
  }

  public function edit($id, Request $request){

    $schedule = Schedule::find($id);

    if (!$schedule) {
      return redirect()->route('schedules.list')->with('error', "Jogo {$id} não encontrado.");
    }

    $inputSituations = Schedule::getInputSituations();

    if ($request->isMethod('post')) {
      $form       = $request->all();
      $carbonDate = Carbon::createFromFormat('d/m/Y', $form['date']);
      if (!$carbonDate || $carbonDate->format('d/m/Y') !== $form['date']) {
        return redirect()->route('schedules.list')->with('error', "Data inválida");
      }

      $schedule->update(array_merge($form, [
          'date' => $carbonDate->format('Y-m-d'),
      ]));

      return redirect()->route('schedules.list')->with('success', 'Jogo atualizado com sucesso!');
    }

    return view('schedule.edit', compact('schedule', 'inputSituations'));
  }

  public function confirmed(Request $request){

    $schedules = Schedule::where('date', '>=', Carbon::now())
                         ->where('situation', '=', 1)
                         ->orderBy('date')
                         ->limit(5)
                         ->get();

    if ($request->isMethod('post')) {

      $form   = $request->all();
      $player = Player::where('phone', '=', $form['phone'])->first();

      $data = [
        'player_id' => $player->id,
        'schedule_id' => $form['schedule_id'],
        'confirmed' => 1
      ];

      SchedulePlayer::create($data);

      return redirect()->route('schedules.list')->with('success', 'Presença confirmada com sucesso!');
    }

    return view('schedule.confirmed', compact('schedules'));
  }
}
