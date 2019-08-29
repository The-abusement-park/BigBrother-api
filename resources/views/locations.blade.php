@extends('layouts.app')

@section('content')
    @if(is_admin())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Gebouw</th>
                <th scope="col">Ruimte</th>
                <th scope="col">Actie</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input id="new_building" class="form-control"></td>
                <td><input id="new_room" class="form-control"></td>
                <td>
                    <button onclick="addNewLocation()" class="btn btn-success">Toevoegen</button>
                </td>
            </tr>
            </tbody>
        </table>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Location</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>
                    <div class="btn-group">
                        @if($user-> id == get_user_id())
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                @if(isset($user->location))
                                    {{$user->location->building}} - {{$user->location->room}}
                                @else
                                    Selecteer een locatie
                                @endif
                            </button>
                        @else
                            @if(isset($user->location))
                                {{$user->location->building}} - {{$user->location->room}}
                            @else
                                Geen locatie opgegeven
                            @endif
                        @endif
                        <div class="dropdown-menu">
                            @foreach($locations as $location)
                                <a class="dropdown-item" onclick="assignLocation({{$location->id}})" href="#">
                                    {{$location->building}} - {{$location->room}}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if(is_admin())
        <script>
            function addNewLocation() {
                const building = getValueFromInput('new_building');
                const room = getValueFromInput('new_room');

                $.ajax({
                    type: 'POST',
                    url: window.location.origin + '/api/locations',
                    data: {
                        building: building,
                        room: room
                    },
                    success: () => {
                        window.location.reload();
                    }
                });
            }
        </script>
    @endif

    <script type="text/javascript">
        function assignLocation(id) {
            $.ajax({
                type: 'PUT',
                url: window.location.origin + '/api/users/' + a(),
                data: {
                    'location_id': id
                },
                success: () => {
                    window.location.reload();
                }
            });
        }
    </script>
@endsection
