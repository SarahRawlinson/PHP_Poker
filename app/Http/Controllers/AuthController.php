<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View|RedirectResponse|Application
     */
    public function register(Request $request): Factory|View|RedirectResponse|Application
    {
        if ($request->isMethod('GET')) {
            return view('auth.register');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Your account has been created! you may now login.');
    }

    /**
     * @param Request $request
     * @return Factory|View|RedirectResponse|Application
     */
    public function login(Request $request): Factory|View|RedirectResponse|Application
    {
        if ($request->isMethod('GET')) {
            return view('auth.login');
        }

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()
                ->route('home')
                ->with('success', 'You are now logged in');
        }

        return redirect()
            ->route('login')
            ->withErrors('credentials not valid, please try again.');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'You are now logged out');
    }
}
