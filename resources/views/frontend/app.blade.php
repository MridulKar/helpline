<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>@yield('title', 'Helpline')</title>

  <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/maicons.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/vendor/animate/animate.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/vendor/owl-carousel/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/vendor/fancybox/css/jquery.fancybox.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/theme.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/others.css')}}">
  <link rel="icon" href="{{ CRUDBooster::getSetting('logo')?asset(CRUDBooster::getSetting('logo')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}" type="image/gif" sizes="16x16">
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

  <style type="text/css">
    .error{
      color: red;
    }
    
  #owl-demo .item{
  margin: 3px;
}
#owl-demo .item img{
  display: block;
  width: 100%;
  height: auto;
}
  </style>

</head>
<body>
    @include('partials.alert')
  <!-- Back to top button -->
  <div class="back-to-top"></div>

 <div class="black">
  <div class="top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="d-inline-block">
              <span class="mai-mail fg-primary"></span> <a href="mailto:contact@mail.com">{{CRUDBooster::getSetting('email')}}</a>
            </div>
            <div class="d-inline-block ml-2">
              <span class="mai-call fg-primary"></span> <a href="tel:+0011223495">{{CRUDBooster::getSetting('phone')}}</a>
            </div>
          </div>
          <div class="col-md-4 text-right d-none d-md-block">
            <div class="social-mini-button">
                @php
                  $socials = \App\Social::where('status', 1)->get();
                  @endphp  
                  @foreach($socials as $s)
                  <a href="{{$s->link}}"><span class="{{$s->icon}}"></span></a>
                @endforeach
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .top-bar -->
    <nav class="sticky-top navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a href="{{url('/')}}" class="navbar-brand"><img style="height:54px; width:259px;" src="{{ CRUDBooster::getSetting('logo')?asset(CRUDBooster::getSetting('logo')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}"

       alt=""></a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarContent">
        <ul class="res-menu navbar-nav ml-auto pt-3 pt-lg-0">

           <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Services
      </a> 
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @php 
          $menu = \App\servicemenu::where('status', 1)->get();
        @endphp
        @foreach ($menu as $mn)
        <a class="dropdown-item" href="{{ route('servic-list',[$mn->link])}}">{{$mn->name}}</a>
        <div class="dropdown-divider"></div>
        @endforeach
      </div>
          
          <li class="nav-item">
            <a href="{{route('booking')}}" class="nav-link">Booking
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('aboutus')}}" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="{{route('gallery')}}" class="nav-link">Gallery</a>
          </li>
          
          <li class="nav-item">
            <a href="{{route('contactus')}}" class="nav-link">Contact Us</a>
          </li>
        </ul>
      </div>
    </div> <!-- .container -->
  </nav> <!-- .navbar -->
</div>



  @yield('section')
<section class="partner-area" style="background:#007BFF; padding:10px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section_head3">
                <h2 style="text-align:center; color:#ffffff; font-weight:bold">Our Clients</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="owl-demo" class="owl-carousel owl-theme">
                    @php 
                        $partnars = DB::table('partners')->get();
                    @endphp 
                    @foreach($partnars as $partnar)
                         <div class="item">
                        <div class="single-partner-img">
                            <img style="height:100px; border:2px solid #FF9800;" src="{{asset($partnar->image)}}" alt="{{$partnar->name}}">
                        </div>
                        </div>
                    @endforeach    
                 </div>
            </div>
        </div>
    </div>
</section>
  

  <footer class="page-footer">
    <div class="container">
      <img style="border-radius: 5px; padding:8px 12px; height:54px; width:259px; background-color: white" src="{{ CRUDBooster::getSetting('logo')?asset(CRUDBooster::getSetting('logo')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}" alt="">
      <div class="row">
        <div class="col-lg-4 py-4">
          
          <h5>{{CRUDBooster::getSetting('appname')}}</h5>
          <p>{{CRUDBooster::getSetting('Address')}}</p>
          <p>{{CRUDBooster::getSetting('address_2')}}</p>
        </div>
        <div class="col-lg-4 py-4">
          <h5>Contact Information</h5>
          
          <p>Email: {{CRUDBooster::getSetting('email')}}, {{CRUDBooster::getSetting('email_2')}}, {{CRUDBooster::getSetting('email_3')}}</p>
          <p>Phone:  {{CRUDBooster::getSetting('Phone')}}, {{CRUDBooster::getSetting('phone_2')}}</p>
        </div>
        
        <div class="col-lg-4 py-4">
          <h5>Newsletter</h5>
          <form action="{{route('create-newslatter')}}" method="POST">
            @csrf
            <input type="text" name="email" class="form-control" placeholder="Enter your email">
            <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
          </form>
        </div>
      </div>

      <hr>

      <div class="row mt-4">
        <div class="col-md-6">
          <p>Copyright 2021. All Rights Reserved BY Help Line LTD. This template designed by <a href="https://softitsecurity.com/">Soft IT Security</a></p>
        </div>
        <div class="col-md-6 text-right">
          <div class="sosmed-button">
            @php
                $socials = \App\Social::where('status', 1)->get();
                @endphp  
                @foreach($socials as $s)
                <a href="{{$s->link}}"><span class="{{$s->icon}}"></span></a>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script>
    jQuery(document).ready(function( $ ) {
        /* ============ LAYER SLIDER ================*/
		jQuery("#layerslider").layerSlider({
			responsive: true,
			responsiveUnder: 1280,
			layersContainer: 1170,
			skin: 'fullwidth',
			hoverPrevNext: true,
			skinsPath: 'layerslider/skins/'
		});
	

        /* ============ Welfare Projects Carousel ================*/
		$('.welfare-projects-carousel').owlCarousel({
			autoplay:true,
			autoplayTimeout:2500,
			smartSpeed:2000,
			autoplayHoverPause:true,
			loop:true,
			dots:false,
			nav:false,
			margin:0,
			mouseDrag:true,
			items:4,
			autoHeight:true,
			responsive : {
			    0 : {items : 1},
			    480 : {items :2},
			    768 : {items : 3},
			    1200 : {items : 4},
			}	
		});	 


        /* ============ Sponsors Carousel ================*/
		$('.sponsors-carousel').owlCarousel({
			autoplay:true,
			autoplayTimeout:2500,
			smartSpeed:2000,
			loop:true,
			dots:false,
			nav:true,
			margin:10,
			mouseDrag:true,
			items:4,
			autoHeight:true,
			responsive : {
			    0 : {items : 1},
			    480 : {items :2},
			    768 : {items : 3},
			    1200 : {items : 4},
			}	
		});	 




        /* ============ Count Down Timer ================*/
		$(function () {
			var date = new Date();
			date = new Date(2020, 4 - 1, 12);
			$('.count-down').countdown({until: date});
		});
		$(function () {
			var date2 = new Date();
			date2 = new Date(2020, 4 - 1, 12);
			$('.count-down2').countdown({until: date2});
		});

		$(function () {
			var current_year = new Date().getFullYear()
			$('#current_year').text(current_year);
		});	 

	});	 
	</script>	
  
<script src="{{asset('frontend/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('frontend/vendor/fancybox/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('frontend/vendor/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/google-maps.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('frontend/js/theme.js')}}"></script>

<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script> -->
<script type="text/javascript">
  @if(session()->has('success'))
  toastr.success("{{session()->get('success')}}");
  @endif

  @if(session()->has('error'))
  toastr.error("{{session()->get('error')}}");
  @endif

</script>
 <!--owl corusol -->
<script type="text/javascript">
  
  $(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
 
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });
 
});

</script>

</body>
</html>