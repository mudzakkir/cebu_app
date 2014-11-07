<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
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
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = [
			'email' => 'required|email|unique:users',
			'password'=>'required|confirmed',
			'password_confirmation' => 'required',
			'phone' => 'required',
		];

		$messages = array(
			'email.required' => 'メールアドレスを正しく入力してください。',
			'password.required' => 'パスワードを正しく入力してください。',
			'password_confirmation.required' => 'パスワードが一致しません。',
			'phone.required' => '電話番号を正しく入力してください。',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->passes()) {
			$user = new User;
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->phone = Input::get('phone');
			$user->save();
			return Redirect::route('users.create')
				->with('success', '会員登録しました。');
		}else{
			return Redirect::route('users.create')
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
