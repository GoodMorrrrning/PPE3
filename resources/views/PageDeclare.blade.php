@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Declarez vos frais</div>
                <!------------------------------------->
                <form action="{{route('declare', $dec->ID_MISSION)}}" method="post">
                    @csrf

                <label for="PrixHotel" class="col-md-4 col-form-label text-md-center">{{ __('PrixHotel') }}</label>
                <div class="col-md-6">
                    <input id="PrixHotel" type="number" value="{{$pls[0]->Montant}}" class="form-control @error('PrixHotel') is-invalid @enderror" name="PrixHotel"  required autocomplete="PrixHotel" autofocus> @error('PrixHotel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> @enderror
                </div>


<br>
<br>

<label for="PrixCarbu" class="col-md-4 col-form-label text-md-center">{{ __('PrixCarbu') }}</label>
<div class="col-md-6">
    <input id="PrixCarbu" type="number" value="{{$pls[1]->Montant}}" class="form-control @error('PrixCarbu') is-invalid @enderror" name="PrixCarbu"  required autocomplete="PrixCarbu" autofocus> @error('PrixCarbu')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span> @enderror
</div>

<br><br>
<label for="PrixManger" class="col-md-4 col-form-label text-md-center">{{ __('PrixManger') }}</label>
<div class="col-md-6">
    <input id="PrixManger" type="number" value="{{$pls[2]->Montant}}" class="form-control @error('PrixManger') is-invalid @enderror" name="PrixManger"  required autocomplete="PrixManger" autofocus> @error('PrixManger')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
 </span> @enderror
 @if($pls[0]->Montant == null)
 <button type="submit" class="btn btn-success"> Valider </button>
 @else
 <button type="submit" class="btn btn-success"> Sauvegarder Changement </button>
 @endif
</form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
