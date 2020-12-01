@extends('layouts.common')
@section('title', 'test')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!--bootstrapのcardクラスを利用する-->
			<div class="card">
				<div class="card-header">送信フォーム</div>

				<div class="card-body">
					<form class="form-horizontal" method="POST" action="{{ route('home.send') }}">
						@csrf
						<div class="form-group row">
							<label class="col-md-2 control-label" for="from">差出人(from)</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="from" placeholder="(例) hogehoge@gmail.com" name="from" autofocus></input>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-2 control-label" for="to">宛先(to)</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="to" placeholder="(例) hugahuga@gmail.com" name="to">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-2 control-label" for="content">本文</label>
							<div class="col-md-8">
								<textarea class="form-control" id="content" placeholder="(例) お疲れ様です。&#13;本日はいいお天気ですね。&#13;以上です。" rows="5" name="content"></textarea>
							</div>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-primary">送信</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
