<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Middleware;
use App\Http\Requests;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
