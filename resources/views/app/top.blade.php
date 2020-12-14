@extends('layouts.common')
@section('title', 'test')
@section('content')


<div style="width: 800px; margin: 0 auto;">
	<h2>送信するメールの一覧</h2>
	@isset($mails)
	@foreach ($mails as $mail)
		<dl class="row" style="background-color: lightgoldenrodyellow;">
			<dt class="col-md-3" style="background-color: lightgray;">ユーザーID</dt>
			<dd class="col-md-9" style="background-color: lightgray; margin: 0;">{{ $mail->user_id }}</dd>
			<dt class="col-md-3">件名</dt>
			<dd class="col-md-9">{{ $mail->subject }}</dd>
			<dt class="col-md-3" style="background-color: lightgray;">宛先</dt>
			<dd class="col-md-9" style="background-color: lightgray; margin: 0;">{{ $mail->to }}</dd>
			<dt class="col-md-3">宛先の表示名</dt>
			<dd class="col-md-9">{{ $mail->name }}</dd>
			<dt class="col-md-3" style="background-color: lightgray;">本文</dt>
			<dd class="col-md-9" style="background-color: lightgray; margin: 0;">{{ $mail->content }}</dd>
			<dt class="col-md-3">毎日送信フラグ</dt>
			<dd class="col-md-9">{{ $mail->everyday_flag }}</dd>
			<dt class="col-md-3" style="background-color: lightgray;">毎週送信する曜日</dt>
			<dd class="col-md-9" style="background-color: lightgray; margin: 0;">{{ $mail->day_of_week }}</dd>
			<dt class="col-md-3">送信時間</dt>
			<dd class="col-md-9">{{ $mail->send_time }}</dd>
			<dt class="col-md-12"><a href="{{ url('send/' . $mail->id . '/delete') }}" class="btn btn-danger">削除</a></dt>
		</dl>
	@endforeach
	{{ $mails->links() }}
	@endisset
</div>

<div id="test" style="color: #F7B841; background-size: cover; background-image: url({{ asset('images/illustrain10-otokonoko04.png') }}); min-height: 100vh; alt: 'フリー素材の喜ぶ男の子のイラスト';">
	<h1 onmouseover="over()" onmouseout="out()" style="font-size: 150px; text-align: center;">ようこそ！
	</h1>
</div>


<script>
function over() {
	const image = "{{ asset('images/kazukihiro512103_TP_V.jpg') }}";
	document.getElementById('test').setAttribute('alt', '立ちすくむ怨念の女性の写真素材');
	document.getElementById('test').style.color = 'red';
	document.getElementById('test').style.backgroundImage = `url(${image})`;
}

function out() {
	const image = "{{ asset('images/illustrain10-otokonoko04.png') }}";
	document.getElementById('test').setAttribute('alt', 'フリー素材の喜ぶ男の子のイラスト');
	document.getElementById('test').style.color = '#F7B841';
	document.getElementById('test').style.backgroundImage = `url(${image})`;
}
</script>
@endsection
