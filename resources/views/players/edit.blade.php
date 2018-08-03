@extends ("layouts.master")

@section ("content")

<div class="container">
    <h1 class="page-title u-mt1">Edit a Player</h1>

    @include ("partials.messages")
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8 offset-2">
                    <form action="/players/{{ $player->player_id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field("PUT") }}

                        <div class="form-group">
                            <label class="form-label">Player Name</label>
                            <input class="form-control" type="text" name="player_name" value="{{ $player->player_name }}" />
                        </div>
                        <div class="form-group">
                            <label class="form-label u-block">Health Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="player_status" value="1" 
                                    {{ $player->player_status === "Healthy" ? 'checked' : '' }}>
                                <label class="form-check-label">Healthy</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="player_status" value="0"
                                    {{ $player->player_status === 'Injured' ? 'checked' : '' }}>
                                <label class="form-check-label">Injured</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label class="form-label">Player's Team</label>
                                <select class="form-control" name="team_id">
                                    <option value="" {{ $player->team_id === null ? 'selected' : ''}}>No Team</option>
                                    @foreach ($teams as $team)
                                    <option value="{{ $team->team_id }}" 
                                        {{ $player->team_id === $team->team_id ? 'selected' : 'false' }}>
                                        {{ $team->team_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Update Player"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection