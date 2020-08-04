<?php
// require('../dbcon/dbcon.php');
require('../frameworks/ajaxConn.php');
//
if($_POST['id']){
	$id=$_POST['id'];
	$result = $conn->query('SELECT socket_id,family,dut_req,tst_pf,status,loc,storage,line,vendor,tester_id,handler_id,lastupdate FROM socket WHERE socket_id LIKE "%'.$id.'%"');
	while ($row = $result->fetch_assoc()) {

		echo "<tr style='cursor: pointer;'>
        <th class='lbID' scope='row'>$row[socket_id]</th>
        <td class='fam'>$row[family]</td>
        <td class='dut'>$row[dut_req]</td>
        <td class='tst'>$row[tst_pf]</td>
        <td class='stats'>$row[status]</td>
        <td class='tstID'>$row[tester_id]</td>
        <td class='hdID'>$row[handler_id]</td>
        <td class='loc'>$row[loc]</td>
        <td class='strg'>$row[storage]</td>
        <td class='ven'>$row[vendor]</td>
        <td class='line'>$row[line]</td>
        <td class='line'>$row[last_update]</td>
      </tr>";
	}
}else if ($_POST['id'] == ""){
	$id=$_POST['id'];
	$result = $conn->query('SELECT socket_id,family,dut_req,tst_pf,status,loc,storage,line,vendor,tester_id,handler_id,lastupdate FROM socket');
	while ($row = $result->fetch_assoc()) {

		echo "<tr style='cursor: pointer;'>
        <th class='lbID' scope='row'>$row[socket_id]</th>
        <td class='fam'>$row[family]</td>
        <td class='dut'>$row[dut_req]</td>
        <td class='tst'>$row[tst_pf]</td>
        <td class='stats'>$row[status]</td>
        <td class='tstID'>$row[tester_id]</td>
        <td class='hdID'>$row[handler_id]</td>
        <td class='loc'>$row[loc]</td>
        <td class='strg'>$row[storage]</td>
        <td class='ven'>$row[vendor]</td>
        <td class='line'>$row[line]</td>
        <td class='line'>$row[last_update]</td>
      </tr>";
	}
}
mysqli_close($conn);
// $id=$_POST['id'];
// try {
// 	class Db2 {
//     private static $instance = NULL;
//
//     private function __construct() {}
//
//     private function __clone() {}
//
//     public static function getInstance() {
//       if (!isset(self::$instance)) {
//         $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
//         self::$instance = new PDO('mysql:host=localhost;dbname=cents', 'root', 'root_admin01', $pdo_options);
//       }
//       return self::$instance;
//     }
//   }
// 	//$req = $db->query('SELECT * FROM loadboard LIMIT 20');
//     // Find out how many items are in the table
// 		$Db2= Db2::getInstance();
//     $total = $Db2->query('
//         SELECT
//             COUNT(*)
//         FROM
//             loadboard
// 				WHERE
// 					lb_id  LIKE "%'.$id.'%"
//     ')->fetchColumn();
//
//     // How many items to list per page
//     $limit = 20;
//
//     // How many pages will there be
//     $pages = ceil($total / $limit);
//
//     // What page are we currently on?
//     $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
//         'options' => array(
//             'default'   => 1,
//             'min_range' => 1,
//         ),
//     )));
//
//     // Calculate the offset for the query
//     $offset = ($page - 1)  * $limit;
//
//     // Some information to display to the user
//     $start = $offset + 1;
//     $end = min(($offset + $limit), $total);
//
//     // The "back" link
//     $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
//
//     // The "forward" link
//     $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
//
//     // Display the paging information
//     echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';
//
//     // Prepare the paged query
//     $stmt = $Db2->prepare('
//         SELECT
//             lb_id,family,dut_req,tst_pf,status,loc,storage,line,vendor,tester_id,handler_id
//         FROM
//             loadboard
// 				WHERE
// 					lb_id  LIKE "%'.$id.'%"
//         ORDER BY
//             lb_id
//         LIMIT
//             :limit
//         OFFSET
//             :offset
//     ');
//
//     // Bind the query params
//     $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
//     $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
//     $stmt->execute();
//
//     // Do we have any results?
//     if ($stmt->rowCount() > 0) {
//         // Define how we want to fetch the results
//         $stmt->setFetchMode(PDO::FETCH_ASSOC);
//         $iterator = new IteratorIterator($stmt);
//
//         // Display the results
//         foreach ($iterator as $row) {
//             echo '<p>', $row['lb_id'], '</p>';
//         }
//
//     } else {
//         echo '<p>No results could be displayed.</p>';
//     }
//
// } catch (Exception $e) {
//     echo '<p>', $e->getMessage(), '</p>';
// }





// $connect = mysqli_connect("localhost", "root", "", "testing");

?>
