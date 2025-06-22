<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>My skill</th>
                    <th>Percent</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($languages as $index => $language)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                         <td class="align-middle">
                            <div style="width: 60px; height: 60px; overflow: hidden; border-radius: 50%; border: 2px solid #ddd; display: flex; align-items: center; justify-content: center; background: #f8f9fa;">
                                <img src="{{ asset('brandLogo/'.$language->image) }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </td>
                        <td>
                           {{asset( $language->name)? $language->name: '' }}
                        </td>
                        <td>
                            {{asset( $language->percen)? $language->percen: '' }}<span>%</span>
                        </td>

                        <td>
                            <a class="text-success mx-3" href="{{ route('language.edit', $language->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button  style="border: none;background:none" class="text-danger btnDeleteUser" value="{{ $language->id }}" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.ProLanguage.partials.modalDeleteExperience')

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
