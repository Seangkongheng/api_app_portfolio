<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($objGalleriesEdit->id) ? route('gallery.update', $objGalleriesEdit->id) : route('gallery.store') }}" method="post" enctype="multipart/form-data">
            @if(isset($objGalleriesEdit->id))
                @method('PUT')
            @endif
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('name', isset($objGalleriesEdit->id) ? $objGalleriesEdit->name : '') }}" name="name" placeholder="Name Album" required />
                </div>
            </div>
        
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Upload Images</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="logo" accept="image/*" name="image[]" multiple>
                    <div class="row image-display" id="imageDisplayContainer"></div>
                </div>
            </div>
        
            <div class="row justify-content-end">
                <div class="col-sm-10 text-end">
                    <button type="submit" class="btn btn-primary">{{ isset($objGalleriesEdit->id) ? "Update" : "Submit" }}</button>
                </div>
            </div>
        </form>
        
    </div>
</div>


<script>
    // Display image from input field
    let selectedFiles = [];
    document.getElementById('logo').onchange = function(evt) {
        const imageDisplayContainer = document.getElementById('imageDisplayContainer');

        for (const file of this.files) {
            if (file) {
                selectedFiles.push(file);
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.width = '100%';
                img.classList.add('mt-2');

                const colDiv = document.createElement('div');
                colDiv.classList.add('col-lg-3');
                colDiv.appendChild(img);

                const removeBtn = document.createElement('a');
                removeBtn.href = '#';
                removeBtn.classList.add('btn', 'btn-danger', 'mt-2', 'remove-image');
                removeBtn.textContent = 'Remove';
                colDiv.appendChild(removeBtn);

                // Store file name in the colDiv for later identification
                colDiv.dataset.fileName = file.name;

                imageDisplayContainer.appendChild(colDiv);
            }
        }

    
    };

    document.getElementById('imageDisplayContainer').addEventListener('click', function(evt) {
   
        if (evt.target.classList.contains('remove-image')) {
            evt.preventDefault();
            const colDiv = evt.target.closest('.col-lg-3');
            const fileName = colDiv.dataset.fileName;
            selectedFiles = selectedFiles.filter(file => file.name !== fileName);
            colDiv.remove();
        }
        this.value = ''; 
    });

    document.querySelector('form').onsubmit = function() {
        const dataTransfer = new DataTransfer();

        selectedFiles.forEach(file => {
            dataTransfer.items.add(file);
        });
        document.getElementById('logo').files = dataTransfer.files;
    };
</script>



{{--  remove image from server  --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.remove-image').on('click', function(e) {
            e.preventDefault();
            const imageName = $(this).data('image-name');
            const container = $(this).closest('div[data-file-name]');
            const imagePostId = $(this).closest('div[data-file-name]').data('image-post-id');
          
            $.ajax({
                url: "{{ route('photo.delete') }}",
                method: "POST",
                data: {
                    imageName: imageName,
                    imagePostId: imagePostId, // Add imagePostId here
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    container.fadeOut(500, function() {
                        $(this).remove();
                    });

                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });
    });
</script>