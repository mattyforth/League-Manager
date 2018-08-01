@extends ("layouts.master")

@section ("content")

<div class="container u-mt2">
    <div class="row">
        <div class="col-6">
            <h1 class="page-title">Player List</h1>
        </div>
        <div class="col-6 text-center">
            <a class="action-button" href="players/create">
                <i class="action-button__icon fas fa-plus-circle"></i>
                <label class="action-button__label">Add a New Player</label>
            </a>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Team</th>
                    <th>Health Status</th>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                    <tr>
                        <td>{{ $player->player_name }}</td>
                        <td>{{ $player->team->team_name }}</td>
                        <td>{{ $player->player_status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection