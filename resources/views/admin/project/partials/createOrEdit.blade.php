<div class="card mt-3">
    <div class="card-body">
        <form   action="{{ isset($projectEdit->id) ? route('project.update', $projectEdit->id) : route('project.store') }}"  method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($projectEdit->id))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="label">Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ isset($projectEdit->name) ? $projectEdit->name : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="label">Category</label>
                        <select name="project_cat_id" id="" class="form-control">
                            <option value="">Please Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('project_cat_id', isset($projectEdit->detail->project_cat_id) ? $projectEdit->detail->project_cat_id : '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{--  <div class="col-6">
                    <div class="form-group">
                        <label for="label">Type Skill</label>
                        <select name="skill_id" id="" class="form-control">
                            <option selected value="">Please Select skill</option>
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}" {{ old('skill_id',isset($projectEdit->detail->skill_id) ? $projectEdit->detail->skill_id : '') == $skill->id ? 'selected' : '' }}>{{ $skill->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>  --}}

                <div class="col-6">
                    <div class="form-group">
                        <label for="label">Source Code</label>
                        <input type="text" name="url" placeholder="Enter Source Code URL" class="form-control" value="{{ isset($projectEdit->detail->url) ? $projectEdit->detail->url : '' }}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="label">Url Website</label>
                        <input type="text" name="link_web" placeholder="Enter Link website" class="form-control" value="{{ isset($projectEdit->detail->link_web) ? $projectEdit->detail->link_web : '' }}">
                    </div>
                </div>


                <div class="col-6">
                    <label for="">Image</label>
                    <input type="file" class="form-control" multiple id="logo" accept="image/*" name="image[]">
                    <div class="mb-3" id="imagePreviewContainer">
                        @if(isset($projectEdit->detail->image) && is_array(json_decode($projectEdit->detail->image, true)))
                            @foreach(json_decode($projectEdit->detail->image, true) as $img)
                                <img src="{{ url('ProjectImage/'.$img) }}" alt="Current Image" class="logoDisplay"  style="max-width: 100px; margin-top: 10px; margin-right: 5px;">
                            @endforeach
                        @else
                            <img src="" id="logoDisplay" style="max-width: 100px; margin-top: 10px;">
                        @endif
                    </div>
                </div>

                <div class="col-6">
                    <label for="">Thumbnail Image</label>
                    <input type="file" class="form-control" id="thumbnail_image" accept="image/*"  name="thumbnail_image">
                    @if (isset($projectEdit->detail->thumbnail_image))
                        <img src="{{ url('projectThumnail/' . $projectEdit->detail->thumbnail_image) }}" alt="" id="logoDisplay" style="max-width: 100px;margin-top: 10px">
                    @else
                        <img src="" id="thumbnail_imageDisplay" alt="" style="max-width: 100px;margin-top: 10px">
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="label">Description</label>
                <textarea placeholder="Description" class="form-control" name="description" id="" cols="30" rows="10">{{ isset($projectEdit->detail->description) ? $projectEdit->detail->description : '' }} </textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="statusActive" value="Public" {{
                            old('status', isset($projectEdit->detail->is_public) ? ($projectEdit->detail->is_public ?
                        'Public' : 'Unpublic') : '') == 'Public' ? 'checked' : '' }}>
                        <label class="form-check-label text-primary" for="statusActive">Public</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="statusInactive" value="Unpublic"
                            {{ old('status', isset($projectEdit->detail->is_public) ? ($projectEdit->detail->is_public ?
                        'Public' : 'Unpublic') : '') == 'Unpublic' ? 'checked' : '' }}>
                        <label class="form-check-label text-danger" for="statusInactive">Unpublic</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-2">{{ isset($projectEdit->id) ? 'Update ' : 'Submit' }}</button>
        </form>
    </div>
</div>


<script>
    document.getElementById('logo').onchange = function(evt) {
        const [file] = this.files;
        if (file) {
            document.getElementById('logoDisplay').src = URL.createObjectURL(file)
        }
    }
</script>

<script>
    document.getElementById('thumbnail_image').onchange = function(evt) {
        const [file] = this.files;
        if (file) {
            document.getElementById('logoDisplay').src = URL.createObjectURL(file)
        }
    }
</script>
