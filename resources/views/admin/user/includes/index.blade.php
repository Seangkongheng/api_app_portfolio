<div class="content-wrapper">
    <div class="container">
        @if (session('success'))
           <p class="alert alert-success"> {{ session('success') }}</p>
        @endif
        @if (session('error'))
        <p class="alert alert-danger"> {{ session('error') }}</p>
     @endif

        <div class="row ">
            <div class="col-12">
                <div class="mt-3" style="display: flex;justify-content: space-between;align-items: center" >
                    <div class="title">List user</div>
                    <div class="button-add ms-auto">
                        <a class="btn btn-info" href="{{ route('user.create') }}">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>   
                </div>
            </div>
        </div>
        

       @include('admin.user.partials.index')
    </div>
</div>
