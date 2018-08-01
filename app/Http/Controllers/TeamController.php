<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
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
        $team = Team::find($team_id);

        return view("teams.show", [
            "team" => $team
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
}
