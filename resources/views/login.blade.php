@extends('layouts.common')
@section('title', 'ログイン')
@section('login')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!--bootstrapのcardクラス-->
			<div class="card">
				<div class="card-header">ログイン</div>

				<div class="card-body">
					<form class="form-horizontal" method="POST" action="{{ route('login_post') }}">
						@csrf
						<div class="form-group row">
							<label class="col-md-2 control-label" for="name">名前</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="name" placeholder="(例) 山本太郎" name="name" autofocus>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-2 control-label" for="password">パスワード</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="password" name="password">
							</div>
						</div>

						<div class="text-center">
							<button type="submit" class="btn btn-primary">ログイン</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

