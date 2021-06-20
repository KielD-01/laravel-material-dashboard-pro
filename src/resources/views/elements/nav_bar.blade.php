<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">@yield('mdp::pageTitle')</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            @if(config('mdp.core.nav_bar.search_panel'))
                <form class="navbar-form">
                    <div class="input-group no-border">
                        <input type="text" class="form-control"
                               placeholder="{{ __('mdp.nav_bar.search.placeholder') }}">
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                </form>
            @endif
            @if(config('mdp.core.nav_bar.dashboard.enabled'))
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route(config('mdp.core.nav_bar.dashboard.route')) }}">
                            <i class="material-icons">dashboard</i>
                            <p class="d-lg-none d-md-block">
                                {{ __('mdp.nav_bar.dashboard') }}
                            </p>
                        </a>
                    </li>
                    @endif
                    @yield('mdp::nav_bar_notifications')
                    @if(config('mdp.core.nav_bar.right_panel') && $mdp->hasUser())
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javascript:void(0)" id="navbarDropdownProfile"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    {{ __('mdp.nav_bar.account') }}
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                @if(config('mdp.core.nav_bar.profile.enabled'))
                                    <a class="dropdown-item"
                                       href="{{ route('mdp.nav_bar.profile.route') }}">{{ __('mdp.nav_bar.profile') }}</a>
                                @endif
                                @if(config('mdp.core.nav_bar.settings.enabled'))
                                    <a class="dropdown-item"
                                       href="{{ route('mdp.nav_bar.settings.route') }}">{{ __('mdp.nav_bar.settings') }}</a>
                                @endif

                                <div class="dropdown-divider"></div>

                                @if(config('mdp.core.nav_bar.log_out.enabled'))
                                    <a class="dropdown-item"
                                       href="{{ route('mdp.nav_bar.log_out.route') }}">{{ __('mdp.nav_bar.log_out') }}</a>
                                @endif
                            </div>
                        </li>
                    @endif
                </ul>
        </div>
    </div>
</nav>
