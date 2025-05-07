<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($contactEdit->id) ? route('contact.update', $contactEdit->id) : route('contact.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($contactEdit->id))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="label">Label</label>
                <input type="text" name="label" placeholder="Facebook" class="form-control" value="{{ isset($contactEdit->label) ? $contactEdit->label : '' }}">
            </div>
            <div class="form-group">
                <label for="logo">Icon</label>
                <input type="file" class="form-control" id="logo" accept="image/*" name="icon">
                @if(isset($contactEdit->icon))
                    <img src="{{ url('conactImage/' . $contactEdit->icon) }}" alt="Current Icon" id="logoDisplay" style="max-width: 100px; margin-top: 10px;">
                @else
                    <img src="" id="logoDisplay" style="max-width: 100px; margin-top: 10px;">
                @endif
            </div>
            <div class="form-group">
                <label for="value">Value</label>
                <input type="text" name="value" placeholder="Example.com" class="form-control" value="{{ isset($contactEdit->value) ? $contactEdit->value : '' }}">
            </div>
            <button class="btn btn-primary mt-2">{{ isset($contactEdit->id) ? 'Update' : 'Submit' }}</button>
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