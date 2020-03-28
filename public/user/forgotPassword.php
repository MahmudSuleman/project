<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/7/2020
 * Time: 3:40 AM
 */
require_once '../../private/init.php';
?>

<?php
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = User::findUser($username);

    if(empty($user))
    {
        echo "User name not registered";
    }
    else{
        if(!empty($password))
        {
            if(User::updatePassword($username, $password)){
                header("Location: index.php");
            }else{
                echo 'Update password failed';
            }
        }else{
            echo 'password cannot be blank';
        }

    }
}

?>



<?php include SHARED_PATH . '/header.php';?>
<div id="main-content">
    <form method="post">
        <input type="text" name="username" class="form-control"/>
        <input type="text" name="password"/>
        <button type="submit" name="submit">update</button>
    </form>
</div>