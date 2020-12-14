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
					<form class="form-horizontal" method="POST" action="{{ route('send.post') }}">
						@csrf
{{-- 件名 --}}
						<div class="form-group row">
{{-- テキストエリア --}}
							<label class="col-md-2 control-label" id="subject_label" for="subject_free">件名</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="subject_free" placeholder="(例) 本日の日報" name="free_text_subject">
								<select id="subject_const" name="const_text_subject" class="form-control" style="display: none;">
									@foreach ($subjects as $subject)
										<option>{{ $subject }}</option>
									@endforeach
                                </select>
							</div>
{{-- ラジオボタン --}}
							<div class="col-md-2">
								<input name="free_radio_subject" id="free_radio_subject" type="radio" onclick="freeRadioSubject(event)" checked>
								<label for="free_radio_subject">自由</label>
								<input name="const_radio_subject" id="const_radio_subject" type="radio" onclick="constRadioSubject(event)">
								<label for="const_radio_subject">定型</label>
							</div>
						</div>

{{-- 宛先(to) --}}
						<div class="form-group row">
{{-- テキストエリア --}}
							<label class="col-md-2 control-label" id="to_label" for="to_free">宛先(to)</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="to_free" placeholder="(例) hugahuga@gmail.com" name="free_text_to">
								<select id="to_const" name="const_text_to" class="form-control" style="display: none;">
									@foreach ($tos as $to)
										<option>{{ $to->to }}</option>
									@endforeach
								</select>
							</div>
{{-- ラジオボタン --}}
							<div class="col-md-2">
								<input name="free_radio_to" id="free_radio_to" type="radio" onclick="freeRadioTo(event)" checked>
								<label for="free_radio_to">自由</label>
								<input name="const_radio_to" id="const_radio_to" type="radio" onclick="constRadioTo(event)">
								<label for="const_radio_to">定型</label>
							</div>
{{-- 宛先の表示名 --}}
							<label class="col-md-2 contol-label" id="to_name_label" for="to_name_free">|_ 表示名</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="to_name_free" placeholder="(例) 勤怠" name="free_text_to_name">
								<select id="to_name_const" name="const_text_to_name" class="form-control" style="display: none;">
									@foreach ($tos as $to)
										<option>{{ $to->name }}</option>
									@endforeach
								</select>
{{--
								<input type="text" class="form-control" id="to_name_const" placeholder="dbの値" name="const_text_to_name" style="display: none">
--}}
							</div>
{{-- ラジオボタン --}}
							<div class="col-md-2">
								<input name="free_radio_to_name" id="free_radio_to_name" type="radio" onclick="freeRadioToName(event)" checked>
								<label for="free_radio_to_name">自由</label>
								<input name="const_radio_to_name" id="const_radio_to_name" type="radio" onclick="constRadioToName(event)">
								<label for="const_radio_to_name">固定</label>
							</div>
						</div>
{{-- 繰返し時間 --}}

						<div class="form-group row">
							<label class="col-md-2 control-label" for="timer">送信時間の設定</label>
{{-- 毎日送信フラグ --}}
							<div class="col-md-2 form-check">
								<div style="padding-left: 15px">
									<input class="form-check-input" type="checkbox"  id="check_everyday_send_flag" name="check_everyday_send_flag">
									<label class="form-check-label" for="check_everyday_send_flag">毎日送信</label>
								</div>
							</div>
{{-- 曜日選択フォーム --}}
							<div class="col-md-3 form-group row">
								<select id="select_day_of_week" name="select_day_of_week" class="form-control col-md-4" style="margin-right: 10px">
									@foreach ( config('mail.day_of_week_list.const') as $key => $value )
										<option>{{ $value }}</option>
									@endforeach
								</select>
								<label for="select_day_of_week">曜日のみ送信</label>
							</div>

{{-- 送信時間フォーム --}}
							<div class="offset-md-2 col-md-4 row">
								<input class="form-control" type="time" id="input_send_time" name="input_send_time" style="margin-right: 10px">
							</div>
							<label for="input_send_time">送信時間</label>
						</div>
{{-- 本文 --}}
						<div class="form-group row">
{{-- テキストエリア --}}
							<label class="col-md-2 control-label" for="content_free" id="content_label">本文</label>
							<div class="col-md-8">
								<textarea class="form-control" id="content_free" placeholder="(例) お疲れ様です。&#13;本日はいいお天気ですね。&#13;以上です。" rows="5" name="free_text_content"></textarea>

								<select id="content_const" name="const_text_content" class="form-control" style="display: none;">
									@foreach ($contents as $content)
										<option>{{ $content }}</option>
									@endforeach
								</select>
{{--
								<textarea class="form-control" id="content_const" placeholder="dbの値" rows="5" name="const_text_content" style="display: none;"></textarea>
--}}
							</div>

{{-- ラジオボタン --}}
							<div class="col-md-2">
								<input name="free_radio_content" id="free_radio_content" type="radio" onclick="freeRadioContent(event)" checked>
								<label for="free_radio_content">自由</label>
								<input name="const_radio_content" id="const_radio_content" type="radio" onclick="constRadioContent(event)">
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
