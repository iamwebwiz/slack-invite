<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('sitedata.slack_team_name').' | '.config('sitedata.slack_team_description') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

        <style>
            * {
                font-family: 'Kumbh Sans', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="w-screen h-screen flex justify-center items-center bg-gray-200">
            <div class="flex flex-col">
                <h2 class="my-5 text-3xl text-purple-700">Join {{ ucwords(strtolower($teamName)) }} on Slack</h2>

                <form action="{{ route('send_invite') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" name="email" class="form-control input-lg" placeholder="Email Address">
                    </div>
                    <button type="submit" class="btn btn-success btn-lg submit__btn">Request to Join Team</button>
                </form>

                <div class="row top__margin">

                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                        @if (session('success'))
                            <div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <i class="fas fa-check"></i> {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <i class="fas fa-warning"></i> {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>
    </body>
</html>
