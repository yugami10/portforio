<?php
namespace App\Services;

// email
use App\Mail\SendMail;
use Mail;

// Repository
use App\Repositories\Mail\MailRepositoryInterface as MailRepository;

// Carbon
use Carbon\Carbon;

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

	public function sendMail($objMails) {
		// 送信するメールの数だけ繰り返す
		foreach ($objMails as $objMail) {
			$value = Carbon::parse(Carbon::today()->format("Y-m-d ") . $objMail->send_time);
			$now_less_send_time = Carbon::now()->lte($value);
			$now_more_send_time = Carbon::now()->addMinutes(10)->gte($value);

			// herokuの条件に合わせる(タイムスケジュールが10分間隔で実行のこと)
			if ($now_less_send_time && $now_more_send_time) {
				$to = [
					[
						'email' => $objMail->to,
						'name' => $objMail->name,
					]
				];


				// 宛先のフォーマットにより取得する値を変更する
				$objSendMail = new SendMail();
				$objSendMail->subject = $objMail->subject;
				$objSendMail->content = $objMail->content;

				Mail::to($to)->send($objSendMail);
			}
		}

		return true;
	}
}
