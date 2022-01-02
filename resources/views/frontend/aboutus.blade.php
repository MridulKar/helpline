@extends('frontend.app')

@section('title')
	Home - AboutUs 
@endsection

@section('section')
 <div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url('https://c0.wallpaperflare.com/preview/724/561/113/aeroplane-aircraft-airline-airliner.jpg');">
   <h1 style="    position: relative;
    text-align: center;
    top: 150px;
    color: white;
">About</h1>
  </div> <!-- .page-banner -->

  <main>
    <div class="page-section">
      <div class="container">
        
        @foreach($about_content as $ac)
        <div class="row align-items-center">
          <div class="col-lg-6 py-3">
            <div class="subhead">About Us</div>
            
            <h2 class="title-section"> <span class="fg-primary">{{$ac->title}}</span> </h2>

            <p>{{$ac->body}}</p>
          </div>
          <div class="col-lg-6 py-3">
            <div class="about-img">
              <img src="{{$ac->image}}" alt="image here">
            </div>
          </div>
        </div>
        @endforeach
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container-sm">
        <div class="text-center">
          <div class="subhead">Our Teams</div>
          <h2 class="title-section"></h2>
        </div>

        <div class="owl-carousel team-carousel mt-5">
        @foreach($team_member as $key=>$tm)
          <div class="team-wrap {{ $key==0 ?'active':''}}" >
            <div class="team-profile">
              <img src="{{$tm->image}}" alt="">
            </div>
            <div class="team-content">
              <h5>{{$tm->name}}</h5>
              {{-- <div class="text-sm fg-grey">Name</div> --}}
              <div class="text-sm fg-grey">Designation: {{$tm->designation}}</div>
              <div class="text-sm fg-grey">Contact: {{$tm->contact}}</div>

              <div class="social-button">
                <a href="{{$tm->messanger}}"><span class="mai-logo-facebook-messenger"></span></a>
                <a href="tel:{{$tm->contact}}" type="call"><span class="mai-call"></span></a>
                <a href="mailto:{{$tm->email}}" type="email"><span class="mai-mail"></span></a>
              </div>
              
            </div>
          </div>
          @endforeach
          

        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    
    </div> <!-- .page-section -->
  </main>
@endsection