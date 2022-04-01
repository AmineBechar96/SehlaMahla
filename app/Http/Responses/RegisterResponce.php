<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
          // the user can be located with Auth facade
          $role = Auth::user()->role;
          //  $checkrole = explode(',', $role);  // However you get role
           
            if ($role=="Client") {
               return redirect('/client/dashboard');
            } else {
                //return redirect('/');
                return redirect('/provider/dashboard');
            }
        return $request->wantsJson()
                    ? new JsonResponse('', 201)
                    : redirect()->intended(Redirect::setIntendedUrl(url()->previous()));
    }
}
