 <div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Label</th>
                    <th>Values</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $index => $contact)
                    <tr> 
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ asset('conactImage/'.$contact->icon) }}" alt="" width="45px">
                        </td>
                        <td>{{ isset($contact->label)?$contact->label:'' }}</td>
                        <td>{{ isset($contact->value)?$contact->value:'' }}</td>
                        <td>
                            <a class="text-success mx-3" href="{{ route('contact.edit', $contact->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button  style="border: none;background:none" class="text-danger btnDeleteUser" value="{{ $contact->id }}" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.contact.partials.modelDeleteLogo')

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
