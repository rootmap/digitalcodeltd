<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showResetForm($token = null)
    {

        //$token = hash_hmac('sha256', $token, $this->hashKey);
        //echo $token; die();
        $emailDB = \DB::table("password_resets")->get();

        if(count($emailDB))
        {
            $email="";
            $match=0;
            foreach($emailDB as $rr):
                if (\Hash::check($token, $rr->token))
                {
                    $email=$rr->email;
                    $match++;
                }
            endforeach;
        }

        if($match > 0)
        {
            return view('frontend.pages.login.reset-password',['token'=>$token]);
        }
        else
        {
            return redirect('password-reset')->with('error','Invalid reset code, Please try again.');
        }

    }


}
