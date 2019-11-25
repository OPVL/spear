<?php

namespace App\Http\Controllers;

use App\TargetGroup;
use Illuminate\Http\Request;

class TargetGroupController extends BaseController
{
    public function show(TargetGroup $group){
        $viewdata = $this->loadViewData();

        $viewdata['spears'] = $group->spears()->where('success', true)->get();
        return view('pages.spear.index', $viewdata);
    }
}
