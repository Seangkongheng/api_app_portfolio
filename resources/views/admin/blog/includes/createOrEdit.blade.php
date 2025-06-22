<div class="content-wrapper">
    <div class="container p-4 p-md-5">
        <div class="row mb-4">
            <div class="col-12">
                <div  class="bg-light rounded p-3 shadow-sm d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h4 class="mb-0 d-flex align-items-center text-dark">
                        <i class="fa-solid fa-pen-nib me-2 text-info"></i> &nbsp; Blog
                    </h4>
                    <a href="{{ route('blog.index') }}" class="btn btn-info d-flex align-items-center">
                        <i class="fa-solid fa-rotate-left text-white"></i>
                    </a>
                </div>
            </div>
        </div>


        @if (session('error'))
        <p class="alert alert-danger"> {{ session('error') }}</p>
        @endif
        @include('admin.blog.partials.createOrEdit')
    </div>
</div>
