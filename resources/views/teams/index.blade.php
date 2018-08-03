@extends ("layouts.master")

@section ("content")

<div class="container">
    <div class="row u-mt2">
        <div class="col-6">
            <h1 class="page-title">Team List</h1>
        </div>
        <div class="col-6 text-right">
            <a class="action-button" href="teams/create">
                <i class="action-button__icon fas fa-plus-circle"></i>
                <label class="action-button__label">Add a New Team</label>
            </a>
        </div>
    </div>

    @include ("partials.messages")

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Number of Players</th>
                    <th>Venue</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                    <tr>
                        <td>
                            <a href="/teams/{{ $team->team_id }}">
                                {{ $team->team_name }}
                            </a>
                        </td>
                        <td>{{ $team->players->count() }}</td>
                        <td>{{ $team->team_venue }}</td>
                        <td>
                            <form action="/teams/{{ $team->team_id }}" method="POST">
                                {{ method_field("DELETE") }}
                                {{ csrf_field() }}
                                <button class="link text-danger" type="submit">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection