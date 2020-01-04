<?php

require_once(dirname(__FILE__).'/user.php');
require_once(dirname(__FILE__).'/hash.php');
require_once(dirname(__FILE__).'/session.php');

/**
 * 認証処理を扱うクラス
 */
class AuthManager{

	public function authCheck($loginId, $pass)
	{
		//特殊文字が含まれる場合は変換する。
		$loginId = htmlspecialchars($loginId);
		$pass = htmlspecialchars($pass);

	
		//ログインIDをもとにユーザ情報を取得
		$user = User::getUser($loginId);
		
		if(is_null($user)){
			//該当するユーザが存在しない場合
			return false;
		}

		//パスワード照合
		if(Hash::getHashedPass($pass) === $user['hashedPass']){
			//ログイン中であることを意味するフラグを立てる
			Session::upLoginFlag();
			return true;
		}
		return false;
	}




}

