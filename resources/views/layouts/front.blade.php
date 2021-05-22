<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <style>
        .front.row {
            margin-bottom: 40px;
        }
    </style>
    @include('layouts.front.meta')
    @stack('metadata')
    @stack('css')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 40px;">

    <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(request()->is('/')) active @endif">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>

            @foreach($categories as $category)
                <li class="nav-item  @if(request()->is('category/' . $category->slug)) active @endif">
                    <a class="nav-link"
                       href="{{route('category.single', ['slug' => $category->slug])}}">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>
        <div>
            <div class="form-group input-group">
                <form action="/buscar" method="GET">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input name="search" id="txt_consulta" placeholder="Buscar" type="text" class="form-control">
                </form>
            </div>
        </div>
        <div class="my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">

                @auth
                    <li class="nav-item  @if(request()->is('client.index')) active @endif">
                        <a href="{{route('client.index')}}" class="nav-link">Meus Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault();
                                                                  document.querySelector('form.logout').submit(); ">Sair</a>

                        <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </li>
                @endauth

                <li class="nav-item">
                    <a href="{{route('cart.index')}}" class="nav-link">
                        @if(!\Cart::session(session()->get('cartID')??session()->getId())->isEmpty())
                            <span
                                class="badge badge-danger">{{\Cart::session(session()->get('cartID'))->getTotalQuantity()}}</span>
                        @endif
                        <i class="fa fa-shopping-cart fa-2x"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

@include('layouts.front.footer')

<script src="{{mix('js/front.js')}}"></script>
@stack('js')
</body>
</html>
