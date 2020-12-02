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
		return view('app/home');
    }

	public function send(Request $request)
	{
		
		$to = [
			[
				// 'email' => isset($request->free_radio_to) ? $request->free_text_to : $request->const_text_to,
				'email' => 'k.baba88engineer@gmail.com',
				'name' => 'Laravel',
			]
		];

		// 宛先のフォーマットにより取得する値を変更する
		$objSendMail = new SendMail();

		$objSendMail->subject = "用意していなかった。。。";
		$objSendMail->content = isset($request->free_radio_content) ? $request->free_text_content : $request->const_text_content;

		Mail::to($to)->send($objSendMail);
		return redirect()->route('home');
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('login');
	}
}
