<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlayerService;

class AssignController extends Controller
{
    protected $playerService;

    public function __construct(PlayerService $playerService)
    {
        $this->playerService = $playerService;
    }
    
    public function assignPlayer(Request $request)
    {
        $result = $this->playerService->assignToTeam($request->player_id, $request->team_id);

        if ($result) {
            return back()->withSuccess("Player has been added to the team.");
        } else {
            return back()->withErrors("Team already has 21 players.");
        }
    }

    public function unassignPlayer(Request $request)
    {
        $result = $this->playerService->assignToTeam($request->player_id);

        if ($result) {
            return back()->withSuccess("Player has been removed from the team.");
        } else {
            return back()->withErrors("Could not remove player from the team.");
        }
    }
}
