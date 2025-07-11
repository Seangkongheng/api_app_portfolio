<div class="content-wrapper">
    <div class="container p-4 p-md-5">
        <div class="row ">
            <div class="col-12">
                <div class="mt-3" style="display: flex;justify-content: space-between;align-items: center" >
                    <div class="title">Add user</div>
                    <div class="button-add ms-auto">
                        <a class="btn btn-info" href="{{ route('brand.index') }}">
                            <i class="fa-solid fa-rotate-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @if (session('error'))
        <p class="alert alert-danger"> {{ session('error') }}</p>
     @endif
       @include('admin.gallery.partials.createOrEdit')
    </div>
</div>
