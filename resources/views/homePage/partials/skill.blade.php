<div id="services">
    <div class="container">
      <h1 class="sub-title">My Skill</h1>
      <div class="services-list">
       @foreach ( $skills as $skill )
        <div>
          <i class="fa-solid fa-code"></i>
          <h2>{{ isset($skill->title)?$skill->title:'' }}</h2>
          <p></p>
          <a href="{{ route('skillFront.detail',$skill->id) }}">learn more</a>
        </div>
       @endforeach
      </div>
    </div>
  </div>
