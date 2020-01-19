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
                            <div class="card" style="width: 18rem; display:block;">
                            <img src="{{asset("$frais->TicketHotel")}}" class="img-fluid" alt="">
                            <img src="{{asset("$frais->TicketCarbu")}}" class="img-fluid" alt="">
                            <img src="{{asset("$frais->TicketManger")}}" class="img-fluid" alt="">
                            <div class="card-body">
                            <h5 class="card-title">Ticket Payements</h5>
                            <p class="card-text">Clickez ici pour télécharger la preuve de frais des visiteurs médicaux.</p>
                            <a href="{{asset("$frais->TicketHotel")}}" download class="btn btn-primary">Télécharger</a>
                            </div>
                            </div>

                            <br>

                            @php

                            $somme = $frais->Montant+$frais->MontantCarburant+$frais->MontantManger;
                            echo 'somme pour cette Mission : ='.$somme;

                            $test =$test+$somme;

                            @endphp
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
