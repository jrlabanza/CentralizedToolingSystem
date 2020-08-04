<?php
// require('../dbcon/dbcon.php');
require('../../frameworks/ajaxConn.php');
//

$id=$_POST['id'];
$fil1=$_POST['fil1'];

if($id && $fil1) {
	$result = $conn->query('SELECT * FROM gng WHERE (serial_id LIKE "%'.$id.'%" OR family LIKE "%'.$id.'%" OR package_type LIKE "%'.$id.'%" OR loc LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR test_type LIKE "%'.$id.'%") AND area = "'.$fil1.'" AND line LIKE "%'.$_SESSION['line'].'%" ORDER BY id DESC');
	while ($row = $result->fetch_assoc()) {

        echo '<tr style="cursor: pointer;">
            <td class="srID">' . $row['serial_id'] . '</td>
            <td class="fam">' . $row['family'] . '</td>
            <td class="">' . $row['package_type'] . '</td>
            <td class="tst">' . $row['tst_pf'] . '</td>
            <td class="">' . $row['test_type'] . '</td>
            <td class="stats">' . $row['status'] . '</td>
            <td class="tstID">' . $row['tester_id'] . '</td>
            <td class="hdID">' . $row['handler_id'] . '</td>
            <td class="">' . $row['good_qty'] . '</td>
            <td class="">' . $row['nogood_qty'] . '</td>
            <td class="loc">' . $row['loc'] . '</td>
            <td class="strg">' . $row['storage'] . '</td>
            <td class="">' . $row['remarks'] . '</td>
            <td class="td13">' . $row['collection_date'] . '</td>
            <td class="expDate">' . $row['expired_date'] . '</td>
            <td class="">' . $row['qa_stamp_date'] . '</td>
            <td class="td14">' . $row['area'] . '</td>
            <td class="line">' . $row['line'] . '</td>
            <td class="">' . $row['last_update'] . '</td>
            <td class="btn-link"><a class="file" href="uploads/'. $row['sFile'] .'" target="_blank">'. $row['sFile'] .'</a></td>
                            
        </tr>';
	}
}else if($id){  
	$result = $conn->query('SELECT * FROM gng WHERE serial_id LIKE "%'.$id.'%" OR family LIKE "%'.$id.'%" OR package_type LIKE "%'.$id.'%" OR loc LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR test_type LIKE "%'.$id.'%" AND line LIKE "%'.$_SESSION['line'].'%" ORDER BY id DESC');
	while ($row = $result->fetch_assoc()) {

		echo '<tr style="cursor: pointer;">
            <td class="srID">' . $row['serial_id'] . '</td>
            <td class="fam">' . $row['family'] . '</td>
            <td class="">' . $row['package_type'] . '</td>
            <td class="tst">' . $row['tst_pf'] . '</td>
            <td class="">' . $row['test_type'] . '</td>
            <td class="stats">' . $row['status'] . '</td>
            <td class="tstID">' . $row['tester_id'] . '</td>
            <td class="hdID">' . $row['handler_id'] . '</td>
            <td class="">' . $row['good_qty'] . '</td>
            <td class="">' . $row['nogood_qty'] . '</td>
            <td class="loc">' . $row['loc'] . '</td>
            <td class="strg">' . $row['storage'] . '</td>
            <td class="">' . $row['remarks'] . '</td>
            <td class="td13">' . $row['collection_date'] . '</td>
            <td class="expDate">' . $row['expired_date'] . '</td>
            <td class="">' . $row['qa_stamp_date'] . '</td>
            <td class="td14">' . $row['area'] . '</td>
            <td class="line">' . $row['line'] . '</td>
            <td class="">' . $row['last_update'] . '</td>
            <td class="btn-link"><a class="file" href="uploads/'. $row['sFile'] .'" target="_blank">'. $row['sFile'] .'</a></td>

        </tr>';
	}
}else if($fil1){
	$result = $conn->query('SELECT * FROM gng WHERE area="'.$fil1.'" AND line LIKE "%'.$_SESSION['line'].'%" ORDER BY id DESC');
	while ($row = $result->fetch_assoc()) {

		echo '<tr style="cursor: pointer;">
            <td class="srID">' . $row['serial_id'] . '</td>
            <td class="fam">' . $row['family'] . '</td>
            <td class="">' . $row['package_type'] . '</td>
            <td class="tst">' . $row['tst_pf'] . '</td>
            <td class="">' . $row['test_type'] . '</td>
            <td class="stats">' . $row['status'] . '</td>
            <td class="tstID">' . $row['tester_id'] . '</td>
            <td class="hdID">' . $row['handler_id'] . '</td>
            <td class="">' . $row['good_qty'] . '</td>
            <td class="">' . $row['nogood_qty'] . '</td>
            <td class="loc">' . $row['loc'] . '</td>
            <td class="strg">' . $row['storage'] . '</td>
            <td class="">' . $row['remarks'] . '</td>
            <td class="td13">' . $row['collection_date'] . '</td>
            <td class="expDate">' . $row['expired_date'] . '</td>
            <td class="">' . $row['qa_stamp_date'] . '</td>
            <td class="td14">' . $row['area'] . '</td>
            <td class="line">' . $row['line'] . '</td>
            <td class="">' . $row['last_update'] . '</td>
            <td class="btn-link"><a class="file" href="uploads/'. $row['sFile'] .'" target="_blank">'. $row['sFile'] .'</a></td>

        </tr>';
	}
}
mysqli_close($conn);
?>
