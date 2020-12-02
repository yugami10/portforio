<?php
namespace App\Repositories\Player;

use App\Player;
use DB;
class PlayerRepository implements PlayerRepositoryInterface
{
	protected $model;

	public function __construct(Player $player) {
		$this->model = $player;
	}

	public function register($request) {
		DB::beginTransaction();
		$a = $this->model->fill($request->all())->save();
		DB::commit();
	}
}
