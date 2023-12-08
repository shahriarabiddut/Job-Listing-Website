@php $postjob=0 ; $staffNav=0 ; @endphp
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">@isset($SiteOption) {{ $SiteOption[0]->value }} @endisset</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link @if (Route::currentRouteName() == 'home')) active @endif
            ">Home</a>
            <a href="{{ route('about') }}" class="nav-item nav-link @if (Route::currentRouteName() == 'about')) active @endif">About</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="#" class="dropdown-item">Job List</a>
                    <a href="#" class="dropdown-item">Job Detail</a>
                </div>
            </div>
            <a href="#" class="nav-item nav-link">Contact</a>
            @auth('staff')
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="{{ route('staff.dashboard') }}"><i class="mx-1 fa fa-users"></i> Staff Pofile</a>
                
                <div class="dropdown-menu rounded-0 m-0">
                    <a class="dropdown-item " href="{{ route('staff.profile.view') }}"> <i class="fa fa-user mx-1"></i> Account</a>
                    <a class="dropdown-item " href="{{ route('staff.job.index') }}"> <i class="fa fa-user mx-1"></i> My Jobs</a>
                </div> 
            </div> 
            @php $staffNav=1 ; @endphp
            @endauth
            @if (Route::has('login') && $staffNav!=1)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="mx-1 fa fa-users"></i> My Account</a>
                    <div class="dropdown-menu rounded-0 m-0">
                @auth
                    <a class="dropdown-item " href="{{ route('user.profile') }}"> <i class="fa fa-user mx-1"></i> Account</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"> <i class=" mx-1 fas fa-sign-out-alt"></i>Logout</a>
                    @php $postjob=1 ; @endphp
                @else
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                  @if (Route::has('register'))
                    <a class="dropdown-item"  href="{{ route('register') }}">Register</a>
                  @endif 
                @endauth
                    </div>
                </div> 
            @endif
            
            @auth('admin')
            <a class="nav-item nav-link" href="{{ route('admin.dashboard') }}"> Admin Dashboard</a>
            @endauth
            

            {{-- POST A JOB --}}
            @auth
            @else
            
            @if ($postjob!=1)
                <a href="{{ route('staff.job.create') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
            @endif
            @endauth
        </div>
    </div>
</nav>