<div id="about">
  <div class="container">
    <div class="row">
      <div class="about-col-1">
        @foreach ( $abouts as $about )
          <img src="{{ asset('aboutImage/'.$about->image) }}" alt="" />
        @endforeach
        
      </div>
      <div class="about-col-2">
        <h1 class="subtitle">About Me</h1>
        <br />
        @foreach ( $abouts as $about )
        <p>
          {{ isset($about->description)?$about->description:"" }} 
        </p>
        @endforeach
        <div class="tab-titles">
          <p class="tab-links active-link" onclick="openTab('language')">
            Programming
          </p>
          <p class="tab-links" onclick="openTab('tool')">
            Tool
          </p>

          <p class="tab-links" onclick="openTab('skill')">
            Skill
          </p>
          <p class="tab-links" onclick="openTab('experience')">
            Experience
          </p>
          <p class="tab-links" onclick="openTab('education')">
            Education
          </p>

          <p class="tab-links" onclick="openTab('favorites')">
            favorites
          </p>

        </div>
        <div class="tab-content active-tap" id="language">
          <ul>
            <li>
              <ul>
                @foreach ( $languages as $language )
                <li>{{ $language->name }} &nbsp;<span>{{ $language->percen }}%</span></li>
                @endforeach
  
              <ul>
            </li>
          </ul>
        </div>
        <div class="tab-content active-tap" id="tool">
          <ul>
            <li>
              <ul>
                @foreach ( $tools as $tool )
                <li>{{ $tool->title?? '' }}</li>
                @endforeach
  
              <ul>

                
            </li>
          </ul>
        </div>
        <div class="tab-content" id="skill">
          <ul>
            <li>
              <ul>
                @foreach ( $languages as $language )
                <li>{{ $language->name }} &nbsp;<span>{{ $language->percen }}%</span></li>
                @endforeach
  
              <ul>

                
            </li>
          </ul>
        </div>
        <div class="tab-content" id="experience">
          <ul>
            @foreach ( $experiences as $experience )
            <div class="experience-title-date" style="display: flex;justify-content: space-between;align-content: center; margin-top:30px">
                <div class="experience-title">
                  <h3><b>{{ isset($experience->company_name)?$experience->company_name:'' }}</b></h3>
                </div>
                <div class="experience-date">
                  <h4 style=""><b>{{ isset($experience->start_year)?$experience->start_year:'' }} - {{ isset($experience->end_year)?$experience->end_year:'' }}</b></h4>
                </div>   
            </div>
            <p style="margin-top:10px">{{ isset($experience->position)?$experience->position:'' }}</p>
            <p style="margin-top:5px">{{ isset($experience->about)?$experience->about:'' }}</p>
              
            @endforeach
</br>
            <a style="margin-top:50px" href="#portfolio">Click here for view project</a>
          </ul>
        </div>
        <div class="tab-content" id="education">
          <ul>
            @foreach ($educations as $education )
              <li>
                <div class="education-year-school" style="display: flex; margin-top:30px">
                  <div class="education-year">
                      <span>{{ isset($education->start_year)?$education->start_year:'' }}-{{ isset($education->end_year)?$education->end_year:'' }}</span><br />
                  </div>
                  <div class="education-school" style="margin-left:10px">
                    {{ isset($education->start_year)?$education->school:'' }}
                  </div>
                </div>
                
                  {{ isset($education->description)?$education->description:'' }}
              </li>
            @endforeach
          </ul>
        </div>
        <div class="tab-content" id="favorites">
          <ul>
            @foreach ($favorites as $favorite )
              <li>
                {{ isset($favorite->title)?$favorite->title:'' }}
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>