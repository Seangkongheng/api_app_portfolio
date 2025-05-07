<div id="portfolio " style="margin-top: 200px">
    <div class="container">
        <h1 class="sub-title">My type skills</h1>
        <div class="work-list">
            @foreach ($categories as $category)
                <div class="work">
                    <img src="{{ asset('categoryImage/' . $category->image) }}" alt="{{ $category->name }}" />
                    <div class="layer">
                        <h3>{{ isset($category->name) ? $category->name : '' }}</h3>
                        <a href="{{ route('project.detail', $category->id) }}"><i class="fa-solid fa-link"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
