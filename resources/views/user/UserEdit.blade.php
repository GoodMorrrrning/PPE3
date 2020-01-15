@extends('layouts.app') @section('content')
{{ csrf_field() }}
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
                    @endif You're on user details
                    {{$details->id}}
                    @if($details->id_role == 1)
                    <a href="{{  route('show', auth()->id()) }}" class="btn btn-info float-right" role="button">Home</a>
                    @else
                    <a href="{{  route('homeAdmin', auth()->id()) }}" class="btn btn-info float-right" role="button">Home Admin</a>
                    @endif
                </div>

                <div class="card-header">{{ __('Complétez vos informations') }}</div>
                <div class="col-md 6">
                    <br />
                </div>
                <div class="form-group row">
                    @if($errors->any())
                    <h5>{{$errors->first()}}</h5>
                    @endif
                    <form method="post" action="{{ route('user.update', $details) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH" />
                        <div class="form-group row">
                            <label for="PRENOM" class="col-md-4 col-form-label text-md-right">{{ __('PRENOM') }}</label>

                            <div class="col-md-6">
                                <input id="PRENOM" type="text" class="form-control @error('PRENOM') is-invalid @enderror" name="PRENOM" value="{{ $details->PRENOM }}" required autocomplete="PRENOM" autofocus> @error('PRENOM')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror

                            </div>
                            <!--------------------------------------------------------------------------------------------------------------------->

                            <label for="NOM" class="col-md-4 col-form-label text-md-right">{{ __('NOM') }}</label>
                            <div class="col-md-6">
                                <input id="NOM" type="text" class="form-control @error('NOM') is-invalid @enderror" name="NOM" value="{{ $details->NOM }}" required autocomplete="NOM" autofocus> @error('NOM')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror

                            </div>
                            <!--------------------------------------------------------------------------------------------------------------------->

                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $details->email }}" required autocomplete="email" autofocus> @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror

                            </div>

                            <!-------------------------------------------------------->

                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="new password" name="password" autofocus> @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror

                            </div>
                            <!-------------------------------------------------------->
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('password-confirm') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" placeholder="confirm new" name="password-confirm" autofocus> @error('password confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror

                            </div>
                        </div>

                        <!-------------------------------------------------------->
                        <div class="card-header">{{ __('Location') }}</div>
                        <div class="col-md 6">
                            <br />
                        </div>
                        <div class="form-group row">
                            <label for="VILLE" class="col-md-4 col-form-label text-right">{{ __('VILLE') }}</label>
                            <div class="col-md-6">
                                <input id="VILLE" type="text" class="form-control @error('VILLE') is-invalid @enderror" value="{{ $details->VILLE }}" name="VILLE" autofocus> @error('VILLE')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror

                            </div>

                            <!-------------------------------------------------------->
                            <label for="CP" class="col-md-4 col-form-label text-right">{{ __('Code Postal') }}</label>
                            <div class="col-md-6">
                                <input id="CP" type="text" class="form-control @error('CP') is-invalid @enderror" value="{{ $details->CP }}" name="CP" autofocus> @error('CP')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror

                            </div>
                            <!-------------------------------------------------------->
                            <label for="RUE" class="col-md-4 col-form-label text-right">{{ __('Rue') }}</label>
                            <div class="col-md-6">
                                <input id="RUE" type="text" class="form-control @error('RUE') is-invalid @enderror" value="{{ $details->RUE }}" name="RUE" autofocus> @error('RUE')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror

                            </div>

                            <!-------------------------------------------------------->

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection