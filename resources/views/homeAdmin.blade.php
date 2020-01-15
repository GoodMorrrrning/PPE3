@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="test4">
                <div class="card-header">Dashboard</div>

                <div class="card-body" id="Plgrand">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @csrf
                    You are in home as Admin !
                    @if(Session::has('succes'))
                    <div class="alert alert-success">
                        {{ Session::get('succes')}}
                    </div>
                    @endif
                    </br>
                    Liste des Utilisateurs

                    <table class="table table-striped table-dark card-body table-bordered" id="tailleTab">
                        <thead>
                            <tr>
                                <th>Numero Matricule</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Rue</th>
                                <th>Code Postal</th>
                                <th>Ville</th>
                                <th>Adresse mail</th>
                                <th>voir Frais User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $resp)

                            <tr>
                                <td>{{$resp->MATRICULE}}</td>
                                <td>{{$resp->NOM}}</td>
                                <td>{{$resp->PRENOM}}</td>
                                <td>{{$resp->RUE}}</td>
                                <td>{{$resp->CP}}</td>
                                <td>{{$resp->VILLE}}</td>
                                <td>{{$resp->email}}</td>
                                <td>
                                    @if($resp->id_role==1)
                                    <a href="{{route('fraisuser', $resp->ID_PERSONNELS)}}" class="btn btn-light  float-right" role="button">Frais</a></td>
                                    @endif
                                <td>




                                    @if($resp->id_role==1)
                                    <form action="{{action('UserController@destroy', $resp['ID_PERSONNELS'])}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger"onclick="return confirm('Supprimer cet Utilisateur ? toute ces Mission seront aussi supprimées !');" type="submit">Supprimer</button>
                                    </form>

                                </td>

                                @endif
                                <td>
                                    @if($resp->id_role ==1)
                                    <!-- Button trigger modal -->
                                <button type="button" class="btn btn-light"  data-toggle="modal" data-target="#MODAL-{{$resp->ID_PERSONNELS}}">
                                        Ajoute Mission.

                                    </button>

                                    @else
                                    No Way, it is Admin
                                    @endif
                                    <!-- Modal -->
                                    <div class="modal fade" data-id="$resp->ID_PERSONNELS" id="MODAL-{{$resp->ID_PERSONNELS}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ajouter une Mission à Monsieur {{$resp->NOM}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('givemissions',$resp->ID_PERSONNELS)}}" method="post">
                                                    @csrf
                                                    <div class="modal-body  justify-content-center">
                                                        <!----------------------------------Body---------------------------------------------->
                                                        <label for="NOM" class="col-md-4 col-form-label text-md-center">{{ __('NOM') }}</label>
                                                        <div class="col-md-6">
                                                            <input id="NOM" type="text" class="form-control @error('NOM') is-invalid @enderror" name="NOM" required autocomplete="NOM" autofocus> @error('NOM')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span> @enderror

                                                        </div>


                                                        <label for="DATE_MISSION" class="col-md-4 col-form-label text-md-center">{{ __('DATE_MISSION') }}</label>
                                                        <div class="col-md-6">
                                                            <input id="DATE_MISSION" type="date" class="form-control @error('DATE_MISSION') is-invalid @enderror" name="DATE_MISSION" required autocomplete="DATE_MISSION" autofocus> @error('DATE_MISSION')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span> @enderror

                                                        </div>




                                                        <label for="RUE" class="col-md-4 col-form-label text-md-center">{{ __('RUE') }}</label>
                                                        <div class="col-md-6">
                                                            <input id="RUE" type="text" class="form-control @error('RUE') is-invalid @enderror" name="RUE" required autocomplete="RUE" autofocus> @error('RUE')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span> @enderror

                                                        </div>





                                                        <label for="VILLE" class="col-md-4 col-form-label text-md-center">{{ __('VILLE') }}</label>
                                                        <div class="col-md-6">
                                                            <input id="VILLE" type="text" class="form-control @error('RUE') is-invalid @enderror" name="VILLE" required autocomplete="VILLE" autofocus> @error('VILLE')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span> @enderror

                                                        </div>



                                                        <label for="DescriptionMission" class="col-md-4 col-form-label text-md-center">{{ __('DescriptionMission') }}</label>
                                                        <div class="col-md-6">
                                                            <input id="DescriptionMission" type="text" class="form-control @error('RUE') is-invalid @enderror" name="DescriptionMission" required autocomplete="DescriptionMission" autofocus> @error('DescriptionMission')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span> @enderror

                                                        </div>


                                                          <label for="ID_Praticien" class="col-md-4 col-form-label text-md-center">{{ __('ID_Praticien') }}</label>
                                                            <div class="col-md-6">
                                                        <select class="custom-select col-md-12 col-form-label text-md-center" id="ID_Praticien" name="ID_Praticien">
                                                    <option selected>Choisir Praticien !</option>
                                                    @foreach($praticiens as $ListPrate)
                                                        <option value="{{$ListPrate->NOM}}">{{$ListPrate->NOM}}</option>
                                                   @endforeach
                                                </select>
                                                            </div>
                                                        <!--------------------------------End----Body------------------------------------>


                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Ajouter Mission</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>



                            </tr>
                        </tbody> @endforeach
                    </table>
                </div>

            </div>

        </div>

    </div>
</div>
</div>
<style>
    #test4{
    width: 150%;


          }
          #Plgrand{
             float: left;
          }

    </style>
@endsection @csrf
