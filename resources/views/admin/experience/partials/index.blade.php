<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Position</th>
                    <th>Company</th>
                    <th>Start year</th>
                    <th>End year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($experiences as $index => $experience)
                    <tr>

                        <td>{{ $index + 1 }}</td>
                        <td>
                            <span class="badge badge-primary"> {{ asset($experience->position) ? $experience->position : '' }}</span>
                        </td>
                        <td>
                            <b> {{ asset($experience->company_name) ? $experience->company_name : '' }}</b>
                        </td>
                        <td>
                            <span
                                class="badge badge-info">{{ asset($experience->start_year) ? $experience->start_year : '' }}</span>
                        </td>
                        <td>
                            <span
                                class="badge badge-info">{{ asset($experience->end_year) ? $experience->end_year : '' }}</span>
                        </td>

                        <td>
                            <a class="text-success mx-3" href="{{ route('experience.edit', $experience->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button style="border: none;background:none" class="text-danger btnDeleteUser"
                                value="{{ $experience->id }}" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.experience.partials.modalDeleteExperience')

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
