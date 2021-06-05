<div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="{{ config('mdp.core.site.url') }}" class="simple-text logo-mini">
            {{ config('mdp.core.site.abbr') }}
        </a>
        <a href="{{ config('mdp.core.site.url') }}" class="simple-text logo-normal">
            {{ config('mdp.core.site.name') }}
        </a></div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ $avatarUrl ?? config('mdp.core.sidebar.user.avatar_placeholder') }}"/>
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                {{ $userName ?? 'Lorem Ipsum'}}
                <b class="caret"></b>
              </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            @foreach(config('mdp.menu', []) as $menuItem)
                <li class="nav-item">
                    <a class="nav-link" href="{{ $menuItem->getLink() }}">
                        {!! $menuItem->getIcon()->buildIcon() !!}
                        <p> {{ $menuItem->getTitle() }} </p>
                    </a>
                </li>
            @endforeach
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" data-toggle="collapse" href="#pagesExamples">--}}
{{--                    <i class="material-icons">image</i>--}}
{{--                    <p> Pages--}}
{{--                        <b class="caret"></b>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="pagesExamples">--}}
{{--                    <ul class="nav">--}}
{{--                        <li class="nav-item ">--}}
{{--                            <a class="nav-link" href="#">--}}
{{--                                <span class="sidebar-mini"> P </span>--}}
{{--                                <span class="sidebar-normal"> Pricing </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" data-toggle="collapse" href="#componentsExamples">--}}
{{--                    <i class="material-icons">apps</i>--}}
{{--                    <p> Components--}}
{{--                        <b class="caret"></b>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="componentsExamples">--}}
{{--                    <ul class="nav">--}}
{{--                        <li class="nav-item ">--}}
{{--                            <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">--}}
{{--                                <span class="sidebar-mini"> MLT </span>--}}
{{--                                <span class="sidebar-normal"> Multi Level Collapse--}}
{{--                      <b class="caret"></b>--}}
{{--                    </span>--}}
{{--                            </a>--}}
{{--                            <div class="collapse" id="componentsCollapse">--}}
{{--                                <ul class="nav">--}}
{{--                                    <li class="nav-item ">--}}
{{--                                        <a class="nav-link" href="#">--}}
{{--                                            <span class="sidebar-mini"> E </span>--}}
{{--                                            <span class="sidebar-normal"> Example </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
    </div>
    <div class="sidebar-background"></div>
</div>
