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
        return $this->belongsToMany("App\Game", "game_players", "player_id");
    }

    public function setPlayerIdAttribute($value)
    {
        // Create the ID for this player based on their surname.
        $name = $this->player_name;
        $exploded_name = explode(" ", $name); 
        $surname = $exploded_name[count($exploded_name) - 1];

        $string_code = strtoupper(substr($surname, 0, 3));

        // Count current players and add a unique code to the ID.
        $player_count = Player::all()->count();
        $number_code = sprintf("%'.04d", $player_count + 1);

        $this->attributes["player_id"] = $string_code . $number_code;
    }

    public function getPlayerStatusAttribute($value)
    {
        return $value === 1 ? "Healthy" : "Injured";
    }
}
