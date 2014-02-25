<?php

$verified_user = false;

$roll = $_COOKIE['roll'];
$token = $_COOKIE['token'];

if(empty($roll))
    $roll = 0;

if($roll and $token)
    $result = db_select_where('students', 'roll', 'roll='.$roll.' and token="'.$token.'"');

if($result)
    $verified_user = true;
else
    $verified_user = false;
