<?php
namespace App\Repositories\Mail;

use App\Mail;
use DB;

// バリデーション
use Validator;

class MailRepository implements MailRepositoryInterface
{
	/*
		ユーザーIDが一致するモデルを全件取得する
	*/
	public function getAllByUserId($id) {
		$result = Mail::where('user_id', $id);

		return $result;
	}

	/*
		作成処理
	*/
	public function create($id, Array $data) {
		$objMail = new Mail();

		// 保存する値の作成
		$objMail = $objMail->fill($data);
		$objMail->subject = isset($data['free_radio_subject']) ? $data['free_text_subject'] : $data['const_text_subject'];
		$objMail->content = isset($data['free_radio_content']) ? $data['free_text_content'] : $data['const_text_content'];
		$objMail->to = isset($data['free_radio_to']) ? $data['free_text_to'] : $data['const_text_to'];
		$objMail->name = isset($data['free_radio_to_name']) ? $data['free_text_to_name'] : $data['const_text_to_name'];
		$objMail->everyday_flag = isset($data['everyday_flag']) ? true : false;
		$objMail->user_id = $id;

		$mailArr = $objMail->toArray();

		// バリデーション
		$validationRule = $objMail->validationRules($mailArr);
		$validator = Validator::make($mailArr, $validationRule);

		if ($validator->fails()) return false;

		// DB処理実行
		DB::beginTransaction();
		try {
			$result = Mail::create($mailArr);
			DB::commit();
		} catch(\Exception $e) {
			DB::rollBack();
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			$result = false;
		}

		return $result;
	}

	/*
		削除処理
	*/
	public function deleteById($id) {
		$objMail = $this->getById($id);

		if (!$objMail) return false;

		$result = $objMail->delete();

		return $result;
	}

	/*
		1件のモデル取得処理
	*/
	public function getById($id) {
		try {
			$result = Mail::findOrFail($id);
		} catch(\Exception $e) {
			logger("Mailモデルの取得に失敗しました。id:${id}");
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			$result = false;
		}

		return $result;
	}
}
