<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\services\Service;
use App\Models\MemberShips;
use App\Models\WhyLeaving;
use Illuminate\Support\Facades\Gate;

use App\Models\Client\Booking;

use Illuminate\Support\Facades\Hash;
class AccountSettingProviderController extends Controller
{
    public function index()
    {
    if( Gate::allows('isProvider') and Auth::user()->hasVerifiedEmail()){
    $services=Service::where('user_id',auth()->user()->id)->count();
    $membership=MemberShips::where('user_id',auth()->user()->id)->first();

    return view('provider.account-settings',compact('services','membership'));
    }
    }
      /**
 * change provider password
 */
public function change_provider_password(Request $request)
{
    if( Gate::allows('isProvider') and Auth::user()->hasVerifiedEmail()){
   $request->validate([
       'old_password'=>'required|min:6|max:10',
       'new_password'=>'required|min:6|max:10',
       'confirm_password'=>'required|same:new_password'
   ]);

   $user=auth()->user();


   if(Hash::check($request->old_password,$user->password)){
   $user->update(['password'=>bcrypt($request->new_password)]);
   return redirect()->back()->with('success','password erronée');
   }
   else{
       return redirect()->back()->with('error','password erronée');
   }
}
}
/**
 * delete the provider account
 */
public function deleteAccount(Request $request)
{
    if( Gate::allows('isProvider') and Auth::user()->hasVerifiedEmail() and  Gate::allows('isGoing')){

    //validate
    $request->validate([
        'why'=>'required|string|min:15|max:100',
    ]);
   
    //add raison of leaving
    WhyLeaving::create([
        'user_id'=>auth()->user()->id,
        'raison'=>$request->why
    ]);
    //updating the membership status
    MemberShips::where('user_id',auth()->user()->id)->update(['status'=>'ended']);
  
    //logout
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('login');
 
}
}
}
