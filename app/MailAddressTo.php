<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// softdelete
use Illuminate\Database\Eloquent\SoftDeletes;

class MailAddressTo extends Model
{
	use SoftDeletes;

	// 許可するカラム
	protected $fillable = ['user_id', 'to', 'name'];

	// バリデーションのルール
	protected $rules = [
		'user_id' => ['bail', 'required', 'integer'],
		'to' => ['bail', 'required', 'string'],
		'name' => ['bail', 'required', 'string'],
	];

	// バリデーションのルール取得
	public function validationRules() {
		return $this->rules;
	}
}
