<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($aboutEdit->id) ? route('about.update', $aboutEdit->id) : route('about.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($aboutEdit->id))
                @method('PUT')
            @endif
        
            <!-- Description Input -->
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ old('description', isset($aboutEdit->id) ? $aboutEdit->description : '') }}" class="form-control" placeholder="Enter description" required>
        
            <!-- Image Upload Input -->
            <label for="image">Upload Image (optional)</label>
            <input type="file" name="image" id="image" class="form-control">
        
            <!-- Image Preview -->
            @if(isset($aboutEdit->image))
                <img src="{{ url('aboutImage/'.$aboutEdit->image) }}" alt="Current Image" id="logoDisplay" style="max-width: 100px; margin-top: 10px;">
            @else
                <img src="" id="logoDisplay"  style="max-width: 100px; margin-top: 10px;">
            @endif
        
            <!-- Submit Button -->
            <button class="btn btn-primary mt-2">{{ isset($aboutEdit->id) ? 'Update' : 'Submit' }}</button>
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