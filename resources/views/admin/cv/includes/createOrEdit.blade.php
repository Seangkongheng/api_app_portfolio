<div class="content-wrapper">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="mt-3" style="display: flex;justify-content: space-between;align-items: center" >
                    <div class="title">
                        @if(isset($cvEdit->id))
                            Update Curriculum Vitae
                        @else
                            Add Curriculum Vitae
                        @endif
                    </div>
                    
                    <div class="button-add ms-auto">
                        <a class="btn btn-info" href="{{ route('cv.index') }}">
                            <i class="fa-solid fa-rotate-left"></i>
                        </a>
                    </div>   
                </div>
            </div>
        </div>
        @if (session('error'))
        <p class="alert alert-danger"> {{ session('error') }}</p>
     @endif
       @include('admin.cv.partials.createOrEdit')
    </div>
</div>
