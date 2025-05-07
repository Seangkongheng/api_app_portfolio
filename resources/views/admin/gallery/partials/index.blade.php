<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name Allbum</th>
                    <th>Image Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $index => $gallery)
                    <tr>
                        
                            <td>{{ $index + 1 }}</td>
                          
                        <td>{{ $gallery->name }}</td>
                        <td>
                            <img src="{{ asset('GalleryImage/'.$gallery->image) }}" alt="" width="100px">
                        </td>
                        <td>
                            <a class="text-success mx-3" href="{{ route('gallery.edit', $gallery->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button  style="border: none;background:none" class="text-danger btnDeleteUser" value="{{ $gallery->id }}" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.brands.partials.modelDeleteLogo')

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
