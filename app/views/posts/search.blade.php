<div class="search">
	{{ Form::open(['method' => 'GET']) }}
	{{ Form::input('検索する', 'q', Input::old('q', $query), array('placeholder'=>'キーワードで検索')) }}

	{{ Form::submit('Search depends on "Title and Contents', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
</div>