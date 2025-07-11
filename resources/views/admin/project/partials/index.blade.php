<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $index => $project)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if(isset($project->detail) && isset($project->detail->thumbnail_image) && $project->detail->thumbnail_image)
                            <img src="{{ asset('projectThumnail/'.$project->detail->thumbnail_image) }}" alt="" width="100px">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ isset($project->name)? $project->name:'' }}</td>
                    <td>{{ isset($project->detail->category->name)? $project->detail->category->name :'' }}</td>

                    <td>
                        @if(isset($project->detail) && isset($project->detail['is_public']))
                            <span class="badge badge-{{ $project->detail['is_public'] === 1 ? 'primary' : 'danger' }}">
                                {{ $project->detail['is_public'] === 1 ? "Public" : "Unpublic" }}
                            </span>
                        @else
                            <span class="badge badge-secondary">Unknown</span>
                        @endif
                    </td>

                    <td>
                        <a class="text-info mx-2" href="{{ route('project.show', $project['id']) }}">
                            <i class="fa-solid fa-circle-info"></i>
                        </a>
                        <a class="text-success mx-2" href="{{ route('project.edit', $project['id']) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <button style="border: none;background:none" class="text-danger btnDeleteUser"
                            value="{{ $project['id'] }}" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.project.partials.modelDeleteLogo')

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
