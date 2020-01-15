@extends('layouts.app')

@section('content')

@if(isset($ModificationMode))

<form method="post" action="{{route('prat.update', $DataPraticien ?? '')}}">
@csrf
@method('PATCH')
    @else
    <form action="{{route('prat.store')}}" method="post">
        @endif
        @csrf
<div class="card-header text-center">
    <div class="input-group">



<label for="NOM" class="col-md-4 col-form-label text-md-center">{{ __('NOM') }}</label>
<div class="col-md-6">
<input id="NOM" type="text" value="{{$DataPraticien->NOM??''}}" class="form-control @error('NOM') is-invalid @enderror" name="NOM" required autocomplete="NOM" autofocus> @error('NOM')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span> @enderror

</div>
<br><br><br>

<label for="ETAT_CIVIL" class="col-md-4 col-form-label text-md-center">{{ __('ETAT_CIVIL') }}</label>
<div class="col-md-6">
<select class="custom-select col-md-12 col-form-label text-md-center" id="ETAT_CIVIL" name="ETAT_CIVIL">
<option selected>@if(isset($ModificationMode)){{$DataPraticien->ETAT_CIVIL??''}}@else Choisir Etat Civil @endif</option>
<option value="Mr">Mr</option>
<option value="Mme">Mme</option>
<option value="Pr">Pr</option>
<option value="Mlle">Mlle</option>
</select>
</div>
<br><br><br>



<label for="NOTE" class="col-md-4 col-form-label text-md-center">{{ __('NOTE') }}</label>
<div class="col-md-6">
<select class="custom-select col-md-12 col-form-label text-md-center" id="NOTE" name="NOTE">
<option selected>@if(isset($ModificationMode)){{$DataPraticien->NOTE??''}}@else Choisir Note @endif</option>
@php
for($i=1;$i<=20;$i++){
@endphp
    <option value={{$i}}>{{$i}}</option>
    @php
}


@endphp
</select>
</div>
<br><br><br>



<label for="NOTORIETE" class="col-md-4 col-form-label text-md-center">{{ __('NOTORIETE') }}</label>
<div class="col-md-6">
<select class="custom-select col-md-12 col-form-label text-md-center" id="NOTORIETE" name="NOTORIETE">
<option selected>@if(isset($ModificationMode)){{$DataPraticien->NOTORIETE??''}}@else Séléctionnez Notoriete @endif</option>
<option value="Très Basse">Très Basse</option>
<option value="Basse">Basse</option>
<option value="Moyenne">Moyenne</option>
<option value="Haute">Haute</option>
<option value="Très Haute">Très Haute</option>
</select>
</div>
<br><br><br>


    <label for="MEMBRE_ASSOCIATION" class="col-md-4 col-form-label text-md-center">{{ __('MEMBRE_ASSOCIATION') }}</label>
    <div class="col-md-6">
<select class="custom-select col-md-12 col-form-label text-md-center" id="MEMBRE_ASSOCIATION" name="MEMBRE_ASSOCIATION">
<option value="{{$DataPraticien->MENBRE_ASSOCIATION??''}}" selected>@if(isset($ModificationMode))   @if($DataPraticien->MENBRE_ASSOCIATION??''==1) Oui @else Non @endif @else Est-il Membre d'une Association ? @endif</option>
<option value="True">Oui</option>
<option value="False">NON</option>
</select>
    </div>
    <br><br><br>


    <label for="DIPLOME" class="col-md-4 col-form-label text-md-center">{{ __('DIPLOME') }}</label>
    <div class="col-md-6">
        <input id="DIPLOME" type="numeric" class="form-control @error('DIPLOME') is-invalid @enderror" name="DIPLOME" value="{{$DataPraticien->DIPLOME??''}}" required autocomplete="DIPLOME" autofocus> @error('DIPLOME')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span> @enderror
    </div>
    <br><br><br>
    </div>


    <div class="text-center">


    @if(isset($ModificationMode))
    <button type="submit" class="btn btn-warning">Modifier Praticien</button>
    @else
    <button type="submit" class="btn btn-success">Ajouter Praticien</button>
    @endif
    <a href="{{route('prat.index')}}" class="btn btn-warning float-right" role="button">Liste Praticien</a>
    </div>

    </div>
        </form>
    </div>

</div>
    @endsection
