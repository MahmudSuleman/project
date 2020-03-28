<?php
/**
 * Created by PhpStorm.
 * User: Mahmud Suleman Sheikh Wunnam
 * Date: 1/6/2020
 * Time: 9:12 AM
 */

require_once '../../private/init.php';
require_once PRIVATE_PATH . '/includes/header.php';

$user = User::findUser($_SESSION['userName']);

if (isset($_POST['submit'])) {
//    print_r($_POST);
    $faculty = $_POST['faculty'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    $program = $_POST['program'];
    $program_type = $_POST['program_type'];
    $username = $_SESSION['userName'];

    $user1 = new User($faculty, $email, $level, $program, $program_type, $username);
    if($user1->updateUser()){
        header("Location: homepage.php");

    }


//

}

?>

<div id="main-content">

    <form method="post">
        <?php

        foreach ($errors as $error) {
            echo '<p>'.$error.'</p>';
        }

        ?>
        <div class="row">

            <div class="col">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" required value="<?php echo $user['email'] ?>"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="faculty">Faculty</label>
                    <select class="form-control" name="faculty" id="faculty" required onchange="populate_program(this.id, 'program')">
                        <option value="">select</option>
                        <option value="fms" <?php if($user['faculty'] == 'fms'){echo "selected";} ?>>FMS</option>
                        <option value="fas" <?php if($user['faculty'] == 'fas'){echo "selected";} ?>>FAS</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="program">Program</label>
                    <select class="form-control" name="program" id="program" required onchange="populate_program_type(this.id,'program_type')">
<!--                        <option value="--><?php //echo $user['program'] ?><!--">--><?php //echo $user['program'];?><!--</option>-->
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="program_type">Program Type</label>
                    <select class="form-control" name="program_type" id="program_type" required onchange="populate_level(this.id, 'level')">
<!--                        <option value="--><?php //echo $user['program_type'] ?><!--">--><?php //echo $user['program_type'];?><!--</option>-->
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control" name="level" id="level" required>
<!--                        <option value="--><?php //echo $user['level'] ?><!--">--><?php //echo $user['level'];?><!--</option>-->
                    </select>
                </div>
            </div>
        </div>



        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-outline-primary btn-block">Update</button>
        </div>




    </form>

</div>


<?php require_once PRIVATE_PATH . "/includes/footer.php" ?>

<?php
/*foreach($user as $data => $detail){
    if($data != "password" && $data != "id"){
        echo "{$data}: {$detail} </br>";
    }

}*/
?>

<script>
    document.load(populate_program('faculty', 'program'));
</script>
