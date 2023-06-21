<?php

namespace App\Http\Controllers\Auth;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers {
        logout as performLogout;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showPromoteurLoginForm()
    {
        return view('auth.plogin');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::Dashboard;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
        //Session::put('backUrl', URL::previous());
    }

    protected function guard()
    {
        return Auth()->guard('web');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['status'] = 1;

        return $credentials;
    }

    public function logout(Request $request)
    {
        $this->guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson() ? new JsonResponse([], 204) : redirect('/admin/login');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = ['email' => trans('auth.failed')];

        // Load user from database
        $user = User::where('email', $request->email)->first();
        // dd($user);
        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user && Hash::check($request->password, $user->password) && $user->status != 1) {
            $errors = ['email' => 'Your account is disabled, contact the support for more information.'];
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors($errors);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }
        return $request->wantsJson() ? new JsonResponse([], 204) : redirect()->intended($this->redirectPath());
    }
}
