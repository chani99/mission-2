<?php

if(isset($_POST['add-new'])) {


    //conect to data base

    $host = '127.0.0.1';
    $db   = 'employee';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $my_Data_Base = new PDO($dsn, $user, $pass, $opt);
    


    //select
    
    $Worker_id = $_POST['w_id'];
    $Worker_neme = $_POST['w_mame'];
    $Worker_date = $_POST['start_date'];


     $statement = $pdo->prepare("INSERT INTO proj_emplyee(id, name, start_date)
     VALUES(:woeger_id, :Worker_neme, :Worker_date)");
      $statement->execute(array(
       "id"=> $this->Worker_id,
       "name"=> $this->Worker_neme,
       "sart_date"=> $this->Worker_date,));
}

    
?>

