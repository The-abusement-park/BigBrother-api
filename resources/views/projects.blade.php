@extends('layouts.app')

@section('content')
    {{--TODO START Check if the user is admin--}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Nummer</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input id="new_name"></td>
            <td><input id="new_code"></td>
            <td><input id="new_description"></td>
            <td>
                <button onclick="addNewProject()" class="btn btn-success">Toevoegen</button>
            </td>
        </tr>
        </tbody>
    </table>
    {{--END Check if the user is admin--}}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Nummer</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->number}}</td>
                <td>{{$project->description}}</td>
                @if(!is_user_in_project($project->user))
                    <td>
                        <button onclick="assignProject({{$project->id}})">Inschrijven</button>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--TODO START Check if the user is admin--}}
    <script>
        function addNewProject() {
            const name = getValueFromInput('new_name');
            const number = getValueFromInput('new_code');
            const description = getValueFromInput('new_description');

            $.ajax({
                type: 'POST',
                url: window.location.origin + '/api/projects',
                data: {
                    name: name,
                    number: number,
                    description: description
                },
                success: () => {
                    // window.location.reload();
                }
            });
        }
    </script>
    {{--END Check if the user is admin--}}

    <script type="text/javascript">
        function assignProject(id) {
            $.ajax({
                type: 'PUT',
                // url: window.location.origin + '/api/users/' + getUserId(),
                url: window.location.origin + '/api/users/' + 2,
                data: {
                    'project_id': id
                },
                success: () => {
                    window.location.reload();
                }
            });
        }
    </script>
@endsection
