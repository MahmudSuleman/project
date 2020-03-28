<?php
/**
 * Created by PhpStorm.
 * User: Chamtooni
 * Date: 3/18/2020
 * Time: 14:11
 */

require_once '../../private/init.php';
$title = 'login';
require_once SHARED_PATH.'/admin_header.php';


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "you have been logged in";
    if(Admin::logIn($username, $password)){
        header('location: index.php');

    }

}

?>

<div class="container">
    <div class="login-box">
        <h3 class="title">login here</h3>

        <form action="#" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" id="username" type="text" name="username"/>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" id="password" type="text" name="password"/>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-dark btn-m" name="submit" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>

<?php require_once SHARED_PATH.'/footer.php';?>