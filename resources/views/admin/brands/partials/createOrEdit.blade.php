<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($brandEdit->id)? route('brand.update',$brandEdit->id) : route('brand.store' ) }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($brandEdit->id))
                @method('PUT')
            @endif
            
            <label for="">Logo</label>
            <input type="file" class="form-control" id="logo" accept="image/*" name="logo">
            @if(isset($brandEdit->logo))
                <img src="{{ url('brandLogo/'.$brandEdit->logo) }}" alt="" id="logoDisplay"   style="max-width: 100px;margin-top: 10px">
            @else
                <img src="" id="logoDisplay" alt="" style="max-width: 100px;margin-top: 10px">
            @endif
            <button class="btn btn-primary mt-2">{{ isset($userEdit->id)?'Update ':'Submit' }}</button>
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