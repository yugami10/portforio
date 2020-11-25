<html>
	<head>
		<!--タブに表示されるタイトル-->
		<title>@yield('title')</title>
		<!--bootstrapのcssを適用する-->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
			<div class="container">
				<!--アプリ名-->
				<a class="navbar-brand">メール自動送信アプリ</a>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!--ナビゲーションバーの左側-->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="#">Home</a>
						</li>
					</ul>
					<!--ナビゲーションバーの右側-->
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="#">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!--ナビゲーションバーの下に表示させるメインコンテンツ(バーとの間隔を少々開ける)-->
		<main class="py-4">
			@yield('content')
		</main>
	</body>
</html>
