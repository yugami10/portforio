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
		'everyday_flag'	=> ['bail', 'boolean'],
		'day_of_week'	=> ['bail', 'string'],
		'send_time'		=> ['bail', 'required', 'date_format:H:i'],
		'name'			=> ['bail', 'required', 'string'],
		'subject'		=> ['bail', 'required', 'string'],
	];

	// バリデーションのルール取得
	public function validationRules($data) {
		$rules = $this->rules;

		if (!($data['everyday_flag'])) {
			$rules['day_of_week'][] = 'required';
		}

		if (!($data['day_of_week'])) {
			$rules['everyday_flag'][] = 'required';
		}

		return $rules;
	}
}
