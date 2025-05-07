<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($toolEdit->id) ? route('tool.update', $toolEdit->id) : route('tool.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($toolEdit->id))
                @method('PUT')
            @endif
            <!-- Description Input -->
            <label for="description">Title</label>
            <input type="text" name="title" id="description" value="{{ old('title', isset($toolEdit->id) ? $toolEdit->title : '') }}" class="form-control" placeholder="Enter title" required>
            <!-- Submit Button -->
            <button class="btn btn-primary mt-2">{{ isset($toolEdit->id) ? 'Update' : 'Submit' }}</button>
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