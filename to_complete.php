<?php
include("function.php");
if (isset($_GET['id'])){
    $id = (int)$_GET['id'];
    complWork($id);
}
header("Location: index.php");