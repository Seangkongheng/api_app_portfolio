<style>
    .bg-glass {
        background: var(--bg-gradient) !important;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .bg-glass:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
    }

    .icon-circle {
        width: 48px;
        height: 48px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease;
    }

    .bg-glass:hover .icon-circle {
        background: rgba(255, 255, 255, 0.3);
    }

    .hover-white:hover {
        opacity: 1;
        text-decoration: none;
        transform: translateX(5px);
        transition: transform 0.2s ease, opacity 0.2s ease;
    }

    h6 {
        font-size: 0.9rem;
        letter-spacing: 0.5px;
    }

    h3 {
        font-size: 2rem;
        line-height: 1.2;
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
    }

    .bg-gradient-success {
        background: linear-gradient(135deg, #22c55e 0%, #4ade80 100%);
    }

    .bg-gradient-info {
        background: linear-gradient(135deg, #06b6d4 0%, #22d3ee 100%);
    }

    .bg-gradient-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
    }

    .card {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .badge {
        padding: 0.5em 1em;
        font-size: 0.85em;
    }

    @media (max-width: 992px) {
        .content {
            margin-left: 0;
        }
    }
</style>
<div class="container p-4 p-md-5" style="background-color: #f4f6f9;">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark mb-2">Welcome back, {{ Auth::user()->name }}! 🌟</h2>
            <p class="text-muted lead">Your portfolio dashboard, ready to shine.</p>
        </div>
        <div>
            <a href="{{ route("project.create") }}" class="btn btn-primary rounded-pill px-4">+ New Project</a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 rounded-4 p-4 h-100 bg-glass text-white"
                style="--bg-color: #3b82f6; --bg-gradient: linear-gradient(135deg, #3b82f6, #60a5fa);">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-circle me-3">
                        <i class="bi bi-folder fs-3"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 fw-medium opacity-75">Total Projects</h6>
                        <h3 class="fw-bold mb-0">{{ $projectCount ?? "0" }}</h3>
                    </div>
                </div>
                <a href="{{ route('project.index') }}"
                    class="text-white small fw-medium d-flex align-items-center opacity-75 hover-white"><i
                        class="bi bi-arrow-right me-1"></i>View All</a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 rounded-4 p-4 h-100 bg-glass text-white"
                style="--bg-color: #22c55e; --bg-gradient: linear-gradient(135deg, #22c55e, #4ade80);">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-circle me-3">
                        <i class="bi bi-code-slash fs-3"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 fw-medium opacity-75">Total Skills</h6>
                        <h3 class="fw-bold mb-0">{{ $skillCount ?? "0" }}</h3>
                    </div>
                </div>
                <a href="{{ route('skill.index') }}"
                    class="text-white small fw-medium d-flex align-items-center opacity-75 hover-white"><i
                        class="bi bi-arrow-right me-1"></i>Manage Skills</a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 rounded-4 p-4 h-100 bg-glass text-white"
                style="--bg-color: #06b6d4; --bg-gradient: linear-gradient(135deg, #06b6d4, #22d3ee);">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-circle me-3">
                        <i class="bi bi-envelope fs-3"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 fw-medium opacity-75">New Messages</h6>
                        <h3 class="fw-bold mb-0">3</h3>
                    </div>
                </div>
                <a href="#" class="text-white small fw-medium d-flex align-items-center opacity-75 hover-white"><i
                        class="bi bi-arrow-right me-1"></i>Check Inbox</a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 rounded-4 p-4 h-100 bg-glass text-white"
                style="--bg-color: #f59e0b; --bg-gradient: linear-gradient(135deg, #f59e0b, #fbbf24);">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-circle me-3">
                        <i class="bi bi-star fs-3"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 fw-medium opacity-75">Published Blog</h6>
                        <h3 class="fw-bold mb-0">{{ $blogCount ?? "0" }}</h3>
                    </div>
                </div>
                <a href="{{ route('blog.index') }}"
                    class="text-white small fw-medium d-flex align-items-center opacity-75 hover-white"><i
                        class="bi bi-arrow-right me-1"></i>View Published</a>
            </div>
        </div>
    </div>

    <!-- Recent Projects -->
    <div class="card border-0 shadow-sm rounded-3 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-semibold text-dark"><i class="bi bi-folder me-2"></i>Recent Projects</h5>
            <div>
                <a href="{{ route('project.index') }}" class="btn btn-outline-secondary btn-sm me-2">View All</a>
                <a href="{{ route('project.create') }}" class="btn btn-primary btn-sm">+ Add New</a>
            </div>
        </div>
        <div class="row g-4">
            @forelse($recentProjects as $project)
            <div class="col-md-6 col-lg-4 mb-4">
                <div
                    class="card border-0 rounded-4 h-100 bg-light project-card overflow-hidden animate__animated animate__fadeIn">
                    <!-- Thumbnail -->
                    <div class="position-relative">
                        <img src="{{ $project->detail->thumbnail_image ? asset('projectThumnail/' . $project->detail->thumbnail_image) : 'https://via.placeholder.com/400x200?text=No+Image' }}"
                            alt="{{ $project->title }}" class="card-img-top project-thumb"
                            style="height: 200px; object-fit: cover;">

                        <span
                            class="position-absolute top-0 start-0 m-3 badge {{ $project->detail->is_public ? 'bg-primary' : 'bg-warning text-dark' }} rounded-pill px-3 py-2 fs-6">
                            {{ ucfirst($project->status) }}
                        </span>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-info bg-opacity-25 text-secondary mb-3 text-uppercase fs-6">
                            {{ $project->detail->category->name ?? 'Uncategorized' }}
                        </span>


                        <h5 class="card-title fw-bold text-dark mb-2">
                            {{ Str::limit($project->name, 40) }}
                        </h5>


                        <p class="card-text text-muted fs-6 mb-3 flex-grow-1 text-truncate-lines-3">
                            {{ Str::limit($project->detail->description, 90) }}
                        </p>

                    </div>

                    <!-- Card Footer -->
                    <div
                        class="card-footer bg-white border-0 p-4 pt-0 d-flex justify-content-between align-items-center project-card-footer gap-2">
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('project.edit', $project->id) }}"
                                class="btn btn-light btn-sm rounded-circle shadow-sm" title="Edit">
                                <i class="bi bi-pencil text-primary"></i>
                            </a>

                            <form action="{{ route('project.destroy', $project->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light btn-sm rounded-circle shadow-sm"
                                    title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this project?')">
                                    <i class="bi bi-trash text-danger"></i>
                                </button>
                            </form>

                            <a href="{{ route('project.show', $project->id) }}"
                                class="btn btn-light btn-sm rounded-circle shadow-sm" title="Show">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>

                        </div>

                        <div>
                            <small class="text-muted d-flex align-items-center">
                                <i class="bi bi-calendar3 me-2"></i> &nbsp;
                                {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y') }}
                            </small>
                        </div>


                    </div>

                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-folder2-open fs-1 text-muted mb-3 d-block"></i>
                <p class="text-muted fs-5">No recent projects found.</p>
            </div>
            @endforelse

            <!-- Bootstrap 5 CSS (assumed to be included in your project) -->
            <!-- Include Animate.css for subtle animations -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

            <style>
                .project-card-footer {
                    border-top: 1px solid #f1f5f9;
                    background: #fff;
                    transition: background 0.3s;
                }

                .project-card:hover .project-card-footer {
                    background: #f3f6fa;
                }

                .btn-light.rounded-circle {
                    border: none;
                    background: #f1f5f9;
                    transition: background 0.2s;
                }

                .btn-light.rounded-circle:hover {
                    background: #e0e7ef;
                }

                .project-card {
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .project-card:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
                }

                .project-thumb {
                    transition: transform 0.4s ease;
                }

                .project-card:hover .project-thumb {
                    transform: scale(1.03);
                }

                .btn-sm.rounded-circle {
                    width: 38px;
                    height: 38px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 0;
                }

                .text-truncate-lines-3 {
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }
            </style>
        </div>
    </div>
</div>
