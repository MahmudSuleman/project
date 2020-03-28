<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/13/2020
 * Time: 4:52 PM
 */

require_once '../../private/init.php';

require_once PRIVATE_PATH.'\includes\header.php';
$result = Course::registeredCourses($_SESSION['userName']);

if(isset($_POST['deregister'])){
//    echo "clicked";
    Course::deregisterCourses($_SESSION['userName']);
    header("Location: deregisterCourses.php");
}
?>

<div id="main-content">
    <?php if(!empty($result)){?>
    <hr/>
    <hr/>
    <p class="text-center"><b>Registered Courses</b></p>
    <hr/>
    <hr/>
    <form method="post">
        <table class="register-course-table">
            <tr>
                <td>Code</td>
                <td>Titile</td>
                <td>Credit</td>
            </tr>
<?php foreach ($result as $course) {?>
            <tr>
                <td><?= $course['code']?></td>
                <td><?= $course['title']?></td>
                <td><?= $course['credit']?></td>
            </tr>
    <?php } ?>
        </table>
        <button type="submit" class="btn btn-primary" name="deregister">De-register</button>
<?php } else{?>

    <p>Please do your registration. <a href="registerCourses.php">Register</a></p>
   <?php }?>

    </form>


</div>

<?php require_once PRIVATE_PATH.'\includes\footer.php'; ?>