<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class BookingStatusProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider')  and  Gate::allows('isGoing')){
        $statu=$status;
        $component;
        if ($statu=='pending')

        $component='provider.pending-provider-bookings';

        elseif($statu=='canceled')
        $component='provider.canceled-provider-bookings';
        elseif($statu=='ongoing')
        $component= 'provider.ongoing-provider-bookings';

        elseif($statu=='completed')
        $component='provider.completed-provider-bookings';
        elseif($statu=='accepted')
        $component='provider.accepted-provider-bookings';
        elseif($statu=='rejected')
        $component='provider.rejected-provider-bookings';
        else
        return redirect('home');
        return view('provider.status-provider-bookings',compact('component'));
    }
    else{
        return redirect('home');
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
