<?php
include ("function.php");
if (isset($_POST['id']) && isset($_POST['work_status'])){
    $id = (int)$_POST['id'];
    $work_status = $_POST['work_status'];
    complWork($id,$work_status);
    include ('pagecompl.php');
}
