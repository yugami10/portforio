@extends('layouts.common')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!--bootstrapのcardクラスを利用する-->
			<div class="card">
				<div class="card-header">宛先の作成</div>

				<div class="card-body">
					<form class="form-horizontal" method="POST" action="{{ route('to.store') }}">
						@csrf
{{-- 宛先 --}}
						<div class="form-group row">
							<label class="col-md-2 control-label" id="to_create_label" for="to_create">宛先</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="to_create" name="to_create" placeholder="(例) hoge@gmail.com" autofocus>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 control-label" id="to_name_create_label" for="to_name_create">宛先の表示名</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="to_name_create" name="to_name_create" placeholder="(例) 〇〇様">
							</div>
						</div>
						<button type="submit" class="btn btn-primary">追加</button>
						<a class="btn btn-primary" href="{{ url('setting/to') }}">戻る</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
