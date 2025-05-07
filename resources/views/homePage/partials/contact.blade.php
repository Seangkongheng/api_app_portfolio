<div id="contact">
    <div class="container">
      <div class="row">
        <div class="contact-left">
          <h1 class="sub-title">Cotact Me</h1>
          @foreach ( $contacts as $contact )
          <div class="content-contact" style="display: flex;align-items: center;gap: 10px;margin-top: 20px">
            <div class="icon-contact" style="width: 30px;height: 30px; border-radius: 100%;background: white;position: relative;padding: 1px">
              <img style="width: 100%" src="{{ asset('conactImage/'.$contact->icon) }}" alt="">
            </div>
            <div class="value-contact">
                {{ isset($contact->value)?$contact->value:'' }}
            </div>
          </div>


        @endforeach
          <div class="socail-icons">
            <a href="https://www.facebook.com/s.kongheng/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://t.me/kongheng1698" target="_blank"><i class="fa-brands fa-telegram"></i></a>
            <a href="" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
            <a href="https://github.com/Seangkongheng" target="_blank"><i class="fa-brands fa-github"></i></a>
          </div>
          {{-- <a href="image/seang kong heng cv.pdf" download="" class="btn btn2">Download CV</a> --}}

          @foreach ($cvs as $cv)
          <a style="text-decoration: none;" href="{{ asset('CvFile/' . $cv->file) }}" class="btn btn2"
              download="{{ $cv->file }}">
              Download CV
          </a>
      @endforeach
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