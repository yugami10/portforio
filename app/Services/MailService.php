<?php
namespace App\Services;

// Repository
use App\Repositories\Mail\MailRepositoryInterface as MailRepository;

class MailService
{
	protected $MailRepo;

	public function __construct(
		MailRepository $MailRepo
	) {
		$this->MailRepo = $MailRepo;
	}

	public function test() {
		return $this->MailRepo->test();
	}
}
