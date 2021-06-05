<?php
/** @var MenuItem $item */

use KielD01\LaravelMaterialDashboardPro\Helpers\MenuItem; ?>

<div class="collapse" id="{{ $item->getMenuItemHash() }}">
    <ul class="nav">
        @foreach($item->getChildren() as $child)
            <li class="nav-item ">
                <a class="nav-link" href="{{ $child->getLink() }}">
                    {!! $child->getIcon()->buildIcon() !!}
                    <p> {{ $child->getTitle() }} @if($child->hasChildren()) <b class="caret"></b> @endif</p>
                </a>
                @includeWhen($child->hasChildren(), 'mdp::elements.sidebar.children', ['item' => $child])
            </li>
        @endforeach
    </ul>
</div>
