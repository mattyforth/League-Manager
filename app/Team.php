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

    public function games()
    {
        return $this->hasMany("App\Games");
    }

    public function setTeamIdAttribute($value)
    {
        // Create the string code for this team.
        $name = $this->team_name;
        $stringCode = strtoupper(substr($name, 0, 3));

        // Count the number of teams and make the number code.
        $teamCount = Team::all()->count();
        $numberCode = sprintf("%'.03d", $teamCount + 1);

        $this->attributes["team_id"] = $numberCode . $stringCode;
    }
}
