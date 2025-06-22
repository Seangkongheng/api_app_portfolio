<div class="content-wrapper">
    <div class="container  p-4 p-md-5">
         <div class="col-12">
            <div
                class="bg-light rounded p-3 shadow-sm d-flex flex-wrap align-items-center justify-content-between gap-3">

                <h4 class="mb-0 d-flex align-items-center text-dark">
                    <i class="bi bi-list-ul me-2 text-info"></i> &nbsp; My Tools
                </h4>
                <form class="d-flex flex-grow-1 mx-3" action="{{ route('experience.index') }}" method="GET"
                    style="max-width: 400px;">
                    <input type="text" name="search" class="form-control rounded-start" placeholder="Search Tool..."
                        value="{{ request('search') }}">
                    <button class="btn btn-info text-white rounded-end" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>


                <a href="{{ route('tool.create') }}" class="btn btn-info d-flex align-items-center">
                    <i class="bi bi-plus-lg me-2 text-white"></i>
                </a>
            </div>
        </div>


       @include('admin.tool.partials.index')
    </div>
</div>
