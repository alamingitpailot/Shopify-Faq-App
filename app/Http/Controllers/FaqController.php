<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function groupIndex()
    {
        return view('group.index');
    }

    public function groupStore(Request $request)
    {
        return view('group.store');

    }
}
