<?php
require('../../frameworks/ajaxConn.php');

    $result = $connUserList->query("SELECT firstName,lastName FROM employeeinfos ORDER BY firstName ASC");

    while ($row = $result->fetch_assoc()) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        
			echo '<option value="'.$firstName." ".$lastName.'">'.$firstName." ".$lastName.'</option>';
	}
   mysqli_close($connUserList);

// require('./frameworks/connection.php');

// $DbUser = DbUser::getInstance2();

// $query = $DbUser->prepare("SELECT firstName,lastName FROM employeeinfos ORDER BY firstName ASC");
//     $query->execute();
//     $count = $query->rowCount();
//     while ($row = $query->fetch(PDO::FETCH_ASSOC))
//     {
//         $firstName = $row['firstName'];
//         $lastName = $row['lastName'];

//         echo '<option value="'.$firstName." ".$lastName.'">'.$firstName." ".$lastName.'</option>';
//     }
?>