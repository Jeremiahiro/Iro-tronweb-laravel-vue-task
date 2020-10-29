<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use hisorange\BrowserDetect\Parser as Browser;

class VuePagesController extends Controller
{
    public function index()
    {
        if(Browser::isChrome()){
            $url = request()->url();
            return view('pages', compact('url'));
        } else {
            return view('welcome');
        }
    }
}
