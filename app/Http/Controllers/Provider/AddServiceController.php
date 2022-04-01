<?php

namespace App\Http\Controllers\Provider;
use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class AddServiceController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(Auth::user() and Auth::user()->hasVerifiedEmail()){
        if(Gate::allows('isProvider')  and  Gate::allows('isGoing') ){
        $type_id=$id;
        $type=Type::find($id);
        if($type){
        return view('provider.create-service',compact('type_id'));
        }
        else{
           return redirect()->back();
        }
       
        }
        else{
                return redirect('login');
              }
        }
        else{
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($service_id)
    {
        if(Auth::user()){
            if(Gate::allows('isProvider') and  Gate::allows('isGoing')){
                $service=Service::where('id',$service_id)->where('user_id',auth()->user()->id)->first();
                if($service){
       $id=$service_id;

        return view('provider.edit-service',compact('id'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
   
}
