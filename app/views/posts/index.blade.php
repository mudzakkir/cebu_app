@extends('layouts.default')
@section('content')

<h1>投稿一覧ページ</h1>

@include('posts/search')

<div>
	@foreach($posts as $post)
		<h2>{{ $post->title }}</h2>
		<p>category{{ $post->category }}</p>
		<p>price：{{ $post->price }}</p>
		<p>area：{{ $post->area }}</p>
		<p>{{ $post->read_more }}</p>
		{{ link_to("/posts/{$post->id}", 'read more:)') }}
	@endforeach
</div>

<div class="paginate">
	{{ $posts->appends(Request::only('q'))->links() }}
</div>

@stop