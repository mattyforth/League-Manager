<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Team;
use App\GamePlayer;
use App\Http\Requests\StoreGame;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with(["home_team", "away_team", "players"])->get();

        return view("games.index", [
            "games" => $games
        ]);
    }

    public function show($game_id)
    {
        $game = Game::with(["home_team", "away_team", "players"])->find($game_id);

        $home_players = $game->players->where("team_id", $game->home_team->team_id);
        $away_players = $game->players->where("team_id", $game->away_team->team_id);

        return view("games.show", [
            "game" => $game,
            "home_players" => $home_players,
            "away_players" => $away_players
        ]);
    }

    public function create()
    {
        $teams = Team::all();

        return view("games.create", [
            "teams" => $teams
        ]);
    }

    public function store(StoreGame $request)
    {
        // Create the game.
        $game = Game::create($request->all());

        if (!$game) {
            return back()->withErrors("Could not create a new game.");
        }

        // Create all the game_players.
        $player_ids = array_merge($request->home_players, $request->away_players);

        foreach ($player_ids as $player_id) {
            $player = [
                "game_id" => $game->game_id,
                "player_id" => $player_id
            ];
            
            GamePlayer::create($player);
        }

        return redirect()->route("games.index")->withSuccess("New game has been created.");
    }

    public function destroy($game_id)
    {
        Game::find($game_id)->delete();

        return back()->withSuccess("Game successfully deleted.");
    }
}
