@extends ("layouts.master")

@section ("content")

<div class="container u-mt2">
    <div class="row">
        <div class="col-12">
            <h1 class="page-title">Add a New Player</h1>
        </div>
    </div>

    @include ("partials.messages")

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8 offset-2">
                    <form action="/players" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" name="player_name" placeholder="Player Name"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label u-block">Health Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="player_status" value="1" checked="checked">
                                <label class="form-check-label">Healthy</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="player_status" value="0">
                                <label class="form-check-label">Injured</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <select class="form-control" name="team_id">
                                <option value="">No Team</option>
                                @foreach ($teams as $team)
                                <option value="{{ $team->team_id }}">{{ $team->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="player_id" value="0"/>
                            <input class="btn btn-primary" type="submit" value="Create New Player"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection