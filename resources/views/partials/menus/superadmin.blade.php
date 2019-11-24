@role(['superadministrator'])
<li class="active">
    <a href="/home"> <span class="nav-label">Dashboard</span> <span class="label label-success pull-right">v.1</span>
    </a>
</li>
<li>
    <a href="#"><span class="nav-label">Access Control</span><span class="fa arrow"></span> </a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('users.index') }}">User Management</a></li>
    </ul>
    {{--
    <ul class="nav nav-second-level">
        <li><a href="#">Role Management</a></li>
    </ul> --}}
    <ul class="nav nav-second-level">
        <li><a href="{{ route('users.allAppUser') }}">Create App User</a></li>
    </ul>
</li>
@endrole