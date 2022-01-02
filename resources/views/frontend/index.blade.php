@extends('frontend.app')

@section('title')
	Home - Helpline 
@endsection

@section('section')
 {{-- Slider --}}
<div class="page-banner home-banner mb-5">
    <div class="slider-wrapper">
      <div class="owl-carousel hero-carousel">
        @php 
        $sliders = App\Slider::where('status', 1)->get();
        @endphp 
        @foreach($sliders as $slider)
        <div class="hero-carousel-item">
          <img style="height: 600px; width:100%;" src="{{$slider->image}}" alt="">
          <div class="img-caption">
            <div class="subhead">{{$slider->titel1}}</div>
            <h1 class="down mb-4">{{$slider->title2}}</h1>
            <a href="{{url($slider->link)}}" class="down btn btn-outline-light">{{$slider->button}}</a>
          </div>
        </div>
        @endforeach
      </div>
    </div> <!-- .slider-wrapper -->
  </div> <!-- .page-banner -->

  <main>
    <!--about us starts-->
    <div class="page-section">
      <div class="container">
        @php 
        $about = \App\aboutcontent::where('status', 1)->limit(1)->get();
        @endphp
        @foreach($about as $ab)
        <div class="row align-items-center">
          <div class="col-lg-6 py-3">
            <div class="subhead">About Us</div>
            <h2 class="title-section"><span class="fg-primary">{{$ab->title}}</span></h2>

            <p>{{$ab->body}}</p>

            <a href="{{route('aboutus')}}" class="btn btn-primary mt-4">Read More</a>
          </div>
          <div class="col-lg-6 py-3">
            <div class="about-img">
              <img src="{{$ab->image}}" alt="">
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div> <!-- .page-section about us ends -->

    <!--blog starts-->
    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">Services</div>
          <h2 class="title-section">Go through Our Services</h2>
        </div>

        <div class="row my-5 card-blog-row">
          @foreach ($services as $service )
          <div class="col-lg-3 py-3">
            <div class="card-blog">
              <div class="header">
                <div class="">
                  <img class="card-img" src="{{$service->image}}" alt="">
                </div>
                
              </div>
             
              <div class="body">
                <div class="post-title"><a href="{{ route('servic-list',[$service->service_category->link])}}">{{$service->service_category->name}}</a></div>
                <div class="post-excerpt">{{$service->service_category->name}}</div>
              </div>
             
              <div class="footer">
                <a class="readmore-btn" href="{{ route('servic-list',[$service->service_category->link])}}">Read More <span class="mai-chevron-forward text-sm"></span></a>
              </div>
            </div>
          </div>        
          @endforeach   
        </div>

        <div class="text-center">
         
        </div>

      </div> <!-- .container -->
    </div> <!-- .page-section blog ends -->


    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <h2 class="title-section mb-3">Stay in touch</h2>
          <p> <a href="mailto:{{CRUDBooster::getSetting('email')}}">{{CRUDBooster::getSetting('email')}}</a></p>
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