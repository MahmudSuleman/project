<?php


$studentA =['Abdul', 'Chamtooni', 'Mudi', 'toni', 'rebbery'];
$studentB = ['Don','Critical', 'wunnam', 'critical', 'sheikh'];
$list = [];

$j = 0;
for ($i = 0; $i < count(array_merge($studentA,$studentB)); $i++){
    $list[$i] = $studentA[$j];
    $i++;
    $list[$i]= $studentB[$j];
    $j++;
}
print_r($list);