<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $incrementing = false;

    protected $primaryKey = "player_id";
    protected $keyType = "string";
    protected $table = "players";
    protected $fillable = ["player_id", "player_name", "player_status", "team_id"];

    public function team()
    {
        return $this->belongsTo("App\Team", "team_id");
    }

    public function games()
    {
        return $this->hasMany("App\Games", "game_id");
    }

    public function setPlayerIdAttribute($value)
    {
        // Create the ID for this player based on their surname.
        $name = $this->player_name;
        $explodedName = explode(" ", $name); 
        $surname = $explodedName[count($explodedName) - 1];

        $stringCode = strtoupper(substr($surname, 0, 3));

        // Count current players and add a unique code to the ID.
        $playerCount = Player::all()->count();
        $numberCode = sprintf("%'.04d", $playerCount + 1);

        $this->attributes["player_id"] = $stringCode . $numberCode;
    }

    public function getPlayerStatusAttribute($value)
    {
        return $value === 1 ? "Healthy" : "Injured";
    }
}
