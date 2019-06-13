<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            {{--<i class="fas fa-laugh-wink"></i>--}}
        </div>
        <div class="sidebar-brand-text mx-3">{{config('app.name')}}<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

@if(auth()->user()->role == 'admin')
    <!-- Nav Item - Allocation -->
    <li class="nav-item">
        <a class="nav-link" href="/allocations">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Schedule Allocation</span></a>
    </li>

    <!-- Nav Item - Cancellation Requests -->
    <li class="nav-item">
        <a class="nav-link" href="/approval">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Approve Schedule Cancellation</span></a>
    </li>
@endif
<!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/cancel">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Cancel My Allocations</span></a>
    </li>

@if(auth()->user()->role == 'admin')
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data Entry
        </div>

        <!-- Nav Item - Map Elements Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMapElements"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Map Elements</span>
            </a>
            <div id="collapseMapElements" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Elements:</h6>
                    <a class="collapse-item" href="/buildings">Buildings</a>
                    <a class="collapse-item" href="/rooms">ClassRooms</a>
                    <a class="collapse-item" href="/locations">Locations</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - User Groups Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserGroups"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>User Groups</span>
            </a>
            <div id="collapseUserGroups" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Users</h6>
                    <a class="collapse-item" href="/lecturers">Lecturers</a>
                    <a class="collapse-item" href="/students">Students</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - User Groups Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSchedulesAndOther"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Schedule</span>
            </a>
            <div id="collapseSchedulesAndOther" class="collapse" aria-labelledby="headingTwo"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Schedule</h6>
                    <a class="collapse-item" href="/activities">Activities</a>
                    <a class="collapse-item" href="/courses">Courses</a>
                    <a class="collapse-item" href="/enrollments">Enrollments</a>
                    <a class="collapse-item" href="/schedules">Schedules</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <!-- Nav Item - Admin Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>User Administration</span>
            </a>
            <div id="collapseAdmin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Admin Activity:</h6>
                    <a class="collapse-item" href="/register">Create Admin Account</a>
                </div>
            </div>
        </li>

@endif

<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>