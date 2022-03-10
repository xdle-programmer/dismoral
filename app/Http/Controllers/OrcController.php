<?php

namespace App\Http\Controllers;

use App\Models\Orc;

use App\Models\OrcInfo;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrcController extends Controller
{
    public function orcInfo(OrcInfo $orc)
    {
        $orc->load('orcs');
        return view('occupant', ['orc' => $orc]);
    }

    public function findOrcDoesntHaveData()
    {
        $orc =  OrcInfo::doesntHave('orcs')->first();
        return view('occupant', ['orc' => $orc]);
    }

    public function saveOrc(Request $request, OrcInfo $orc)
    {
        $request->validate([
            'data' => 'array',
            'data.*.link' => 'nullable|string',
            'data.*.net' => 'nullable|integer',
            'data.*.comment' => 'nullable|string'
        ]);

        $data = $request->data;

        foreach ($data as $key => $item){
            $orcData = new Orc();
            $orcData->orc_id  = $orc->id;
            $orcData->link = $item['link'];
            $orcData->net = $item['net'];
            $orcData->comment = $item['comment'] ?? '';
            $orcData->save();
        }

        return response()->json([
            'status' => 'OK'
        ]);
    }
}
