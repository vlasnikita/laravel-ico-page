<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    public function facebook_redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebook_callback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user(), 'facebook');

        auth()->login($user);

        return redirect()->to('/');
    }

    public function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('google')->user(), 'google');

        auth()->login($user);

        return redirect()->to('/');
    }

//    public function callback(Request $request)
//    {
//        $state = $request->get('state');
//        $request->session()->put('state',$state);
//
//        $user = Socialite::with('facebook')->user();
//        print_r($user); exit;
//    }

//    public function callback()
//    {
//        // when facebook call us a with token
//        $providerUser = \Socialite::driver('facebook')->user();
//    }
}