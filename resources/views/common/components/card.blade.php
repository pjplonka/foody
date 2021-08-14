<div>
    <div class="card mb-3">
        <div class="card-header d-flex align-items-center d-flex justify-content-between">
            <span>{{ $title }}</span>
            <div class="d-flex align-items-center">
                {{ $headerWidgets ?? null }}
            </div>
        </div>
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>
