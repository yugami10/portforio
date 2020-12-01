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
{{-- 宛先(to) --}}
						<div class="form-group row">
{{-- テキストエリア --}}
							<label class="col-md-2 control-label" for="to">宛先(to)</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="to_free" placeholder="(例) hugahuga@gmail.com" name="to_radio">
								<input type="text" class="form-control" id="to_const" placeholder="dbの値" name="to_radio" style="display: none;">
							</div>
{{-- ラジオボタン --}}
							<div class="col-md-2">
								<input name="to_radio" id="free_radio_to" type="radio" onclick="mailFormatTo(event)" checked>
								<label for="free_radio_to">自由</label>
								<input name="to_radio" id="const_radio_const" type="radio" onclick="mailFormatTo(event)">
								<label for="const_radio_const">定型</label>
							</div>
						</div>


{{-- 繰返し時間 --}}

						<div class="form-group row">
							<label class="col-md-2 control-label" for="timer">送信時間の設定</label>
{{-- 毎日送信フラグ --}}
							<div class="col-md-2 form-check">
								<div style="padding-left: 15px">
									<input class="form-check-input" type="checkbox"  id="check_everyday_send_flag">
									<label class="form-check-label" for="check_everyday_send_flag">毎日送信</label>
								</div>
							</div>
{{-- 曜日選択フォーム --}}
							<div class="col-md-3 form-group row">
								<select id="select_day_of_week" class="form-control col-md-4" style="margin-right: 10px">
									<option>A</option>
									<option>B</option>
								</select>
								<label for="select_day_of_week">曜日のみ送信</label>
							</div>

{{-- 送信時間フォーム --}}
							<div class="offset-md-2 col-md-4 row">
								<input class="form-control" type="time" id="input_send_time" style="margin-right: 10px">
							</div>
							<label for="input_send_time">送信時間</label>
						</div>
{{-- 本文 --}}
						<div class="form-group row">
{{-- テキストエリア --}}
							<label class="col-md-2 control-label" for="content">本文</label>
							<div class="col-md-8">
								<textarea class="form-control" id="content_free" placeholder="(例) お疲れ様です。&#13;本日はいいお天気ですね。&#13;以上です。" rows="5" name="content_radio"></textarea>
								<textarea class="form-control" id="content_const" placeholder="dbの値" rows="5" name="content_radio" style="display: none;"></textarea>
							</div>

{{-- ラジオボタン --}}
							<div class="col-md-2">
								<input name="content_radio" id="free_radio_content" type="radio" onclick="mailFormatContent(event)" checked>
								<label for="free_radio_content">自由</label>
								<input name="content_radio" id="const_radio_content" type="radio" onclick="mailFormatContent(event)">
								<label for="const_radio_content">定型</label>
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
<script src="{{ asset('/js/mail.js') }}"></script>
@endsection
