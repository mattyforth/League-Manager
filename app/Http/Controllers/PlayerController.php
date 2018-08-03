<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Team;
use App\Http\Requests\StorePlayer;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with("team")->get();

        return view("players.index", [
            "players" => $players
        ]);
    }

    public function edit($id)
    {
        $player = Player::find($id);
        $teams = Team::all();

        return view("players.edit", [
            "player" => $player,
            "teams" => $teams
        ]);
    }

    public function create()
    {
        $teams = Team::all();

        return view("players.create", [
            "teams" => $teams
        ]);
    }

    public function store(StorePlayer $request)
    {
        $team_id = $request->team_id;

        // Count how many players the team currently has.
        if ($team_id) {
            $playerCount = Team::find($team_id)->players()->count();
        } else {
            $playerCount = 0;
        }
        

        if ($playerCount >= 21) {
            return redirect()->route("players.create")->withErrors("Team already has 21 players.");
        }

        // Add a new player.
        $player = Player::create($request->all());

        return redirect()->route("players.create")->withSuccess("{$player->player_name} created successfully!");
    }

    public function update($player_id, StorePlayer $request)
    {
        $player = Player::find($player_id);
        $player->update($request->all());
        $player->save();
    
        return redirect()->route("players.edit", ["player_id" => $player->player_id])->withSuccess("Player updated successfully.");
    }

    public function destroy($player_id)
    {
        $player = Player::find($player_id);

        $player->delete();
        
        return back()->withSuccess("Player deleted.");
    }
}
