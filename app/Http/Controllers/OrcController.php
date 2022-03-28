<?php

namespace App\Http\Controllers;

use App\Models\Orc;

use App\Models\OrcInfo;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrcController extends Controller
{
    // Функция, отдающая страницу оккупанта
    public function orcInfo(OrcInfo $orc)
    {

        $orcs = OrcInfo::with('orcs')->orderBy('id')->get();
        $orcId = $orc->id;

        $orcIndex = $orcs->search(function ($orcItem) use ($orcId) {
            return $orcItem->id === $orcId;
        });

        $prevOrc = $orcIndex - 1 > -1 ? $orcs[$orcIndex - 1] : null;
        $nextOrc = $orcIndex + 1 < count($orcs) ? $orcs[$orcIndex + 1] : null;

        $orc->load('orcs');
        return view('occupant', ['orc' => $orc, 'prevOrc' => $prevOrc, 'nextOrc' => $nextOrc]);
    }

    // Вывод первого орка, которого нужно найти
    public function findOrcDoesntHaveData()
    {

        $orc = OrcInfo::doesntHave('orcs')->first();

        if ($orc === null) {
            return view('find-empty');
        }

        return redirect('occupant/item/' . $orc->id);
    }

    // Вывод первого орка, которому нужно написать
    public function findOrcDoesntHaveSend()
    {
        $orc = OrcInfo::where('is_checked', 0)->whereHas('orcs')->first();

        if ($orc === null) {
            return view('send-empty');
        }

        return redirect('occupant/item/' . $orc->id);
    }

    // Сохранение отметки, что орку написали
    public function ocrCheck(OrcInfo $orc)
    {
        $orc->is_checked = 1;
        $orc->save();
        return response()->json([
            'status' => 'OK'
        ]);
    }

    // Сохранение ссылок
    public function saveOrc(Request $request, OrcInfo $orc)
    {
        $request->validate([
            'data' => 'array',
            'data.*.link' => 'required|string',
            'data.*.net' => 'nullable|integer',
            'data.*.comment' => 'nullable|string'
        ]);

        $data = $request->data;

        foreach ($data as $key => $item) {
            $orcData = new Orc();
            $orcData->orc_id = $orc->id;
            $orcData->link = $item['link'];
            $orcData->net = $item['net'] ?? 0;
            $orcData->comment = $item['comment'] ?? '';
            $orcData->save();
        }

        return response()->json([
            'status' => 'OK'
        ]);
    }

    // Вывод списка с пагинацией
    public function orcList(Request $request)
    {
        // all  find  send
        $type = $request['type'];
        $skip = 0;
        $take = 100;

        if (!$request['type']) {
            $type = 'all';
        }

        if ($request['skip'] !== null) {
            $skip = $request['skip'];
        }

        $orcs;

        if ($type === 'all') {
            $orcs = OrcInfo::with('orcs');
        } else if ($type === 'find') {
            $orcs = OrcInfo::with('orcs')->doesntHave('orcs');
        } else if ($type === 'send') {
            $orcs = OrcInfo::with('orcs')->where('is_checked', 0)->whereHas('orcs');
        }

        $requestType = $type;

        $total = count($orcs->get());

        $orcs = $orcs->take($take);
        $orcs = $orcs->skip($skip);
        $orcs = $orcs->get();

        return view('index', ['orcs' => $orcs, 'total' => $total, 'skip' => $skip, 'type' => $type, 'requestType' => $requestType]);
    }
}
