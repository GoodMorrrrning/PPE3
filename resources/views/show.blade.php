@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @csrf
                    You are logged in Show View, as Simple User
                    @if(Session::has('succes'))
                    <div class="alert alert-success">
                        {{ Session::get('succes')}}
                    </div>
                    @endif
                    <table class="table table-sstriped">
                <thead>
                    <tr>
                        <th>Nom mission</th>
                        <th>Date Mission</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Matricule</th>
                        <th>Date Fin</th>
                        <th>Detail de la Mission</th>

                    </tr>
                </thead>
                    <tbody>
                        @foreach($procedure as $resp)
                        <tr>
                            <td>{{$resp->NOM}}</td>
                            <td>{{$resp->DATE_MISSION}}</td>
                            <td>{{$resp->PRENOM}}</td>
                            <td>{{$resp->NOM_Personnel}}</td>
                            <td>{{$resp->MATRICULE}}</td>
                            <td>{{$resp->datedepot}}</td>

                        <td>  <a href="{{route('missiondetail', $resp->ID_MISSION)}}" class="btn btn-info float-right" role="button">Detail de Mission</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
