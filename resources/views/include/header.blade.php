<div class="navbar-header">

    <!-- Collapsed Hamburger -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!-- Branding Image -->
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ url('images/dns-logo.png') }}" style="width: 55px">
    </a>
</div>

<div class="collapse navbar-collapse" id="app-navbar-collapse">
    <!-- Left Side Of Navbar -->
    <ul class="nav navbar-nav">
        <li><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li><a href="{{url('projects')}}">All Domains</a></li>
        <li><a href="{{url('projects/create')}}">Add New Domain</a></li>
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        @guest
        <!-- <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>-->
        @else
        <!-- Authentication Links -->
        <li class="search-project"><form class="form-group " id="search" action="{{url('/search')}}" method="GET">
                <input class="form-control" name='search' type="text" placeholder="Search Domain">
                <button  class="btn btn-primary"  type="submit">search</button>
            </form>
        </li>
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                <img src="{{ url('images/logout.png') }}" style="width: 25px">
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        @endguest
    </ul>
</div>