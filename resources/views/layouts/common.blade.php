<html>
	<head>
		<!--タブに表示されるタイトル-->
		<title>タスクスケジュールによるメール自動送信</title>
		<!--bootstrapのcssを適用する-->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<!--bootstrapのdropdownを使用するために追加-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
			<div class="container">
				<!--アプリ名-->
				<a class="navbar-brand" href="{{ route('home') }}">メール自動送信アプリ</a>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!--ナビゲーションバーの左側-->
					<ul class="navbar-nav mr-auto">
						@auth
						<li class="nav-item">
							<a class="nav-link" href="{{ route('home') }}">送信メールの一覧画面</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('send.index') }}">メール文作成</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								設定
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('subject.index') }}">件名</a>
								<a class="dropdown-item" href="{{ route('to.index') }}">宛先</a>
								<a class="dropdown-item" href="{{ route('content.index') }}">本文</a>
							</div>
						</li>
						@endauth
					</ul>
					<!--ナビゲーションバーの右側-->
					<ul class="navbar-nav ml-auto">
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register_get') }}">ユーザー登録</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login_get') }}">ログイン</a>
						</li>
						@else
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}">ログアウト</a>
						</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>
		<!--ナビゲーションバーの下に表示させるメインコンテンツ(バーとの間隔を少々開ける)-->
		<main class="py-4">
			@auth
			@yield('content')
			@else
			@yield('login')
			@endauth
		</main>
	</body>
</html>
