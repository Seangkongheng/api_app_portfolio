<link href="https://cdn.jsdelivr.net/npm/lightbox2@2/dist/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2/dist/js/lightbox.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="container mt-4">
    <div class="card shadow-lg border-0">

        <div class="card-body p-4">
            <div class="row align-items-center">
                <!-- Profile Photo -->
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <a href="{{ asset('brandLogo/' . $profile->profile) }}" data-lightbox="profile-photo">
                        <img src="{{ asset('brandLogo/' . ($profile->profile ?? 'default.png')) }}"
                            class="rounded-circle shadow" alt="Profile Photo"
                            style="width: 180px; height: 180px; object-fit: cover;">
                    </a>
                </div>

                <!-- Profile Info -->
                <div class="col-md-8">
                    <h2 class="mb-2 text-uppercase">{{ $profile->name ?? 'No Name' }}</h2>

                    <p class="mb-1">
                        <i class="bi bi-person-badge-fill text-primary me-2"></i> &nbsp;
                        <strong>Position:</strong>
                        <span class="badge bg-info">{{ $profile->position ?? 'N/A' }}</span>
                    </p>

                    <p class="mb-1">
                        <i class="bi bi-gender-ambiguous text-primary me-2"></i>&nbsp;
                        <strong>Gender:</strong>
                        <span class="badge bg-secondary">{{ ucfirst($profile->gender ?? 'N/A') }}</span>
                    </p>

                    <p class="mb-1">
                        <i class="bi bi-envelope-fill text-primary me-2"></i>&nbsp;
                        <strong>Email:</strong>
                        {{ $profile->email ?? 'N/A' }}
                    </p>

                    <p class="mb-1">
                        <i class="bi bi-telephone-fill text-primary me-2"></i>&nbsp;
                        <strong>Phone:</strong>
                        {{ $profile->phone ?? 'N/A' }}
                    </p>

                    <p class="mb-1">
                        <i class="bi bi-calendar-event-fill text-primary me-2"></i>&nbsp;
                        <strong>Date Of Birth:</strong>
                        {{ $profile->dob ?? 'N/A' }}
                    </p>

                    <p class="mb-1">
                        <i class="bi bi-geo-alt-fill text-primary me-2"></i>&nbsp;
                        <strong>Place Of Birth:</strong>
                        {{ $profile->pob ?? 'N/A' }}
                    </p>

                    <p class="mb-1">
                        <i class="bi bi-house-door-fill text-primary me-2"></i>&nbsp;
                        <strong>Current Address:</strong>
                        {{ $profile->current_address ?? 'N/A' }}
                    </p>
                </div>
            </div>


            <hr>
            <div class="mt-3" style="font-size: 1.1rem; line-height: 1.6;">
                <h5><i class="bi bi-info-circle-fill me-2"></i>About</h5>
                <div class="text-justify" style="text-align: justify;">
                    {{ $profile->description ?? 'No additional information provided.' }}
                </div>
            </div>
        </div>

        <div class="card-footer bg-light text-end">
            <a href="{{ route('name.edit', $profile->id) }}" class="btn btn-outline-primary">✏️ Edit Profile</a>
        </div>
    </div>
</div>

<style>
    .card-img-top:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }

    .rounded-circle {
        border: 4px solid #17a2b8;
    }
</style>
