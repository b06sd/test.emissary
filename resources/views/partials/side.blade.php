<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="index.html">
                <img src="{{ asset('assets/images/profile.jpg') }}" class="img-circle m-b" alt="logo">
            </a>

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">{{ Auth::user()->name }}</span>

                <div class="dropdown">
                    <ul class="dropdown-menu animated flipInX m-t-xs">
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="analytics.html">Analytics</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav" id="side-menu">
            @include('partials.menus.superadmin')

            @include('partials.menus.admin')

            @include('partials.menus.unit')

            @include('partials.menus.courier')
        </ul>
    </div>
</aside>