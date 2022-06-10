<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view ('home');
    }
    public function licences(){
        return view ('reestr.licences');
    }
    public function fields(){
        return view ('reestr.fields');
    }
}
