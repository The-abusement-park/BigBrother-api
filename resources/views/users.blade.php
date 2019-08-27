@extends('layouts.app')

@section('content')
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Naam</th>
          <th scope="col">Telefoonnummer</th>
          <th scope="col">email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Luke van Lierop</td>
          <td>0683746383</td>
        <td>l.vanlierop@avans.nl</td>
        </tr>
        <tr>
          <td>Rick Sieben</td>
          <td>068573837445</td>
          <td>r.sieben@avans.nl</td>
        </tr>
      </tbody>
  </table>
@endsection('content')
