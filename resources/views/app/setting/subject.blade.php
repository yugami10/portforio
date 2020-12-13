@extends('layouts.common')
@section('title', '件名の設定')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!-- bootstrapのcardクラスを利用する -->
			<div class="card">
				<div class="card-header">件名の設定</div>

				<div class="card-body">
					<form class="form-horizontal" method="POST" action"#">
						@csrf
{{-- 件名追加ボタン --}}
						<a class="btn btn-primary" href="{{ route('subject.create') }}">件名追加</a>
{{-- 一覧表示 --}}
						<div class="form-group row">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">ユーザーID</th>
										<th scope="col">件名</th>
										<th scope="col">作成日時</th>
										<th scope="col">更新日時</th>
										<th scope="col">削除日時</th>
										<th scope="col">復元ボタン</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($subjects as $subject)
										<tr>
											@if ( $subject->deleted_at )
												<td>{{ $subject->id }}</td>
											@else
												<td><a href="{{ url('setting/subject/' . $subject->id)  }}">{{ $subject->id }}</a></td>
											@endif
												<td>{{ $subject->user_id }}</td>
												<td>{{ $subject->subject }}</td>
												<td>{{ $subject->created_at }}</td>
												<td>{{ $subject->updated_at }}</td>
												<td>{{ $subject->deleted_at }}</td>
												<td>
											@if ( $subject->deleted_at )
												<a class="btn btn-primary" href="{{ url('setting/subject/' . $subject->id . '/restore') }}">復元</a>
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
