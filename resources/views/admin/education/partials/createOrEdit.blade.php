<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($educationsEdit->id)? route('education.update',$educationsEdit->id) : route('education.store' ) }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($educationsEdit->id))
                @method('PUT')
            @endif
            
            <label for="">Shcool</label>
            <input type="text" name="school" value="{{ old('title',isset($educationsEdit->id)?$educationsEdit->school : '') }}" class="form-control" placeholder="Enter school name" required>
            <div class="row">
                <div class="col-6">
                    <label for="">Start Year</label>
                    <input type="number" name="start_year" value="{{ old('start_year',isset($educationsEdit->id)?$educationsEdit->start_year : '') }}" class="form-control" placeholder="Enter start year" required>
                </div>
                <div class="col-6">
                    <label for="">End Year</label>
                    <input type="number" name="end_year" value="{{ old('end_year',isset($educationsEdit->id)?$educationsEdit->end_year : '') }}" class="form-control" placeholder="Enter end year" required>
                </div>
            </div>
            <label for="">Description</label>
            <textarea name="description" class="form-control" id="" cols="30" required rows="10">{{ old('description',isset($educationsEdit->id)?$educationsEdit->description : '') }}</textarea>
         
            <button class="btn btn-primary mt-2">{{ isset($educationsEdit->id)?'Update ':'Submit' }}</button>
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