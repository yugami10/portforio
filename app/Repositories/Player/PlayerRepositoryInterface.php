<?php
namespace App\Repositories\Player;

interface PlayerRepositoryInterface
{
	public function register($request);

	/*
		nameカラムとpasswordカラムで対象のPlayerIdを検索する
	*/
	public function getPlayerId(Array $colum_items);
}
