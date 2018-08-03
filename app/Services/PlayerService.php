<?php

namespace App\Services;

use App\Player;

class PlayerService
{
    public function assignToTeam($player_id, $team_id = null)
    {
        $player = Player::find($player_id);

        if ($team_id !== null) {
            $playerCount = Player::where("team_id", $team_id)->count();

            if ($playerCount >= 21) {
                return false;
            }
        }

        $player->team_id = $team_id;
        $player->save();

        return true;
    }
}