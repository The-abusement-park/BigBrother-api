@extends('layouts.app')

@section('content')
    @if(is_admin())
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
                <td><input id="new_name" class="form-control"></td>
                <td><input id="new_code" class="form-control"></td>
                <td><input id="new_description" class="form-control"></td>
                <td>
                    <button onclick="addNewProject()" class="btn btn-success">Toevoegen</button>
                </td>
            </tr>
            </tbody>
        </table>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Nummer</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Leden</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->number}}</td>
                <td>{{$project->description}}</td>
                <td>
                    @foreach($project->user as $user)
                        <p>{{$user->name}}</p>
                    @endforeach
                </td>
                @if(!is_user_in_project($project->user) && !is_user_in_any_project($projects))
                    <td>
                        <button onclick="assignProject({{$project->id}})">Inschrijven</button>
                    </td>
                @else
                    <td></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    @if(is_admin())
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
                        window.location.reload();
                    }
                });
            }
        </script>
    @endif

    <script type="text/javascript">
        function assignProject(id) {
            $.ajax({
                type: 'PUT',
                url: window.location.origin + '/api/users/' + a(),
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
