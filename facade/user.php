<?php
/**
 * ユーザー情報を扱うクラス
 */
class User{

	public static function getUser($userId){
		//本当はここでデータベースから必要な情報を取得する処理を実装するのだが、
		//演習なので割愛する。
		if($userId == 'user01'){
			//一般的にはパスワードはそのままの値で保存せずハッシュ値で保存するべき。
			//でもMD5だと弱すぎるからもっと強力なアルゴリズムの方がよい。
			return array('userName'=>'山田太郎', 'hashedPass' => 'e10adc3949ba59abbe56e057f20f883e');
		}
		return null;
	}

}