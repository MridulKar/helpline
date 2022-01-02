@extends('frontend.app')

@section('title')
	Home - Booking
@endsection

@section('section')
<div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url('https://c0.wallpaperflare.com/preview/724/561/113/aeroplane-aircraft-airline-airliner.jpg');">
   <h1 style="    position: relative;
    text-align: center;
    top: 150px;
    color: white;
">Hello</h1>
  </div> <!-- .page-banner -->

  <main>
    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <h2 class="title-section mb-3">Get us booked</h2>
          <p>Book Your Services. <a href="mailto:{{CRUDBooster::getSetting('email')}}">{{CRUDBooster::getSetting('email')}}</a></p>
        </div>
        <div class="container-sm row justify-content-center mt-5">
          <div class="col-lg-8">
            <form action="{{route('create-book')}}" method="POST" class="form-book">
              @csrf
              <div class="row">
                <div class="col-sm-6 py-2">
                  <label for="name" class="fg-grey">Full Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter name..">
                  @if($errors->has('name'))
                      <div class="error">{{ $errors->first('name') }}</div>
                  @endif
                </div>                    

                <div class="col-sm-6 py-2">
                  <label for="mobile" class="fg-grey">Mobile Number</label>
                  <input type="tel" class="form-control" name="mobile" id="tel" placeholder="Enter Mobile Number..">
                  @if($errors->has('mobile'))
                      <div class="error">{{ $errors->first('mobile') }}</div>
                  @endif
                </div>

                <div class="col-12 py-2">
                  <label for="subject" class="fg-grey">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email.." >
                  @if($errors->has('email'))
                      <div class="error">{{ $errors->first('email') }}</div>
                  @endif
                </div>


              
                <div  class="col-4 py-3">
                  <label  class="d-block fg-grey">Arrival Status</label>
                </div>
                @php
                $arrival = App\arrival::where('status', 1)->get();
                @endphp
                @foreach ($arrival as $arr)
                <div class="col-4 py-3 form-check">
                  
                  <input class="form-check-input" name="arrivals_id" type="radio" value="{{$arr->name}}" id="flexCheckArrivals">
                  <label class="fg-grey mx-2 form-check-label" for="flexCheckArrivals">
                    {{$arr->name}}
                  </label>
                </div>
                @endforeach
                
    
                <div  class="col-4 py-3">
                  <label  class="d-block fg-grey">Select Airlines</label>
                </div>
                    @php
                    $ariline = App\airline::where('status', 1)->get(); 
                    @endphp
                <div class="col-12 py-2 fg-grey form-group">
                  <select class="form-control" id="exampleFormControlSelect1">

                    <option>Select Airlines</option>
                        @php 
                         $ariline = App\airline::where('status', 1)->get(); 
                        @endphp
                        @foreach ($ariline as $ar)
                        <option name="airlines_id" value="{{$ar->id}}">{{$ar->name}}</option>
                        @endforeach
                    
                  </select>
                </div>  
                
                
                
                
                
                <div class="col-sm-6 py-2">
                  <label for="name" class="fg-grey">Flight NO</label>
                  <input type="number" class="form-control" id="name" name="flight_no" placeholder="Enter name..">
                </div> 

                

                <div class="col-sm-6 py-2">
                  <label for="name" class="fg-grey">Flight Date</label>
                  <input type="date" class="form-control" id="name" name="flight_date" placeholder="Enter Date..">
                </div> 

                <div class="col-sm-6 py-2">
                  <label for="name" class="fg-grey">Origin</label>
                  <input type="text" class="form-control" name="origin" id="name" placeholder="Enter Origin..">
                </div> 

                <div class="col-sm-6 py-2">
                  <label for="name" class="fg-grey">No of Passenger</label>
                  <input type="text" class="form-control" id="name" name="passengers" placeholder="Enter Number of Passenger..">
                </div> 

                <div  class="col-4 py-3">
                  <label for="subject" class="d-block fg-grey">Transport Need?</label>
                </div>
                @php 
                  $transport= App\transport::where('status', 1)->get();
                @endphp
                @foreach ($transport as $tr)
                <div class="col-4 py-3 form-check">
                  <input class="form-check-input" type="radio" name="transports_id" value="{{$tr->name}}" id="flexCheckYes">
                  <label class="fg-grey mx-2 form-check-label" for="flexCheckYes">
                    {{$tr->name}}
                  </label>
                </div>    
                @endforeach

                <div  class="col-4 py-3">
                  <label for="subject" class="d-block fg-grey">Hotel Need?</label>
                </div>
                @php 
                  $hotels= App\hotel::where('status', 1)->get();
                @endphp
                @foreach ($hotels as $hotle)
                <div class="col-4 py-3 form-check">
                  <input class="form-check-input" name="hotels_id" type="radio" value="{{$hotle->name}}" id="flexCheckHotelYes">
                  <label class="fg-grey mx-2 form-check-label" for="flexCheckHotelYes">
                    {{$hotle->name}}
                  </label>
                </div>
                @endforeach
                
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject..">
                <div  class="col-4 py-3">
                  <label for="subject" class="d-block fg-grey">Corporate Client?</label>
                </div>
                @php  
                  $corporates = App\hotel::where('status', 1)->get();
                @endphp
                @foreach ($corporates as $corporate)
                <div class="col-4 py-3 form-check">
                  <input class="form-check-input" type="radio" name="corporates_id" value="{{$corporate->name}}" id="flexCheckClientYes">
                  <label class="fg-grey mx-2 form-check-label" for="flexCheckClientYes">
                    {{$corporate->name}}
                  </label>
                </div>
                @endforeach
               
                <input type="text" class="form-control" name="corporate_subject" id="subject" placeholder="Subject..">

                <div  class="col-4 py-3">
                  <label for="subject" class="d-block fg-grey">Payment</label>
                </div>
              @php  
                $payments = App\payment::where('status', 1)->get();
              @endphp
              @foreach ($payments as $payment)
              <div class="col-4 py-3 form-check">
                <input class="form-check-input" type="radio" name="payments_id" value="{{$payment->name}}" id="flexCheckCash">
                <label class="fg-grey mx-2 form-check-label" for="flexCheckCash">
                  {{$payment->name}}
                </label>
              </div>
              @endforeach

                <div  class="col-4 py-3">
                  <label for="subject" class="d-block fg-grey">Lounges Service Need?</label>
                </div>
                @php  
                $lounges = App\lounge::where('status', 1)->get();
                @endphp
                @foreach ($lounges as $lounge)
                <div class="col-4 py-3 form-check">
                  <input class="form-check-input" name="lounges_id" type="radio" value="{{$lounge->name}}" id="flexCheckLSYes">
                  <label class="fg-grey mx-2 form-check-label" for="flexCheckLSYes">
                    {{$lounge->name}}
                  </label>
                </div>
                @endforeach
          

                <div class="col-12 py-2">
                  <label for="message" class="fg-grey">Message</label>
                  <textarea id="message" name="message" rows="8" class="form-control" placeholder="Enter message.."></textarea>
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

    <div class="maps-container">
      <div id="google-maps"></div>
    </div>
  </main>

@endsection
