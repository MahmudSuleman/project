<?php


include_once '../../private/init.php';

//print("hello");

$sql = $_GET['q'] ?? '';
$type = $_GET['type'] ?? '';

//echo $sql;

global $db;


$result = $db->pdoQuery($sql)->results();


//print_r($result);
$data = "<option disabled selected value=''>SELECT YOUR ".strtoupper($type)."</option>";

foreach($result as $d)
{
    $data .= "<option value='".trim($d[$type]) ."'>".trim($d[$type])."</option>";
}

echo $data;
