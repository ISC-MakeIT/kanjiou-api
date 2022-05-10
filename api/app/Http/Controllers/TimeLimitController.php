<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeLimitCreateRequst;
use App\Http\Requests\TimeLimitRequest;
use App\Models\TimeLimit;
use App\Models\TimeLimitRank;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TimeLimitController extends Controller
{
    public function find_one(TimeLimitRequest $request) {
        $rank = 1;
        $time_limit_ranks = TimeLimitRank::get()->toArray();
        foreach ($time_limit_ranks as $index => $time_limit_rank) {
            if ($time_limit_rank['seconds'] == $request->seconds || $time_limit_rank['seconds'] < $request->seconds) {
                return $time_limit_rank['rank'];
            }
            if ($time_limit_rank['seconds'] > $request->seconds) {
                $rank = $index == 99 ? throw new ModelNotFoundException() : $time_limit_rank['rank'];
                continue;
            }
        }
        return $rank;
    }
    public function find_all() {
        $ranks = TimeLimitRank::get()->toArray();
        if (!$ranks) throw new ModelNotFoundException();
        return $ranks;
    }
    public function time_limit_create(TimeLimitCreateRequst $request) {
        TimeLimit::create($request->time_limit_data());
    }
    public function time_limit_delete() {
    }
}
