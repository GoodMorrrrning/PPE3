<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Labo'Sud Nimes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
     /* Morph */
img {
  width: 35%;
  height: 40%%;
  -webkit-filter: grayscale(0) blur(0px);
  filter: grayscale(0) blur(0px);
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
 align-content: stretch;
}

img:hover {
  width: 47%; /* on affiche l'image au carré */
  height: 43%%;
  border-radius: 50%;  /* on arrondit l'image */
  -webkit-transform: rotate(360deg); /* rotation de l'image */
  transform: rotate(360deg);
}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Se Connecter</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">S'enregistrer</a>
                        @endif
                    @endauth
                </div>
            @endif
        <div class="card-title">
            <div class="content">
                <br>
                <div class="title m-b-md">
                    Labo'Sud Nimes
                </div>
                <br><br>
                <div class="img-fluid">
                 <img src="{{asset('medoc.jpg')}}" alt="Toxic Project">
                     <h4>Des Médicaments pour tous les gouts !</h4>

                 <img src="{{asset('toubib.jpg')}}" alt="Toxic Project">
                     <h4>Des Médecins Aspetisés ! </h4>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>
