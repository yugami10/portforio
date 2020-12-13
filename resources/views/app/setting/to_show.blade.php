@extends('layouts.common')
@section('title', '宛先の詳細')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!-- bootstrapのcardクラスを利用する -->
			<div class="card">
				<div class="card-header">宛先の詳細</div>

				<div class="card-body">
{{-- 編集ボタン --}}
					<a class="btn btn-primary" href="{{ url('setting/to/' . $to->id . '/edit') }}">編集</a>
{{-- 削除ボタン --}}
					<form action="{{ route('to.destroy', $to->id) }}" method="post" style="display: inline-block">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">削除</button>
					</form>
{{-- 戻るボタン --}}
					<a class="btn btn-primary" href="{{ route('to.index') }}">戻る</a>
{{-- 一件表示 --}}
					<dl class="row">
						<dt class="col-md-3">ID</dt>
						<dd class="col-md-9">{{ $to->id }}</dd>
						<dt class="col-md-3">ユーザーID</dt>
						<dd class="col-md-9">{{ $to->user_id }}</dd>
						<dt class="col-md-3">宛先</dt>
						<dd class="col-md-9">{{ $to->to }}</dd>
						<dt class="col-md-3">宛先の表示名</dt>
						<dd class="col-md-9">{{ $to->name }}</dd>
						<dt class="col-md-3">作成日時</dt>
						<dd class="col-md-9">{{ $to->created_at }}</dd>
						<dt class="col-md-3">更新日時</dt>
						<dd class="col-md-9">{{ $to->updated_at }}</dd>
						<dt class="col-md-3">削除日時</dt>
						<dd class="col-md-9">{{ $to->deleted_at }}</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</div>
   
@endsection
