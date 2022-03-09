<?php

namespace App\Http\Controllers;

use App\Models\Orc;
use Illuminate\Http\Request;

class OrcController extends Controller
{
    public function orcInfo(Orc $orc)
    {
        $orc->load('info');
        return view('occupant', ['orc'=>$orc]);
    }

    public function test()
    {
        dd("AAAAAAAAA");
    }
}
