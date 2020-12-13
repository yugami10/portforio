@extends('layouts.common')
@section('title', '宛先の編集')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!--bootstrapのcardクラスを利用する-->
			<div class="card">
				<div class="card-header">宛先の編集</div>

				<div class="card-body">
					<form class="form-horizontal" method="POST" action="{{ url('setting/to/' . $to->id) }}">
						@csrf
						@method('PUT')
{{-- 宛先 --}}
						<div class="form-group row">
							<label class="col-md-2 control-label" id="to_edit_label" for="to_edit">宛先</label>
								<div class="col-md-8">
								<input type="text" class="form-control" id="to_edit" name="to" value="{{ $to->to }}" autofocus>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 control-label" id="to_name_edit_label" for="to_name_edit">宛先の表示名</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="to_name_edit" name="name" value="{{ $to->name }}">
							</div>
						</div>
						<button type="submit" class="btn btn-primary">変更</button>
						<a class="btn btn-primary" href="{{ url('setting/to/' . $to->id) }}">戻る</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
