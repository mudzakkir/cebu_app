@extends('layouts.default')
@section('content')

<h1>ログイン</h1>

{{-- ログイン時にフラッシュメッセージを表示 --}}
@if(Session::has('success'))
	<div class="bg-info">
		<p>{{ Session::get('success') }}</p>
	</div>
@endif

{{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('email') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="email" class="col-sm-2 control-label">メールアドレス</label>
		<div class="col-sm-10">
			{{ Form::text('email',Input::old('email'), array('class' => 'form-control')) }}
		</div>
	</div>

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('password') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="password" class="col-sm-2 control-label">パスワード</label>
		<div class="col-sm-10">
			<input name="password" type="password" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">ログインする</button>
	</div>

{{ Form::close() }}

@stop