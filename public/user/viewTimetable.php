<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/14/2020
 * Time: 1:53 PM
 */

require_once '../../private/init.php';
require_once PRIVATE_PATH.'/includes/header.php';

$result = Course::timetable($_SESSION['userName']);
?>

<div id="main-content">
    <?php if(!empty($result)){ ?>
    <hr/>
    <hr/>
    <p class="text-center">Your Timetable</p>
    <hr/>
    <hr/>

    <table class="register-course-table">
        <tr>
            <td>Day</td>
            <td>Course Code</td>
            <td>Course Title</td>
            <td>Start Time</td>
            <td>End Time</td>
            <td>Lecture Hall</td>

        </tr>

        <?php foreach ($result as $data=>$bit) {?>
            <tr>
                <td>
                    <?php
                    switch($bit['day']){
                        case 1:
                            echo "Monday";
                            break;
                        case 2:
                            echo "Tuesday";
                            break;
                        case 3:
                            echo "Wednesday";
                            break;
                        case 4:
                            echo "Thursday";
                            break;
                        case 5:
                            echo "Friday";

                    }
                    ?>
                </td>
                <td><?= $bit['code'] ?></td>
                <td><?= $bit['title'] ?></td>
                <td><?= $bit['startTime'] ?></td>
                <td><?= $bit['endTime'] ?></td>
                <td><?= $bit['hall'] ?></td>
            </tr>


        <?php }?>
    </table>
    <?php } else{?>
        <p>Please specify your courses in the registration section. <a href="registerCourses.php">Register</a></p>
   <?php } ?>

</div>


<?php require_once PRIVATE_PATH.'/includes/footer.php';?>