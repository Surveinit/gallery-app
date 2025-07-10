<h1>Upload Image</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Title</label>
    <input type="text" name="title"required>

    <br><br>
    <label>Image</label>
    <input type="file" name="image" id="image-input" required>

    <br><br>
    <img id="image-preview" src="" alt="Image Preview" style="max-width: 200px; display: none;">

    <br>
    <button type="submit">Upload</button>
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
