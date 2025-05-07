<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>About</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abouts as $index => $about)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                           {{asset( $about->description)? $about->description: '' }}
                        </td>
                        <td>
                           <img src="{{ asset('aboutImage/'.$about->image) }}" width="100px" alt="">
                         </td>
                        <td>
                            <a class="text-success mx-3" href="{{ route('about.edit', $about->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button  style="border: none;background:none" class="text-danger btnDeleteUser" value="{{ $about->id }}" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.about.partials.modelDeleteLogo')

<script>
    $(document).ready(function() {
        $('.btnDeleteUser').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('#user_id').val(user_id);
            $('#deletModel').modal('show');
        });
    });
</script>
