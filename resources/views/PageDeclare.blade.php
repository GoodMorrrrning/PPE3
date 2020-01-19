@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Declarez vos frais</div>
                <!------------------------------------->
                <form action="{{route('declare', $dec->ID_MISSION)}}" method="post" enctype="multipart/form-data">
                    @csrf

                <label for="PrixHotel" class="col-md-4 col-form-label text-md-center">{{ __('PrixHotel') }}</label>
                <div class="col-md-6">
                    <input id="PrixHotel" type="number" value="{{$pls[0]->Montant}}" class="form-control @error('PrixHotel') is-invalid @enderror" name="PrixHotel"  required autocomplete="PrixHotel" autofocus> @error('PrixHotel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> @enderror
                </div>

<br>

 <div class="col-md-6 custom-file" style="float:left; display:inline-block; width:60%;">
    <label for="Ticketimg" class="custom-file-label">{{ __('Ticketimg') }}</label>
     <input id="Ticketimg" type="file" class="custom-file-input @error('Ticketimg') is-invalid @enderror" name="Ticketimg" @if($ImgData[0] == '') required @endif enctype="multipart/form-data" autocomplete="Ticketimg" autofocus> @error('custom-file')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
  </span> @enderror
 </div>

 @if($ImgData[0]!= '')
 <div class="card text-white bg-dark mb-3" style="max-width: 540px; margin-left:60%; display:inline-block; width:40%;">
    <div class="row no-gutters">
      <div class="col-md-4">
      <img src="{{asset("$ImgData[0]")}}" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <p class="card-text">Image actuelle pour frais d'hotel</p>
        </div>
      </div>
    </div>
  </div>

 @endif

<br>
<label for="PrixCarbu" class="col-md-4 col-form-label text-md-center">{{ __('PrixCarbu') }}</label>
<div class="col-md-6">
    <input id="PrixCarbu" type="number" value="{{$pls[1]->Montant}}" class="form-control @error('PrixCarbu') is-invalid @enderror" name="PrixCarbu"  required autocomplete="PrixCarbu" autofocus> @error('PrixCarbu')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span> @enderror
</div>
<br>



<div class="col-md-6 custom-file">
    <label for="ticketcarbu" class="custom-file-label">{{ __('ticketcarbu') }}</label>
     <input id="ticketcarbu" type="file" class="custom-file-input @error('ticketcarbu') is-invalid @enderror" name="ticketcarbu" @if($ImgData[1] == '') required @endif enctype="multipart/form-data" autocomplete="Ticketimg" autofocus> @error('ticketcarbu')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
  </span> @enderror
 </div>
<br>

@if($ImgData[1]!= '')
<div class="card text-white bg-dark mb-3" style="max-width: 540px; margin-left:60%; display:inline-block; width:40%;">
   <div class="row no-gutters">
     <div class="col-md-4">
     <img src="{{asset("$ImgData[1]")}}" class="card-img" alt="...">
     </div>
     <div class="col-md-8">
       <div class="card-body">
         <p class="card-text">Image actuelle pour frais de carburant</p>
       </div>
     </div>
   </div>
 </div>

@endif




<label for="PrixManger" class="col-md-4 col-form-label text-md-center">{{ __('PrixManger') }}</label>
<div class="col-md-6">
    <input id="PrixManger" type="number" value="{{$pls[2]->Montant}}" class="form-control @error('PrixManger') is-invalid @enderror" name="PrixManger"  required autocomplete="PrixManger" autofocus> @error('PrixManger')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
 </span> @enderror
</div>
<br><br>






<div class="col-md-6 custom-file">
    <label for="ticketmanger" class="custom-file-label">{{ __('ticketmanger') }}</label>
     <input id="ticketmanger" type="file" class="custom-file-input @error('ticketmanger') is-invalid @enderror" name="ticketmanger" @if($ImgData[2] == '') required @endif enctype="multipart/form-data" autocomplete="ticketmanger" autofocus> @error('ticketmanger')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
  </span> @enderror
 </div>
<br>

@if($ImgData[2]!= '')
<div class="card text-white bg-dark mb-3" style="max-width: 540px; margin-left:60%; display:inline-block; width:40%;">
   <div class="row no-gutters">
     <div class="col-md-4">
     <img src="{{asset("$ImgData[2]")}}" class="card-img" alt="...">
     </div>
     <div class="col-md-8">
       <div class="card-body">
         <p class="card-text">Image actuelle pour frais de nouriture</p>
       </div>
     </div>
   </div>
 </div>

@endif

<br>




 {{-- <label for="Ticketimg" class="col-md-4 col-form-label text-md-center">{{ __('Ticketimg') }}</label>
 <div class="col-md-6">
     <input id="Ticketimg" type="file" class="custom-file-label @error('Ticketimg') is-invalid @enderror" name="Ticketimg"  required autocomplete="Ticketimg" autofocus> @error('custom-file')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
  </span> @enderror
 --}}

<br><br>

 @if($pls[0]->Montant == 0)
 <button type="submit" class="btn btn-success"> Valider </button>
 @else
 <button type="submit" class="btn btn-warning"> Sauvegarder Changement </button>
 @endif

</form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
