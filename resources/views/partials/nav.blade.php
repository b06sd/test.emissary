<nav role="navigation">
    <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
    <div class="small-logo">
        <span class="text-primary">EMISSARY</span>
    </div>

    <div class="navbar-right">
        <ul class="nav navbar-nav no-borders">
            <li class="dropdown">
                <a style="font-size:1.1em;" id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu hdropdown notification animated flipInX">
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>