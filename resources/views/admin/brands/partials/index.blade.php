<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Brand</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $index => $brand)
                    <tr>
                        <td>
                            <td>{{ $index + 1 }}</td>
                          
                        </td>
                        <td>
                            <img src="{{ asset('brandLogo/'.$brand->logo) }}" alt="" width="100px">
                        </td>
                        <td>
                            <a class="text-success mx-3" href="{{ route('brand.edit', $brand->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button  style="border: none;background:none" class="text-danger btnDeleteUser" value="{{ $brand->id }}" data-toggle="modal" data-target="#exampleModal">
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
