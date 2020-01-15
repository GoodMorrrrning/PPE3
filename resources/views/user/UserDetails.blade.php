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

                    You're on user details
                </div>


                <div class="card-header">{{ __('Compléter vos informations') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('user.update, $id') }}">
        @csrf

        <div class="form-group row">
            <label for="PRENOM" class="col-md-4 col-form-label text-md-right">{{ __('PRENOM') }}</label>

            <div class="col-md-6">
                <input id="PRENOM" type="text" class="form-control @error('PRENOM') is-invalid @enderror" name="PRENOM" value="{{ old('PRENOM') }}" required autocomplete="PRENOM" autofocus>

                @error('PRENOM')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>




            </div>
        </div>
    </div>
</div>
@endsection
