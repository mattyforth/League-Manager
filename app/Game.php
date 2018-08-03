<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $primaryKey = "game_id";
    protected $keyType = "string";
    protected $table = "games";

    protected $fillable = ["game_id", "home_team_id", "away_team_id", "game_datetime"];

    public function players()
    {
        return $this->belongsToMany("App\Player", "game_players", "game_id", "player_id");
    }

    public function home_team()
    {
        return $this->hasOne("App\Team", "team_id", "home_team_id");
    }

    public function away_team()
    {
        return $this->hasOne("App\Team", "team_id", "away_team_id");
    }

    public function setGameIdAttribute()
    {
        $home_team_id = $this->home_team_id;
        $away_team_id = $this->away_team_id;

        $game_date = date("dmy", strtotime($this->game_datetime));

        $this->attributes["game_id"] = $home_team_id . "v" . $away_team_id . $game_date;
    }
}
