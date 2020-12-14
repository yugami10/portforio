<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// email
use App\Mail\SendMail;
use Mail;

// service
use App\Services\MailService;

// repository
use App\Repositories\Mail\SubjectRepositoryInterface as SubjectRepository;
use App\Repositories\Mail\ToRepositoryInterface as ToRepository;
use App\Repositories\Mail\ContentRepositoryInterface as ContentRepository;
use App\Repositories\Mail\MailRepositoryInterface as MailRepository;

// auth
use Illuminate\Support\Facades\Auth;

class SendController extends Controller
{
	protected $MailService;
	protected $SubjectRepo;
	protected $ToRepo;
	protected $ContentRepo;
	protected $MailRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
		MailService $MailService,
		SubjectRepository $SubjectRepo,
		ToRepository $ToRepo,
		ContentRepository $ContentRepo,
		MailRepository $MailRepo
	)
    {
        $this->middleware('auth');
		$this->MailService = $MailService;
		$this->SubjectRepo = $SubjectRepo;
		$this->ToRepo = $ToRepo;
		$this->ContentRepo = $ContentRepo;
		$this->MailRepo = $MailRepo;
    }

	public function index()
	{
		// ログインユーザー取得
		$user = $this->getLoginUser();

		// 全部取得
		$mails = $this->MailRepo->getAllByUserId($user->id)->paginate(2);

		// ビューの表示
		return view('app.top', compact('mails'));
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        //return view('home');
		$user = $this->getLoginUser();

		// ログインユーザーが登録したメールの設定モデルを全件取得する。
		$subjects = $this->SubjectRepo->getAllByUserId($user->id)->pluck('subject');
		$tos = $this->ToRepo->getAllByUserId($user->id);
		$contents = $this->ContentRepo->getAllByUserId($user->id)->pluck('content');

		return view('app/send', compact('subjects', 'tos', 'contents'));
    }

	public function store(Request $request)
	{
		
		$to = [
			[
				//'email' => isset($request->free_radio_to) ? $request->free_text_to : $request->const_text_to,
				'email' => 'k.baba88engineer@gmail.com',
				'name' => 'Laravel',
				//'name' => isset($request->free_radio_to_name) ? $request->free_text_to_name : $request->const_text_to_name,
			]
		];
// dd($request->all());
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

		// ログインユーザー取得
		$user = $this->getLoginUser();

		// リポジトリで、保存する処理を実行する。
		$this->MailRepo->create($user->id, $request->all());

		Mail::to($to)->send($objSendMail);
		return redirect()->route('send.index');
	}

	public function destroy($id)
	{
		// 1件のモデルを削除する
		$result = $this->MailRepo->deleteById($id);

		if (!$result) {
			logger("Mailモデルの削除に失敗しました。id:${id}");
		}

		return redirect()->back();
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('login');
	}
}
