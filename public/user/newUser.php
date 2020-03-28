<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/6/2020
 * Time: 9:21 AM
 */ 

require_once '../../private/init.php';
//require_once PRIVATE_PATH . '/includes/header.php';

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    $faculty = $_POST['faculty'];
    $program = $_POST['program'];
    $program_type = $_POST['program_type'];
    $password1 = $_POST['password1'];
    $password2 =$_POST['password2'];

    if($password1 === $password2){
        $password1 = password_hash($password1, PASSWORD_DEFAULT);
        $user = new User($faculty, $email, $level, $program, $program_type, $username);
        $user->password = $password1;

        if($user->createUser()){
            header('Location: ../index.php');
        }
    }
    else{
        $error = array_push($errors,"passwords do not match");

    }







}

?>
    <!doctype html>
    <html lang="en">
    <head>
        <title>Timetable||SignUp</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link  rel="stylesheet" href="<?php echo url_for("styles/customeStyle.css") ?>"/>
        <link  rel="stylesheet" href="<?php echo url_for("styles/bootstrap/css/bootstrap.min.css") ?>"/>

        <style>
            .form-div{
                /*position: absolute;*/
                width: 50%;
                margin:100px auto;
                /*border: 1px solid red;*/
            }
        </style>
    </head>
    <body style="background-color: #cccccc">

    <div class="container">
        <div class="form-div">
            <div class="form-header text-center">
                SIGN UP HERE
            </div>
            <form method="post">
                <?php

                foreach ($errors as $error) {
                    echo '<p>'.$error.'</p>';
                }

                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" required/>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" required/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="faculty">Faculty</label>
                            <select class="form-control" name="faculty" id="faculty" required onchange="populate_program(this.id, 'program')">
                                <option value="">select</option>
                                <option value="fms">FMS</option>
                                <option value="fas">FAS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="program">Program</label>
                            <select class="form-control" name="program" id="program" required onchange="populate_program_type(this.id,'program_type')">

                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="program_type">Program Type</label>
                            <select class="form-control" name="program_type" id="program_type" required onchange="populate_level(this.id, 'level')">
                                <option value="">select</option>
                                <option value="degree">degree</option>
                                <option value="diploma">diploma</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" name="level" id="level" required>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label  for="password1">Password</label>
                            <input class="form-control" type="password" name="password1" id="password1" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password2">Confirm Password</label>
                            <input id="password2" class="form-control" type="password" name="password2" required/>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-outline-primary btn-block">Create User</button>
                </div>




            </form>
            <div class="form-footer">
<!--                <p>Have an account? Sign in <a href="../index.php">Here</a></p>-->

            </div>
        </div>
    </div>


    </body>
    </html>


<?php require_once PRIVATE_PATH . '/includes/footer.php'; ?>