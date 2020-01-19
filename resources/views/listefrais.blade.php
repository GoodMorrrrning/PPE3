@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @csrf
                    Liste des frais de Monsieur <strong>{{$users->NOM}}</strong>
                    <br>
                    <br>
                    <br>

                        @php
                        $test = 0;
                        @endphp
                        @foreach ($fraiss as $frais)
                        <div class="text-center">

                        @if($frais->ID_NOTE_DE_FRAIS==31)

                        <p>Mission Numero {{$frais->ID_MISSION}} : Aucun frais Déclaré</p>
                        @else


                        <br><br>
                        <strong> Mission Numero {{$frais->ID_MISSION}}

                             Date depot Frais : {{$frais->datedepot}}.
                            <br>
                            Type frais : {{$frais->TypeHotel}}, Montant de ce frais : {{$frais->Montant}}.
                            <br>
                            Type frais : {{$frais->TypeCarburant}}, Montant de ce frais : {{$frais->MontantCarburant}}.
                            <br>
                            Type frais : {{$frais->TypeManger}}, Montant de ce frais : {{$frais->MontantManger}}.<br>
                            @php

                            $somme = $frais->Montant+$frais->MontantCarburant+$frais->MontantManger;
                            echo 'somme pour cette Mission : = '.$somme;

                            $test =$test+$somme;

                            @endphp
<br><br>
                            @if($frais->TicketHotel != null)
                            <div class="card-group" style="position:relative">
                                <div class="card"><img src="{{asset("$frais->TicketHotel")}}" class="card-img w-100 d-flex">
                                    <div class="card-body" style="position:absolute; bottom:0; left:70px;">

                                        <p class="card-text">Cliquez en dessous</p><a class="btn btn-primary" href="{{asset("$frais->TicketHotel")}}" download type="button">Télécharger !</a></div>
                                </div>
                            <div class="card"><img src="{{asset("$frais->TicketCarbu")}}" class="card-img w-100 d-flex">
                                    <div class="card-body">
                                        <h4 class="card-title">Preuve de Frais</h4>
                                    <p class="card-text">Cliquez sur les bouttons ce-dessous pour télécharger les preuves de payement. </p><a class="btn btn-primary" href="{{asset("$frais->TicketCarbu")}}" download type="button">Télécharger !</a></div>
                                </div>
                                <div class="card"><img src="{{asset("$frais->TicketManger")}}" class="card-img w-100 d-flex">
                                    <div class="card-body">

                                        <p class="card-text">Cliquez en dessous</p><a class="btn btn-primary" href="{{asset("$frais->TicketManger")}}" download type="button">Télécharger !</a></div>
                                </div>
                            </div>
                            <script src="assets/js/jquery.min.js"></script>
                            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                            @else
                            <p class="card-text"> Image non Disponible.
                            @endif

                            <br>


                             </div>
                        </strong>

                    @endif
                    @endforeach
                    <br>
                    <br>
                    <br>
                    <div class="text-center">
                        <h3><strong>
                                @php
                                echo 'somme totale du visiteur medical ='.$test;
                                @endphp
                            </strong>
                        </h3>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
