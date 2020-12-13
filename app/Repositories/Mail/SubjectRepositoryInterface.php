<?php

namespace App\Repositories\Mail;

interface SubjectRepositoryInterface
{
	/*
		ユーザーIDが一致するモデルを全件取得する
	*/
	public function getAllByUserId($user_id);

	/*
		削除済みを含めた、ユーザーIDが一致するモデルを全件取>得する
	*/
	public function getAllWithTrashedByUserId($user_id);

	/*
		作成処理
	*/
	public function create(Array $data);

	/*
		1件のモデル取得処理
	*/
	public function getById($id);

	/*
		更新処理
	*/
	public function updateById($id, Array $data);

	/*
		削除処理
	*/
	public function deleteById($id);

	/*
		更新処理
	*/
	public function restoreById($id);
}
