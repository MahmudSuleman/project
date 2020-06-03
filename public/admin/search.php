<?php
require_once '../../private/init.php';
Admin::require_login();

$str = $_GET['q'];
$index = $_GET['index'];

$con = Database::connect();

$sql = "SELECT * FROM " .$index." WHERE code like '%".$str."%'";

$result = $con->query($sql);
$data = "";
if(!empty($result)){
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    $list = '';
    $list .= "<table class='table table-hover table-sm'>
                <thead>";

    if($index == 'timetable') {
        $list .= "
                <tr>
                    <th>Code</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Day</th>
                    <th>Hall</th>
                    <th>Faculty</th>
                    <th>Program</th>
                </tr>

                </thead>
                <tbody>
";


        foreach ($data as $bit) {
            $list .= '<tr>';
            $list .= "<td>" . $bit['code'] . "</td>";
            $list .= "<td>" . $bit['startTime'] . "</td>";
            $list .= "<td>" . $bit['endTime'] . "</td>";
            $list .= "<td>" . $bit['day'] . "</td>";
            $list .= "<td>" . $bit['hall'] . "</td>";
            $list .= "<td>" . $bit['faculty'] . "</td>";
            $list .= "<td>" . $bit['program'] . "</td>";
            $list .= "<td><a class='btn btn-outline-primary' href='./edit.php?index=timetable&code=".$bit['code']."'>Edit</a></td>";
            $list .= "<td><a class='btn btn-outline-danger' href='./delete.php?index=timetable&code=".$bit['code']."'>Delete</a></td>";
            $list .= '</tr>';

        }

        $list .= "</tbody></table>";
    }else{

        $list .= "
                <tr>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Level</th>
                    <th>Trimester</th>
                    <th>Faculty</th>
                    <th>Program</th>
                    <th>Program Type</th>
                </tr>

                </thead>
                <tbody>
";


        foreach ($data as $bit) {
            $list .= '<tr>';
            $list .= "<td>" . $bit['code'] . "</td>";
            $list .= "<td>" . $bit['title'] . "</td>";
            $list .= "<td>" . $bit['level'] . "</td>";
            $list .= "<td>" . $bit['trimester'] . "</td>";
            $list .= "<td>" . $bit['faculty'] . "</td>";
            $list .= "<td>" . $bit['program'] . "</td>";
            $list .= "<td>" . $bit['program_type'] . "</td>";
            $list .= "<td><a class='btn btn-outline-primary' href='edit.php?index=courses&code=".$bit['code']."'>Edit</a></td>";
            $list .= "<td><a class='btn btn-outline-danger' href='delete.php?index=courses&code=".$bit['code']."'>Delete</a></td>";
            $list .= '</tr>';

        }

        $list .= "</tbody></table>";

    }
    echo $list;

}

//var_dump($data);
