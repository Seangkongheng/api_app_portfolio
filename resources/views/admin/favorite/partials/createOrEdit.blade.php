<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($favoritEdit->id) ? route('favorite.update', $favoritEdit->id) : route('favorite.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($favoritEdit->id))
                @method('PUT')
            @endif
            <!-- Description Input -->
            <label for="description">Title</label>
            <input type="text" name="title" id="description" value="{{ old('title', isset($favoritEdit->id) ? $favoritEdit->title : '') }}" class="form-control" placeholder="Enter Title" required>
        
            <br>
            <!-- Submit Button -->
            <button class="btn btn-primary mt-2">{{ isset($favoritEdit->id) ? 'Update' : 'Submit' }}</button>
        </form>
        
    </div>
</div>


<script>
    document.getElementById('image').onchange=function(evt){
        const [file]=this.files;
        if(file){
            document.getElementById('logoDisplay').src=URL.createObjectURL(file)
        }
    }
</script>