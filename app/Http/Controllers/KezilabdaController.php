<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Csapat;

class KezilabdaController extends Controller
{
    public function index(){
        $utolso3 = Csapat::orderBy('cs_id','DESC')->limit(3)->get();
        return view('welcome',["utolso3" => $utolso3]);
    }
}
