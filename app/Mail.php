<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
	// 許可するカラム
	protected $fillable = [
		'user_id',
		'to',
		'content',
		'everyday_flag',
		'day_of_week',
		'send_time',
		'name',
		'subject'
	];

	// バリデーションのルール
	protected $rules = [
		'user_id'		=> ['bail', 'required', 'integer'],
		'to'			=> ['bail', 'required', 'string'],
		'content'		=> ['bail', 'required', 'string'],
		'everyday_flag'	=> ['bail', 'required', 'boolean'],
		'day_of_week'	=> ['bail', 'required', 'string'],
		'send_time'		=> ['bail', 'required', 'date'],
		'name'			=> ['bail', 'required', 'string'],
		'subject'		=> ['bail', 'required', 'stromg'],
	];

	// バリデーションのルール取得
	public function validationRules() {
		return $this->rules;
	}
}
