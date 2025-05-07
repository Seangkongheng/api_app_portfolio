<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My portfilio</title>
  <link rel="icon" href="/image/profile.png" />

  <link rel="stylesheet" href="{{ asset('style/style.css') }}">
  <!-- font-awsome -->
  <script src="https://kit.fontawesome.com/e8ae625125.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- header page -->
  <header id="header">
    <div class="container">
      <nav>
        <a href="index.html">
          <img src="image/logo.png" class="logo" alt="" />
        </a>
        <ul id="sidemenu">
          <li><a href="#header">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="./screen/gallary.html">Gallary</a></li>
          <li><a href="#services">Service</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a class="btn__contact" href="#contact">Contact</a></li>
          <i class="fa-solid fa-circle-xmark" onclick="closemen()"></i>
        </ul>
        <i class="fa-solid fa-bars" onclick="openMenu()"></i>
      </nav>
    </div>
  </header>
   {{-- end navbar --}}

  <div class="home-page_text">

    <div class="text__homepage anim">
      <p class="anim">Web Design / Web Development</p><br>
      <h1 class="anim">
        Hi , I'm <br />
        <span>Seang kong heng </span>
      </h1>
      <br>
      <button class="btn__homepage anim">Learn more</button>
      <button class="btn__contact anim">Get in contact</button>
    </div>

    <div class="image__homepage anim">
      <img class="anim featurImage" src="image/computerProgramming.png" alt="">
    </div>


  </div>
  </div>
  <div class="home__screen">
    <!-- about as page -->
    <div id="about">
      <div class="container">
        <div class="row">
          <div class="about-col-1">
            <img src="image/photo_2022-06-26_12-23-42.jpg" alt="" />
          </div>
          <div class="about-col-2">
            <h1 class="subtitle">About Me</h1>
            <br />
            <p>
              My name is <b>seang kong heng</b> I’am from kompong cham
              province . Everyday I study in setect Intistute year 4 semester
              2. And now I looking for Web Developer.
            </p>
            <div class="tab-titles">
              <p class="tab-links active-link" onclick="openTab('skill')">
                Skill
              </p>
              <p class="tab-links" onclick="openTab('experience')">
                Experience
              </p>
              <p class="tab-links" onclick="openTab('education')">
                Education
              </p>
            </div>
            <div class="tab-content active-tap" id="skill">
              <ul>
                <li>
                  <span>Web Design</span><br /><br />
                  User Interface Design <br />
                  Front-end framwork <br />
                  Responsive web design
                </li>
                <li>
                  <span>Web Development</span><br /><br />
                  Web Development
                </li>
                <li>
                  <span>Web app</span><br /><br />Building API Rest framework
                </li>
                <li>
                  <span>Programming Languages</span><br /><br />
                  <ul>
                    <li>Html,css <span>80%</span></li>
                    <li>Javscript <span>50%</span></li>
                    <li>Larvel PHP <span>70%</span></li>
                    <li>CMS <span>70%</span></li>
                    <li>react JS<span>&nbsp;50%</span></li>
                    <li>API <span>Basic</span></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="tab-content" id="experience">
              <ul>
                I don't have much experience working, but I do have a lot of
                experience working on projects for my university coursework
                and also I created website for freelance for business's
                customer. Here is a list of my web development project
                experiences<a href="#portfolio">Click here</a>
              </ul>
            </div>
            <div class="tab-content" id="education">
              <ul>
                <li>
                  <span>2021-2023</span><br />Bachelor of Management
                  Information Technology in SETEC INTITUTE
                </li>
                <li>
                  <span>2019-2020</span><br />High school diploma Tamang High
                  school . Kompong cham province
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- service page -->

    <div id="services">
      <div class="container">
        <h1 class="sub-title">My Skill</h1>
        <div class="services-list">
          <div>
            <i class="fa-solid fa-code"></i>
            <h2>Web Design</h2>
            <p></p>

            <a href="./screen/webdesign.html">learn more</a>
          </div>
          <div>
            <i class="fa-solid fa-code"></i>
            <h2>E-commerce</h2>
            <p></p>

            <a href="./screen/ecommerce.html">learn more</a>
          </div>
          <div>
            <i class="fa-solid fa-crop"></i>
            <h2>Web Application</h2>
            <p></p>

            <a href="./screen/webapplication.html">learn more</a>
          </div>
          <div>
            <i class="fa-brands fa-app-store-ios"></i>
            <h2>POS System</h2>
            <p></p>

            <a href="./screen/pos.html">learn more</a>
          </div>
        </div>
      </div>
    </div>

    <!-- portfolio -->

    <div id="portfolio">
      <div class="container">
        <h1 class="sub-title">My Project</h1>
        <div class="work-list">
          <div class="work">
            <img src="image/work-3.png" alt="" />
            <div class="layer">
              <h3>Html / CSS / Javscript</h3>

              <a href="./screen/HtmlJsCsspage.html"><i class="fa-solid fa-link"></i></a>
            </div>
          </div>
          <div class="work">
            <img src="image/work-2.png" alt="" />
            <div class="layer">
              <h3>React JS</h3>

              <a href="./screen/ReactPage.html"><i class="fa-solid fa-link"></i></a>
            </div>
          </div>
          <div class="work">
            <img src="image/work-4.png" alt="" />
            <div class="layer">
              <h3>PHP</h3>

              <a href="./screen/phppage.html"><i class="fa-solid fa-link"></i>
              </a>
            </div>
          </div>
          <div class="work">
            <img src="image/work-5.png" alt="" />
            <div class="layer">
              <h3>Laravel</h3>

              <a href="./screen/laravepage.html"><i class="fa-solid fa-link"></i></a>
            </div>
          </div>
        </div>

        <a href="" class="btn">See more</a>
      </div>
    </div>

    <!-- contact -->
    <div id="contact">
      <div class="container">
        <div class="row">
          <div class="contact-left">
            <h1 class="sub-title">Cotact Me</h1>
            <p>
              <i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;
              konghengseang878@gmail.com
            </p>
            <p><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;0969907215</p>
            <div class="socail-icons">
              <a href="https://www.facebook.com/s.kongheng/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
              <a href="" target="_blank"><i class="fa-brands fa-twitter"></i></a>
              <a href="" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
              <a href="https://github.com/Seangkongheng" target="_blank"><i class="fa-brands fa-github"></i></a>
            </div>
            <a href="image/seang kong heng cv.pdf" download="" class="btn btn2">Download CV</a>
          </div>
          <div class="contact-right">
            <form action="" name="submit-to-google-sheet">
              <input type="text" name="Name" placeholder="You name" required />
              <input type="email" name="Email" id="" placeholder="You Email..." />
              <textarea name="Message" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
              <button type="submit" class="btn btn2">submit</button>
            </form>
            <span id="msg"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- copyright -->
  <div class="copyright">
    <p>Copyright @seang kong heng<i class="fa-solid fa-heart"></i>2023</p>
  </div>


  <script src="{{ asset('js/main.js')  }}"></script>




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

  <!-- contact form -->
  <script>
    const scriptURL =
      "https://script.google.com/macros/s/AKfycbzwHtbsrasv1jW6SneMugmDs39XWPXhsSjWVxK7dwe2Xgw1Pr2pVyYDtMENK7morF5S/exec";
    const form = document.forms["submit-to-google-sheet"];
    const msg = document.getElementById("msg");
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      fetch(scriptURL, { method: "POST", body: new FormData(form) })
        .then((response) => {
          msg.innerHTML = "Message Sent Successfull";
          setTimeout(function () {
            msg.innerHTML = "";
          }, 5000);
          form.reset();
        })
        .catch((error) => console.error("Error!", error.message));
    });
  </script>
</body>

</html>