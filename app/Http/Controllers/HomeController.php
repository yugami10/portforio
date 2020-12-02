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
/*
		dump($request->from);
		dump($request->to);
		dump($request->content);
		dd($request);
*/
		$to = [
			[
				'email' => 'k.baba88engineer@gmail.com',
				'name' => 'Test',
			]
		];

		Mail::to($to)->send(new SendMail());

		return view('app/home');
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('login');
	}
}
