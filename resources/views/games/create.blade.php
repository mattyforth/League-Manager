@extends ("layouts.master")

@section ("content")

<div class="container">
    <h1 class="page-title u-mt1">Add a New Game</h1>

    @include ("partials.messages")

    <form action="/games" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Choose a home team</label>
                            <select class="form-control" v-model="game.home_team" v-on:change="getHomeTeamPlayers" name="home_team_id">
                                <option value="">Choose a home team</option>
                                @foreach ($teams as $team)
                                <option value="{{ $team->team_id }}">{{ $team->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="u-bold u-mt2">Now choose the players that will play for the home team</label>
                        <table id="home-table" class="table game-table">
                            <thead>
                                <th>Select</th>
                                <th>Player Name</th>
                            </thead>
                            <tbody>
                                <tr v-for="player of game.home_players">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="home_players[]" :value="player.player_id">
                                        </div>
                                    </td>
                                    <td>@{{ player.player_name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Choose an away team</label>
                            <select class="form-control" v-model="game.away_team" v-on:change="getAwayTeamPlayers" name="away_team_id">
                                <option value="">Choose an away team</option>
                                @foreach ($teams as $team)
                                <option value="{{ $team->team_id }}">{{ $team->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="u-bold u-mt2">Now choose the players that will play for the away team</label>
                        <table id="away-table" class="table game-table">
                            <thead>
                                <th>Select</th>
                                <th>Player Name</th>
                            </thead>
                            <tbody>
                                <tr v-for="player of game.away_players">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="away_players[]" :value="player.player_id">
                                        </div>
                                    </td>
                                    <td>@{{ player.player_name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card u-mt2">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Date of The Game</label>
                            <input class="form-control" type="datetime-local" name="game_datetime"/>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="game_id" value="0" />
                            <input class="btn btn-primary" type="submit" value="Create New Game"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection