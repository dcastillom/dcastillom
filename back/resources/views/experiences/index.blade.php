<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>dcastillom</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        @extends('layouts.app')

        @section('content')
        <div class="container">
<!--             <div class="row">
                <div class="col-md-offset-1">
                    <a class="btn btn-default" href="{{ route('password.request') }}">
                        Add an experience
                    </a>
                </div>
            </div> -->


            <div class="row">
                <div class="col-md-10 col-md-offset-1">


                    @foreach($experiences as $experience)
                    <div class="panel panel-default col-md-4">
                      <div class="panel-heading">
                        <h3 class="panel-title">{{ substr($experience['position'], 0, 20) }}...</h3>
                        <a class="" href="{{route('experience.delete', $experience->id)}}?{{time()}}">
                            Remove item
                        </a>
                      </div>
                      <div class="panel-body">
                        <p>{{ substr($experience['company'], 0, 20) }}...</p>
                        <p>
                            {{ date('F Y', strtotime($experience->start)) }}
                            <span>-<span>
                            {{ date('F Y', strtotime($experience->end)) }}
                        </p>
                        <p>{{ substr($experience['description'], 0, 70) }}...</p>
                        <a class="btn btn-default btn-block" href="{{route('experience.delete', $experience->id)}}?{{time()}}">
                            Edit item
                        </a>
                      </div>
                    </div>
                    @endforeach

                </div>
            </div>



        </div>
        @endsection

  
    </body>
</html>
