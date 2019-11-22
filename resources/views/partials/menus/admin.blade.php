@role('administrator')
<li class="active">
    <a href="/home"> <span class="nav-label">Dashboard</span> <span class="label label-success pull-right">v.1</span>
    </a>
</li>
<li>
    <a href="#"><span class="nav-label">Manage Company</span><span class="fa arrow"></span> </a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('companies.index') }}">View Companies</a></li>
    </ul>
</li>
<li>
    <a href="#"><span class="nav-label">Manage Delivery</span><span class="fa arrow"></span> </a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('deliveries.index')}}">Create Delivery</a></li>
    </ul>
</li>
@endrole