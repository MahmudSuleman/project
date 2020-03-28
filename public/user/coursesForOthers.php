<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/21/2020
 * Time: 10:46 PM
 */

require_once '../../private/init.php';
$title = "Course Selection For Others";
 require_once SHARED_PATH.'/header.php';
$data = [];
$data['faculty'] = htmlspecialchars($_GET['faculty']);
$data['prog_type'] = htmlspecialchars($_GET['program_type']);
$data['level'] =htmlspecialchars($_GET['level']);
$data['program'] =htmlspecialchars($_GET['program']);
$data['trimester'] = htmlspecialchars($current_trimester);
$course = new Course($data);

//echo $course->level;

//var_dump($course);
//die();



if(isset($_POST['submit']))
{
//    echo 'clicked';
    if(!empty($_POST['checklist'])){
        foreach ($_POST['checklist'] as $list) {
            echo $list;


        }

    }else{
        echo 'checklist is empty';
    }
//    die();
}


$courses = $course->coursesForOthers();
//echo '<pre>';
//print_r($courses);
//echo '</pre>';
//
//die();

if(!empty($courses)){;
?>

<div id="main-content">

    <form method="get" action="viewTimetableForOthers.php">
        <div class="table-div">
            <table class="register-course-table">
                <tr>
                    <td>Code</td>
                    <td>Title</td>
                    <td>Credit</td>
                    <td>Select</td>
                </tr>
                <?php foreach($courses as $course){//todo escape $_GET data properly?>

                    <tr>
                        <td><?= $course['code'] ?></td>
                        <td><?= $course['title'] ?></td>
                        <td><?= $course['credit'] ?></td>
                        <td><input type="checkbox" value="<?= $course['code'] ?>" name="checklist[]"/>
                    </tr>
                <?php } ?>

            </table>
        </div>

        <button name="submit" type="submit">Submit</button>
    </form>
<?php }else{
    header('Location: timeTableForOthers.php');
} ?>
</div>


<?php require_once SHARED_PATH.'/footer.php'; ?>