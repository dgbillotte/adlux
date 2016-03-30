
<div class="album">
    <div>Title: {{ $album->title }}</div>
    <div>Description: {{ $album->description }}</div>
    <div>Number of Photos: {{ $album->numPhotos() }}</div>
    <div><a href="{{ url('album/'.$album->id) }}">View Album</a></div>
    @if(count($album->photos) > 0)
    <div><img src="{{ $album->photos[0]->getThumbnailURL() }}" alt=""></div>
    @endif
</div>
