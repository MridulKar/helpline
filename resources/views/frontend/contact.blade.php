@extends('frontend.app')

@section('title')
	Home - contact Us 
@endsection

@section('section')

  <div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url('https://c0.wallpaperflare.com/preview/724/561/113/aeroplane-aircraft-airline-airliner.jpg');">
   <h1 style="    position: relative;
    text-align: center;
    top: 150px;
    color: white;
">Contact</h1>
  </div>
  
  <main>
    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <h2 class="title-section mb-3">Stay in touch</h2>
          <p> <a type="email" href="mailto:{{CRUDBooster::getSetting('email')}}">{{CRUDBooster::getSetting('email')}}</a></p>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-lg-8">
            <form action="{{route('create-contact')}}" class="form-contact" method="POST">
                @csrf
              <div class="row">
                <div class="col-sm-6 py-2">
                  <label for="name" class="fg-grey">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name.." >
                  @if($errors->has('name'))
                      <div class="error">{{ $errors->first('name') }}</div>
                  @endif
                </div>
                <div class="col-sm-6 py-2">
                  <label for="email" class="fg-grey">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email address.." >
                  @if($errors->has('email'))
                      <div class="error">{{ $errors->first('email') }}</div>
                  @endif
                </div>
                <div class="col-12 py-2">
                  <label for="subject" class="fg-grey">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject..">
                </div>
                <div class="col-12 py-2">
                  <label for="message" class="fg-grey">Message</label>
                  <textarea id="message" rows="8" class="form-control" name="message" placeholder="Enter message.."></textarea>
                </div>
                <div class="col-12 mt-3">
                  <button type="submit" class="btn btn-primary px-5">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->


  </main>

@endsection