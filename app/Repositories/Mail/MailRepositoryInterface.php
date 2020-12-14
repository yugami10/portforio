<?php
namespace App\Repositories\Mail;

interface MailRepositoryInterface
{
	/*
		ユーザーIDが一致するモデルを全件取得する
	*/
	public function getAllByUserId($id);

	/*
		作成処理
	*/
	public function create($id, Array $data);

	/*
		削除処理
	*/
	public function deleteById($id);

	/*
		1件のモデル取得処理
	*/
	public function getById($id);
}
