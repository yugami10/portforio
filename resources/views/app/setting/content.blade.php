@extends('layouts.common')
@section('title', '本文の設定')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!-- bootstrapのcardクラスを利用する -->
			<div class="card">
				<div class="card-header">本文の設定</div>

				<div class="card-body">
					<form class="form-horizontal" method="POST" action"#">
						@csrf
{{-- 本文追加ボタン --}}
						<a class="btn btn-primary" href="{{ route('content.create') }}">本文追加</a>
{{-- 一覧表示 --}}
						<div class="form-group row">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">ユーザーID</th>
										<th scope="col">本文</th>
										<th scope="col">作成日時</th>
										<th scope="col">更新日時</th>
										<th scope="col">削除日時</th>
										<th scope="col">復元ボタン</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($contents as $content)
										<tr>
											@if ( $content->deleted_at )
												<td>{{ $content->id }}</td>
											@else
												<td><a href="{{ url('setting/content/' . $content->id)  }}">{{ $content->id }}</a></td>
											@endif
												<td>{{ $content->user_id }}</td>
												<td>{{ $content->content }}</td>
												<td>{{ $content->created_at }}</td>
												<td>{{ $content->updated_at }}</td>
												<td>{{ $content->deleted_at }}</td>
												<td>
											@if ( $content->deleted_at )
												<a class="btn btn-primary" href="{{ url('setting/content/' . $content->id . '/restore') }}">復元</a>
											@endif
												</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
