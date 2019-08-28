@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Nummer</th>
            <th scope="col">Beschrijving</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->number}}</td>
                <td>{{$project->description}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection()
