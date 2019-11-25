<?php

namespace App\Http\Controllers;

use App\Spear;
use Illuminate\Http\Request;

class SpearController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function gotcha(string $group, string $hash)
    {
        $spear = Spear::whereHash($hash)->get()->first();
        if (!$spear)
            dd('invalid hash');
        $spear->success = true;
        $spear->save();

        return redirect('https://login.microsoftonline.com/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = $this->loadViewData();
        $viewData['successful'] = Spear::successful();
        $viewData['spears'] = Spear::all();
        return view('pages.spear.index', $viewData);
    }

    public function captcha(string $hash){
        $spear = Spear::whereHash($hash)->first();
        if ($spear)
        {
            $spear->success = true;
            $spear->save();
        }

        return \redirect('https://login.microsoft.com/');
    }
}
