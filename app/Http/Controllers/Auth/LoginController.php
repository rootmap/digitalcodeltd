<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    
    protected $redirectTo = '/proced-to-payment';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
//    public function login(Request $request)
//    {
//        echo $request->email;
//        exit();
//    }

     public function redirectToProvider($driver='')
    {
        if(empty($driver)){
            return redirect(url($redirectTo));
        }

        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver='')
    {
        if($driver=="google")
        {
            $user = Socialite::driver($driver)->stateless()->user();
        }
        else
        {
            $user = Socialite::driver($driver)->user();
        }

        if(!empty($user->getId())){

            $userExists=User::where('email',$user->getEmail())->count();
            if($userExists>0){
                $tab=User::where('email',$user->getEmail())->first();
                Auth::login($tab);
            }
            else{
                $tab=new User();
                $tab->name=$user->getName();
                $tab->email=$user->getEmail();
                $tab->password=bcrypt($user->getId());
                $tab->user_type="Customer";
                $tab->save();

                Auth::login($tab);
            }

            

            return redirect(url($redirectTo));
        }
        else
        {
            return redirect(url($redirectTo))->with('error','Failed to authenticate.');
        }
        
        
        // $user->token;
    }
    
}
