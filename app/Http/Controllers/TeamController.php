<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;
use App\Http\Requests\StoreTeam;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::with("players")->get();

        return view("teams.index", [
            "teams" => $teams
        ]);
    }

    public function show($team_id)
    {
        $team = Team::with("players")->find($team_id);
        $players = Player::where("team_id", "!=", $team_id)
            ->orWhere("team_id", NULL)
            ->get();

        return view("teams.show", [
            "team" => $team,
            "players" => $players
        ]);
    }

    public function create()
    {
        return view("teams.create");
    }

    public function store(StoreTeam $request)
    {
        $team = Team::create($request->all());

        return redirect()->route("teams.create")->withSuccess("{$team->team_name} created successfully.");
    }

    public function destroy($team_id)
    {
        $team = Team::find($team_id);

        $team->delete();

        return back()->withSuccess("Team deleted.");
    }
}
