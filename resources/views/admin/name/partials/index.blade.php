<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>About</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($names as $index => $name)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                           {{asset( $name->name)? $name->name: '' }}
                        </td>
                        <td>
                            {{$name->description?? '' }}
                         </td>
                        <td>
                            <a class="text-success mx-3" href="{{ route('name.edit', $name->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button  style="border: none;background:none" class="text-danger btnDeleteUser" value="{{ $name->id }}" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.name.partials.modelDeleteLogo')

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
