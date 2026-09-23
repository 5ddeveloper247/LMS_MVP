<a href="{{ route('resource.download', $resource->id) }}" class="res-card" data-search="{{ strtolower($resource->name . ' ' . $resource->short_description) }}">
    <div class="res-icon pdf">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
    </div>
    <div class="res-info">
        <h4>{{ $resource->name }}</h4>
        <p>{{ $resource->short_description }}</p>
        <span class="res-tag free">PDF</span>
    </div>
</a>
