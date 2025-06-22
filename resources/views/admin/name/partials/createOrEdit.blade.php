<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($nameEdit->id) ? route('name.update', $nameEdit->id) : route('name.store') }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($nameEdit->id))
                @method('PUT')
            @endif

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name"
                        value="{{ old('name', $nameEdit->name ?? '') }}" class="form-control"
                        placeholder="Enter Name" required>
                </div>
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" name="gender" id="gender"
                        value="{{ old('gender', $nameEdit->gender ?? '') }}" class="form-control"
                        placeholder="Enter Gender" required>
                </div>
                <div class="col-md-6">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" name="position" id="position"
                        value="{{ old('position', $nameEdit->position ?? '') }}"
                        class="form-control" placeholder="Enter Position" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                        value="{{ old('email', $nameEdit->email ?? '') }}" class="form-control"
                        placeholder="Enter Email" required>
                </div>
                <div class="col-md-6">
                    <label for="dob" class="form-label">Date Of Birth</label>
                    <input type="date" name="dob" id="dob"
                        value="{{ old('dob', $nameEdit->dob ?? '') }}" class="form-control"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="number" name="phone" id="phone"
                        value="{{ old('phone', $nameEdit->phone ?? '') }}" class="form-control"
                        placeholder="Enter Phone Number" required>
                </div>
                <div class="col-md-6">
                    <label for="currentAddress" class="form-label">Current Address</label>
                    <input type="text" name="current_address" id="current_address"
                        value="{{ old('current_address', $nameEdit->current_address ?? '') }}"
                        class="form-control" placeholder="Enter Current Address" required>
                </div>
                <div class="col-md-6">
                    <label for="pob" class="form-label">Place Of Birth</label>
                    <input type="text" name="pob" id="pob"
                        value="{{ old('pob', $nameEdit->pob ?? '') }}" class="form-control"
                        placeholder="Enter Place of Birth" required>
                </div>
                <div class="col-md-12">
                    <label for="profile" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="profile" accept="image/*" name="profile">
                    <div class="mt-2">
                        <img src="{{ isset($nameEdit->profile) ? url('brandLogo/'.$nameEdit->profile) : '' }}"
                            alt="" id="logoDisplay" style="max-width: 120px; max-height: 120px;">
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" rows="4" class="form-control" id="description" placeholder="Enter Description"
                        required>{{ old('description', $nameEdit->description ?? '') }}</textarea>
                </div>
                <div class="col-12 text-end">
                    <button class="btn btn-primary mt-3">
                        {{ isset($nameEdit->id) ? 'Update' : 'Submit' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('profile').onchange = function(evt) {
        const [file] = this.files;
        if (file) {
            document.getElementById('logoDisplay').src = URL.createObjectURL(file)
        }
    }
</script>
