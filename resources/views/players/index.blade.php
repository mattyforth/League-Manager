@extends ("layouts.master")

@section ("content")

<div class="container u-mt2">
    <div class="row">
        <div class="col-6">
            <h1 class="page-title">Player List</h1>
        </div>
        <div class="col-6 text-right">
            <a class="action-button" href="players/create">
                <i class="action-button__icon fas fa-user-plus"></i>
                <label class="action-button__label">Add a New Player</label>
            </a>
        </div>
    </div>

    @include ("partials.messages")
    
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Team</th>
                    <th>Health Status</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                    <tr>
                        <td>
                            <a class="link" href="/players/{{ $player->player_id }}/edit">
                                {{ $player->player_name }}
                            </a>
                        </td>
                        <td>
                            @if ($player->team)
                            {{ $player->team->team_name }}
                            @else
                            N/A
                            @endif
                        </td>
                        <td>{{ $player->player_status }}</td>
                        <td>
                            <form action="/players/{{ $player->player_id }}" method="POST">
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