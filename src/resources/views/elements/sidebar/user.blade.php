<div class="user">
    <div class="photo">
        <img src="{{ $avatarUrl ?? config('mdp.core.sidebar.user.avatar_placeholder') }}"
             alt="{{ __('md.user.avatar_alt') }}"/>
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
