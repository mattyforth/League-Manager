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

    public function show($id)
    {
        $player = Player::find($id);

        return view("players.show", [
            "player" => $player
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
        $playerCount = Team::find($team_id)->players()->count();

        if ($playerCount >= 21) {
            return redirect()->route("players.create")->withErrors("Team already has 21 players.");
        }

        // Add a new player.
        $player = Player::create($request->all());

        return redirect()->route("players.create")->withSuccess("{$player->player_name} created successfully!");
    }
}
