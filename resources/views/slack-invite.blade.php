<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('sitedata.slack_team_name').' | '.config('sitedata.slack_team_description') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

        <style>
            .site__bg {
                background-image: url({{ asset('img/bg.jpg') }});
                background-repeat: no-repeat;
                margin: 0;
                text-align: center;
                padding-top: 150px;
                color: #fff;
            }

            .submit__btn {
                border-radius: 50px;
                padding: 10px 40px;
            }

            .top__margin {
                margin-top: 50px;
            }
        </style>
    </head>
    <body class="site__bg">

        <div class="container text-center">

            <h2>Join {{ config('sitedata.slack_team_name') }} on Slack</h2>

            <div class="row top__margin">

                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                    @if (session('success'))
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <i class="fa fa-check"></i> {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <i class="fa fa-warning"></i> {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('send_invite') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="email" name="email" class="form-control input-lg" placeholder="Email Address">
                        </div>
                        <button type="submit" class="btn btn-success btn-lg submit__btn">Request to Join Team</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
