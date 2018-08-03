@extends ("layouts.master")

@section ("content")

<div class="container">
    <h1 class="page-title u-mt1 u-mb2 text-center">
        {{ $game->home_team->team_name }} V {{ $game->away_team->team_name }}
    </h1>

    @include ("partials.messages")

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <label class="u-bold">{{ $game->home_team->team_name }} Players</label>
                    <table id="home-table" class="table game-table">
                        <thead>
                            <th>Player Name</th>
                        </thead>
                        <tbody>
                            @foreach ($home_players as $player)
                            <tr>
                                <td>{{ $player->player_name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <label class="u-bold">{{ $game->away_team->team_name }} Players</label>
                    <table id="away-table" class="table game-table">
                        <thead>
                            <th>Player Name</th>
                        </thead>
                        <tbody>
                            @foreach ($away_players as $player)
                            <tr>
                                <td>{{ $player->player_name }}</td>
                            </tr>
                            @endforeach
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
                        <label class="form-label">Venue: </label>
                        {{ $game->home_team->team_venue }}
                    </div>
                    <div class="form-group">
                        <label class="form-label">Game Date: </label>
                        {{ date("d-m-Y H:i", strtotime($game->game_datetime)) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection