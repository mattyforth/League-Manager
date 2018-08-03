<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Player;

class PlayerController extends Controller
{
    public function getTeamPlayers($team_id)
    {
        $players = Player::where("team_id", $team_id)
            ->where("player_status", 1)
            ->get();

        if ($players) {
            return response()->json(["error" => false, "players" => $players]);
        } else {
            return response()->json(["error" => true, "message" => "Could not get team players."]);
        }
    }
}
