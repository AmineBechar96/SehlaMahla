<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\MemberShips;
use App\Models\Point;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Carbon\Carbon;
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'role' => ['required', 'string', 'max:255'],
            'g-recaptcha-response' => 'required|captcha',
            
        ])->validate();
        
        
        $user=User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
        ]);

        //create the membership for the user
        $membership=MemberShips::create([
            'user_id'=>$user->id,
            'start_date'=>Carbon::now(),
            'end_date'=>Carbon::now()->addMonths(8),
            'payment_date'=>Carbon::now()
        ]);
        return $user;
        
    
    }
}
