@extends('layouts.app')

@section('content')
    {{--TODO START Check if the user is admin--}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Gebouw</th>
            <th scope="col">Ruimte</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input id="new_name"></td>
            <td><input id="new_building"></td>
            <td><input id="new_room"></td>
            <td>
                <button onclick="addNewLocation()">Toevoegen</button>
            </td>
        </tr>
        </tbody>
    </table>
    {{--END Check if the user is admin--}}

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
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            @if(isset($user->location_id))
                                {{$user->location->building}} - {{$user->location->room}}
                            @else
                                selecteer een locatie
                            @endif
                        </button>
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

    {{--TODO START Check if the user is admin--}}
    <script>
        function addNewLocation() {
            const name = getValueFromInput('new_name');
            const building = getValueFromInput('new_building');
            const room = getValueFromInput('new_room');

            $.ajax({
                type: 'POST',
                url: window.location.origin + '/api/locations',
                data: {
                    name: name,
                    building: building,
                    room: room
                },
                success: () => {
                    window.location.reload();
                }
            });
        }
    </script>
    {{--END Check if the user is admin--}}

    <script type="text/javascript">
        function assignLocation(id) {
            $.ajax({
                type: 'PUT',
                // url: window.location.origin + '/api/users/' + getUserId(),
                url: window.location.origin + '/api/users/' + 1,
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
