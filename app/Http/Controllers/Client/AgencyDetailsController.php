<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\services\Service;
use App\Models\services\Schedule;
use App\Models\services\SocialMediaAccount;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth ;
use App\Models\Communes;
use App\Models\Provider\Product;
use Share;
use App\Models\Point;

use App\Models\services\Rating;

class AgencyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type,$id)
    {
       // if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient')){
        $service=Service::findOrFail($id);
       // dd($service);
        if ( is_null($service) or $service->type->name!=$type) {
            return redirect('home');
        } else {
           // dd($service->user->memberships);
            if($service->user->memberships->status === "ongoing" ){
            
            $numberOfUsers=$service->hasBeenSaved()->count();
            $numberOfLikes=$service->likes()->count();
            $wilaya=Communes::select('wilaya_id')->where('id',$service->commune_id)->first();
            $communes=Communes::select('id')->where('wilaya_id',$wilaya->wilaya_id)->get();
            $schedule=Schedule::where('service_id',$service->id)->first() ;
            $accounts=SocialMediaAccount::where('service_id',$service->id)->first() ;
            $badgecolor=Point::select('badge_color')->where('user_id',$service->user_id)->first();
            $facebooklink=Share::page('','test')->facebook()->getRawLinks();
            $linkedinlink=Share::page('','test')->facebook()->getRawLinks();

            //get all product related to the service
            $products=Product::where('service_id',$service->id)->take(4)->get();
            ///dd($products);
            // return $badgecolor;
           $rating=Rating::with('user')->where('service_id',$service->id)->get();
            // $adresse=Communes::with('wilaya')->limit(6)->get();
           $data6 = [];
     
     foreach($communes as $commune) {
    $data6['data'][] = $commune->id;
    
             }
             
                $otheragencies=Service::where('type_id',$service->type_id)->where('id','<>',$service->id)->whereIn('commune_id',$data6['data'])->distinct()->limit(6)->get();
    
            //return $rating;
           return view('client.agency-details',compact('service', 'accounts','rating','schedule','otheragencies','linkedinlink','facebooklink','numberOfUsers','numberOfLikes','badgecolor','products')); 
     //   }
       
    }
    else{
        return view('provider.service-not-available');
    }
        }
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
