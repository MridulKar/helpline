@extends('frontend.app')

@section('title')
	Home - Gallery
@endsection

@section('section')
    <div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url('https://c0.wallpaperflare.com/preview/724/561/113/aeroplane-aircraft-airline-airliner.jpg');">
   <h1 style="    position: relative;
    text-align: center;
    top: 150px;
    color: white;
">Gallery</h1>
  </div> <!-- .page-banner -->

  <main>
    <div class="page-section">
      <div class="container">

        <div class="grid mt-3">
          @foreach ($Galleries as $Gallery )
          <div class="grid-item mobile">
            <div class="portfolio">
              <a href="{{url($Gallery->image)}}" data-fancybox="portfolio">
                <img src="{{$Gallery->image}}" alt="">
              </a>
            </div>
          </div>
          @endforeach  
        </div> <!-- .grid -->
        
        
        {{-- <div class="mt-5 text-center">
          <button class="btn btn-primary">Load More</button>
        </div> --}}
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>

@endsection