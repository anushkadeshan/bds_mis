<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link">
        <i class="fa fa-chevron-circle-left nav-icon"></i>
        <p>Back</p>
    </a>
</li>
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="fa fa-folder-open nav-icon"></i>
        <p>
            BSS Students
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('students.index') }}" class="nav-link {{ Request::is('bss/students') ? 'active' : '' }}">
                <i class="fa fa-user-graduate nav-icon"></i>
                <p>All BSS Students</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('students.create') }}" class="nav-link {{ Request::is('bss/students/create') ? 'active' : '' }}">
                <i class="fa fa-plus nav-icon"></i>
                <p>Add a BSS Student</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('edit-student') }}" class="nav-link {{ Request::is('bss/students-edit') ? 'active' : '' }}">
                <i class="fa fa-edit nav-icon"></i>
                <p>Edit a BSS Student</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="fa fa-folder-open nav-icon"></i>
        <p>
            Exam Results
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('al') }}" class="nav-link {{ Request::is('bss/students/al_results') ? 'active' : '' }}">
                <i class="fa fa-plus nav-icon"></i>
                <p>Add or Edit A/L Results</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('ol') }}" class="nav-link {{ Request::is('bss/students/ol_results') ? 'active' : '' }}">
                <i class="fa fa-plus nav-icon"></i>
                <p>Add or Edit O/L Results</p>
            </a>
        </li>
    </ul>
</li>
