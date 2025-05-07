 <!-- copyright -->
 <div class="copyright">
    <p>Copyright @seang kong heng<i class="fa-solid fa-heart"></i>2024</p>
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