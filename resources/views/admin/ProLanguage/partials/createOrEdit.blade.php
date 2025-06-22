<div class="card mt-3">
    <div class="card-body">
        <form
            action="{{ isset($languageEdit->id) ? route('language.update', $languageEdit->id) : route('language.store') }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($languageEdit->id))
            @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', isset($languageEdit->id) ? $languageEdit->name : '') }}" class="form-control"
                    placeholder="Enter name" required>
            </div>

            <div class="form-group">
                <label for="percen">Percentage</label>
                <div class="input-group">
                    <input type="number" name="percen" id="percen" min="0" max="100" step="0.01" placeholder="0.00"
                        value="{{ old('percen', isset($languageEdit->id) ? $languageEdit->percen : '') }}"
                        class="form-control" required>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Profile</label>
                <input type="file" class="form-control" id="profile" accept="image/*" name="image">

                @if(isset($languageEdit->image))
                <img src="{{ url('brandLogo/'.$languageEdit->image) }}" alt="" id="logoDisplay"
                    style="max-width: 100px;margin-top: 10px">
                @else
                <img src="" id="logoDisplay" alt="" style="max-width: 100px;margin-top: 10px">
                @endif

            </div>

            <button type="submit" class="btn btn-primary mt-2">{{ isset($languageEdit->id) ? 'Update' : 'Submit'
                }}</button>
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
