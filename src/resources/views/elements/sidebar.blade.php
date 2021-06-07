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
        @includeWhen($mdp->hasUser(), 'mdp::elements.sidebar.user')
        <ul class="nav">
            @foreach($mdp->getMenu() as $menuItem)
                <li class="{{ $menuItem->getClasses() }}">
                    <a class="nav-link" href="{{ $menuItem->getLink() }}"
                       @if($menuItem->hasChildren()) data-toggle="collapse" @endif>
                        @if($menuItem->hasIcon() && !$menuItem->isChild())
                            {!! $menuItem->getIcon()->buildIcon() !!}
                            <p> {{ $menuItem->getTitle() }} @if($menuItem->hasChildren()) <b class="caret"></b> @endif
                            </p>
                        @else
                            <span class="sidebar-mini">{{ $menuItem->getAbbr() }}</span>
                            <span class="sidebar-normal">
                            {{ $menuItem->getTitle() }}
                                @if($menuItem->hasChildren()) <b class="caret"></b> @endif
                            </span>
                        @endif
                    </a>
                    @includeWhen($menuItem->hasChildren(), 'mdp::elements.sidebar.children', ['item' => $menuItem])
                </li>
            @endforeach
        </ul>
    </div>
    <div class="sidebar-background"></div>
</div>
