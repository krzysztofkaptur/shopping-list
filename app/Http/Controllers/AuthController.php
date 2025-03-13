<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showLogin() {
      return view('auth.login');
    }

    public function login(Request $request) {
      $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string'
      ]);

      $isValid = Auth::attempt($validated);

      if($isValid) {
        $request->session()->regenerate();

        return redirect()->route('items.index');
      }

      throw ValidationException::withMessages([
        'credentials' => 'Sorry, incorrect credentials'
      ]);
    }

    public function showRegister() {
      return view('auth.register');
    }

    public function register(Request $request) {
      $validated = $request->validate([
        'name' => 'required|string|max:50',
        'email' => 'required|email|max:50|unique:users',
        'password' => 'required|string|min:4|max:50|confirmed',
        'password_confirmation' => 'required|string',
      ]);

      $user = User::create($validated);

      Auth::login($user);

      return redirect()->route('items.index');
    }

    public function logout(Request $request) {
      Auth::logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect()->route('login.show');
    }

    public function loginGithub() {
      return Socialite::driver('github')->redirect();
    }

    public function loginGithubCallback() {
      $githubUser = Socialite::driver('github')->user();
      
      $user = User::updateOrCreate([
        'github_id' => $githubUser->id
      ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'password' => bcrypt(str()->random(16)),
      ]);

      Auth::login($user);

      return redirect()->route('items.index');
    }
}
