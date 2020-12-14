<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// 認証
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/*
		認証されたユーザーのモデルを取得する
	*/
	public function getLoginUser() {
		$result = Auth::user();

		if (!isset($result)) return abort(401, 'Unauthorized.');

		return $result;
	}
}
