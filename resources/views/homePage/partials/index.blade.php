<div class="home-page_text">

    <div class="text__homepage anim">
        @foreach ($names as $name)
            <p class="anim">{{ $name->description }}</p><br>
            <h1 class="anim">
                Hi , I'm <br />
                <span>{{ $name->name ?? '' }} </span>
            </h1>
        @endforeach

        <br>

        @foreach ($cvs as $cv)
            <a style="text-decoration: none; margin-right: 10px" href="{{ asset('CvFile/' . $cv->file) }}" class="btn__homepage anim"
                download="{{ $cv->file }}">
                Download CV
            </a>
        @endforeach

        <button class="btn__contact anim">Contact</button>
    </div>

    <div class="image__homepage anim">
        <img class="anim featurImage" src="image/computerProgramming.png" alt="">
    </div>


</div>
</div>
<div class="home__screen">
    <!-- about as page -->
    @include('homePage.partials.about')
    <!-- service page -->
    @include('homePage.partials.skill')

    <!-- portfolio -->
    @include('homePage.partials.project')

    <!-- contact -->
    @include('homePage.partials.contact')
</div>
