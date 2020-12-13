<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// softdelete
use Illuminate\Database\Eloquent\SoftDeletes;

class MailSubject extends Model
{
	use SoftDeletes;

	// 許可するカラム
    protected $fillable = ['user_id', 'subject'];

	// バリデーションのルール
	protected $rules = [
		'user_id' => ['bail', 'required', 'integer'],
		'subject' => ['bail', 'required', 'string'],
	];

	// バリデーションのルール取得
	public function validationRules() {
		return $this->rules;
	}
}
