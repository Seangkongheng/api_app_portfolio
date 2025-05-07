<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($ExperienceEdit->id)? route('experience.update',$ExperienceEdit->id) : route('experience.store' ) }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($ExperienceEdit->id))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-6">
                    <label for="">Position</label>
                    <input type="text" name="position" value="{{ old('position',isset($ExperienceEdit->id)?$ExperienceEdit->position : '') }}" class="form-control" placeholder="Enter position" required>
                </div>
                <div class="col-6">
                    <label for="">Company Name</label>
                    <input type="text" name="company_name" value="{{ old('company_name',isset($ExperienceEdit->id)?$ExperienceEdit->company_name : '') }}" class="form-control" placeholder="Enter Company Name" required>
                </div>
                <div class="col-6">
                    <label for="">Start Year</label>
                    <input type="number" name="start_year" value="{{ old('start_year',isset($ExperienceEdit->id)?$ExperienceEdit->start_year : '') }}" class="form-control" placeholder="Enter start year" required>
                </div>
                <div class="col-6">
                    <label for="">End Year</label>
                    <input type="text" name="end_year" value="{{ old('end_year',isset($ExperienceEdit->id)?$ExperienceEdit->end_year : '') }}" class="form-control" placeholder="Enter end year" required>
                </div>
            </div>
            
            <label for="">Description</label>
            <textarea class="form-control" id="" cols="30" name="about" required rows="10">{{ old('about',isset($ExperienceEdit->id)?$ExperienceEdit->about : '') }}</textarea>
           
            <button class="btn btn-primary mt-2">{{ isset($ExperienceEdit->id)?'Update ':'Submit' }}</button>
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