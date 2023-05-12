<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter){
        dd($newsletter);
            request()->validate(['email'=>'required|email']);
        require_once('../vendor/autoload.php');
        try{
            $newsletter->subscribe(request('email'));
        }catch(\Exception $e){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email'=>'this email could not be added'
            ]);
        }
         return redirect('/')->with('success', 'you have successfully subscribed!');
    }
}
