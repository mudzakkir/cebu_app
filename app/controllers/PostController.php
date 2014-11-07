<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $posts = Post::orderBy('created_at')->paginate(10);
		// return View::make('posts.index')
		// 	->with('posts', $posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'title' => 'required',
			'content'=>'required',
			'category' => 'required',
			'area' => 'required',
		];

		$messages = array(
			'title.required' => 'タイトルを正しく入力してください。',
			'content.required' => '本文を正しく入力してください。',
			'category.required' => 'カテゴリーを選択してください。',
			'area.required' => '地域を選択してください。',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->passes()) {
			$post = new Post;
			$post->title = Input::get('title');
			$post->content = Input::get('content');
			$post->price = Input::get('price');
			$post->category = Input::get('category');
			$post->area = Input::get('area');
			$post->read_more = (strlen($post->content) > 120) ? substr($post->content, 0, 120) : $post->content;

			// 以下で画像のアップロード処理を行う
			// getClientOriginalName()：アップロードしたファイルのオリジナル名を取得します
			$fileName = Input::file('image')->getClientOriginalName();
			// getRealPath()：アップロードしたファイルのパスを取得します。
			$image = Image::make(Input::file('image')->getRealPath());
			// Auth::user()->nameのフォルダがあるかどうかを確認し、ない場合は新規作成する
			File::exists(public_path() . '/images/' . Auth::user()->name) or File::makeDirectory(public_path() . '/images/' . Auth::user()->name);
			// 画像をサーバーに保存する
			$image->save(public_path() . '/images/' . Auth::user()->name . '/' . $fileName);
			//DBにファイルパスを保存する
			$post->image = 'images/'. $fileName;

			$post->save();
			return Redirect::route('posts.create')
				->with('success', '投稿が完了しました。');
		}else{
			return Redirect::route('posts.create')
				->withErrors($validator)
				->withInput();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// 個別記事の情報を取得
		$post = Post::find($id);

		return View::make('posts.single')
			->with('post', $post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		$posts = Post::orderBy('created_at')->paginate(10);

		// アクセスしてきたユーザーがコンテンツの投稿者かどうか確認する
		if (Auth::id() == $post->author_id) {
			return View::make('posts.edit')
				->with('post', $post);
		}else{
			echo '不正なアクセスです。';
		}

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'title' => 'required',
			'content'=>'required',
			'category' => 'required',
			'area' => 'required',
		);

		$messages = array(
			'title.required' => 'タイトルを正しく入力してください。',
			'content.required' => '本文を正しく入力してください。',
			'category.required' => 'カテゴリーを選択してください。',
			'area.required' => '地域を選択してください。',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->passes()) {
			$post = Post::find($id);
			$post->title = Input::get('title');
			$post->content = Input::get('content');
			$post->price = Input::get('price');
			$post->category = Input::get('category');
			$post->area = Input::get('area');
			$post->save();
			return Redirect::back()->with('success', '投稿が更新されました');
		}else{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getSearch()
	{
		$query = Request::get('q');

		if ($query) {
			$posts = Post::where('title', 'LIKE', "%$query%")
					->orWhere('content', 'LIKE', "%$query%")
					->orderBy('created_at')
					->paginate(10);
		}else{
			$posts = Post::orderBy('created_at')->paginate(10);
		}

		return View::make('posts.index')
			->with('posts', $posts)
			->with('query', $query);
	}

}
