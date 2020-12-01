<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// email
use App\Mail\SendMail;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
}
