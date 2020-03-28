<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/24/2020
 * Time: 3:08 PM
 */

require_once '../private/init.php';
$title = 'Preview Timetable';
require_once PRIVATE_PATH . '/includes/admin_header.php';

$checked=[];
//todo escape $_GET data properly.
foreach ($_GET['checklist'] as $list) {
    array_push($checked,$list);
}


$con = Database::connect();
$sql = "select timetable.code, time_format(timetable.startTime, '%h:%i %p' ) startTime,
        time_format(timetable.endTime, '%h:%i %p') endTime, timetable.day, timetable.hall, courses.title from timetable
        INNER JOIN courses ON timetable.code = courses.code WHERE timetable.code in (";
foreach ($checked as $list) {
    $sql .= "'". $list . "',";
}

$sql .= ") ORDER BY day";

$sql = str_replace(',)', ')', $sql);

$result = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['result'] = $result;

//echo '<pre>';
//print_r($result);
//echo '</pre>';
//die();

?>

    <div id="main-content">
        <?php if(!empty($result)){ ?>
            <hr/>
            <hr/>
            <p class="text-center">Your Timetable</p>
            <hr/>
            <hr/>

            <div class="table-box">
                <table class="table table-course table-hover">
                    <tr>
                        <th>Day</th>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Lecture Hall</th>

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
                    <a href="printTimetable.php">print timetable</a>
                </table>
            </div>


        <?php }else{echo 'empty results';} ?>

    </div>


<?php require_once PRIVATE_PATH . '/includes/footer.php';?>