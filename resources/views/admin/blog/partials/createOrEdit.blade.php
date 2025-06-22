<div class="card mt-3">
    <div class="card-body">
        {{--  <form action="{{ isset($aboutEdit->id) ? route('about.update', $aboutEdit->id) : route('about.store') }}" method="post" enctype="multipart/form-data">
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
        </form>  --}}


        <form action="{{ isset($BlogEdit->id) ? route('blog.update', $BlogEdit->id) : route('blog.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($BlogEdit->id))
                @method('PUT')
            @endif


            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input  type="text"   name="title" id="title" value="{{ old('title', isset($BlogEdit->id) ? $BlogEdit->title : '') }}"  class="form-control"  placeholder="Enter title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description"
                    placeholder="Enter description" rows="4" required>{{ old('description', isset($BlogEdit->id) ? $BlogEdit->description : '') }}</textarea>
            </div>

            <!-- Image Upload Input -->
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image (optional)</label>
                <input type="file" name="image[]" multiple id="image" accept="image/*" class="form-control">
            </div>

            <!-- Image Preview -->
            <div class="mb-3" id="imagePreviewContainer">
                @if(isset($BlogEdit->images) && is_array(json_decode($BlogEdit->images, true)))
                    @foreach(json_decode($BlogEdit->images, true) as $img)
                        <img src="{{ url('blogImages/'.$img) }}" alt="Current Image" class="logoDisplay" style="max-width: 100px; margin-top: 10px; margin-right: 5px;">
                    @endforeach
                @else
                    <img src="" id="logoDisplay" style="max-width: 100px; margin-top: 10px;">
                @endif
            </div>


            <div class="mb-3">
                <label class="form-label">Status</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="statusActive" value="Public"
                            {{ old('status', isset($BlogEdit->is_public) ? ($BlogEdit->is_public ? 'Public' : 'Unpublic') : '') == 'Public' ? 'checked' : '' }}>
                        <label class="form-check-label text-primary" for="statusActive">Public</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="statusInactive" value="Unpublic"
                            {{ old('status', isset($BlogEdit->is_public) ? ($BlogEdit->is_public ? 'Public' : 'Unpublic') : '') == 'Unpublic' ? 'checked' : '' }}>
                        <label class="form-check-label text-danger" for="statusInactive">Unpublic</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-2">{{ isset($BlogEdit->id) ? 'Update' : 'Submit' }}</button>
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
