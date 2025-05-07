
<div id="portfolio">
    <div class="container">
      <h1 class="sub-title">My Project Categories</h1>
      <div class="work-list">
        @foreach ($categories as $category)
            <div class="work">
                <img src="{{ asset('categoryImage/'.$category->image) }}" alt="{{ $category->name }}" />
                <div class="layer">
                    <h3>{{ isset($category->name)?$category->name: '' }}</h3>
                    <a href="{{ route('project.detail',$category->id) }}"><i class="fa-solid fa-link"></i></a>
                </div>
            </div>
        @endforeach
      </div>

      <a href="{{ route('projectfront.index') }}" class="btn">See more</a>
    </div>
  </div>
