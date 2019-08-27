@extends('layouts.app')

@section('content')
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Naam</th>
          <th scope="col">Serial Code</th>
          <th scope="col">Opmerking</th>
          <th scpe="col">In gebruik door</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Soldeerbout</td>
          <td>123</td>
          <td>kleine bout</td>
          <td>Luke van Lierop</td>
        </tr>
      </tbody>
  </table>
@endsection('content')
