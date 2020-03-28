<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/25/2019
 * Time: 11:01 AM
 */
class User
{
//    TODO Add try catch block to all the methods
//    TODO Add default values for each field in a class
    public $email;
    public $username;
    public $department;
    public $program;
    public $program_type;
    public $level;
    public  $password;









    function __construct($department, $email, $level, $program, $program_type, $username)
    {
        $this->department = $department;
        $this->email = $email;
        $this->level = $level;
        $this->program = $program;
        $this->program_type = $program_type;
        $this->username = $username;
    }



    /**
     * @return bool
     */
    public static function logOut()
    {
//        first check to see if there is a user logged in before you try to log them out
        if (isset($_SESSION['userName'])) {
            unset($_SESSION['userName']);
            return true;
        }

    }

    public  function match_password()
    {
        if ($this->password === $this->confirm_password) {
            $this->hashPassword($this->password);
            return true;
        }

    }


    public static function logIn($username, $password)
    {
//        to log a user in first find the user by selecting by username
        $user = self::findUser($username);
        if (!empty($user)) {
            $hash = $user['password'];
            if (password_verify($password, $hash)) {
//                if the verification is successful, store user credentials the session variable
                $_SESSION['userName'] = $username;
                $_SESSION['success'] = "you have been logged in";
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

    public static function  instantiate($result)
    {
//        todo rewrite instantiate method
        if (!empty($result)) {
            $user = new self;
            foreach ($result as $param => $val) {
                if (property_exists($user, $param)) {
                    $user->$param = $val;
                }
            }
            return $user;

        } else {
            exit("No user found");
        }
    }

    public function hashPassword($pass)
    {
        $this->hash_password = password_hash($pass, PASSWORD_DEFAULT);
    }

    public function createUser()
    {
        global $errors;
        $stm = '';
        try {
            $con = Database::connect();

            $user = $this->findUser($this->username);

            if (!empty($user)) {
                array_push($errors, "User already exits in database, please change your username");
            } else {
                $sql = "INSERT INTO users ( userName, email, password,faculty, program,program_type,level) VALUES ( :userName,:email, :password,:department, :program, :program_type, :level)";
                $stm = $con->prepare($sql);
                $stm->bindValue(":userName", $this->username);
                $stm->bindValue(":email", $this->email);
                $stm->bindValue(":password", $this->password);
                $stm->bindParam(':department', $this->department);
                $stm->bindParam(':program', $this->program);
                $stm->bindParam(':program_type', $this->program_type);
                $stm->bindParam(':level', $this->level, PDO::PARAM_INT);
                $stm->execute();


            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $errorInfo = $stm->errorInfo();
        if (isset($errorInfo[2])) {
            exit($errorInfo[2]);
        }else{
            return true;
        }


    }

    public static function findUser($username)
    {
        try {
//       get connected to the database and do the selection of the user
            $con = Database::connect();
            $sql = "SELECT * FROM users WHERE userName = '" . $username . "'";
            $result = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            var_dump($e->getMessage());
            exit;
        }
        if (!empty($result)) {
            return $result[0];
        }
    }

    public function updateUser()
    {
        $data = [];
        $stm = '';
        try {
            $con = Database::connect();
//            Check to see if user exist before updating
            $user = User::findUser($this->username);
            if (empty($user)) {
                exit("User not found!");
            } else {
                $sql = "UPDATE users  SET  email = :email, faculty = :department, program = :program, program_type = :program_type, level = :level WHERE userName = '" . $this->username . "'";
                $stm = $con->prepare($sql);
                $stm->bindParam(':email',$this->email);
                $stm->bindParam(':department',$this->department);
                $stm->bindParam(':program',$this->program);
                $stm->bindParam(':program_type',$this->program_type);
                $stm->bindParam(':level',$this->level, PDO::PARAM_INT);
            }

        } catch (Exception $e) {
            exit($e->getMessage());
        }


        if($stm->execute()){
            return true;
        }


    }

    public static function resetPassword($username, $newPassword, $oldPassword)
    {
        global $errors;
        $con = Database::connect();
        $hashNew = password_hash($newPassword, PASSWORD_DEFAULT);
//        Find the old password from database, compare it to the old password entered to see if
//        it matches

        $sql = "SELECT password FROM users WHERE userName = '" . $username . "'";
        $hashOld = $con->query($sql)->fetch()["password"];
        if (password_verify($oldPassword, $hashOld)) {
//            If the new and old password match then continue to update the user's password
            $sql = "UPDATE users SET password = :password WHERE userName = :username";
            $stm = $con->prepare($sql);
            $result = $stm->execute([":password" => $hashNew, ":username" => $username]);
            if(!$result){
               array_push($errors, "Failed to update password");
            }else{
                array_push($errors, "Password updated");
            }

        } else {
            array_push($errors, "old password is not correct!");
           return false;
        }
    }

    public static function  updatePassword($username, $password)
    {
//        Create a connection
        $con = Database::connect();

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = :password WHERE userName = '" . $username . "'";
        $stm = $con->prepare($sql);
        $stm->bindValue(":password", $password);

        $stm->execute();
        return true;
    }

    public static function isRegistered($username)
    {
        $result = '';
        try{
            $con = Database::connect();
            $sql = "select * from registration where username = '". $username. "'";
            $result = $con->query($sql);

        }catch (Exception $e){
            print_r($e->getMessage());
        }

        if($result->fetch()){
            return true;
        }else{
            return false;
        }
    }


    public static function profileIsComplete($username){
        $stm = '';
        try{
            $con = Database::connect();
            $sql = "SELECT faculty, program  FROM users WHERE userName = '" . $username . "'";
            $stm = $con->query($sql)->fetch();
//            die(var_dump($stm));

        }catch (Exception $e){
            print_r($e->getMessage());
        }

        if($stm['faculty'] == '' || $stm['program'] == ''){
            return false;
        }else {
            return true;
        }

    }
}