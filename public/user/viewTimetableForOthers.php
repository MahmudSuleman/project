<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/24/2020
 * Time: 3:08 PM
 */

require_once '../../private/init.php';
$title = 'Preview Timetable For Others';
require_once PRIVATE_PATH.'/includes/header.php';
$checked=[];
//todo escape $_GET data properly.
foreach ($_GET['checklist'] as $list) {
    array_push($checked,$list);
}


$con = Database::connect();
$sql = "select * from timetable WHERE code in (";
foreach ($checked as $list) {
    $sql .= "'". $list . "',";
}

$sql .= ")";

$sql = str_replace(',)', ')', $sql);

//echo $sql;

$result = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//echo '<pre>';
//print_r($result);
//echo '</pre>';


//die();
//$result = Course::timetableForOthers();
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
        <?php } ?>

    </div>


<?php require_once PRIVATE_PATH.'/includes/footer.php';?>