<?php

namespace App\Http\Controllers\Auth;

use App\Mail\VerifyMail;
use App\User;
use App\Http\Controllers\Controller;
use App\VerifyUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
    	return Validator::make($data, [
    		'name' => 'required|string|max:255',
    		'email' => 'required|string|email|max:255|unique:users',
    		'password' => 'required|string|min:6|confirmed',
    		'phone' => 'required|numeric|digits_between:10,10|unique:users,phone'
    	]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    	$user = User::create([
    		'name' => $data['name'],
    		'email' => $data['email'],
    		'role'=>'2',
    		'password' => bcrypt($data['password']),
			'verified'=>1
    	]);

    	$verifyUser = VerifyUser::create([
    		'user_id' => $user->id,
    		'token' => str_random(40)
    	]);

    	$otp = rand(100000,999999);

//    	Mail::to($user->email)->send(new VerifyMail($user));
//    	session(['phone' => $data['phone']]);
//    	session(['onthep' => $otp]);
//    	session(['newreg' => 'Yes']);
//
//    	session(['userveri' => $user->id]);
    	/* $response = Curl::to('http://103.8.127.46/vendorsms/pushsms.aspx')
    	->withData( array( 'user' => 'PHFRN', 'password' => 'Sandeep@5051', 'msisdn' => $data['phone'],'sid' => 'PHNFRN' , 'msg' => $otp.' is the one-time password (OTP) for your online registration at Phone Friend. This is usable once. PLEASE DO NOT SHARE WITH ANYONE.','fl'=>'0','gwid'=>'2') )
    	->asJson()
    	->get(); */

    	return $user;
    }


    public function verifyUser($token)
    {
    	$verifyUser = VerifyUser::where('token', $token)->first();
    	if(isset($verifyUser) ){
    		$user = $verifyUser->user;
    		if(!$user->verified) {
    			$verifyUser->user->verified = 1;
    			$verifyUser->user->save();
    			$status = "Your e-mail is verified. You can now login.";
    		}else{
    			$status = "Your e-mail is already verified. You can now login.";
    		}
    	}else{
    		return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
    	}

    	return redirect('/login')->with('status', $status);
    }

    public function verifyotp(){
    	$user = User::where('id',session()->get('userveri'))->first();

    	if(session()->get('onthep') == \request()->password){
    		if(!$user->verified) {
    			$user->verified = 1;
    			$user->save();
    			$status = "Your account is verified. You can now login.";
    			session()->flush();
    		}else{
    			$status = "Your account is already verified. You can now login.";
    			session()->flush();
    		}
    	}
    	else{
    		return redirect('/verify-otp')->with('warning', "Sorry you have entered an incorrect OTP.");
    	}
    	return redirect('/login')->with('status', $status);

    }


    protected function registered(Request $request, $user)
    {
    	$this->guard()->logout();
    	return redirect('/login')->with('status', 'Please login to continue.');
    }

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {

    	return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

            try {
                $user = Socialite::driver($provider)->user();
            }catch(\Exception $e){
                return redirect('/login')->with('warning', "<b>Sorry ! </b> Your OAuth account couldn't be authorized.");
            }
            $authUser = $this->findOrCreateUser($user, $provider);
            Auth::login($authUser, true);
            // return redirect($this->redirectTo);
            return redirect()->intended($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
    	$authUser = User::where('provider_id', $user->id)->first();
    	if ($authUser) {
    		return $authUser;
    	} else if ($usr = User::where('email', $user->email)->first()) {
    		$usr->update(['provider' => $provider,
    			'provider_id' => $user->id,'verified'=>1]);
    		return $usr;
    	} else {
    		return User::create([
    			'name' => $user->name,
    			'email' => $user->email,
    			'role' => 2,
    			'verified' => 1,
    			'provider' => $provider,
    			'provider_id' => $user->id
    		]);
    	}
    }
}
