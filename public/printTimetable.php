<?php
/**
 * Created by PhpStorm.
 * User: Chamtooni
 * Date: 3/1/2020
 * Time: 12:06 AM
 */
require_once '../private/init.php';
$style = file_get_contents('../public/styles/main.css');
//require_once SHARED_PATH .'/admin_header.php';
require_once '../vendor/autoload.php';


    $timetable = new \Mpdf\Mpdf(['orientation'=>'L']);

    $result = $_SESSION['result'];

    $table = "";

    $table .= "<table class='timetable'>";
    $table .= "<tr>
                <th>Day</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Hall</th>
            </tr>";

    foreach ($result as $data => $bit) {
        $table .= '<tr>';

        if ($bit['day'] == 1)
            $day = 'Monday';
        elseif ($bit['day'] == 2)
            $day = 'Tuesday';
        elseif ($bit['day'] == 3)
            $day = 'Wednesday';
        elseif ($bit['day'] == 4)
            $day = 'Thursday';
        else
            $day = 'Friday';

        $table .= '<td>' . $day . '</td>
        <td>' . $bit['code'] . '</td>
        <td>' . $bit['title'] . '</td>
        <td>' . $bit['startTime'] . '</td>
        <td>' . $bit['endTime'] . '</td>
        <td>' . $bit['hall'] . '</td>
    </tr>';


    }
    $table .= "</table>";


    $timetable->WriteHTML($style, \Mpdf\HTMLParserMode::HEADER_CSS);
    $timetable->WriteHTML($table, \Mpdf\HTMLParserMode::HTML_BODY);
//<!--    $mpdf->debug = true;-->
    $timetable->output();
