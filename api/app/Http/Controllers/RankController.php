<?php

namespace App\Http\Controllers;

use App\Http\Requests\RankedRegisterRequst;
use Illuminate\Http\Request;
use App\Http\Requests\RankedRequest;
use App\Models\Rank;

class RankController extends Controller
{
    function ranked(RankedRequest $request) {
        $rank = Rank::where("seconds", "<", $request->seconds)->count() + 1;
        $res = ["is_ranked" => $rank <= 100];
        if ($rank <= 100) {
            $res += ["rank" => $rank];
        }
        return response($res, 200);
    }
    function register(RankedRegisterRequst $request) {
        $rank = new Rank();
        $rank->fill($request->get_data());
        $rank->save();
        return response(true, 200);
    }
    function ranks() {
        return Rank::orderBy("seconds", "asc")->get();
    }
}
