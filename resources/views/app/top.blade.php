@extends('layouts.common')
@section('title', 'test')
@section('content')

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
