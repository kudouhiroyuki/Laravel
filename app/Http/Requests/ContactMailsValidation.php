<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMailsValidation extends FormRequest {
  public function authorize() {
  	return true;
  }
	
	/**
	 * バリデーションルール
	 * @return array
	 */
  public function rules() {
		return [
			'name' => ['required'],
			'email' => ['required'],
			'gender' => ['required'],
			'contents' => ['required'],
		];
	}

	/**
	 *  バリデーション項目名定義
	 * @return array
	 */
	public function attributes() {
		return [
			'name' => 'name',
			'email' => 'email',
			'gender' => 'gender',
			'contents' => 'contents',
		];
	}

	/**
	 * バリデーションメッセージ
	 * @return array
	 */
  public function messages() {
		return [
			'name.required' => '名前を入力して下さい',
			'email.required' => 'メールアドレスを入力して下さい',
			'gender.required' => '性別を入力して下さい',
			'contents.required' => 'お問い合わせ内容 を入力して下さい',
		];
  }
}
