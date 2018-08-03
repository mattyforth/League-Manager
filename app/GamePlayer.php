<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamePlayer extends Model
{
    protected $table = "game_players";
    protected $primaryKey = "gameplayer_id";
    protected $fillable = ["game_id", "player_id"];
}
