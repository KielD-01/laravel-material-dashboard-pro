<div class="card card-testimonial">
    <div class="icon">
        {!! $icon !!}
    </div>
    <div class="card-body">
        <h5 class="card-description">
            {!! $slot !!}
        </h5>
    </div>
    <div class="card-footer">
        <h4 class="card-title">{{ $title }}</h4>
        <h6 class="card-category">{{ $category }}</h6>
        <div class="card-avatar">
            <a href="{{ $link }}">
                <img class="img" src="{{ $image }}">
            </a>
        </div>
    </div>
</div>