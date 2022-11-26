<div class="card">
    <div class="card-header card-header-tabs card-header-rose">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title">{{ $title }}</span>
                <ul class="nav nav-tabs" data-tabs="tabs">
                    {{ $tabs }}
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane {{ $active }}" id="{{ $type }}">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>