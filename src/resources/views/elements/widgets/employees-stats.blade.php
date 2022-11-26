<div class="card">
    <div class="card-header card-header-text card-header-warning">
        <div class="card-text">
            <h4 class="card-title">{{ $title }}</h4>
            <p class="card-category">{{ $description }}</p>
        </div>
    </div>
    <div class="card-body table-responsive">
        {{ $slot }}
    </div>
</div>
