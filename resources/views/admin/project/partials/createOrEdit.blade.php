<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($projectEdit->id) ? route('project.update', $projectEdit->id) : route('project.store') }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($projectEdit->id))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="label">Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control"
                            value="{{ isset($projectEdit->name) ? $projectEdit->name : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="label">Category</label>
                        <select name="project_cat_id" id="" class="form-control">
                            <option selected value="">Please Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="label">Type Skill</label>
                        <select name="skill_id" id="" class="form-control">
                            <option selected value="">Please Select skill</option>
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="label">Url</label>
                        <input type="text" name="url" placeholder="Url" class="form-control"
                            value="{{ isset($projectEdit->url) ? $projectEdit->url : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <label for="">Image</label>
                    <input type="file" class="form-control" multiple id="logo" accept="image/*" name="image[]">
                </div>
                <div class="col-6">
                    <label for="" >Thumbnail Image</label>
                    <input type="file" class="form-control" id="thumbnail_image" accept="image/*"
                        name="thumbnail_image">
                    {{-- @if (isset($projectEdit->image))
                <img src="{{ url('ProjectImage/'.$projectEdit->image) }}" alt="" id="logoDisplay"   style="max-width: 100px;margin-top: 10px">
            @else
                <img src="" id="logoDisplay" alt="" style="max-width: 100px;margin-top: 10px">
            @endif --}}

                    @if (isset($projectEdit->thumbnail_image))
                        <img src="{{ url('projectThumnail/' . $projectEdit->thumbnail_image) }}" alt=""
                            id="logoDisplay" style="max-width: 100px;margin-top: 10px">
                    @else
                        <img src="" id="thumbnail_imageDisplay" alt=""
                            style="max-width: 100px;margin-top: 10px">
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="label">Description</label>

                <textarea placeholder="Description" class="form-control" name="description" id="" cols="30"rows="10">{{ isset($projectEdit->description) ? $projectEdit->description : '' }} </textarea>
                {{-- <input type="text" name="description" placeholder="Description" class="form-control" value="{{ isset($projectEdit->description) ? $projectEdit->description : '' }}"> --}}
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
