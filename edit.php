<?php
include ("function.php");
if (isset($_GET['id'])){
    $id = (int)$_GET['id'];
    //editWorks($id);
    $work = getWorkByid($id);
    include ('page.php');
}
//header("Location: index.php");
