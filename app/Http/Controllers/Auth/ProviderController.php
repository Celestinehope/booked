<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
try{
    $Socialuser = Socialite::driver($provider)->user();
   
    if(User::where('provider_token', $Socialuser->token)->exists())
    {
        $confirm = User::where('email', $Socialuser->getEmail())->first();

     if ($confirm && $confirm->provider_token === $Socialuser->token){
        Auth::login($user);     
        return redirect('/dashboard');
     }

    }    
    
    //if(User::where('email', $Socialuser->getEmail())->exists()){
     //   return redirect('/login')->withErrors(['email' =>'This email uses a different method to login']);
   // }
    $user = User::where([
        'provider_id' => $Socialuser->id,
        'provider'=> $provider,
    ])->first();
    
    if(!$user){
        //$encrypted_password = Str::random(8);
        //
        $user = User::create([
            'provider_id' => $Socialuser->getId(),
            'provider'=> $provider,
            'name' => $Socialuser->getName(),
            'email' => $Socialuser->getEmail(),
            'provider_token' => $Socialuser->token,
            'password'=> "12345",
            'role'=>'user',
            //'phonenumber'=> $Socialuser->phonenumber,
            
        ]);
       
        $user->sendEmailVerificationNotification();
    }

Auth::login($user);     
return redirect('/product');

}catch(\Exception $e){
    return redirect ('/login');
}

        
      
     
       
    }
}