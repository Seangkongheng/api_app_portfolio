  <!-- header page -->
  <header id="header">
    <div class="container">
      <nav>
        <a href="{{ route("home.index") }}">
          @foreach ( $brands as $brand )
            <img src="{{ asset('brandLogo/'.$brand->logo) }}" class="logo" alt="" />
          @endforeach
         
        </a>
        <ul id="sidemenu">
          <li><a href="{{ route('home.index') }}">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="{{ route('gallery.index') }}">Gallary</a></li>
          <li><a href="#services">Service</a></li>
          <li><a href="#portfolio">Projects</a></li>
          <li><a class="btn__contact" href="#contact">Contact</a></li>
          <i class="fa-solid fa-circle-xmark" onclick="closemen()"></i>
        </ul>
        <i class="fa-solid fa-bars" onclick="openMenu()"></i>
      </nav>
    </div>
  </header>
   {{-- end navbar --}}


   <script>
    var sidemenu=document.getElementById("sidemenu");
function openMenu(){
  sidemenu.style.right="0";
}
function closemen(){
  sidemenu.style.right="-200px";
}
   </script>