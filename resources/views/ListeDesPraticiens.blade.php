@extends('layouts.app')

@section('content')

<div class="card-header">
    @if($errors->any())
<div class="alert alert-danger">
<h5>{{$errors->first()}}</h5>
</div>
@endif
@if(Session::has('succes'))
<div class="alert alert-success">
    <h5>{{ Session::get('succes')}}</h5>
</div>
@endif
    <table class="table table-striped table-dark card-body table-bordered">
<thead>
    <tr>
        <th>Nom</th>
        <th>Etat Civil</th>
        <th>Note</th>
        <th>Notoriété</th>
        <th>Membre Assoc ?</th>
        <th>Diplome</th>
        <th>Modifier/Supprimer</th>
    </tr>
</thead>
<tbody>
    @foreach ($ListePraticien as $LP)
    <tr>
    <td>{{$LP->NOM}}</td>
    <td>{{$LP->ETAT_CIVIL}}</td>
    <td>{{$LP->NOTE}}</td>
    <td>{{$LP->NOTORIETE}}</td>
    <td>
        @if($LP->MENBRE_ASSOCIATION==0)
        Non
        @else
        Oui
        @endif

    </td>
    <td>{{$LP->DIPLOME}}</td>
    <td><a href="{{route('prat.edit', $LP->ID_Praticien)}}" class="btn btn-light  float-right" role="button">Modifier</a>
        <form action="{{route('prat.destroy', $LP->ID_Praticien)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger"onclick="return confirm('Supprimer ce Praticien ?');" type="submit">Supprimer</button>
        </form>
    </td>
    @endforeach

    </tr>
</tbody>
    </table>
</div>


</div>
@endsection
