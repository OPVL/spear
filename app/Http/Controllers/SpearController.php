<?php

namespace App\Http\Controllers;

use App\Spear;
use Illuminate\Http\Request;

class SpearController extends Controller
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

    public function loadViewData()
    {
        $viewData = [];

        // Check for flash errors
        if (session('error')) {
            $viewData['error'] = session('error');
            $viewData['errorDetail'] = session('errorDetail');
        }

        // Check for logged on user
        if (session('userName')) {
            $viewData['userName'] = session('userName');
            $viewData['userEmail'] = session('userEmail');
        }

        return $viewData;
    }

    public function gotcha(string $group, string $hash)
    {
        $spear = Spear::whereHash($hash)->get()->first();
        if (!$spear)
            dd('invalid hash');
        $spear->success = true;
        $spear->save();

        return redirect('https://login.microsoft.com');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = $this->loadViewData();
        $viewData['spears'] = Spear::all();
        return view('pages.spear.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spear  $spear
     * @return \Illuminate\Http\Response
     */
    public function show(Spear $spear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spear  $spear
     * @return \Illuminate\Http\Response
     */
    public function edit(Spear $spear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spear  $spear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spear $spear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spear  $spear
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spear $spear)
    {
        //
    }
}
