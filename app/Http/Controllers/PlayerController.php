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

		return view('app.home');
	}

	public function login(Request $request) {
//dump($request->name);
//dd($request->password);
		//$a = Auth::loginUsingId(8);
		$model = Player::find(8);
		$a = Auth::login($model);

		return redirect()->route('home');
	}
}
