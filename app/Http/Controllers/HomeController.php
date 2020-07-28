<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; //utilizando a biblioteca Carbon
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;//autenticação

class HomeController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('profile', compact('user'));
        
    }
}
