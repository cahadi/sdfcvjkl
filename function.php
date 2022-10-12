<?php
function connectDB(){
    static $dbh;
    $dbh = new PDO('mysql:host=localhost; dbname=todo', 'root', '');
    return $dbh;
}
function getAllWorks(){
    $dbh = connectDB();
    $worklist = $dbh->query('SELECT * from worklist')
        ->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $worklist;
}

function addNewWork(){
    if (isset($_POST['addWork'])){
        $newWork = $_POST['work'];
        $dbh = connectDB();
        $query = "INSERT INTO worklist (work_name) VALUES (:name);";
        $params = [':name' => $newWork];
        $stmt = $dbh->prepare($query);
        $stmt->execute($params);
        $dbh = null;
        header("Location: index.php");
        die();
    }else{
        header("Location: index.php");
        die();
    };
}
    function updateWorks(int $id, string $work_name)
    {
        $dbh = connectDB();
        $query = "UPDATE worklist set work_name = :work_name WHERE id = :id;";
        $param = [
            ':id' => $id,
            ':work_name' => $work_name
        ];
        $stmt = $dbh->prepare($query);
        $stmt->execute($param);
        $dbh = null;
        header("Location: index.php");
        die();

    }
    function complWork(int $id, int $work_status){
    $dbh = connectDB();
    $query = "UPDATE `worklist` set `work_status` = :work_status WHERE ((`id` = :id))";
    $params = [
        ':id' => $id,
        'work_status' => $work_status
    ];
    $stmt = $dbh->prepare($query) ;
    $stmt ->execute($params) ;
    $dbh = null;
    header("Location: index.php");
    die();
}

function delWork(int $id){
    $dbh = connectDB();
    $query = "DELETE FROM worklist WHERE ((`id` = :id))";
    $params = [':id' => $id];
    $stmt = $dbh->prepare($query);
    $stmt->execute($params);
    $dbh = null;
    header("Location: index.php");
    die();
}

function generateHtmlWorkList(array $worklist){
    $html = '';
    foreach ($worklist as $row) {
        $html .= <<<EOT
            <li class="list-group-item  ">
                {$row['work_name']} 
                <a href="to_complete.php?id={$row['id']}"class="btn btn-outline-success btn-sm ml-5">
                    <span><i class="fas fa-check-circle "></i></span>
                </a>
                <a href="edit.php?id={$row['id']}" class="btn  btn-outline-primary btn-sm">
                    <i class="fas fa-pen"></i>
                </a>
                <a href="del.php?id={$row['id']}" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </li>
EOT;
    };
    return $html;
}

function showWorkList(){
    echo  generateHtmlWorkList( getAllWorks());
}
function getWorkByid(int $id){
    $dbh = connectDB();
    $query = "SELECT * FROM worklist  WHERE id = :id ;";
    $params = [
        ':id' => $id
    ];
    $stmt = $dbh->prepare($query);
    $stmt->execute($params);
    $singleWork = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    return $singleWork;
}