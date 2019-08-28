@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Serial Code</th>
            <th scope="col">Opmerking</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input id="new_name"></td>
            <td><input id="new_code"></td>
            <td><input id="new_note"></td>
            <td>
                <button onclick="addNewItem()">Toevoegen</button>
            </td>
        </tr>
        </tbody>
    </table>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Serial Code</th>
            <th scope="col">Opmerking</th>
            <th scope="col">In gebruik door</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->serialcode}}</td>
                <td>{{$item->note}}</td>
                <td>{{$item->user->name}}</td>
                <td>
                    <button>Verwijderen</button>
                    <button>Toewijzen aan mij</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
        function addNewItem() {
            const name = getValueFromInput('new_name');
            const code = getValueFromInput('new_code');
            const note = getValueFromInput('new_note');

            $.ajax({
                type: 'POST',
                url: window.location.origin + 'api/users',
                data: JSON.stringify({
                    name: name,
                    code: code,
                    note: note
                }),
                success: () => {
                    window.location.reload();
                }
            });
        }

        function getValueFromInput(id){
            return document.getElementById(id).value;
        }
    </script>
@endsection
