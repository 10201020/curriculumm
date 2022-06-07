<?php
require_once'../dbconnect.php';
class UserLogic{
    // ユーザーを登録する
    // @param allay $userData
    // @return bool $result
    public static function createUser($userData){
        $result = false;
        $sql = 'INSERT INTO users(name,email,password) VALUES(?,?,?)';

        // ユーザーデータを配列に入れる
        $arr = [];
        $arr[] = $userData['username'];
        $arr[] = $userData['email'];
        $arr[] = password_hash($userData['password'],PASSWORD_DEFAULT);

        try{
            $stmt = connect()->prepare($sql);
            $result = $stmt->execute($arr);
            return $result;
            
        }catch(\Exception $e){
            return $result;
        }
    }
    
        // ログイン処理
        // @param string $email
        // @param string $password
        // @return bool $result
        public static function login($email, $password){
            // 結果
            $result = false;
            // ユーさをemailから検索して取得
            $user = self::getUserByEmail($email);

            if(!$user){
                $_SESSION['msg'] = 'emailが一致しません';
                return $result;
            }
            // パスワードの照会
            if(password_verify($password, $user['password'])){
                // ログイン成功
                session_regenerate_id(true);
                $_SESSION['login_user'] = $user;
                $result = true;
                return $result;
            }
            $_SESSION['msg'] = 'passwordが一致しません';
            return $result;
}

// emailからユーザを取得
        // @param string $email
        // @return array bool $user false
        public static function getUserByEmail($email){
// sqlの準備
// sqlの実行
// sqlの結果を返す
$sql = 'SELECT * FROM users WHERE email = ?';

        // emailを配列に入れる
        $arr = [];
        $arr[] = $email;

        try{
            $stmt = connect()->prepare($sql);
            $stmt->execute($arr);
            // ｓｑｌの結果を返す
            $user = $stmt->fetch();
            return $user;
            
        }catch(\Exception $e){
            return false;
        }
        }

}

?>