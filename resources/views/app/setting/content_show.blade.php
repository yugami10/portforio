@extends('layouts.common')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!-- bootstrapのcardクラスを利用する -->
			<div class="card">
				<div class="card-header">本文の詳細</div>

				<div class="card-body">
{{-- 編集ボタン --}}
					<a class="btn btn-primary" href="{{ url('setting/content/' . $content->id . '/edit') }}">編集</a>
{{-- 削除ボタン --}}
					<form action="{{ route('content.destroy', $content->id) }}" method="post" style="display: inline-block">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">削除</button>
					</form>
{{-- 戻るボタン --}}
					<a class="btn btn-primary" href="{{ route('content.index') }}">戻る</a>
{{-- 一件表示 --}}
					<dl class="row">
						<dt class="col-md-3">ID</dt>
						<dd class="col-md-9">{{ $content->id }}</dd>
						<dt class="col-md-3">ユーザーID</dt>
						<dd class="col-md-9">{{ $content->user_id }}</dd>
						<dt class="col-md-3">本文</dt>
						<dd class="col-md-9">{{ $content->content }}</dd>
						<dt class="col-md-3">作成日時</dt>
						<dd class="col-md-9">{{ $content->created_at }}</dd>
						<dt class="col-md-3">更新日時</dt>
						<dd class="col-md-9">{{ $content->updated_at }}</dd>
						<dt class="col-md-3">削除日時</dt>
						<dd class="col-md-9">{{ $content->deleted_at }}</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
