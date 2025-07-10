<h1>Upload Image</h1>
<form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Title" required>
    <input type="file" name="image" required>
    <button type="submit">Upload</button>
</form>
