<?php
/** @var MenuItem $item */

use KielD01\LaravelMaterialDashboardPro\Helpers\MenuItem; ?>

<div class="collapse" id="{{ \Ramsey\Uuid\Uuid::fromString($item->getLink()) }}">
    <ul class="nav">
        @foreach($item->getChildren() as $child)
            <li class="nav-item ">
                <a class="nav-link" href="{{ $item->getLink() }}">
                    {!! $item->getIcon()->buildIcon() !!}
                    <p> {{ $item->getTitle() }} @if($item->hasChildren()) <b class="caret"></b> @endif</p>
                </a>
                @includeWhen($item->hasChildren(), 'mdp::elements.sidebar.children', ['item' => $item])
            </li>
        @endforeach
    </ul>
</div>
