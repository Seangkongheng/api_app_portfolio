<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($categoryEdit->id) ? route('category.update', $categoryEdit->id) : route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($categoryEdit->id))
                @method('PUT')
            @endif
            <!-- Description Input -->
            <label for="description">Name</label>
            <input type="text" name="name" id="description" value="{{ old('name', isset($categoryEdit->id) ? $categoryEdit->name : '') }}" class="form-control" placeholder="Enter Name" required>
            <label for="">Image <small>(Thumbnail)</small></label>
            <input type="file" class="form-control" id="image" accept="image/*" name="image">
            @if(isset($categoryEdit->image))
                <img src="{{ url('CategoryImage/'.$categoryEdit->image) }}" alt="" id="logoDisplay"   style="max-width: 100px;margin-top: 10px">
            @else
                <img src="" id="logoDisplay" alt="" style="max-width: 100px;margin-top: 10px">
            @endif
            <br>
            <!-- Submit Button -->
            <button class="btn btn-primary mt-2">{{ isset($categoryEdit->id) ? 'Update' : 'Submit' }}</button>
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