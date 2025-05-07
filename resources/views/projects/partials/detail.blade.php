<div class="home__screen">
    <div class="background-fack"></div>
    <div id="project">
        <h1>{{ isset($category_name) ? $category_name : '' }}</h1>
        <hr />
        <div class="project-list">

            @foreach ($projects as $project)
                <div class="project-card">
                    <div class="project-card-image">
                        <img src="{{ asset('projectThumnail/' . $project->thumbnail_image) }}" alt="No Image" />
                    </div>
                    <h4>{{ isset($project->project->name) ? $project->project->name : '' }}</h4>
                    <p>{{ isset($project->description) ? $project->description : '' }}</p>
                    <div class="project-card-button">
                        <div class="view-button">
                            <a href="{{ route('projectfront.view', $project->id) }}">Demo</a>
                        </div>
                        <div class="code-button">
                            <a href="{{ $project->url }}" target="_blank">Source</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
