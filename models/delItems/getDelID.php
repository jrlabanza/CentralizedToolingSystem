<?php
require('../../frameworks/ajaxConn.php');

$id = $_POST['id'];
$cat = $_POST['cat'];

switch($cat)
{
    case "LOADBOARD":
        $result = $conn->query('SELECT * FROM loadboard WHERE line = "'.$_SESSION['line'].'" AND serial_id LIKE "%'.$id.'%" or lb_id LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope='row'><input type='checkbox' name='cbox' value='$row[id]'></td>
              <td class='srID' scope='row'>$row[serial_id]</td>
              <td class='lbID' scope='row'>$row[lb_id]</td>
              <td class='fam'>$row[family]</td>
              <td class='fam'>$row[n_plus]</td>
              <td class='tst'>$row[tst_pf]</td>
              <td class='stats'>$row[status]</td>
              <td class='tstID'>$row[tester_id]</td>
              <td class='hdID'>$row[handler_id]</td>
              <td class='loc'>$row[loc]</td>
              <td class='strg'>$row[storage]</td>
              <td class='ven'>$row[vendor]</td>
              <td class='line'>$row[remarks]</td>
              <td class='line'>$row[line]</td>
              <td class=''>$row[last_update]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='15' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='15' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "SOCKET":
        $result = $conn->query('SELECT * FROM socket WHERE line = "'.$_SESSION['line'].'" AND socket_id LIKE "%'.$id.'%" or family LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>
              <td class='lbID'>$row[socket_id]</td>
              <td class='fam'>$row[family]</td>
              <td class='pckgType'>$row[package_type]</td>
              <td class='prtNo'>$row[part_no]</td>
              <td class='tst'>$row[tst_pf]</td>
              <td class='stats'>$row[status]</td>
              <td class='tstID'>$row[tester_id]</td>
              <td class='hdID'>$row[handler_id]</td>
              <td class='loc'>$row[loc]</td>
              <td class='strg'>$row[storage]</td>
              <td class='ven'>$row[vendor]</td>
              <td class='line'>$row[line]</td>
              <td class='pinType'>$row[pin_type]</td>
              <td class='pinCount'>$row[pin_count]</td>
              <td class='ShotCnt'>$row[shotcount]</td>
              <td class='mShotCnt'>$row[max_shotcount]</td>
              <td class='site'>$row[site]</td>
              <td class='gsCode'>$row[gs_code]</td>
              <td class='remarks'>$row[remarks]</td>
              <td class='updated'>$row[lastupdate]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='21' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='21' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "GNG":
        $result = $conn->query('SELECT * FROM gng WHERE line = "'.$_SESSION['line'].'" AND serial_id LIKE "%'.$id.'%" or family LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>
              <td class='srID'>$row[serial_id]</td>
              <td class='fam'>$row[family]</td>
              <td class='tst'>$row[tst_pf]</td>
              <td class='stats'>$row[status]</td>
              <td class='tstID'>$row[tester_id]</td>
              <td class='hdID'>$row[handler_id]</td>
              <td class='loc'>$row[loc]</td>
              <td class='strg'>$row[storage]</td>
              <td class='strg'>$row[good_qty]</td>
              <td class='strg'>$row[nogood_qty]</td>
              <td class='line'>$row[remarks]</td>
              <td class='line'>$row[line]</td>
              <td class='updated'>$row[lastupdate]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='14' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='14' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "BIB":
        $result = $conn->query('SELECT * FROM bib WHERE line = "'.$_SESSION['line'].'" AND serial_id LIKE "%'.$id.'%" or family LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>
              <td class='srID'>$row[serial_id]</td>
              <td class='fam'>$row[family]</td>
              <td class='tst'>$row[tst_pf]</td>
              <td class='stats'>$row[status]</td>
              <td class='tstID'>$row[tester_id]</td>
              <td class='hdID'>$row[handler_id]</td>
              <td class='loc'>$row[loc]</td>
              <td class='strg'>$row[storage]</td>
              <td class='ven'>$row[vendor]</td>
              <td class='line'>$row[remarks]</td>
              <td class='line'>$row[line]</td>
              <td class='updated'>$row[lastupdate]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='14' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='14' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "NOZZLE":
        $result = $conn->query('SELECT * FROM nozzle WHERE line = "'.$_SESSION['line'].'" AND nozzle_partno LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR  box_no LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>
              <td class='lbID'>$row[box_no]</td>		
              <td class='srID'>$row[nozzle_partno]</td>
              <td class='prtNo'>$row[altrntv_nozzle]</td>
              <td class='pckgType'>$row[package]</td>
              <td class='stats'>$row[status]</td>
              <td class='tst'>$row[machine_model]</td>
              <td class='tstID'>$row[machine_id]</td>
              <td class='ShotCnt'>$row[shots]</td>
              <td class='mShotCnt'>$row[max_shots]</td>
              <td class=''>$row[remarks]</td>
              <td class='line'>$row[line]</td>
              <td class=''>$row[last_update]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "CHIPMOUNT NOZZLE":
      $result = $conn->query('SELECT * FROM chipmount_nozzle WHERE line = "'.$_SESSION['line'].'" AND nozzle_partno LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR  box_no LIKE "%'.$id.'%"');
      $count=mysqli_num_rows($result);
      // $cntr = 0;
      if ($count > 0){
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
            <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>
            <td class='lbID'>$row[box_no]</td>		
            <td class='srID'>$row[nozzle_partno]</td>
            <td class='prtNo'>$row[altrntv_nozzle]</td>
            <td class='pckgType'>$row[package]</td>
            <td class='stats'>$row[status]</td>
            <td class='tst'>$row[machine_model]</td>
            <td class='tstID'>$row[machine_id]</td>
            <td class='ShotCnt'>$row[shots]</td>
            <td class='mShotCnt'>$row[max_shots]</td>
            <td class=''>$row[remarks]</td>
            <td class='line'>$row[line]</td>
            <td class=''>$row[last_update]</td>
          </tr>";
        }
        echo "<tr>
          <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
        </tr>";
      }else{
        echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
      }
      break;     
    case "IC":
        $result = $conn->query('SELECT * FROM IC WHERE line = "'.$_SESSION['line'].'" AND lf_name LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR box_no LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>
              <td class='lbID'>$row[box_no]</td>		
              <td class='srID'>$row[lf_name]</td>
              <td class='pckgType'>$row[package]</td>
              <td class='tst'>$row[machine_model]</td>
              <td class='tstID'>$row[machine_id]</td>
              <td class='ven'>$row[dra]</td>
              <td class='pinType'>$row[insert_sn]</td>
              <td class='prtNo'>$row[clamp_sn]</td>
              <td class='loc'>$row[loc]</td>
              <td class='pinCount'>$row[out_count]</td>
              <td class='stats'>$row[status]</td>
              <td class='ShotCnt'>$row[shots]</td>
              <td class='mShotCnt'>$row[max_shots]</td>
              <td class=''>$row[remarks]</td>
              <td class='line'>$row[line]</td>
              <td class=''>$row[last_update]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "MC":
        $result = $conn->query('SELECT * FROM mc WHERE serial_id LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR mold_die_id LIKE "%'.$id.'%" AND line = "'.$_SESSION['line'].'"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>
              <td class='td1'>$row[serial_id]</td>		
              <td class='td2'>$row[package]</td>
              <td class='td3'>$row[mold_die_id]</td>
              <td class='td4'>$row[die_model]</td>
              <td class='stats'>$row[status]</td>
              <td class='td5'>$row[machine_pf]</td>
              <td class='td8'>$row[machine_id]</td>
              <td class='td6'>$row[rack]</td>
              <td class='td7'>$row[vendor]</td>
              <td class=''>$row[remarks]</td>
              <td class='line'>$row[line]</td>
              <td class=''>$row[last_update]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0 $id</th>";
        }
        break;
    case "WP":
        $result = $conn->query('SELECT * FROM wp WHERE line = "'.$_SESSION['line'].'" AND serial_id LIKE "%'.$id.'%" OR package_type LIKE "%'.$id.'%" OR part_no LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>
              <td class='td1'>$row[serial_id]</td>
              <td class='td2'>$row[package_type]</td>
              <td class='td3'>$row[part_no]</td>
              <td class='td4'>$row[dut_req]</td>
              <td class='td5'>$row[material]</td>
              <td class='stats'>$row[status]</td>
              <td class='tst'>$row[tst_model]</td>
              <td class='td12'>$row[tester_id]</td>
              <td class='td9'>$row[hd_model]</td>
              <td class='td13'>$row[handler_id]</td>
              <td class='loc'>$row[loc]</td>
              <td class='strg'>$row[rack]</td>
              <td class='td11'>$row[shot_count]</td>
              <td class='td10'>$row[max_shot_count]</td>
              <td class='td6'>$row[vendor]</td>
              <td class='line'>$row[line]</td>
              <td class=''>$row[remarks]</td>
              <td class='td7'>$row[gs_code]</td>
              <td class='td15'>$row[last_update]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "SB":
        $result = $conn->query('SELECT * FROM socket_board WHERE line = "'.$_SESSION['line'].'" AND socket_id LIKE "%'.$id.'%" or family LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>
              <td class='lbID'>$row[socket_id]</td>
							<td class='fam'>$row[family]</td>
							<td class='td1'>$row[temp]</td>
							<td class='pckgType'>$row[package_type]</td>
							<td class='prtNo'>$row[part_no]</td>
							<td class='tst'>$row[tst_pf]</td>
							<td class='stats'>$row[status]</td>
							<td class='tstID'>$row[tester_id]</td>
							<td class='hdID'>$row[handler_id]</td>
							<td class='loc'>$row[loc]</td>
							<td class='strg'>$row[storage]</td>
							<td class='ven'>$row[vendor]</td>
							<td class='line'>$row[line]</td>
							<td class='ShotCnt'>$row[shotcount]</td>
							<td class='mShotCnt'>$row[max_shotcount]</td>
							<td class='site'>$row[site]</td>
							<td class='remarks'>$row[remarks]</td>
							<td class='updated'>$row[last_update]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='21' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='21' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "ATC":
        $result = $conn->query('SELECT * FROM atc WHERE line = "'.$_SESSION['line'].'" AND serial_id LIKE "%'.$id.'%" or family LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>           
              <td class='srID'>$row[serial_id]</td>
              <td class='fam'>$row[family]</td>
              <td class=''>$row[package_type]</td>
              <td class='testType'>$row[acu_need]</td>
              <td class=''>$row[acu_id]</td>
              <td class=''>$row[tester_id]</td>
              <td class='tst'>$row[tst_pf]</td>
              <td class=''>$row[pcb_board]</td>
              <td class='tstID'>$row[bare_devices]</td>
              <td class='hdID'>$row[adap_board]</td>
              <td class='stats'>$row[status]</td>
              <td class='loc'>$row[loc]</td>
              <td class='strg'>$row[storage]</td>
              <td class=''>$row[remarks]</td>
              <td class='line'>$row[line]</td>
              <td class=''>$row[last_update]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='21' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='21' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "TP":
        $result = $conn->query('SELECT * FROM tstpartstrck WHERE itm_nm LIKE "%'.$id.'%" OR dscrptn LIKE "%'.$id.'%" OR vendor LIKE "%'.$id.'%" OR mchn_type LIKE "%'.$id.'%" OR 
        mchn_model LIKE "%'.$id.'%" OR prt_no LIKE "%'.$id.'%" OR srl_no LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR lction LIKE "%'.$id.'%" OR 
        remarks LIKE "%'.$id.'%" OR prson LIKE "%'.$id.'%" OR installedTo LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          $style = 'class="style="cursor: pointer;"';
          while ($row = $result->fetch_assoc()) {
            echo "<tr ".$style." data-tester-parts='$row[id]' data-current-quantity='$row[quantity]'>
            <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>   
            <td class='itm_nm'>$row[itm_nm]</td>
            <td class='quantity'>$row[quantity]</td>
            <td class='dscrptn'>$row[dscrptn]</td>
            <td class='prt_no'>$row[prt_no]</td>
            <td class='srl_no'>$row[srl_no]</td>
            <td class='vendor'>$row[vendor]</td>
            <td class='mchn_model'>$row[mchn_model]</td>
            <td class='status'>$row[status]</td>
            <td class='lction'>$row[lction]</td>
            <td class='remarks'>$row[remarks]</td>
            <td class='installedTo'>$row[installedTo]</td>
            <td class='prson'>$row[prson]</td>
            <td class='date_time'>$row[date_time]</td>
          </tr>";
          }
          echo "<tr>
            <th colspan='21' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='21' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "RC":
          $result = $conn->query('SELECT * FROM rubber_collet WHERE rubber_tip_no LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR box LIKE "%'.$id.'%" OR mchn_model LIKE "%'.$id.'%" OR 
          mchn_id LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR lction LIKE "%'.$id.'%" OR quantity LIKE "%'.$id.'%" OR line LIKE "%'.$id.'%" OR transaction_date LIKE "%'.$id.'%" OR
          line LIKE "%'.$id.'%" OR custodian LIKE "%'.$id.'%" OR client LIKE "%'.$id.'%"');
          $count=mysqli_num_rows($result);
          // $cntr = 0;
          if ($count > 0){
            $style = 'class="style="cursor: pointer;"';
            while ($row = $result->fetch_assoc()) {
              echo "<tr ".$style." data-tester-parts='$row[id]' data-current-quantity='$row[quantity]'>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>   
              <td class='rubber_collet_no'>$row[rubber_tip_no]</td>
              <td class='package'>$row[package]</td>
              <td class='box'>$row[box]</td>
              <td class='mchn_model'>$row[mchn_model]</td>
              <td class='mchn_id'>$row[mchn_id]</td>
              <td class='status'>$row[status]</td>
              <td class='lction'>$row[lction]</td>
              <td class='line'>$row[line]</td>
              <td class='quantity'>$row[quantity]</td>
              <td class='transaction_date'>$row[transaction_date]</td>
              <td class='client'>$row[client]</td>
              <td class='custodian'>$row[custodian]</td>
            </tr>";
            }
            echo "<tr>
              <th colspan='21' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
            </tr>";
          }else{
            echo "<th colspan='21' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
          }
          break;
      case "PG":
        $result = $conn->query('SELECT * FROM program WHERE isDeleted = 0 AND (line = "'.$_SESSION['line'].'" AND serial_id LIKE "%'.$id.'%" or lb_id LIKE "%'.$id.'%")');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope='row'><input type='checkbox' name='cbox' value='$row[id]'></td>
              <td class='srID' scope='row'>$row[serial_id]</td>
              <td class='lbID' scope='row'>$row[lb_id]</td>
              <td class='fam'>$row[family]</td>
              <td class='fam'>$row[n_plus]</td>
              <td class='tst'>$row[tst_pf]</td>
              <td class='stats'>$row[status]</td>
              <td class='tstID'>$row[tester_id]</td>
              <td class='hdID'>$row[handler_id]</td>
              <td class='loc'>$row[loc]</td>
              <td class='strg'>$row[storage]</td>
              <td class='ven'>$row[vendor]</td>
              <td class='line'>$row[remarks]</td>
              <td class='line'>$row[line]</td>
              <td class=''>$row[last_update]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='15' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='15' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break; 
      case "SP":
        $result = $conn->query('SELECT * FROM spare_parts WHERE isDeleted = 0 AND (description LIKE "%'.$id.'%" or parts_code LIKE "%'.$id.'%" or maker LIKE "%'.$id.'%" or location LIKE "%'.$id.'%" or machine LIKE "%'.$id.'%" or status LIKE "%'.$id.'%")');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='".$row['id']."'></td>
              <td class='description'>" . $row['description'] . "</td>
              <td class='parts_code'>" . $row['parts_code'] . "</td>
              <td class='quantity'>" . $row['current_qty'] . "</td>
              <td class='updated_qty'>" . $row['updated_qty'] . "</td>
              <td class='maker'>" . $row['maker'] . "</td>
              <td class='lction'>" . $row['location'] . "</td>
              <td class='requesting_personnel'>" . $row['personnel'] . "</td>
              <td class='line'>" . $row['line'] . "</td>
              <td class='status'>" . $row['status'] . "</td>
              <td class='machine'>" . $row['machine'] . "</td>
              <td class='date_requested'>" . $row['date_requested'] . "</td>
              <td class='remarks'>" . $row['remarks'] . "</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='15' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='15' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;  
      case "COLLET":
        $result = $conn->query('SELECT * FROM collet WHERE line = "'.$_SESSION['line'].'" AND nozzle_partno LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR  box_no LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>
              <td class='lbID'>$row[box_no]</td>		
              <td class='srID'>$row[nozzle_partno]</td>
              <td class='prtNo'>$row[altrntv_nozzle]</td>
              <td class='pckgType'>$row[package]</td>
              <td class='stats'>$row[status]</td>
              <td class='tst'>$row[machine_model]</td>
              <td class='tstID'>$row[machine_id]</td>
              <td class='ShotCnt'>$row[shots]</td>
              <td class='mShotCnt'>$row[max_shots]</td>
              <td class=''>$row[remarks]</td>
              <td class='line'>$row[line]</td>
              <td class=''>$row[last_update]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
        case "SPANKER":
          $result = $conn->query('SELECT * FROM spanker WHERE line = "'.$_SESSION['line'].'" AND nozzle_partno LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR  box_no LIKE "%'.$id.'%"');
          $count=mysqli_num_rows($result);
          // $cntr = 0;
          if ($count > 0){
            while ($row = $result->fetch_assoc()) {
              echo "<tr>
                <td class='tblID' scope=''><input type='checkbox' name='cbox' value='$row[id]'></td>
                <td class='lbID'>$row[box_no]</td>		
                <td class='srID'>$row[nozzle_partno]</td>
                <td class='prtNo'>$row[altrntv_nozzle]</td>
                <td class='pckgType'>$row[package]</td>
                <td class='stats'>$row[status]</td>
                <td class='tst'>$row[machine_model]</td>
                <td class='tstID'>$row[machine_id]</td>
                <td class='ShotCnt'>$row[shots]</td>
                <td class='mShotCnt'>$row[max_shots]</td>
                <td class=''>$row[remarks]</td>
                <td class='line'>$row[line]</td>
                <td class=''>$row[last_update]</td>
              </tr>";
            }
            echo "<tr>
              <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
            </tr>";
          }else{
            echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
          }
          break;            
    default:
        break;
}

mysqli_close($conn);
?>
