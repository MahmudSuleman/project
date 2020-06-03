<?php

include_once '../../private/init.php';
$title = 'Create New User';
Admin::require_login();
include_once SHARED_PATH.'/admin_header.php';




if(isset($_POST['submit']))
{
    $arg = [];
    $arg['username'] = $_POST['username'] ?? '';
    $arg['password'] = $_POST['password'] ?? '';


    $admin = new Admin($arg);
    $admin->setPassword($arg['password']);

    $admin->addAdmin();


}

?>

<div class="container">
    <div class="profile-box">
        <h1 class="profile-box__title">New user</h1>

        <form action="newUser.php" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required="" class="form-control"/>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input value = "1234" type="password" id="password" name="password" required="" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <button name="submit" class="btn btn-outline-primary btn-block offset-4">Create User</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include_once SHARED_PATH . '/footer.php';