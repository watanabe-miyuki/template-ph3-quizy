<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    // // お試し
    use AuthenticatesUsers;
    protected $maxAttempts = 1;
    protected $decayMinutes = 1;


    public function index()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['userid', 'password']);

        if (Auth::guard('administrators')->attempt($credentials)) {
            // ログインしたら管理画面トップにリダイレクト
            return redirect()->route('admin')->with([
                'login_msg' => 'ログインしました。',
            ]);
        }

        return back()->withErrors([
            'login' => ['ログインに失敗しました'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ログアウトしたらログインフォームにリダイレクト
        return redirect()->route('admin.login.index')->with([
            'logout_msg' => 'ログアウトしました',
        ]);
    }
}