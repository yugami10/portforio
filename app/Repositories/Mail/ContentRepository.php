<?php

namespace App\Repositories\Mail;

use App\MailContent;
use DB;

// バリデーション
use Validator;

class ContentRepository implements ContentRepositoryInterface
{
	/*
		ユーザーIDが一致するモデルを全件取得する
	*/
	public function getAllByUserId($user_id) {
		$result = MailContent::where('user_id', $user_id)->get();

		return $result;
	}

	/*
		削除済みを含めた、ユーザーIDが一致するモデルを全件取得する
	*/
	public function getAllWithTrashedByUserId($user_id) {
		$result = MailContent::where('user_id', $user_id)->withTrashed()->get();

		return $result;
	}

	/*
		作成処理
	*/
	public function create(Array $data) {
		$objMailContent = new MailContent();

		// バリデーション
		$validationRule = $objMailContent->validationRules();
		$validator = Validator::make($data, $validationRule);

		if ($validator->fails()) return false;

		// DB処理実行
		DB::beginTransaction();
		try {
			$result = MailContent::create($data);
			DB::commit();
		} catch(\Exception $e) {
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
			$result = MailContent::findOrFail($id);
		} catch (\Exception $e) {
			logger("Contentモデルの取得に失敗しました。id:${id}");
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			$result = false;
		}

		return $result;
	}

	/*
		更新処理
	*/
	public function updateById($id, Array $data) {
		$objMailContent = $this->getById($id);

		// モデルの取得確認
		if (!$objMailContent) return false;

		$objMailContent = $objMailContent->fill($data);
		$data = ['user_id' => $objMailContent->user_id, 'content' => $objMailContent->content];

		// バリデーション
		$validationRule = $objMailContent->validationRules();
		$validator = Validator::make($data, $validationRule);

		if ($validator->fails()) return false;

		// DB処理実行
		DB::beginTransaction();
		try {
			$result = $objMailContent->save();
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
		// idに一致するモデルを1件取得する
		$content = $this->getById($id);

		if (!$content) return false;

		$result = $content->delete();

		return $result;
	}

	/*
		復活処理
	*/
	public function restoreById($id) {
		// idに一致するモデルを1件取得する
		try {
			$objMailContent = MailContent::onlyTrashed()->findOrFail($id);
		} catch (\Exception $e) {
			logger("Contentモデルの取得に失敗しました。id:${id}");
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			return false;
		}

		$data = ['user_id' => $objMailContent->user_id, 'content' => $objMailContent->content];

		// バリデーション
		$validationRule = $objMailContent->validationRules();
		$validator = Validator::make($data, $validationRule);

		if ($validator->fails()) return false;

		// DB処理実行
		DB::beginTransaction();
		try {
			// 復活処理
			$result = $objMailContent->restore();
			DB::commit();
		} catch (\Exception $e) {
			DB::rollBack();
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			$result = false;
		}

		return $result;
	}
}
