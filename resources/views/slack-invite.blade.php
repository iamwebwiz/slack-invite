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
    <body class="w-screen h-screen flex justify-center items-center bg-gray-200">
        <div class="w-1/3">
            <div class="flex flex-col">
                <h2 class="my-2 text-3xl text-purple-700 text-center">
                    Join {{ ucwords(strtolower($teamName)) }} on Slack
                </h2>
                
                <div class="h-3 w-10 bg-purple-700 mb-6 flex self-center rounded-full"></div>

                @component('components.alert', ['success' => session('success'), 'error' => session('error')])
                    {{ session('success') ?: session('error') }}
                @endcomponent

                <form action="{{ route('send_invite') }}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-5">
                        <label>
                            <input type="email" name="email" placeholder="Email Address" class="border border-purple-500 w-full px-4 py-3 rounded-md text-purple-700 focus:outline-none">
                        </label>
                    </div>

                    <div class="my-5">
                        <button class="bg-purple-700 text-purple-100 rounded-lg w-full px-5 py-3 hover:shadow-lg hover:bg-purple-800 transition duration-300">
                            Request to Join Team
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>
    </body>
</html>
