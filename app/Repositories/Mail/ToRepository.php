<?php

namespace App\Repositories\Mail;

use App\MailAddressTo;
use DB;

// バリデーション
use Validator;

class ToRepository implements ToRepositoryInterface
{
	/*
		ユーザーIDが一致するモデルを全件取得する
	*/
	public function getAllByUserId($user_id) {
		$result = MailAddressTo::where('user_id', $user_id)->get();

		return $result;
	}

	/*
		削除済みを含めた、ユーザーIDが一致するモデルを全件取得する
	*/
	public function getAllWithTrashedByUserId($user_id) {
		$result = MailAddressTo::where('user_id', $user_id)->withTrashed()->get();

		return $result;
	}

	/*
		作成処理
	*/
	public function create(Array $data) {
		$objMailAddressTo = new MailAddressTo();

		// バリデーション
		$validationRule = $objMailAddressTo->validationRules();
		$validator = Validator::make($data, $validationRule);

		if ($validator->fails()) return false;

		// DB処理実行
		DB::beginTransaction();
		try {
			$result = MailAddressTo::create($data);
			DB::commit();
		} catch (\Exception $e) {
			DB::rollBack();
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			$result = false;
		}

		return $result;
	}

	/*
		1件のモデル取得処理
	*/
	public function getById($id) {
		// idに一致するモデルを1件取得する
		try {
			$result = MailAddressTo::findOrFail($id);
		} catch (\Exception $e) {
			logger("MailAddressToモデルの取得に失敗しました。id:${id}");
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			$result = false;
		}

		return $result;
	}

	/*
		更新処理
	*/
	public function updateById($id, Array $data) {
		$objMailAddressTo = $this->getById($id);

		// モデルの取得確認
		if (!$objMailAddressTo) return false;

		$objMailAddressTo = $objMailAddressTo->fill($data);

		$data = ['user_id' => $objMailAddressTo->user_id, 'to' => $objMailAddressTo->to, 'name' => $objMailAddressTo->name];

		// バリデーション
		$validationRule = $objMailAddressTo->validationRules();
		$validator = Validator::make($data, $validationRule);

		if ($validator->fails()) return false;

		// DB処理実行
		DB::beginTransaction();
		try {
			$result = $objMailAddressTo->save();
			DB::commit();
		} catch (\Exception $e) {
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
		// idに一致するモデルを1件取得する
		$to = $this->getById($id);

		if (!$to) return false;

		$result = $to->delete();

		return $result;
	}

	/*
		復活処理
	*/
	public function restoreById($id) {
		// idに一致するモデルを1件取得する
		try {
			$objMailAddressTo = MailAddressTo::onlyTrashed()->findOrFail($id);
		} catch (\Exception $e) {
			logger("MailAddressToモデルの取得に失敗しました。id:${id}");
			logger()->erroe("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			return false;
		}

		$data = ['user_id' => $objMailAddressTo->user_id, 'to' => $objMailAddressTo->to, 'name' => $objMailAddressTo->name];

		// バリデーション
		$validationRule = $objMailAddressTo->validationRules();
		$validator = Validator::make($data, $validationRule);

		if ($validator->fails()) return false;

		// DB処理実行
		DB::beginTransaction();
		try {
			$result = $objMailAddressTo->restore();
			DB::commit();
		} catch (\Exception $e) {
			DB::rollBack();
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			$result = false;
		}

		return $result;
	}
}

