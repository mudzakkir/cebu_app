@extends('layouts.default')
@section('content')

<h1>投稿ページ</h1>

{{-- 投稿完了時にフラッシュメッセージを表示 --}}
@if(Session::has('success'))
	<div class="bg-info">
		<p>{{ Session::get('success') }}</p>
	</div>
@endif

{{ Form::open(['route' => 'posts.store', 'files' => true], array('class' => 'form-horizontal')) }}

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('title') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="title" class="col-sm-2 control-label">※タイトル</label>
		<div class="col-sm-10">
			<input name="title" type="text" class="form-control">
		</div>
	</div>

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('category') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="category" class="col-sm-2 control-label">※カテゴリー</label>
		<div class="col-sm-10">
			<select name="category" type="text" class="form-control">
				<option></option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('area') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="area" class="col-sm-2 control-label">※地域</label>
		<div class="col-sm-10">
			<select name="area" type="text" class="form-control">
				<option></option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('content') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="content" class="col-sm-2 control-label">※本文</label>
		<div class="col-sm-10">
			<textarea name="content" type="text" rows="5" class="form-control"></textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="price" class="col-sm-2 control-label">料金</label>
		<div class="col-sm-10">
			<input name="price" type="text" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label for="image" class="col-sm-2 control-label">画像</label>
		<div class="col-sm-10">
			<input name="image" type="file" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">投稿する</button>
	</div>

{{ Form::close() }}

@stop