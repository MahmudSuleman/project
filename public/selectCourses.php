<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/21/2020
 * Time: 10:46 PM
 */

require_once '../private/init.php';
$title = "Course Selection For Others";
require_once SHARED_PATH . '/admin_header.php';
$data = [];
$data['faculty'] = htmlspecialchars($_GET['fac']);
$data['prog_type'] = htmlspecialchars($_GET['prog_type']);
$data['level'] =htmlspecialchars($_GET['level']);
$data['program'] =htmlspecialchars($_GET['prog']);
$data['trimester'] = htmlspecialchars($current_trimester);
$course = new Course($data);



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
}


$courses = $course->findAll();
if(!empty($courses)){;
    ?>

    <div id="main-content">

    <div class="table-box">
        <h3 class="table-title mb-5">select courses you want to include in your timetable</h3>
        <form method="get" action="timetable.php">
            <table class="table table-course table-hover">
                <tr>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Select</th>
                </tr>
                <?php foreach($courses as $course){//todo escape $_GET data properly?>

                    <tr>
                        <td><?= $course['code'] ?></td>
                        <td><?= $course['title'] ?></td>

                        <td><input type="checkbox" value="<?= $course['code'] ?>" name="checklist[]"/>
                    </tr>
                <?php } ?>

            </table>
            <button name="submit" type="submit" class="btn btn-table">Submit</button>
        </form>
    </div>


<?php } ?>
</div>


<?php require_once SHARED_PATH . '/footer.php'; ?>