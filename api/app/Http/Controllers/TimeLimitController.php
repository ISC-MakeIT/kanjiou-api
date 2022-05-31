<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeLimitCreateRequst;
use App\Http\Requests\TimeLimitDeleteRequest;
use App\Http\Requests\TimeLimitRequest;
use App\Models\TimeLimit;

class TimeLimitController extends Controller
{
	public function find_one(TimeLimitRequest $request)
	{
		return ['rank' => TimeLimit::find_rank($request->seconds)];
	}
	public function find_all()
	{
		return TimeLimit::find_all();
	}
	public function time_limit_create(TimeLimitCreateRequst $request)
	{
		TimeLimit::create($request->time_limit_data());
	}
	public function time_limit_delete(TimeLimitDeleteRequest $request)
	{
        TimeLimit::to_delete($request->time_limit_id);
	}
}
