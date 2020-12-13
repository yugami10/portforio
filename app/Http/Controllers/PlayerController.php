<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

// Repository
use App\Repositories\Player\PlayerRepositoryInterface as PlayerRepository;

// Auth
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class PlayerController extends Controller
{
	use AuthenticatesUsers;

	protected $PlayerRepo;

	public function __construct(
		PlayerRepository $PlayerRepo
	) {
		$this->PlayerRepo = $PlayerRepo;
	}

	public function register(Request $request) {
		$this->PlayerRepo->register($request);

		return view('app.top');
	}

	public function login(Request $request) {
		// リポジトリからユーザー情報を取得する
		$user = $this->PlayerRepo->getPlayerId($request->all());

		try {
			$login = Auth::login($user);
		} catch (\Exception $e) {
			logger()->error("ログインすることに失敗しました");
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");

			return redirect()->back();
		}

		return redirect()->route('home');
	}
}
