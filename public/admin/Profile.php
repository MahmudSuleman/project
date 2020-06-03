<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/29/2020
 * Time: 11:14 AM
 */

include_once '../../private/init.php';
$title = 'Admin Profile';
Admin::require_login();
include_once SHARED_PATH.'/admin_header.php';

$user = Admin::find($_SESSION['username']);

if(isset($_POST['submit']))
{

    $email = $_POST['email'] ?? '';

   global $db;
    $sql = $db->pdoQuery("UPDATE admins SET email = ? WHERE username = ?", [$email, $_SESSION['username']]);
}
?>

<div class="container">
    <div class="profile-box">
        <h1 class="profile-box__title">user profile</h1>

        <form method="post" action="Profile.php">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input disabled class="form-control" type="text" required="" name="username" id="username"
                               value="<?php echo $username = $user['username'] ?? ''; ?>"/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" required="" name="email" id="email"
                               value="<?php echo $email = $user['email'] ?? ''; ?>"/>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-outline-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php

include_once SHARED_PATH.'/footer.php';