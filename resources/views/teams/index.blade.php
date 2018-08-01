@extends ("layouts.master")

@section ("content")

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="page-title">Team List</h1>
        </div>
        <div class="col-6 text-center">
            <a class="action-button" href="teams/create">
                <i class="action-button__icon fas fa-plus-circle"></i>
                <label class="action-button__label">Add a New Team</label>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Number of Players</th>
                    <th>Venue</th>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                    <tr>
                        <td>{{ $team->team_name }}</td>
                        <td>{{ $team->players->count() }}</td>
                        <td>{{ $team->team_venue }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection