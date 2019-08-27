@extends('layouts.app')

@section('content')
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Naam</th>
          <th scope="col">Gebouw</th>
          <th scope="col">Ruimte</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Luke van Lierop</td>
          <td>
            <div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    selecteer een locatie
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div></td>
    <td>
          <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        selecteer een locatie
        </button>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
        </div>
        </div></td>
        </tr>
        <tr>
          <td>Rick Sieben</td>
          <td>lokaal 2</td>
          <td>kantine</td>
        </tr>
      </tbody>
  </table>
@endsection('content')
