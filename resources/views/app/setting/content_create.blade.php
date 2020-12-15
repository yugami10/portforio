@extends('layouts.common')
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
								<textarea class="form-control" id="content_create" name="content_create" placeholder="(例) お疲れ様です。" rows="5" autofocus></textarea>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">追加</button>
						<a class="btn btn-primary" href="{{ url('setting/content') }}">戻る</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
