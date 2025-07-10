<h1>Edit Image</h1>
<form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <label>Title</label>
    <input type="text" name="title" value="{{ $gallery->title }}" required>
    <br> <br>
    <label>Image</label><br>
    <span>
        <img src="{{ asset('storage/images/' . $gallery->image) }}" width="200">
        <img id="image-preview" src="" alt="Image Preview" style="max-width: 200px; display: none;">
    </span>
    <br>
    <input type="file" name="image" id="image-input">
    <br> <br>
    <button type="submit">Update</button>
</form>

<script>
const input = document.getElementById('image-input');
const preview = document.getElementById('image-preview');

input.addEventListener('change', function(){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.addEventListener("load", function(){
            preview.setAttribute("src", this.result);
            preview.style.display = "block";
        });

        reader.readAsDataURL(file);
    } else {
        preview.style.display = "none";
    }
});
</script>
