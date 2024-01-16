<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller{

	public function index(){

		$players = Player::all();
		return view('player.index', compact('players'));
	}

	public function add(Request $request){

		$inputLevel 	= Player::getInputLevel();
		$inputBoolean = Player::getInputBoolean();

		if ($request->isMethod('post')) {
			Player::create($request->all());

			return redirect()->route('players.list')->with('success', 'Jogador cadastrado com sucesso!');
		}

		return view('player.add', compact('inputLevel', 'inputBoolean'));
	}

	public function edit($id, Request $request){

		$player = Player::find($id);

		if (!$player) {
				return redirect()->route('players.list')->with('error', "Jogador {$id} não encontrado.");
		}

		$inputLevel 	= Player::getInputLevel();
		$inputBoolean = Player::getInputBoolean();

		if ($request->isMethod('post')) {
			$player->update($request->all());

			return redirect()->route('players.list')->with('success', 'Jogador atualizado com sucesso!');
		}

		return view('player.edit', compact('player','inputLevel','inputBoolean'));
	}

}
