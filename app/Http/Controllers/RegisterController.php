<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Broadcasting\auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
	public function create(){
		return view('register.create');
	}
	public function store(){
		$user = User::create(request()->validate([
			'name'=>'required|max:255',
			'username'=>'required|min:3|max:255|unique:users,username',
			'email'=>'required|email|min:7|max:255|unique:users,email',
			'password'=>'required|min:7|max:255'
		]));
		auth()->login($user);

		return redirect('/')->with('success', 'Your account has been created!');

	}

}
