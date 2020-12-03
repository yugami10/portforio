<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// email
use App\Mail\SendMail;
use Mail;

// service
use App\Services\MailService;

// auth
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	protected $MailService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
		MailService $MailService
	)
    {
        $this->middleware('auth');
		$this->MailService = $MailService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
		return view('app/send');
    }

	public function send(Request $request)
	{
		
		$to = [
			[
				//'email' => isset($request->free_radio_to) ? $request->free_text_to : $request->const_text_to,
				'email' => 'k.baba88engineer@gmail.com',
				'name' => 'Laravel',
				//'name' => isset($request->free_radio_to_name) ? $request->free_text_to_name : $request->const_text_to_name,
			]
		];
//dd($request->all());
// 毎日送信フラグ
// $request->check_everyday_send_flag;
// 曜日選択
// $request->select_day_of_week;
// 送信時間
// $request->input_send_time;
// dd(Auth::user());
		// 宛先のフォーマットにより取得する値を変更する
		$objSendMail = new SendMail();
		$objSendMail->subject = isset($request->free_radio_subject) ? $request->free_text_subject : $request->const_text_subject;
		$objSendMail->content = isset($request->free_radio_content) ? $request->free_text_content : $request->const_text_content;

		Mail::to($to)->send($objSendMail);
		return redirect()->route('send.index');
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('login');
	}
}
