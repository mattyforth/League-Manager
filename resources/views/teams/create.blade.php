@extends ("layouts.master")

@section ("content")

<div class="container">
    <h1 class="page-title">Add a New Team</h1>

    @include ("partials.messages")

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6 offset-3">
                    <form action="/teams" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="form-label">Team Name</label>
                            <input class="form-control" type="text" name="team_name" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Venue</label>
                            <input class="form-control" type="text" name="team_venue" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="team_id" value="0"/>
                            <input class="btn btn-primary" type="submit" value="Create a New Team"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection