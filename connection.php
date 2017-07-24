<?php

if(isset($_POST['submit'])) {
    $butValue = $_POST['submit'];

    // conect to data base

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
    $WorkerId = $_POST['Wid'];
    $WorkerNeme = $_POST['Wmame'];
    $WorkerDate = $_POST['startDate'];
    // $pdo = new PDO($dsn, $user, $pass, $opt);



//     // find selected button

    switch ($butValue) {
        case 'get':
                $DB_employee = $my_Data_Base->query('SELECT * FROM proj_emplyee');
                while ($row = $DB_employee->fetch()) {
                    if($WorkerId == $row["worker_id"]){
                    echo "workers name is:" .  $row["worker_name"] . "</br>" .
                    "start work at: ". $row["work_start"];   }
                }
            break;
        case "add":
            $statement = $my_Data_Base->prepare("INSERT INTO proj_emplyee(worker_id, worker_name, work_start)
                VALUES(:worker_id, :worker_name,  :work_start)");
            $statement->execute(array(
                "worker_id"=> $WorkerId,
                "worker_name"=> $WorkerNeme,
                "work_start"=>  $WorkerDate,));
                echo "worker updated to database";
            break;
        case "update":
               $update = $my_Data_Base->query("UPDATE proj_emplyee SET worker_name = '$WorkerNeme', work_start=' $WorkerDate' WHERE worker_id='$WorkerId'");
               echo "worker: " . $WorkerId . "was updated";
            break;
        case "delete":
                $delete = $my_Data_Base->query("DELETE FROM proj_emplyee WHERE worker_id='$WorkerId'");
                 echo "worker: " . $WorkerId . "was deleted";

            break;
        case "all":
                $DB_employee = $my_Data_Base->query('SELECT * FROM proj_emplyee');
                echo "<table> <tr>
                            <th>worker id</th>
                            <th>workers name</th> 
                            <th>start dat</th>
                            </tr>";
                while ($row = $DB_employee->fetch()) {
                    echo     "<tr>
                                <td>" . $row["worker_id"] . "</td>
                                <td>" . $row["worker_name"] . "</td> 
                                <td>" . $row["work_start"] . "</td>
                            </tr>";
                            }
                echo "</table>";
         
            break;
        default:
            echo "error";

                }



}