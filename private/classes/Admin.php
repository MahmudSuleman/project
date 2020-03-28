<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/25/2019
 * Time: 11:09 AM
 */

class Admin{

    public $level;
    public $email;
    public $username;
    private $password;


    /**
     * @param mixed $password
     */
    public  function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }



     function __construct($args = []){
         $this->level = 1;
         $this->email = $args['email'] ?? '';
         $this->username = $args['username'] ?? '';
    }

    public static function find($username)
    {
        try
        {
//       get connected to the database and do the selection of the user
            $con = Database::connect();
            $sql = "SELECT * FROM admins WHERE username = '" . $username . "'";
            $result = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        }
        catch (Exception $e)
        {
            var_dump($e->getMessage());
            exit;
        }
        if (!empty($result))
        {
            return $result[0];
        }
    }

    public static function logIn($username, $password)
    {
//        to log a user in first find the user by selecting by username
        $user = self::find($username);
//        var_dump($user);
//        die();
        if (!empty($user)) {
            $hash = $user['password'];
            if (password_verify($password, $hash)) {
//                if the verification is successful, store user credentials the session variable

                return true;
            } else {
                echo "Username and password don't match!, please try again";
                return false;
            }
        } else {
            global $errors;
            array_push($errors, "Wrong username and password combination");
        }
    }

    public function  addAdmin(){
        try {
            $con = Database::connect();
            $sql =  "INSERT INTO admins (username, email, password, level) VALUES (:username,:email,:password, :level)";
            $stm = $con->prepare($sql);
            $stm->execute([
                ':username' => $this->username,
                ':email' => $this->email,
                ':password' => $this->password,
                ':level' => $this->level

            ]);


            $error = $con->errorInfo();
            if(!empty($error)){
                echo $error[2];
            }

        } catch (Exception $e) {

        }
    }




    /**
     *
     */
    public static function require_login(){
        if(!isset($_SESSION['username'])){
            header('location: login.php');
        }
    }

    public static function logout(){
        if(isset($_SESSION['username'])){
            session_destroy();
            session_unset();
            header('location: login.php');
        }
    }




} 