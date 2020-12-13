<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// softdelete
use Illuminate\Database\Eloquent\SoftDeletes;

class MailContent extends Model
{
	use SoftDeletes;

	// 許可するカラム
	protected $fillable = ['user_id', 'content'];

	// バリデーションのルール
	protected $rules = [
		'user_id' => ['bail', 'required', 'integer'],
		'content' => ['bail', 'required', 'string'],
	];

	// バリデーションのルール取得
	public function validationRules() {
		return $this->rules;
	}
}
