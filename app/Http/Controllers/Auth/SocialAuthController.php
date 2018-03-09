<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;

class SocialAuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try
        {
            $user = Socialite::driver($provider)->user();
            $authUser = $this->findOrCreateUser($user, $provider);
            Auth::login($authUser, true);

            return redirect()->route('home');
        } catch(Exception $e) {
            return back();
        }
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = $this->userRepository->findByField('provider_id', $user->id);
        if ($authUser) {
            return $authUser;
        }

        return $this->userRepository->create([
            'name' => $user->name,
            'provider' => $provider,
            'provider_id' => $user->id,
        ]);
    }
}
