<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Curriculum Vitae</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cvs as $index => $cv)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        
                        <td>
                           <img src="{{ asset('image/pdf.png') }}" alt="" width="50px">
                        </td>
                        <td>
                            
                            <span class="badge badge-primary">{{ $cv->year?? "" }}</span>
                        </td>
                        <td>
                            <a class="text-success mx-3" href="{{ route('cv.edit', $cv->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button  style="border: none;background:none" class="text-danger btnDeleteUser" value="{{ $cv->id }}" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.cv.partials.modelDeleteLogo')

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
