<?php
include("function.php");
if (isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $work = getWorkByid($id);
    complWork($work['id'], $work['work_status']);
}