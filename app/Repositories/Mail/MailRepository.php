<?php
namespace App\Repositories\Mail;

use App\Mail;

class MailRepository implements MailRepositoryInterface
{
	protected $model;

	public function __construct(Mail $mail) {
		$this->model = $mail;
	}

	public function test() {
		return "test用の値";
	}
}
