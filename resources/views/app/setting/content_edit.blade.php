@extends('layouts.common')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!--bootstrapのcardクラスを利用する-->
			<div class="card">
				<div class="card-header">本文の編集</div>

				<div class="card-body">
					<form class="form-horizontal" method="POST" action="{{ url('setting/content/' . $content->id) }}">
						@csrf
						@method('PUT')
{{-- 本文 --}}
						<div class="form-group row">
							<label class="col-md-2 control-label" id="content_edit_label" for="content_edit">本文</label>
							<div class="col-md-8">
								<textarea class="form-control" id="content_edit" name="content" rows="5" autofocus>{{ $content->content }}</textarea>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">変更</button>
						<a class="btn btn-primary" href="{{ url('setting/content/' . $content->id) }}">戻る</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
