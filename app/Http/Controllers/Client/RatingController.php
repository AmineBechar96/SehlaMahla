<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services\Rating;
use App\Models\Client\Booking;

use App\Models\services\Service;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if(Auth::user() and Auth::user()->hasVerifiedEmail()  and Gate::allows('isClient') and  Gate::allows('isActive')){
            $user_id=Auth::user()->id;

           //validation 
           $request->validate([
            'service_rated_id'=>'required|exists:services,id',
            'service_rating'=>'required|numeric',
            'review'=>'string|sometimes'
           ]);

            
            $rating=$request->service_rating;
            $review=$request->review;
            $service_rated_id=$request->service_rated_id;

            
            $service=Service::findOrFail($service_rated_id);
            $bookedBefore=Booking::where('user_id',$user_id)->where('service_id',$service_rated_id)
            ->where('status','!=','rejected')->where('status','!=','canceled')->first();
            if($bookedBefore){
            $existing_rating=Rating::where('user_id',$user_id)->where('service_id',$service_rated_id)->first();
            $provider_id = $service->user_id;
            $point=Point::where('user_id',$provider_id)->first();

          if($existing_rating){
            $old_rating=$existing_rating->number_of_starts;

            $existing_rating->number_of_starts=$rating;
            $existing_rating->review= $review;
            $existing_rating->update();

            if($old_rating >=4 and $rating <=2)
            {
            //-2                 
           $point->decrement('number_of_points', 2);

            }
            elseif($old_rating >=4 and $rating ==3)
            {
           //-1
           $point->decrement('number_of_points', 1);
            }
            elseif ($old_rating <=2 and $rating >=4){
           //+2
           $point->increment('number_of_points', 2);
            }
            elseif ($old_rating ==3 and $rating >=4)
            {
                //+1
           $point->increment('number_of_points', -2);
                            }
            elseif ($old_rating ==3 and $rating <=2)
            {
                //-1
           $point->decrement('number_of_points', 1);
                            }
            }
            else{
              Rating::create([
                  'user_id'=>$user_id,
                  'service_id'=>$service_rated_id,
                  'number_of_starts'=>$rating,
                  'review'=>$review,
              ]);

            if($rating  >= 4)
              {
            //+1
            $point->increment('number_of_points', 1);
              }
            elseif($rating <= 2){
            //-1
             $point->decrement('number_of_points', 1);
              }
          }
          session()->flash('success', 'Votre avis a été enregistré avec success');
          return redirect()->back();
        }
        else{
            session()->flash('notbooked', 'you did not booked this service before');
            return redirect()->back();
        }
    }
        else{
            redirect('login');
        }
    

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
