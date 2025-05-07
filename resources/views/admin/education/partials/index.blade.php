<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>School</th>
                    <th>Education</th>
                    <th>Start year</th>
                    <th>End year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($educations as $index => $education)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            {{asset( $education->school)? $education->school: '' }}
                         </td>
                        <td>
                           {{asset( $education->description)? $education->description: '' }}
                        </td>
                        <td>
                            <span class="badge badge-info">{{asset( $education->start_year)? $education->start_year: '' }}</span>
                            
                        </td>
                        <td>
                            <span class="badge badge-info">{{asset( $education->end_year)? $education->end_year: '' }}</span>
                            
                        </td>
                        <td>
                            <a class="text-success mx-3" href="{{ route('education.edit', $education->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button  style="border: none;background:none" class="text-danger btnDeleteUser" value="{{ $education->id }}" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.education.partials.modalDeleteExperience')

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
