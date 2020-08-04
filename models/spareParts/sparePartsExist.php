<?php
require('../../frameworks/ajaxConn.php');

// $conn = new mysqli($serverName, $username, $password, $database);

    $result = $conn->query("SELECT parts_code FROM spare_parts WHERE (parts_code = '". $_POST['parts_code'] ."' AND location = '". $_POST['rack'] ."') AND isDeleted = 0 ORDER BY id DESC LIMIT 1");

    while ($row = $result->fetch_assoc()) {
      echo $row["parts_code"];
      
   }
  
   mysqli_close($conn);


?>