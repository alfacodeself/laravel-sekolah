@if ($event->thumbnail != null)
    <img src="{{ url($event->thumbnail) }}" class="img-fluid" alt="thumbnail">
    @else
    <h3>Tidak ada thumbnail</h3>
@endif
