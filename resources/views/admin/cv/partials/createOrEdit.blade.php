<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($cvEdit->id) ? route('cv.update', $cvEdit->id) : route('cv.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($cvEdit->id))
                @method('PUT')
            @endif
            <!-- Description Input -->
            <label for="description">Year</label>
            <input type="number" name="year" id="description" value="{{ old('year', isset($cvEdit->id) ? $cvEdit->year : '') }}" class="form-control" placeholder="Enter year" required>
            <label for="">File CV</label>
            <input type="file" class="form-control" id="image" accept="application/pdf" name="file">

            @if(isset($cvEdit->file))
                This old file
                <p class="mt-5">{{ $cvEdit->file }}</p>
            @else
                <img src="" id="logoDisplay" alt="" style="max-width: 100px;margin-top: 10px">
            @endif
            <br>
            <!-- Submit Button -->
            <button class="btn btn-primary mt-2">{{ isset($cvEdit->id) ? 'Update' : 'Submit' }}</button>
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