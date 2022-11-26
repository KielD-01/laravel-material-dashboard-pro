<div class="card card-pricing card-plain">
    <div class="card-body">
        <h6 class="card-category">{{ $category }}</h6>
        <div class="card-icon">
            {!! $icon !!}
        </div>
        <h3 class="card-title">{{ $title }}</h3>
        <p class="card-description">
            {!! $slot !!}
        </p>
        <a href="{{ $link }}" class="btn {{ $btnClasses }}">{{ $actionButton }}</a>
    </div>
</div>