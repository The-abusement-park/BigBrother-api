@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Omschrijving</th>
            <th scope="col">Prijs</th>
            <th scope="col">Hoeveelheid</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input id="new_name" class="form-control"></td>
            <td><input id="new_description" class="form-control"></td>
            <td>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">€</span>
                    </div>
                    <input type="number" class="form-control" id="new_price">
                </div>
            </td>
            <td><input id="new_quantity" type="number" min="1" value="1" class="form-control"></td>
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
            <th scope="col">Status</th>
            <th scope="col">Omschrijving</th>
            <th scope="col">Prijs</th>
            <th scope="col">Hoeveelheid</th>
            <th scope="col">Aangevraagd door</th>
            <th scope="col">Acties</th>
        </tr>
        </thead>
        <tbody>
        @foreach($purchases as $purchase)
            <tr>
                <td>{{$purchase->name}}</td>
                <td>{{$purchase->status}}</td>
                <td>{{$purchase->description}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->user->name}}</td>
                @if(is_admin())
                    <td>
                        <button onclick="removeItem({{$item->id}})" class="btn btn-danger">Verwijderen</button>
                        <button onclick="assignItem({{$item->id}})" class="btn btn-primary">Toewijzen aan mij</button>
                    </td>
                @endif
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

        function assignItem(id) {
            $.ajax({
                type: 'PUT',
                url: window.location.origin + '/api/items/' + id,
                data: {
                    'user_id': a()
                },
                success: () => {
                    window.location.reload();
                }
            });
        }
    </script>
@endsection
