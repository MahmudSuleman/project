<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/7/2020
 * Time: 6:53 AM
 */

require_once '../../private/init.php';
require_once PRIVATE_PATH.'/includes/header.php';

if(isset($_POST['submit'])){
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];

    if(strlen($oldpassword) == 0 || strlen($newpassword) == 0)
    {
        global $errors;
        array_push($errors, "Password fields cannot be blank");
    }else{
        User::resetPassword($_SESSION['userName'], $newpassword, $oldpassword);
    }
}
?>

<div id="main-content">
    <div class="container">
        <div class="reset-password-form-div">
            <div>
                <ul>
                <?php if(!empty($errors)){
                    foreach ($errors as $error) {?>

                    <li><?= $error?></li>



                <?php }} ?>
                </ul>
            </div>
            <form method="post">
                <input type="text" name="oldpassword" placeholder="old password" class="form-control" />
                <input type="text" name="newpassword" placeholder="new password" class="form-control"/>
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>
</div>