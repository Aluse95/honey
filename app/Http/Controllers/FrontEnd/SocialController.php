<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = User::where('email',$getInfo->email)->first();
        if($user) {
            $user->name = $getInfo->name;
            $user->avatar = $getInfo->avatar;
            $user->save();
        } else {
            $user = $this->createUser($getInfo,$provider);
        }
        auth()->login($user);
        return redirect()->route('frontend.home')->with('successMessage', __('Login successfully!'));
    }

    function createUser($getInfo,$provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $email = 'user-'. rand(10000, 1000000) .'@gmail.com';
            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email ?? $email,
                'password' => Hash::make('12345678'),
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'status' => 'active'
            ]);
        }
        return $user;
    }
}
