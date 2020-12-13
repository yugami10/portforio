<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Repository
use App\Repositories\Mail\SubjectRepositoryInterface as SubjectRepository;

class SubjectController extends Controller
{
	private $SubjectRepo;

	/*
		復元処理
	*/
	public function __construct(
		SubjectRepository $SubjectRepo
	) {
		$this->SubjectRepo = $SubjectRepo;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		// ログインユーザー取得
		$user = $this->getLoginUser();

		// 件名モデルを全件取得
		$subjects = $this->SubjectRepo->getAllWithTrashedByUserId($user->id);

		// 画面の表示
		return view('app.setting.subject', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		// 追加画面の表示
		return view('app.setting.subject_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// 件名を追加する
		$result = $this->SubjectRepo->create(['user_id' => $this->getLoginUser()->id, 'subject' => $request->subject_create]);
		if (!$result) {
			logger("subjectモデルの作成に失敗しました。user_id:{$this->getLoginUser()->id} | subject:{$request->subject_create}");
		}

		return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		// 1件のsubjectモデルを取得する。
		$subject = $this->SubjectRepo->getById($id);

		return view('app.setting.subject_show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		// 1件のsubjectモデルを取得する。
		$subject = $this->SubjectRepo->getById($id);

		return view('app.setting.subject_edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		// 1件のsubjectモデルを更新する。
		$result = $this->SubjectRepo->updateById($id, $request->all());

		if (!$result) {
			logger("subjectモデルの更新に失敗しました。id:${id}");
		}

		return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 1件のsubjectモデルを削除する。※戻り値bool true or false
		$result = $this->SubjectRepo->deleteById($id);

		if (!$result) {
			logger("subjectモデルの削除に失敗しました。id:${id}");
		}

		return redirect()->route('subject.index');
    }

	/*
		復元処理
	*/
	public function restore($id)
	{
		// 1件のsubjectモデルを復元する。
		$result = $this->SubjectRepo->restoreById($id);

		if (!$result) {
			logger("subjectモデルの復元に失敗しました。id:${id}");
		}

		return redirect()->back();
	}
}
