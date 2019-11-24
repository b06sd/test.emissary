<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="index.html">
                <img src="{{ asset('assets/images/profile.jpg') }}" class="img-circle m-b" alt="logo">
            </a>

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">{{ Auth::user()->name }}</span>
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