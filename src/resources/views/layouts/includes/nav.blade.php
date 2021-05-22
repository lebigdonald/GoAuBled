<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <h1>
                <a href="{{route('accueil')}}" class="scrollto">Go<span>AuBled</span></a>
            </h1>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="{{ (request()->is('/')) ? 'menu-active' : '' }}"><a href="{{ route('accueil') }}"><span class="fa fa-home mr-1"></span>Accueil</a></li>
                <li class="{{ (request()->is('news')) ? 'menu-active' : '' }}"><a href="{{ route('posts.index') }}"><span class="fa fa-search mr-1"></span>Voir les annonces</a></li>
                <li class="{{ (request()->is('travel')) ? 'menu-active' : '' }}"><a href="{{ route('travel.create') }}"><span class="fa fa-road mr-1"></span>Proposer un trajet</a></li>
                <li class="{{ (request()->is('coli')) ? 'menu-active' : '' }}"><a href="{{ route('packet.create') }}"><span class="fa fa-bank mr-1"></span>Expedier un colis</a></li>
                @guest
                    <li class="{{ (request()->is('register')) ? 'menu-active' : '' }}"><a href="{{ route('register') }}"><span class='fa fa-user mr-1'></span>Inscription</a></li>
                    <li class="{{ (request()->is('login')) ? 'menu-active' : '' }}"><a href="{{ route('login') }}"><span class='fa fa-sign-in mr-1'></span>Connexion</a></li>
                @else
                    <li class="{{ (request()->is('profile/'. Auth()->id() . '/chat')) ? 'menu-active' : 'test' }}"></li>
                    @if (!is_null(Auth::user()->avatar_original))
                        <li class="ml-3 user__bild"><img src="{{Auth::user()->avatar}}" class="user__bild"></li>
                    @else
                        <li class="ml-3 user__bild"><img src="{{Auth::user()->avatar ? asset(Auth::user()->avatar) :  asset('/img/logo.png') }}" class="user__bild"></li>
                    @endif
                    <li class="nav-item dropdown">
                        <a v-pre href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ substr(Auth::user()->name,0,20). '...' }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{ link_to_route('users.profile', 'profile', Auth::user(), ['class' => 'dropdown-item']) }}

                            <div class="dropdown-divider"></div>

                            <a href="{{ url('/logout') }}"
                               class="dropdown-item"
                               onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                deconnection
                            </a>

                            <form id="logout-form" class="d-none" action="{{ url('/logout') }}" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</header>
