<h1>Contact</h1>

{{-- 投稿完了時にフラッシュメッセージを表示 --}}
@if(Session::has('success'))
	<div class="bg-info">
		<p>{{ Session::get('success') }}</p>
	</div>
@endif

{{ Form::open(['route' => 'contacts.store'], array('class' => 'form-horizontal')) }}

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('name') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="name" class="col-sm-2 control-label">※名前</label>
		<div class="col-sm-10">
			<input name="name" type="text" class="form-control">
		</div>
	</div>

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('email') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="email" class="col-sm-2 control-label">※メールアドレス</label>
		<div class="col-sm-10">
			<input name="email" type="text" class="form-control">
		</div>
	</div>

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('body') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="body" class="col-sm-2 control-label">※本文</label>
		<div class="col-sm-10">
			<textarea name="body" type="text" rows="5" class="form-control"></textarea>
		</div>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Contact</button>
	</div>

{{ Form::close() }}
