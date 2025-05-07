<div class="card mt-3">
    <div class="card-body">
        <form
            action="{{ isset($nameEdit->id) ? route('name.update', $nameEdit->id) : route('name.store') }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($nameEdit->id))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-6">
                    <label for="description">Name</label>
                    <input type="text" name="name" id="description"
                        value="{{ old('name', isset($nameEdit->id) ? $nameEdit->name : '') }}"
                        class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="col-6">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description"
                        value="{{ old('name', isset($nameEdit->id) ? $nameEdit->description : '') }}"
                        class="form-control" placeholder="Enter Description" required>
                </div>
            </div>
            <br>
            <!-- Submit Button -->
            <button class="btn btn-primary mt-2">{{ isset($nameEdit->id) ? 'Update' : 'Submit' }}</button>
        </form>

    </div>
</div>


<script>
    document.getElementById('image').onchange = function(evt) {
        const [file] = this.files;
        if (file) {
            document.getElementById('logoDisplay').src = URL.createObjectURL(file)
        }
    }
</script>
