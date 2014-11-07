<?php

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// 投稿者のauthor_idを取得
		// author_idを使ってUsreテーブルを検索する
		// author_id = Usre id のものを取得
		// emailを出力する

        $input = Input::only("name", "email", "body");
		$rules = [
			'name' => 'required',
			'email' => 'required|email',
			'body' => 'required',
		];

		$messages = array(
			'name.required' => '名前を入力してください。',
			'email.required' => 'メールアドレスを正しく入力してください。',
			'body.required' => 'メッセージを入力してください。',
		);
		$validator = Validator::make($input, $rules, $messages);

		if ($validator->passes()) {
            $contact = ContactService::create($input);
            $data['contact'] = $contact;
			Mail::send('contact.thanks',$data, function($message) use ($contact) {
				$message->to($contact->email, $contact->name)
						->subject('メールの件名');
				});
			return View::make('contact.thanks', $data);
		}else{
			return Redirect::to(URL::previous())->withErrors($validator)->withInput();
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
}
