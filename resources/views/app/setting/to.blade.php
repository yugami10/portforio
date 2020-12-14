@extends('layouts.common')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!-- bootstrapのcardクラスを利用する -->
			<div class="card">
				<div class="card-header">宛先の設定</div>

				<div class="card-body">
					<form class="form-horizontal" method="POST" action"#">
						@csrf
{{-- 宛先追加ボタン --}}
						<a class="btn btn-primary" href="{{ route('to.create') }}">宛先追加</a>
{{-- 一覧表示 --}}
						<div class="form-group row">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">ユーザーID</th>
										<th scope="col">宛先</th>
										<th scope="col">宛先名</th>
										<th scope="col">作成日時</th>
										<th scope="col">更新日時</th>
										<th scope="col">削除日時</th>
										<th scope="col">復元ボタン</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($tos as $to)
										<tr>
											@if ( $to->deleted_at )
												<td>{{ $to->id }}</td>
											@else
												<td><a href="{{ url('setting/to/' . $to->id)  }}">{{ $to->id }}</a></td>
											@endif
												<td>{{ $to->user_id }}</td>
												<td>{{ $to->to }}</td>
												<td>{{ $to->name }}</td>
												<td>{{ $to->created_at }}</td>
												<td>{{ $to->updated_at }}</td>
												<td>{{ $to->deleted_at }}</td>
												<td>
											@if ( $to->deleted_at )
												<a class="btn btn-primary" href="{{ url('setting/to/' . $to->id . '/restore') }}">復元</a>
											@endif
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							{{ $tos->links() }}
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
