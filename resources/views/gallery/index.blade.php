<h1>Gallery</h1>
<a href="{{ route('gallery.create') }}">Upload New</a>
<ul>
    @foreach ($galleries as $gallery)
        <li>
            <img src="{{ asset('storage/images/' . $gallery->image) }}" width="100">
            {{ $gallery->title }}
            <a href="{{ route('gallery.edit', $gallery->id) }}">Edit</a>
            <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
