@extends('layouts.default')
@section('content')

<h1>編集ページ</h1>

{{-- 投稿完了時にフラッシュメッセージを表示 --}}
@if(Session::has('success'))
	<div class="bg-info">
		<p>{{ Session::get('success') }}</p>
	</div>
@endif

{{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('title') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="title" class="col-sm-2 control-label">タイトル</label>
		<div class="col-sm-10">
			{{ Form::text('title', null, array('class' => 'form-control')) }}
		</div>
	</div>

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('category') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="category" class="col-sm-2 control-label">カテゴリー</label>
		<div class="col-sm-10">
			<select name="category" type="text" class="form-control">
				<option>{{ $post->category }}</option>
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
		<label for="area" class="col-sm-2 control-label">地域</label>
		<div class="col-sm-10">
			<select name="area" type="text" class="form-control">
				<option>{{ $post->area }}</option>
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
		<label for="content" class="col-sm-2 control-label">本文</label>
		<div class="col-sm-10">
			{{ Form::textarea('content', null, array('class' => 'form-control')) }}
		</div>
	</div>

	<div class="form-group">
		<label for="price" class="col-sm-2 control-label">料金</label>
		<div class="col-sm-10">
			{{ Form::text('price', null, array('class' => 'form-control')) }}
		</div>
	</div>

{{--
	<div class="form-group">
		<label for="image" class="col-sm-2 control-label">画像</label>
		<div class="col-sm-10">
			<input name="image" type="file" class="form-control">
		</div>
	</div>
--}}

	<div class="form-group">
		<button type="submit" class="btn btn-primary">変更する</button>
	</div>

{{ Form::close() }}

@stop