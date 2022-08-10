<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('register.index', [
            'active' => 'register',
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required','max:255',],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email:rfc,dns', 'unique:users'],
            'password' => ['required', 'min:6', 'max:255']
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success','Registration Successfull! Please login');

        return redirect('/login')->with('success','Registration Successfull! Please login');
    }
}
