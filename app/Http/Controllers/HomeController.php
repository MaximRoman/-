<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!Session::get("theme")) {
            Session::put("theme", "light");
        }
        return view('index');
    }

    public function theme(Request $request){
        if (Session::get("theme") === "light") {
            Session::put("theme", "dark");
        } else {
            Session::put("theme", "light");
        }
        return redirect($request['local']);
    }
}
