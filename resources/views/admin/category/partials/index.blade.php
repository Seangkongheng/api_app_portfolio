<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Skill</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                <tr>
                    <td class="align-middle">{{ $index + 1 }}</td>
                    <td class="align-middle">
                        <img src="{{ asset('categoryImage/'.$category->image) }}" alt="Category Image" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                    </td>
                    <td class="align-middle fw-semibold">
                        {{ $category->name ?? '' }}
                    </td>
                    <td class="align-middle">
                        @if($category->skill)
                            <span class="badge bg-primary">{{ $category->skill->title }}</span>
                        @else
                            <span class="badge bg-secondary">No Skill</span>
                        @endif
                    </td>
                    <td class="align-middle">
                        <a class="btn btn-sm  mx-1" href="{{ route('category.edit', $category->id) }}" title="Edit">
                            <i class="fa-solid fa-pen-to-square text-success"></i>
                        </a>
                        <button type="button" class="btn btn-sm  btnDeleteUser mx-1"
                            value="{{ $category->id }}" data-toggle="modal" data-target="#exampleModal" title="Delete">
                            <i class="fa-solid fa-trash text-danger"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.category.partials.modelDeleteLogo')

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
