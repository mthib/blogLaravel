<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Foundation | Welcome</title>


<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation-prototype.min.css"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet" type="text/css">
    <meta class="foundation-mq">
    <link id="avast_os_ext_custom_font" href="chrome-extension://eofcbnmajmjmplflapaojjnihcjkigck/common/ui/fonts/fonts.css" rel="stylesheet" type="text/css"> --}}
</head>
<body>
    
<div class="top-bar">
    <div class="row">
        <div class="top-bar-left">
            <ul class="menu">               
                <li><a href="{{ url('') }}">Home</a></li>
                <li><a href="{{ url('articles') }}">Articles</a></li>
                <li><a href="{{ url('contact') }}">Contact</a></li>
                @isset(Auth::user()->name)
                    <li><a href="{{ url('adminArticles') }}">Administration</a></li>
                @endisset
            </ul>

        </div>
        <div class="top-bar-right">
 
            <ul class="dropdown menu" data-dropdown-menu="" role="menubar" data-e="83btzq-e" data-is-click="false">

                      @guest
                      <li class="menu-text" role="menuitem">
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="menu-text" role="menuitem">
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else

                        <li class="has-submenu is-dropdown-submenu-parent opens-right" role="menuitem" aria-haspopup="true" aria-label="One" data-is-click="false">
                                  <a href="#">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="submenu menu vertical is-dropdown-submenu first-sub" data-submenu="" role="menu" style="">
                                            <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item">
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                    </ul>                               
                            </li>
                        @endguest
               
            </ul>
        </div>
    </div>
</div>

{{-- <div class="top-bar">
        <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu="" role="menubar" data-e="jqfukm-e" data-is-click="false">
        <li class="menu-text" role="menuitem">Yeti Store</li>
        <li class="has-submenu is-dropdown-submenu-parent opens-right" role="menuitem" aria-haspopup="true" aria-label="One" data-is-click="false">
        <a href="#">One</a>
        <ul class="submenu menu vertical is-dropdown-submenu first-sub" data-submenu="" role="menu" style="">
        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#">One</a></li>
        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#">Two</a></li>
        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#">Three</a></li>
        </ul>
        </li>
        <li role="menuitem"><a href="#">Two</a></li>
        <li role="menuitem"><a href="#">Three</a></li>
        </ul>
        </div>
        <div class="top-bar-right">
        <ul class="menu">
        <li><input type="search" placeholder="Search"></li>
        <li><button type="button" class="button">Search</button></li>
        </ul>
        </div>
        </div> --}}

<div class="callout large primary">
<div class="row column text-center">
<h1>Our Blog</h1>
<h2 class="subheader">Such a Simple Blog Layout</h2>
</div>
</div>

<div class="row medium-8 large-7 columns">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script> --}}
<script>
      $(document).foundation();
    </script>
</body>
</html>
