<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {!! trans('title.logo') !!}
            </a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">{!! trans('general.login') !!}</a></li>
                <li><a href="{{ url('/register') }}">{!! trans('general.register') !!}</a></li>
                @else
                <li><a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">{!! trans('general.new_entry') !!}</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{!! route('user.showEntries', Auth::user()->id) !!}"><i class="fa fa-file-text-o" aria-hidden="true"></i> {!! trans('general.your_entries') !!}</a></li>
                        <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> {!! trans('general.setting') !!}</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> {!! trans('general.logout') !!}</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
