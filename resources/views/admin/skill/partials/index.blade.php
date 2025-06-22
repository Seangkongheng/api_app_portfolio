<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>My skill</th>
                    <th>Decription</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skills as $index => $skill)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                           {{asset( $skill->title)? $skill->title: '' }}
                        </td>
                        <td>
                            {{asset( $skill->description)? $skill->description: '' }}
                        </td>

                        <td>
                            <a class="text-success mx-3" href="{{ route('skill.edit', $skill->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button  style="border: none;background:none" class="text-danger btnDeleteUser" value="{{ $skill->id }}" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.skill.partials.modalDeleteExperience')

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
