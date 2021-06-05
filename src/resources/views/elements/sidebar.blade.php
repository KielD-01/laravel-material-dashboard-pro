<?php

use KielD01\LaravelMaterialDashboardPro\Helpers\MenuItem;

/**
 * @var MenuItem $menuItem
 */
?>

<div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="{{ config('mdp.core.site.url') }}" class="simple-text logo-mini">
            {{ config('mdp.core.site.abbr') }}
        </a>
        <a href="{{ config('mdp.core.site.url') }}" class="simple-text logo-normal">
            {{ config('mdp.core.site.name') }}
        </a></div>
    <div class="sidebar-wrapper">
        @if($mdp->hasUser())
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
        @endif
        <ul class="nav">
            @foreach(config('mdp.menu', []) as $menuItem)
                <li class="nav-item">
                    <a class="nav-link" href="{{ $menuItem->getLink() }}">
                        {!! $menuItem->getIcon()->buildIcon() !!}
                        <p> {{ $menuItem->getTitle() }} @if($menuItem->hasChildren()) <b class="caret"></b> @endif</p>
                    </a>
                    @includeWhen($menuItem->hasChildren(), 'mdp::elements.sidebar.children', ['item' => $menuItem])
                </li>
            @endforeach
        </ul>
    </div>
    <div class="sidebar-background"></div>
</div>
