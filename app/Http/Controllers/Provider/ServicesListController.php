<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use App\Models\services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ServicesListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            if(Gate::allows('isProvider') and  Gate::allows('isGoing')){
                $user_id=Auth::user()->id;
                $services=Service::where('user_id',$user_id)->with('type')->get();
                /*
                $services=Service::with('type')->select('services.*',\DB::raw('count(my_services.service_id) as subscribers'))
                ->join('my_services','services.id','=','my_services.service_id')
                ->where('services.user_id',$user_id)->groupBy('services.id')
                ->orderBy('subscribers','DESC')
                ->get();
                 */
        return view('provider.services-list',compact('services'));
    }
        else{
            return redirect('login');
          }
        }else{
              return redirect('login');
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        
        if(Auth::user()){
            if(Gate::allows('isProvider') and Gate::allows('isGoing') ){
       $id=$request->service_id;
       $serviceDeleted=Service::where('id',$id)->where('user_id',auth()->user()->id)->first();
      if($serviceDeleted){
      
try{
 $serviceDeleted->delete();
 if ($serviceDeleted->service_image) {
    Storage::disk('services/service-image')->delete($serviceDeleted->service_image);  
     }
} 
catch(\Throwable $th){
    dd($th);
    session()->flash('error', 'something wrong');
    return back();
}
       
       session()->flash('success', 'Service Supprimer Avec Success');
       return back();
}
else{
    return redirect()->back();
}
            }
else{
    return redirect('login');
  }
}else{
      return redirect('login');
  }

    }
}
