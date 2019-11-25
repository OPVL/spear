<?php

namespace App\Http\Controllers;

use App\TargetGroup;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $viewdata = $this->loadViewData();

        $viewdata['groups'] = TargetGroup::all();
        return view('home', $viewdata);
    }
}
