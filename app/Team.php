<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $primaryKey = "team_id";
    protected $keyType = "string";
    protected $table = "teams";
    protected $fillable = ["team_id", "team_name", "team_venue"];

    public function players()
    {
        return $this->hasMany("App\Player", "team_id");
    }

    public function home_games()
    {
        return $this->hasMany("App\Game", "home_team_id");
    }

    public function away_games()
    {
        return $this->hasMany("App\Game", "away_team_id");
    }

    public function setTeamIdAttribute($value)
    {
        // Create the string code for this team.
        $name = $this->team_name;
        $string_code = strtoupper(substr($name, 0, 3));

        // Count the number of teams and make the number code.
        $team_count = Team::all()->count();
        $number_code = sprintf("%'.03d", $team_count + 1);

        $this->attributes["team_id"] = $number_code . $string_code;
    }
}
