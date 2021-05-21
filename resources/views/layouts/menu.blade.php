 @can('View User')
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="fa fa-users nav-icon"></i>
        <p>
            Admin
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                <i class="fa fa-users nav-icon"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                <i class="fa fa-cog nav-icon"></i>
                <p>Roles</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('permissions.index') }}" class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
                <i class="fa fa-lock nav-icon"></i>
                <p>Permissions</p>
            </a>
        </li>
    </ul>
</li>
@endcan
<li class="nav-item">
    <a href="{{ route('gn-divisions.index') }}" class="nav-link {{ Request::is('gn-divisions*') ? 'active' : '' }}">
        <i class="fa fa-atlas nav-icon"></i>
        <p>GN-Divisions</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('dsd-divisions.index') }}" class="nav-link {{ Request::is('dsd-divisions*') ? 'active' : '' }}">
        <i class="fa fa-city nav-icon"></i>
        <p>DSD-Divisions</p>
    </a>
</li>
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="fa fa-house-damage nav-icon"></i>
        <p>
            Families
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('resourse-people.index') }}" class="nav-link {{ Request::is('resourse-people*') ? 'active' : '' }}">
                <i class="fa fa-building nav-icon"></i>
                <p>Resourse People</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('house-hold-families.index') }}" class="nav-link {{ Request::is('house-hold-families*') ? 'active' : '' }}">
                <i class="fa fa-house-damage nav-icon"></i>
                <p>Livilihood Family</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="" class="nav-link">
        <i class="fa fa-folder-open nav-icon"></i>
        <p>
            Completion Reports
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('livelihood-support.index') }}" class="nav-link {{ Request::is('livelihood-support*') ? 'active' : '' }}">
                <i class="fa fa-hands-helping nav-icon"></i>
                <p>Livelihood Support</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('business-developmemt.index') }}" class="nav-link {{ Request::is('business-developmemt*') ? 'active' : '' }}">
                <i class="fa fa-building nav-icon"></i>
                <p>Business Developmemt</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('idea-generation.index') }}" class="nav-link {{ Request::is('idea-generation*') ? 'active' : '' }}">
                <i class="fa fa-lightbulb nav-icon"></i>
                <p>Idea Generation</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('marketing-linkages.index') }}" class="nav-link {{ Request::is('marketing-linkages*') ? 'active' : '' }}">
                <i class="fa fa-store nav-icon"></i>
                <p>Marketing Linkages</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('insurances.index') }}" class="nav-link {{ Request::is('insurances*') ? 'active' : '' }}">
                <i class="fa fa-house-damage nav-icon"></i>
                <p>Insurances</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('awaraness-sgbv.index') }}" class="nav-link {{ Request::is('awaraness-sgbv*') ? 'active' : '' }}">
                <i class="fa fa-equals nav-icon"></i>
                <p>Awaraness-SGBV</p>
            </a>
        </li>

    </ul>
</li>