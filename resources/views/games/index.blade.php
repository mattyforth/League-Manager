@extends ("layouts.master")

@section ("content")

<div class="container u-mt2">
    <div class="row">
        <div class="col-6">
            <h1 class="page-title">Game Fixtures</h1>
        </div>
        <div class="col-6 text-right">
            <a class="action-button" href="games/create">
                <i class="action-button__icon fas fa-plus-circle"></i>
                <label class="action-button__label">Add a New Game</label>
            </a>
        </div>
    </div>
    
    @include ("partials.messages")

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Home Team</th>
                    <th>Away Team</th>
                    <th>Date</th>
                    <th>Venue</th>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                    <tr>
                        <td>{{ $game->home_team->team_name }}</td>
                        <td>{{ $game->away_team->team_name }}</td>
                        <td>{{ date("d-m-Y H:i", strtotime($game->game_datetime)) }}</td>
                        <td>{{ $game->home_team->team_venue }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection