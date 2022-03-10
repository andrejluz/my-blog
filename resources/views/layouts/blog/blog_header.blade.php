  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm " >
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>



            <div class="collapse navbar-collapse nav-menu" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto nav_menu_list">
                    <li class="nav_menu_item"><a href="{{ route('home') }}"><i class="fas fa-home"></i>&nbsp;Pagrindinis</a></li>
                    <li class="nav_menu_item"><a href="{{ route('posts.index') }}"><i class="far fa-file-alt"></i>&nbsp;Straipsniai</a></li>
                    <li class="nav_menu_item"><a href="{{ route('codings.index') }}"><i class="fas fa-code"></i>&nbsp;Koding</a></li>
                    <li class="nav_menu_item"><a href="{{ route('portfolios.index') }}"><i class="fas fa-briefcase"></i>&nbsp;Portfolio</a></li>
                </ul>

                <!-- Right Side Of Navbar -->

                <ul class="navbar-nav ml-auto nav_dropdown_menu_item">
                    <!-- Authentication Links -->
                    @guest
                    <div class="dropdown">
                        {{-- <button class="btn btn-secondary " type="button" >
                          Dropdown button
                        </button> --}}
                       <i class="far fa-user dropdown-togglefar icon-cursor" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" style="cursor:pointer; font-size: 1.3rem;"></i>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if (Route::has('login'))

                            {{-- <li class="nav-item "> --}}
                                <a class="nav-link dropdown-item" href="{{ route('login') }}">{{ __('Prisijungti') }}</a>
                            {{-- </li> --}}
                        @endif
                        @if (Route::has('register'))
                        {{-- <li class="nav-item "> --}}
                            <a class="nav-link dropdown-item" href="{{ route('register') }}">{{ __('Užsiregistruoti') }}</a>
                        {{-- </li> --}}
                    @endif
                        </div>
                      </div>
                    @else
                        <li class="nav-item dropdown">

                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Atsijungti') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
<div class="header_jumbotron">
    <div class="container">

        <div class="row d-flex justify-content-between">
            <div class="col-sm-6 header_jumbotron_text  align-self-center justify-content-start">
                <h1 class="text-center header_jumbotron_title"><a href="{{ route('home') }}">Andrej blog</a></h1>
                <div class="search_form text-center d-flex justify-content-center">

                    <form action="{{ route('search.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control header_jumbotron_input" placeholder="Search" />
                        <button type="submit" class="btn search_form__btn">Submit</button>

                    </form>



                </div>
            </div>

            <div class="col-sm-6 d-flex align-self-end justify-content-center">
                <img class="jumbotron_avatar" src="{{ url('/images/Avatar.jpg') }}"  alt="avatar"/>
            </div>
        </div>
    </div>

</div>
