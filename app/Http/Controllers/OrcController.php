<?php

namespace App\Http\Controllers;

use App\Models\Orc;
use App\Models\OrcInfo;
use Illuminate\Http\Request;

class OrcController extends Controller
{
    public function orcInfo(OrcInfo $orc)
    {
        $orc->load('orcs');
        return view('occupant', ['orc' => $orc]);
    }
}
