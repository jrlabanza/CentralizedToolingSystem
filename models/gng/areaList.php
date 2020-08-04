<?php
require('frameworks/ajaxConn.php');

$result = $conn->query('SELECT DISTINCT area FROM gng ORDER BY area ASC');
	while ($row = $result->fetch_assoc()) {
        $area = $row['area'];
        echo '<option value="'.$area.'">'.$area.'</option>';
	}
?>