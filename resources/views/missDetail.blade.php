@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-body">
                <h2 class="card-title"> @foreach($missionloop as $test)
                    Voici le detail de votre Mission Monsieur  <strong>{{$test->Nom_Personnel}}</strong>
                  @endforeach
                </h2>
            </div>
            </div>

<!-----------------------------------------Localisation--------------------------------------------------------------------------------->

            <div class="card">
                <h3 class="card-header">
                    Lieu de Mission
                </h3>
                <div class="card-body">

                    @foreach($missionloop as $test)<h5>
                    Nom et Numero de rue : <strong>{{$test->RUE}}</strong><br><br>
                    Ville : <strong>{{$test->VILLE}}</strong>
                    </h5>
                    @endforeach
                </div>

                </div>

<!------------------------------------------------Praticien------------------------------------------------------------------------------------->

<div class="card">
    <h3 class="card-header">
        Informations Praticien :
    </h3>
    <div class="card-body">

        @foreach($missionloop as $test)
   <h5>
            Nom et titre du Praticien: <strong>{{$test->Nom_Praticien}}</strong><br><br>
        Etat civil: <strong>{{$test->ETAT_CIVIL}}</strong><br><br>
        Note du Praticien sur 20: <strong>{{$test->NOTE}}</strong>  <br>
        Notoriété: <strong>{{$test->NOTORIETE}}</strong><br><br>
        Le praticien est il membre d'une Association :<strong> @if($test->MENBRE_ASSOCIATION == 0) Non @else Oui @endif</strong><br><br>
        Diplome du Praticien : <strong>{{$test->DIPLOME}}</strong><br>
    </h5>
        @endforeach
    </div>

    </div>
<!--------------------------------------------------------------------------------------------------------------------------->





<div class="card">
    <h3 class="card-header">
        Mission:
    </h3>
    <div class="card-body">

        @foreach($missionloop as $test)
       <h5> Nom de la Mission: <strong>{{$test->Nom_Mission}}</strong><br><br>
        Date de la Mission: <strong>{{$test->DATE_MISSION}}</strong><br><br>
        Description Complete de la Mission: <strong>{{$test->DescriptionMission}}</strong><br><br>

        @endforeach
    </div>

    </div>



<!--------------------------------------------------------------------------------------------------------------------------->
<a href="{{  route('pagedeclare', $test->ID_MISSION) }}" class="btn btn-info float-right" role="button">Déclarez Vos Frais</a>
        </div>
    </div>
</div>
@endsection
