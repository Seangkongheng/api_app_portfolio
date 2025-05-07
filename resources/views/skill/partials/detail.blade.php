
  <div class="home__screen">
    <div class="background-fack"></div>
    <div id="project">
      <h1>{{ isset($skill_Name)? $skill_Name:'' }}</h1>
      <hr />
      <div class="project-list">

        @foreach ( $projects as $project )
            <div class="project-card">
            <div class="project-card-image">
              <img src="{{ asset('projectThumnail/'.$project->thumbnail_image) }}" id="img-select" alt="">

            </div>
            <h4>{{ isset($project->project->name)? $project->project->name: '' }}</h4>
            <p>{{ isset($project->description)?$project->description:'' }}</p>
            <div class="project-card-button">
                <div class="view-button">
                    <a href="{{ route('projectfront.view',$project->id) }}">Demo</a>
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

  <script src="../js/main.js"></script>
  <script>
    var tablinks = document.getElementsByClassName("tab-links");
    var tablContents = document.getElementsByClassName("tab-content");

    function openTab(tabname) {
      for (tablink of tablinks) {
        tablink.classList.remove("active-link");
      }
      for (tablContent of tablContents) {
        tablContent.classList.remove("active-tap");
      }
      event.currentTarget.classList.add("active-link");

      document.getElementById(tabname).classList.add("active-tap");
    }
  </script>
  <script>
    var sidemenu = document.getElementById("sidemenu");
    function openMenu() {
      sidemenu.style.right = "0";
    }
    function closemen() {
      sidemenu.style.right = "-200px";
    }
  </script>
