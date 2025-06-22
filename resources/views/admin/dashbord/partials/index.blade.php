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
                <a href="{{ route('project.index') }}" class="text-white small fw-medium d-flex align-items-center opacity-75 hover-white"><i class="bi bi-arrow-right me-1"></i>View All</a>
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
                        <h3 class="fw-bold mb-0">8</h3>
                    </div>
                </div>
                <a href="#" class="text-white small fw-medium d-flex align-items-center opacity-75 hover-white"><i
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
                <a href="{{ route('blog.index') }}" class="text-white small fw-medium d-flex align-items-center opacity-75 hover-white"><i class="bi bi-arrow-right me-1"></i>View Published</a>
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
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-body">
                        <h6 class="fw-semibold mb-2">{{ $project->title }}</h6>
                        <p class="text-muted small mb-3">{{ $project->description }}</p>
                        <div class="mb-3">
                            <span class="badge {{ $project->status == 'published' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($project->status) }}
                            </span>
                            {{--  <span class="text-muted small ms-2">{{ $project->category->name }}</span>  --}}
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar {{ $project->status == 'published' ? 'bg-success' : 'bg-warning' }}"
                                role="progressbar" style="width: {{ $project->progress }}%;"
                                aria-valuenow="{{ $project->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        {{--  <div class="text-muted small mt-2">{{ $project->created_at->format('d M Y') }}</div>  --}}
                    </div>
                    <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                        <a href="#" class="text-primary"><i class="bi bi-pencil"></i></a>
                        <a href="#" class="text-danger"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted py-4">No recent projects available.</div>
            @endforelse
        </div>
    </div>
</div>
