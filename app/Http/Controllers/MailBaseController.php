<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MailBaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/*
		ログインユーザー取得
	*/
	protected function _getLoginUser() {
		$user = Auth::user();
		if (!is_null($user)) return $user;
	}
}
