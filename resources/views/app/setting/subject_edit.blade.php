@extends('layouts.common')
@section('title', '件名の編集')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!--bootstrapのcardクラスを利用する-->
			<div class="card">
				<div class="card-header">件名の編集</div>

				<div class="card-body">
					<form class="form-horizontal" method="POST" action="{{ url('setting/subject/' . $subject->id) }}">
						@csrf
						@method('PUT')
{{-- 件名 --}}
						<div class="form-group row">
							<label class="col-md-2 control-label" id="subject_edit_label" for="subject_edit">件名</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="subject_edit" name="subject" value="{{ $subject->subject }}" autofocus>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">変更</button>
						<a class="btn btn-primary" href="{{ url('setting/subject/' . $subject->id) }}">戻る</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
