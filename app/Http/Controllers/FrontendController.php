<?php
namespace App\Http\Controllers;
use App\aboutcontent;
use App\teammember;
use App\servicemenu;
use App\contact;
use App\Gallery;
use App\Book;
use App\airline;
use App\service;
use App\comment;
use App\newslatter;
use App\about;
use DB;
use Illuminate\Http\Request;
use CRUDBooster;
class FrontendController extends Controller
{
    public function serviceList($slug){
        $service=service::join('servicemenus as sm','sm.id','services.servicemenu_id')
                    ->select('services.*','sm.name')
                    ->where('sm.link',$slug)
                    ->first();
        $service_all=servicemenu::where('link','!=',$slug)->get();
        return view('frontend.service', compact('service','service_all'));
    }
    public function index(){
        $services = service::with('service_category')->latest()->limit(8)->get();

        return view('frontend.index', compact('services'));
    }
    public function about_us(){
        $about = about::where('status', 1)->latest()->limit(1)->get();
        $about_content = aboutcontent::where('status', 1)->latest()->limit(1)->get();
        $team_member = teammember::where('status', 1)->get();
        return view('frontend.aboutus', compact('about_content', 'team_member', 'about'));
    }
    public function contact_us(){
        return view('frontend.contact');
    }
    public function form_contact(Request $request){
       $data =  $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        contact::create($data);
        return back()->with('success', 'Thanks for Contact us!');
    }
    public function gallery(){
        $Galleries = Gallery::where('status', 1)->latest()->limit(8)->get();
        return view('frontend.gallery', compact('Galleries'));
    }
    public function booking()
    {
        return view('frontend.booking');
    }
    public function create_book(Request $request){
        
        $data=$request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'arrivals_id' => '',
            'airlines_id' => '',
            'flight_no' => '', 
            'flight_date' => '',
            'origin' => '',
            'passengers' => '',
            'transports_id' => '',
            'hotels_id' => '',
            'subject' => '',
            'corporates_id' => '',
            'payments_id' => '', 
            'lounges_id' => '',
             'message' => '', 
        ]);

        //dd($data);
        //dd($request->all());
        Book::create($data);
        return back()->with('success', 'Thanks for Contact us!');
    }
   
    public function create_comment(Request $request)
    {
         $data=$request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'service_id'=>'required',
            'website' => '',
            'message' => '',
        ]);
        
        comment::create($data);
        // comment::create($request->all());
        return back()->with('success', 'Thanks for Contact us!');
        
    }
    public function create_newslatter(Request $request){
        $request->validate([
            'email' => 'required',
        ]);

        newslatter::create($request->all());

        return back()->with('success', 'Thanks for Contact us!');
    }
}
