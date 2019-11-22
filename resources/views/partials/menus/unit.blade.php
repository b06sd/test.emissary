@role(['units', 'administrator'])
<li>
    <a href="#"><span class="nav-label">Manage Schedule</span><span class="fa arrow"></span> </a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('schedules.index') }}">View my Schedules</a></li>
    </ul>
</li>
@endrole
@role('units')
<li>
    <a href="#"><span class="nav-label">Manage Company</span><span class="fa arrow"></span> </a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('companies.index')}}"> View Company</a></li>
    </ul>
</li>
@endrole