

<div class="content-wrapper">
    <div class="container  p-4 p-md-5">
         <div class="row mb-4">
            <div class="col-12">
                <div  class="bg-light rounded p-3 shadow-sm d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h4 class="mb-0 d-flex align-items-center text-dark">
                        <i class="bi bi-journal-text me-2 text-info"></i> &nbsp; My Project
                    </h4>
                    <a href="{{ route('project.index') }}" class="btn btn-info d-flex align-items-center">
                        <i class="fa-solid fa-rotate-left text-white"></i>
                    </a>
                </div>
            </div>
        </div>

       @include('admin.project.partials.show')
    </div>
</div>
