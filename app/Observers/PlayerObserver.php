<?php

namespace App\Observers;

use App\GamePlayer;
use App\Player;

class PlayerObserver
{
    public function deleted(Player $player)
    {
        $game_players = GamePlayer::where("player_id", $player->player_id)->delete();
    }
}
