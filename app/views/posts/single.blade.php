@extends('layouts.default')
@section('content')

<h1>{{ $post->title }}</h1>

<p>料金：{{ $post->price }}</p>
<p>カテゴリー：{{ $post->category }}</p>
<p>地域：{{ $post->area }}</p>

{{ HTML::image($post->image, $post->title, array('width' => '30%')) }}
<p>{{ $post->content }}</p>

{{-- コンテンツの投稿者には編集ボタンを表示する --}}
@if(Auth::id() == $post->author_id)
	{{ link_to("/posts/{$post->id}/edit", '投稿を編集する') }}
@endif

<hr />

@include('contact/create')

@stop