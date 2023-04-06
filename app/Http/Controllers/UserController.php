<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function registerView()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|same:repeat_password',
            'name' => 'required',
            'repeat_password' => 'required'
        ]);

        $names = explode(' ', $request->name);

        $fullName = '';

        foreach ($names as $name)
        {
            $fullName .= ucfirst($name) . ' ';
        }

        $newUser = new User();
        $newUser->username = $request->username;
        $newUser->password = $request->password;
        $newUser->name = $fullName;
        $newUser->save();

        return redirect()->route('register')->with('success', 'Account aangemaakt!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if($user->count() === 0)
        {
            return redirect()->route('login')->with('error', 'Gebruikersnaam is niet herkend!');
        }

        if($user->password != $request->password)
        {
            return redirect()->route('login')->with('error', 'Wachtwoord is fout!');
        }

        Session::put('user', $user);

        return redirect()->route('home');
    }

    public function logout()
    {
        Session::pull('user');

        return redirect()->route('home');
    }

    public function settingsView()
    {
        return view('settings');
    }

    public function settings(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $user = User::where('username', Session::get('user')->username)->first();

        $user->name = $request->name;

        if($image = $request->file('profile_picture'))
        {
            $unfilteredImageName = $image->getClientOriginalName();
            $imageName = str_replace(' ', '_', $unfilteredImageName);
            $user->profile_picture = $imageName;

            $image->move('assets/images/', $imageName);
        }

        $user->save();

        Session::pull('user');
        Session::put('user', $user);

        return redirect()->route('settings')->with('success', 'Gegevens opgeslagen!');
    }
}
