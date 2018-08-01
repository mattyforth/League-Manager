<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $primaryKey = "game_id";
    protected $keyType = "string";
    protected $table = "games";

    public function players()
    {
        return $this->hasMany("App\Players");
    }

    public function home_team()
    {
        return $this->hasOne("App\Team", "home_team_id", "team_id");
    }

    public function away_team()
    {
        return $this->hasOne("App\Team", "away_team_id", "team_id");
    }
}
