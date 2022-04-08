<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CatchScore;


class Register extends Controller
{
    // データを受け取る関数
    public function CatchData(Request $request)
    {
        $Score = CatchScore::create([
            'name' => $request->input('name'),
            'score' => $request->input('score'), 
        ]);
        
        return response()->json($Score);

    }

    // データの確認
    public function AllView(Request $request)
    {
        $data = CatchScore::all();
        return response()->json($data);
    } 



    public function Index(Request $request)
    {
        return response('ok', 200);
    }


}








