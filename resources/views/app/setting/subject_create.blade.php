@extends('layouts.common')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!--bootstrapのcardクラスを利用する-->
			<div class="card">
				<div class="card-header">件名の作成</div>

				<div class="card-body">
					<form class="form-horizontal" method="POST" action="{{ route('subject.store') }}">
						@csrf
{{-- 件名 --}}
						<div class="form-group row">
							<label class="col-md-2 control-label" id="subject_create_label" for="subject_create">件名</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="subject_create" name="subject_create" placeholder="(例) 日報" autofocus>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">追加</button>
						<a class="btn btn-primary" href="{{ url('setting/subject') }}">戻る</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
