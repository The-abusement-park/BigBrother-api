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
            <td><input id="new_name" class="form-control"></td>
            <td><input id="new_code" class="form-control"></td>
            <td><input id="new_note" class="form-control"></td>
            <td>
                <button onclick="addNewItem()" class="btn btn-success">Toevoegen</button>
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
                @if(isset($item->user->name))
                    <td>{{$item->user->name}}</td>
                @else
                    <td></td>
                @endif
                <td>
                    <button onclick="removeItem({{$item->id}})" class="btn btn-danger">Verwijderen</button>
                    <button onclick="assignItem({{$item->id}})" class="btn btn-primary">Toewijzen aan mij</button>
                    @if(isset($item->user->id))
                        <button onclick="assignItem('{{$item->id}}', null)" class="btn btn-primary">Terugleggen</button>
                    @endif
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
                url: window.location.origin + '/api/items',
                data: {
                    name: name,
                    serialcode: code,
                    note: note
                },
                success: () => {
                    window.location.reload();
                }
            });
        }

        function removeItem(id) {
            $.ajax({
                type: 'DELETE',
                url: window.location.origin + '/api/items/' + id,
                success: () => {
                    window.location.reload();
                }
            });
        }

        function assignItem(id, custom) {
            let user_id = a();

            if(custom !== undefined)
                user_id = custom;

            $.ajax({
                type: 'PUT',
                url: window.location.origin + '/api/items/' + id,
                data: {
                    'user_id': user_id
                },
                success: () => {
                    window.location.reload();
                }
            });
        }
    </script>
@endsection
