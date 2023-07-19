<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $adoptions = Adoption::latest()->unadopted()->get();
        return view('adoptions.list', ['adoptions' => $adoptions, 'header' => 'Available for adoption']);
    }

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)#User $user
    {
        /*
        |-----------------------------------------------------------------------
        | Task 3 Guest, step 5. You should implement this method as instructed
        |-----------------------------------------------------------------------
        */
        $fields = request()->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);
        if (Auth::attempt($fields));
        #$user = User::create([
            #'name' => $request->name,
            #'email' => $request->email,
            #'password' => bcrypt($request->password),
            #'password' => $request->password,
        #]);
        #session
        #$user->save();
        #$user = new User();
        #$user = User::create($fields);
        #$request->authentication();
        #$request->session()->regenerate();
        #Auth::login($user);
        return redirect()->route('home');
        #return redirect()->home();
        #return redirect()->route('/');
    }

    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 2 Guest, step 5. You should implement this method as instructed
        |-----------------------------------------------------------------------
        */
        request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'password-confirmation' => ['required', 'string']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            #'password' => $request->password,
            'password-confirmation' => $request->password_confirmation,
        ]);
        #$user->save();
        Auth::login($user);
        return redirect()->route('home');
    }

    public function logout(User $user)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 2 User, step 3. You should implement this method as instructed
        |-----------------------------------------------------------------------
        */
        Auth::logout($user);
        return redirect()->route('home');
    }
}
