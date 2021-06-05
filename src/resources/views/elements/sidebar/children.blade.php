<?php
/** @var MenuItem $item */

use KielD01\LaravelMaterialDashboardPro\Helpers\MenuItem; ?>

<div class="collapse" id="{{ $item->getMenuItemHash() }}">
    <ul class="nav">
        @foreach($item->getChildren() as $child)
            <li class="nav-item ">
                <a class="nav-link" href="{{ $child->getLink() }}"
                   @if($child->hasChildren()) data-toggle="collapse" @endif>
                    @if($child->hasIcon())
                        {!! $child->getIcon()->buildIcon() !!}
                        <p> {{ $child->getTitle() }} @if($child->hasChildren()) <b class="caret"></b> @endif</p>
                    @else
                        <span class="sidebar-mini">{{ $child->getAbbr() }}</span>
                        <span class="sidebar-normal">
                            {{ $child->getTitle() }}
                            @if($child->hasChildren()) <b class="caret"></b> @endif
                        </span>
                    @endif
                </a>
                @includeWhen($child->hasChildren(), 'mdp::elements.sidebar.children', ['item' => $child])
            </li>
        @endforeach
    </ul>
</div>
