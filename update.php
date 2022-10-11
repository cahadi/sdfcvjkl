<?php
include ("function.php");
if (isset($_POST['id']) && isset($_POST['work_name'])){
    $id = (int)$_POST['id'];
    $work_name = $_POST['work_name'];
    updateWorks($id,$work_name);
    include ('page.php');
}
