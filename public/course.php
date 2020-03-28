<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/21/2020
 * Time: 10:46 PM
 */

require_once '../private/init.php';
$title = "Course Selection For Others";
 require_once SHARED_PATH . '/header.php';
$data = [];
$data['faculty'] = htmlspecialchars($_GET['faculty']);
$data['prog_type'] = htmlspecialchars($_GET['program_type']);
$data['level'] =htmlspecialchars($_GET['level']);
$data['program'] =htmlspecialchars($_GET['program']);
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
//    die();
}


$courses = $course->findAll();
//echo '<pre>';
//print_r($courses);
//echo '</pre>';
//
//die();

if(!empty($courses)){;
?>

<div id="main-content">

    <form method="get" action="#">
            <table>
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
                <button name="submit" type="submit">Submit</button>

            </table>
    </form>
<?php }?>
</div>


<?php require_once SHARED_PATH . '/footer.php'; ?>