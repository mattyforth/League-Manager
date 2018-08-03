@extends ("layouts.master")

@section ("content")

<div class="container">
    <h1 class="page-title u-mt2">Team Information</h1>

    @include ("partials.messages")

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <p class="u-mt4">
                        <label class="u-bold">Name: </label>
                        {{ $team->team_name }}
                    </p>
                    <p>
                        <label class="u-bold">Team Venue: </label>
                        {{ $team->team_venue }}
                    </p>
                </div>
                <div class="col-6">
                    <form action="/assign" method="POST">

                        <input type="hidden" name="team_id" value="{{ $team->team_id }}"/>
                        {{ method_field("PUT") }}
                        {{ csrf_field() }}

                        <label class="u-bold">Assign a Player to the Team</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <select class="form-control" name="player_id">
                                        <option value="false" selected="selected">Select a Player</option>
                                        @foreach ($players as $player)
                                        <option value="{{ $player->player_id }}">{{ $player->player_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <button class="action-button" type="submit">
                                    <i class="action-button__icon fas fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <th>Player Name</th>
                            <th>Health Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($team->players as $player)
                            <tr>
                                <td>
                                    <a class="link" href="/players/{{ $player->player_id }}/edit" >
                                        {{ $player->player_name }}
                                    </a>
                                </td>
                                <td>{{ $player->player_status }}</td>
                                <td>
                                    <form action="/unassign" method="POST">
                                        {{ method_field("PUT") }}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="player_id" value="{{ $player->player_id }}" />
                                        <input class="link text-danger" type="submit" value="Remove" />
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection