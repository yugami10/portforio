<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Repository 
use App\Repositories\Mail\ContentRepositoryInterface as ContentRepository;

class ContentController extends Controller
{
	private $ContentRepo;

	/*
		コンストラクター
	*/
	public function __construct(
		ContentRepository $ContentRepo
	) {
		$this->ContentRepo = $ContentRepo;
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

		// 本文モデルを全件取得
		$contents = $this->ContentRepo->getAllWithTrashedByUserId($user->id);

		// 画面の表示
		return view('app.setting.content', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		// 追加画面の表示
		return view('app.setting.content_create');
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
		$result = $this->ContentRepo->create(['user_id' => $this->getLoginUser()->id, 'content' => $request->content_create]);

		if (!$result) {
			logger("contentモデルの作成に失敗しました。user_id:{$this->getLoginUser()->id} | content:{$request->content_create}");
		}

		return redirect()->route('content.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		// 1件のcontentモデルを取得する。
		$content = $this->ContentRepo->getById($id);

		return view('app.setting.content_show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		// 1件のcontentモデルを取得する。
		$content = $this->ContentRepo->getById($id);

		return view('app.setting.content_edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		// 1件のcontentモデルを更新する。
		$result = $this->ContentRepo->updateById($id, $request->all());

		if (!$result) {
			logger("contentモデルの更新に失敗しました。id:${id}");
		}

		return redirect()->route('content.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		// 1件のcontentモデルを削除する。
		$result = $this->ContentRepo->deleteById($id);

		if (!$result) {
			logger("contentモデルの削除に失敗しました。id:${id}");
		}

		return redirect()->route('content.index');
    }

	/*
		復元処理
	*/
	public function restore($id)
	{
		// 1件のcontentモデルを復元する。
		$result = $this->ContentRepo->restoreById($id);

		if (!$result) {
			logger("contentモデルの復元に失敗しました。id:${id}");
		}

		return redirect()->back();
	}
}
