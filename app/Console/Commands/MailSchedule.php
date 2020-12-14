<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

// Model
use App\Mail;

// Service
use App\Services\MailService;

// Carbon
use Carbon\Carbon;

class MailSchedule extends Command
{
	private $MailService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SendMailSchedule';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
		MailService $MailService
	) {
        parent::__construct();

		$this->MailService = $MailService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		// メールを全件取得
		$objMails = new Mail();

		// 検索する曜日
		$weekdays = config('mail.day_of_week_list.const');
		$weekday = $weekdays[Carbon::now()->dayOfWeek];

		// 検索する時間
		// 検索対象の時間は herokuのタスクスケジュールの仕様が10分間隔のため10分後までとする
		$end_time = Carbon::now()->addMinutes(10)->format("h:i:") . "00";
		$start_time = Carbon::now()->format("h:i:") . "00";

		// 毎日送信にチェックが入っている。もしくは、曜日が今日である。
		$objMails = $objMails::where('everyday_flag', true)
			->orWhere('day_of_week', '=', $weekday);

		// 現在がメールモデルの該当日の時間か、carbonを使って確認する
		$objMails = $objMails->where('send_time', '>=' , $start_time)
			->where('send_time', '<=', $end_time);

		// 対象のモデルが見つかったら、メール送信
		$this->MailService->sendMail($objMails->get());

		// 処理終了
		return true;
    }

}
