<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PragmaRX\Google2FA\Google2FA;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

//     public function register(Request $request)
// {
//     // Validate the input fields
//     $request->validate([
//         'name' => 'required',
//         'email' => 'required|email|unique:users',
//         'password' => 'required|min:6|confirmed',

//     ]);

//     User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => Hash::make($request->password),
//         'role_id'=>2
//     ]);


//     return redirect()->route('login')->with('success', 'Registration successful. Please login.');
// }

protected function validator(array $data)
{
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);
}

/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return \App\Models\User
 */
protected function create(array $data)
{
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'google2fa_secret' => $data['google2fa_secret'],
    ]);
}

/**
 * Write code on Method
 *
 * @return response()
 */
public function register(Request $request)
{
    $this->validator($request->all())->validate();

    $google2fa = app('pragmarx.google2fa');

    $registration_data = $request->all();

    $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();

    $request->session()->flash('registration_data', $registration_data);

    $QR_Image = $google2fa->getQRCodeInline(
        config('app.name'),
        $registration_data['email'],
        $registration_data['google2fa_secret']
    );

    return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
}

/**
 * Write code on Method
 *
 * @return response()
 */
public function QRRegister(Request $request)
{
    $request->merge(session('registration_data'));
    // dd($request->merge(session('registration_data')));

    return view('google2fa.index');
}



    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session to prevent reuse
        $request->session()->invalidate();

        // Regenerate the session token to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to the login page (or any other route)
        return redirect('/login');
    }
    public function authenticated(Request $request, $user)
{
    if ($user->uses_two_factor_auth) {
        $google2fa = new Google2FA();

        if ($request->session()->has('2fa_passed')) {
            $request->session()->forget('2fa_passed');
        }

        $request->session()->put('2fa:user:id', $user->id);
        $request->session()->put('2fa:auth:attempt', true);
        $request->session()->put('2fa:auth:remember', $request->has('remember'));

        $otp_secret = $user->google2fa_secret;
        $one_time_password = $google2fa->getCurrentOtp($otp_secret);

        return redirect()->route('2fa')->with('one_time_password', $one_time_password);
    }

    return redirect()->intended($this->redirectPath());
}
}
