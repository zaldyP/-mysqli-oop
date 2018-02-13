<?php  

include 'inlude/classes.database.php';

$db = new Database;


// $db->query(" SELECT * FROM users LIMIT 5");
// echo $db->numRows();

// $db->disconnect();

$db->query(" SELECT * FROM users");

if($db->numRows() == 0){
    echo 'No User';
}
else {
    foreach($db->rows() as $users){
        echo $users['username'] . '</br>';
    }
}


