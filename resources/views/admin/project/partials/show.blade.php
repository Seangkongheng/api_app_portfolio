<link href="https://cdn.jsdelivr.net/npm/lightbox2@2/dist/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2/dist/js/lightbox.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">📝 Project Detail</h4>
        </div>

        <div class="card-body p-4">
            <h3 class="mb-3">{{ $project->name ?? "" }}</h3>

            <div class="mb-4">
                <div class="row text-sm">
                    <!-- Author -->
                    <div class="col-md-3 col-sm-6 mb-2">
                        <span class="d-inline-block w-100">
                            <i class="bi bi-person-circle me-1 text-primary"></i>
                            <strong>Author:</strong>
                            <span class="badge bg-info">{{ $project->detail->author ?? "Unknow" }}</span>
                        </span>
                    </div>

                    <!-- Views -->
                    <div class="col-md-3 col-sm-6 mb-2">
                        <span class="d-inline-block w-100">
                            <i class="bi bi-eye-fill me-1 text-secondary"></i>
                            <strong>Views:</strong> {{ $project->detail->view ?? "0" }}
                        </span>
                    </div>


                    <!-- Status -->
                    <div class="col-md-3 col-sm-6 mb-2">
                        <span class="d-inline-block w-100">
                            <i class="bi bi-globe2 me-1 text-success"></i>
                            <strong>Status:</strong>
                            <span class="badge {{ $project->detail->is_public === 1 ? 'bg-success' : 'bg-secondary' }}">
                                {{ $project->detail->is_public === 1 ? 'Public' : 'Unpublic' }}
                            </span>
                        </span>
                    </div>

                    <!-- Published Date -->
                    <div class="col-md-3 col-sm-6 mb-2">
                        <span class="d-inline-block w-100">
                            <i class="bi bi-calendar-event me-1 text-warning"></i>
                            <strong>Published:</strong>
                            <span class="badge bg-warning text-dark">
                                {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y') }}
                            </span>
                        </span>
                    </div>

                    {{--  category  --}}
                    <div class="col-md-3 col-sm-6 mb-2">
                        <span class="d-inline-block w-100">
                            <i class="bi bi-tags-fill me-1 text-danger"></i>
                            <strong>Category:</strong>
                            <span class="badge bg-warning text-dark">
                               {{ $project->detail->category->name }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <hr>
            <p>Thumbnail</p>

            <div class="row">
                <div class="col-12">
                    <img class="card-img-top rounded img-fluid" alt="Blog Image"
                        style="object-fit: cover; height: auto"
                        src="{{ asset('projectThumnail/'.$project->detail->thumbnail_image) }}" alt="">
                </div>
            </div>
            <div class="mt-3 text-justify" style="font-size: 1.1rem; line-height: 1.6; text-align: justify;">
                {{ $project->detail->description ?? "" }}
            </div>
            @php $images = json_decode($project->detail->image) ?? []; @endphp

            @if(!empty($images))
            <div class="row mt-4">
                @foreach ($images as $image)
                <div class="col-md-4 mb-3">
                    <a href="{{ asset('projectImage/' . $image) }}" data-lightbox="blog-gallery">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="{{ asset('projectImage/' . $image) }}" class="card-img-top rounded img-fluid"
                                alt="Blog Image" style="object-fit: cover; height: 200px;">
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <div class="card-footer bg-light text-end">
            <a href="{{ route('project.edit', $project->id) }}" class="btn btn-outline-primary">✏️ Edit Post</a>
        </div>
    </div>
</div>

<style>
    .card-img-top:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }
</style>
