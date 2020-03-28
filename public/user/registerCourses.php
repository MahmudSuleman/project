<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/12/2020
 * Time: 9:28 AM
 */
require_once '../../private/init.php';

require_once PRIVATE_PATH . '/includes/header.php';
//echo $_SESSION['userName'];
//if(User::profileIsComplete($_SESSION['userName'])){
//    die("Profile is complete");
//}else{
//    die("Profile is not complete");
//}


if(isset($_POST['submit'])){
    if(!empty($_POST['checklist'])){
        foreach ($_POST['checklist'] as $list) {
            $result = Course::findCourse($list);
//            var_dump($result);
            $course = new Course($result);
            $course->registerCourses($list);
        }
    }
}
$courses = Course::availableCourses($current_trimester);
?>
    <div id="main-content">
        <?php // todo when courses are not available, form header and button shows ?>
        <?php if(!User::isRegistered($_SESSION['userName'])){ ; ?>
        <form method="post">
            <div class="table-div">
                       <table class="register-course-table">
                    <tr>
                        <td>Code</td>
                        <td>Title</td>
                        <td>Credit</td>
                        <td>Select</td>
                    </tr>
                  <?php foreach($courses as $course){?>
                       <tr>
                       <td><?= $course['code'] ?></td>
                       <td><?= $course['title'] ?></td>
                       <td><?= $course['credit'] ?></td>
                       <td><input type="checkbox" value="<?= $course['code'] ?>" name="checklist[]"

                               />
                       </tr>
                   <?php } ?>

                </table>
            </div>

            <button name="submit" type="submit">Submit</button>
        </form>
    <?php }else{?>
            <p>You have been registered. <a href="deregisterCourses.php">De-register</a> or <a href="viewTimetable.php">view timetable</a></p>
       <?php }  ?>
    </div>

<?php require_once PRIVATE_PATH . '/includes/footer.php';