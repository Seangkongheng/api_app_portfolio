<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($names as $index => $name)
                <tr>

                    <td>{{ $index + 1 }}</td>
                    <td class="align-middle">
                        <div
                            style="width: 60px; height: 60px; overflow: hidden; border-radius: 50%; border: 2px solid #ddd; display: flex; align-items: center; justify-content: center; background: #f8f9fa;">
                            <img src="{{ asset('brandLogo/'.$name->profile) }}" alt="Profile Image"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </td>
                    <td>
                        {{asset( $name->name)? $name->name: '' }}
                    </td>
                    <td>
                        {{ \Illuminate\Support\Str::limit($name->position ?? '', 50) }}
                    </td>
                    <td>
                        <a class="text-info mx-2" href="{{ route('name.show',$name['id']) }}">
                            <i class="fa-solid fa-circle-info"></i>
                        </a>
                        <a class="text-success mx-3" href="{{ route('name.edit', $name->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <button style="border: none;background:none" class="text-danger btnDeleteUser"
                            value="{{ $name->id }}" data-toggle="modal" data-target="#exampleModal">
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
