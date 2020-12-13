@extends('layouts.common')
@section('title', '本文の設定')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!--bootstrapのcardクラスを利用する-->
			<div class="card">
				<div class="card-header">本文の作成</div>

				<div class="card-body">
					<form class="form-horizontal" method="POST" action="{{ route('content.store') }}">
						@csrf
{{-- 本文 --}}
						<div class="form-group row">
							<label class="col-md-2 control-label" id="content_create_label" for="content_create">本文</label>                            <div class="col-md-8">
								<input type="text" class="form-control" id="content_create" name="content_create" placeholder="(例) 日報" autofocus>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">追加</button>
						<button class="btn btn-primary" onclick="history.back()">戻る</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
