<?php

$data = $_GET['datavalue'];

$wb = array('Kolkata','Darjeeling');
$mh = array('Mumbai','Pune');
$tn = array('Chennai','Coimbatore');

if ($data == "West Bengal") {
    foreach ($wb as $bengal) {
        echo "<option>$bengal</option>";
    }
}elseif ($data == "Maharastra") {
    foreach ($mh as $maha) {
        echo "<option>$maha</option>";
    }
}
elseif ($data == "Tamil Nadu") {
    foreach ($tn as $tamil) {
        echo "<option>$tamil</option>";
    }
}