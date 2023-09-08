<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function FormInput(){
        return view ('pages.form_input');
    }

    public function Welcome (Request $Request){

        $firstname = $Request['first_name'];
        $lastname = $Request['last_name'];
    
        return view('pages.welcome', compact('firstname', 'lastname'));
    }
}
