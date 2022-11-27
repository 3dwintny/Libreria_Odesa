<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
<<<<<<< HEAD
    /**
=======
        /**
>>>>>>> 76422c3287087814d14d594c566fa8b024b323fd
     * Create a new controller instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct()
    {
        $this->middleware('auth');
    }
=======
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
>>>>>>> 76422c3287087814d14d594c566fa8b024b323fd

    /**
     * Show the application dashboard.
     *
<<<<<<< HEAD
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
=======
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.dashboard');
>>>>>>> 76422c3287087814d14d594c566fa8b024b323fd
    }
}
