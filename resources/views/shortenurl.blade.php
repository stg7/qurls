<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>a quick and dirty url shortener</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>

        </style>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>

<body>

    <main role="main" class="container">

      <div class="starter-template">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>qurls -- a quick and dirty hacked together urlshortener</h1>

         <form action="{{ route('shorten') }}" method="post" >
            @csrf

            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="https://url-to-shorten" aria-label="url-to-shorten" aria-describedby="basic-addon2" required name="url-to-shorten">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary">shorten</button>
              </div>
            </div>
        </form>

        @isset($url_mapping)
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">url</th>
                  <th scope="col">shortcut</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $url_mapping->url }}</td>
                  <td><a href="{{ URL::to("/s/".$url_mapping->shortcut) }}" target="_blank" >{{Request::root()}}/s/{{$url_mapping->shortcut}}</a></td>
                </tr>
              </tbody>
            </table>
        @endisset

      </div>

    </main>

    <footer class="footer-copyright text-center py-3">
        &copy; 2020 <a href="https://github.com/stg7">stg7</a> <p>a proof of concept project to work with <a href="https://laravel.com/">laravel</a></p>
    </footer>
    </body>
</html>
