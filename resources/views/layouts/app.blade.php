<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>@yield('title')</title>

</head>

<body>
    @php $lang = session('locale') @endphp
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @guest
                    <!-- pour tous -->
                    <a class="nav-link" href="{{route('maisonneuve.index')}}">{{trans('lang.text_home')}}</a>
                    <a class="nav-link" href="{{route('registration')}}">{{trans('lang.text_registration')}}</a>
                    <a class="nav-link" href="{{route('login')}}">{{trans('lang.text_login')}}</a>
                    @else
                    <!-- accès pour usager connecté -->
                    <a class="nav-link" href="{{route('logout')}}">{{trans('lang.text_logout')}}</a>
                    <a class="nav-link" href="{{route('forum.index')}}">{{trans('lang.text_nav_forum')}}</a>
                    <a class="nav-link" href="{{route('repertoire')}}">{{trans('lang.text_nav_repertoire')}}</a>
                    <a class="nav-link" href="{{route('maisonneuve.index')}}">{{trans('lang.text_students')}}</a>
                    @endguest

                    <!-- pour tous -->
                    <a class="nav-link @if($lang == 'fr') text-info @endif" href="{{route('lang', 'fr')}}">FR <i class='flag flag-canada'></i></a>
                    <a class="nav-link @if($lang == 'en') text-info @endif" href="{{route('lang', 'en')}}">ENG <i class='flag flag-united-states'></i></a>
                </div>
            </div>
            <a class="navbar-brand" href="{{route('maisonneuve.index')}}">{{trans('lang.text_hello')}} {{Auth::user()? Auth::user()->userHasStudent?->name : trans('lang.text_guest') }}</a>
        </div>
    </nav>
    <div class="container pb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-6 my-4">@yield('titleH1')</h1>
            </div>
        </div>

        @yield('content')
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>