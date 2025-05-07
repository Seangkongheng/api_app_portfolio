<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($skillEdit->id) ? route('skill.update', $skillEdit->id) : route('skill.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($skillEdit->id))
                @method('PUT')
            @endif
            
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="title" id="name" value="{{ old('title', isset($skillEdit->id) ? $skillEdit->title : '') }}" class="form-control" placeholder="Enter Title" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter Description">{{ old('description', isset($skillEdit->id) ? $skillEdit->description : '') }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary mt-2">{{ isset($skillEdit->id) ? 'Update' : 'Submit' }}</button>
        </form>
        
        
    </div>
</div>


<script>
    document.getElementById('logo').onchange=function(evt){
        const [file]=this.files;
        if(file){
            document.getElementById('logoDisplay').src=URL.createObjectURL(file)
        }
    }
</script>