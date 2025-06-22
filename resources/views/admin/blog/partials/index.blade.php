<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ( $Blogs as $index=>$blog)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>
                            @php
                            $firstImage =json_decode($blog->images)[0] ?? null;
                            @endphp
                            @if ($firstImage)
                            <div class="image-blog" style="width: 80px;">
                                <img src="{{ asset('blogImages/' . $firstImage) }}" alt="" class="img-fluid rounded"
                                    style="max-width: 100%; height: auto;">
                            </div>
                            @else
                            <div class="image-blog" style="width: 80px;">
                                <img src="{{ asset('blogImages/defaultImage.jpg') }}" alt="No Image"
                                    class="img-fluid rounded" style="max-width: 100%; height: auto;">
                            </div>
                            @endif

                        </td>
                        <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{
                            $blog['title'] }}</td>
                        <td style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{
                            $blog['description'] }}</td>
                        <td>
                            <span class="badge badge-{{ $blog['is_public'] === 1 ? 'primary' : 'danger' }}"> {{
                                $blog['is_public'] === 1 ? "Public":"Unpublic" }}</span>
                        </td>
                        <td>
                            <a class="text-info mx-2" href="{{ route('blog.show', $blog['id']) }}">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            <a class="text-success mx-2" href="{{ route('blog.edit', $blog['id']) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button style="border: none;background:none" class="text-danger btnDeleteUser"
                                value="{{ $blog['id'] }}" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>

                    </tr>
                @empty

                   <tr>
                    <td class="text-center">No recode</td>
                   </tr>

                @endforelse

            </tbody>
        </table>
    </div>
</div>

@include('admin.blog.partials.modelDeleteLogo')

<script>
    $(document).ready(function() {
        $('.btnDeleteUser').click(function(e) {
            e.preventDefault();
            var blog_id = $(this).val();
            $('#blog_id').val(blog_id);
            $('#deletModel').modal('show');
        });
    });
</script>
