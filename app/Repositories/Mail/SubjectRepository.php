<?php

namespace App\Repositories\Mail;

use App\MailSubject;
use DB;

// バリデーション
use Validator;

class SubjectRepository implements SubjectRepositoryInterface
{
	/*
		ユーザーIDが一致するモデルを全件取得する
	*/
	public function getAllByUserId($user_id) {
		$result = MailSubject::where('user_id', $user_id)->get();

		return $result;
	}

	/*
		削除済みを含めた、ユーザーIDが一致するモデルを全件取得する
	*/
	public function getAllWithTrashedByUserId($user_id) {
		$result = MailSubject::where('user_id', $user_id)->withTrashed();

		return $result;
	}

	/*
		作成処理
	*/
	public function create(Array $data) {
		$objMailSubject = new MailSubject();

		// バリデーション
		$validationRule = $objMailSubject->validationRules();
		$validator = Validator::make($data, $validationRule);

		if ($validator->fails()) return false;

		// DB処理実行
		DB::beginTransaction();
		try {
			$result = MailSubject::create($data);
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
			$result = MailSubject::findOrFail($id);
		} catch (\Exception $e) {
			logger("Subjectモデルの取得に失敗しました。id:${id}");
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			$result = false;
		}

		return $result;
	}

	/*
		更新処理
	*/
	public function updateById($id, Array $data) {
		$objMailSubject = $this->getById($id);

		// モデルの取得確認
		if (!$objMailSubject) return false;

		$objMailSubject = $objMailSubject->fill($data);
		$data = ['user_id' => $objMailSubject->user_id, 'subject' => $objMailSubject->subject];

		// バリデーション
		$validationRule = $objMailSubject->validationRules();
		$validator = Validator::make($data, $validationRule);

		if ($validator->fails()) return false;

		// DB処理実行
		DB::beginTransaction();
		try {
			$result = $objMailSubject->save();
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
		$subject = $this->getById($id);

		if (!$subject) return false;

		$result = $subject->delete();

		return $result;
	}

	/*
		復活処理
	*/
	public function restoreById($id) {
		// idに一致するモデルを1件取得する
		try {
			$objMailSubject = MailSubject::onlyTrashed()->findOrFail($id);
		} catch (\Exception $e) {
			logger("Subjectモデルの取得に失敗しました。id:${id}");
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			return false;
		}

		$data = ['user_id' => $objMailSubject->user_id, 'subject' => $objMailSubject->subject];

		// バリデーション
		$validationRule = $objMailSubject->validationRules();
		$validator = Validator::make($data, $validationRule);

		if ($validator->fails()) return false;

		// DB処理実行
		DB::beginTransaction();
		try {
			// 復活処理
			$result = $objMailSubject->restore();
			DB::commit();
		} catch (\Exception $e) {
			DB::rollBack();
			logger()->error("{$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
			$result = false;
		}

		return $result;
	}
}
