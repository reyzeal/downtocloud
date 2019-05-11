<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="perpus-app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    html,body{
      width: 100%;
      margin: 0;
      height: 100%;
    }
    #app {
      height: 100%;
      width: 100%;
    }
    </style>
</head>
<body>
    <div id="app" ng-controller="main">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Perpustakaan Data IF
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if(Route::is('landing'))
        <main>
        @else
        <main class="py-4">
        @endif
            @yield('content')
        </main>
    </div>
    {{-- <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
      app.controller('heading',function($scope,$rootScope,$timeout){
        $scope.show = 'cover-container position-fixed d-flex w-100 h-100 p-3 mx-auto justify-content-center align-items-center text-center bg-dark text-white';
        $scope.browse = function(){
          $scope.show ='cover-container d-none w-100 h-100 p-3 mx-auto justify-content-center align-items-center text-center bg-dark text-white';
          $rootScope.$emit('browseEvent',{});
          $timeout(function(){
            $scope.$apply();
          },100);
        }
      });
      app.controller('core',function($scope,$rootScope,$timeout){
        $scope.show = false;
        $rootScope.$on('browseEvent',function($event,message){
          $scope.show = true;
          $timeout(function(){
            $scope.$apply();
            angular.element('html, body').animate({
                scrollTop: angular.element("#core").offset().top
            }, 2000);
          },100);
        });
      });
    </script>
</body>
</html>
