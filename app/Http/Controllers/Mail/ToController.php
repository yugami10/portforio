<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Repository
use App\Repositories\Mail\ToRepositoryInterface as ToRepository;

class ToController extends Controller
{
	private $ToRepo;

	/*
		コンストラクター
	*/
	public function __construct(
		ToRepository $ToRepo
	) {
		$this->ToRepo = $ToRepo;
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

		// 宛先モデルを全件取得
		$tos = $this->ToRepo->getAllWithTrashedByUserId($user->id)->paginate(2);

		// 画面の表示
		return view('app.setting.to', compact('tos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		// 追加画面の表示
		return view('app.setting.to_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// 宛先・宛先名を追加する
		$result = $this->ToRepo->create(['user_id' => $this->getLoginUser()->id, 'to' => $request->to_create, 'name' => $request->to_name_create]);

		if (!$result) {
			logger("toモデルの作成に失敗しました。user_id:{$this->getLoginUser()->id} | to:{$request->to_create} | name:{$request->name_create}");
		}

		return redirect()->route('to.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		// 1件のtoモデルを取得する
		$to = $this->ToRepo->getById($id);

		return view('app.setting.to_show', compact('to'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		// 1件のtoモデルを取得する。
		$to = $this->ToRepo->getById($id);

		return view('app.setting.to_edit', compact('to'));
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
		// 1件のtoモデルを更新する。
		$result = $this->ToRepo->updateById($id, $request->all());

		if (!$result) {
			logger("toモデルの更新に失敗しました。id:${id}");
		}

		return redirect()->route('to.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		// 1件のtoモデルを削除する。
		$result = $this->ToRepo->deleteById($id);

		if (!$result) {
			logger("toモデルの削除に失敗しました。id:${id}");
		}

		return redirect()->route('to.index');
    }

	/*
		復元処理
	*/
	public function restore($id)
	{
		// 1件のtoモデルを復元する。
		$result = $this->ToRepo->restoreById($id);

		if (!$result) {
			logger("toモデルの復元に失敗しました。id:${id}");
		}

		return redirect()->back();
	}
}
