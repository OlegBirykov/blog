<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter) {
        request()->validate(['email' => 'required|email']);

        $subscribe = $newsletter->subscribe(request('email'));

        if (!$subscribe) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }   
    
        return redirect('/')->with('success', 'You are now signed up for our newsletter');
    }
}
