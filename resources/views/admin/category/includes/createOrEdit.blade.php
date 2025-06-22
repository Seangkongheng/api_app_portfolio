<div class="content-wrapper">
    <div class="container p-4 p-md-5">
          <div class="row mb-4">
            <div class="col-12">
                <div  class="bg-light rounded p-3 shadow-sm d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h4 class="mb-0 d-flex align-items-center text-dark">
                        <i class="fa-solid fa-code-branch me-2 text-info"></i> &nbsp;
                        {{ isset($brandEdit->id) ? "Update Category" : "Create Category" }}

                    </h4>
                    <a class="btn btn-info" href="{{ route('category.index') }}">
                            <i class="fa-solid fa-rotate-left text-white"></i>
                    </a>
                </div>
            </div>
        </div>
       @include('admin.category.partials.createOrEdit')
    </div>
</div>
