<?php
require('../../frameworks/ajaxConn.php');

$id = $_POST['id'];
$cat = $_POST['cat'];

print_r($id);
print_r($cat);
switch($cat)
{
    case "LOADBOARD":
        $result = $conn->query('SELECT * FROM loadboard WHERE serial_id LIKE "%'.$id.'%" or lb_id LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='td0' scope='row' style='display: none;'>$row[id]</td>
              <td class='td1'>$row[serial_id]</td>
              <td class='td2'>$row[lb_id]</td>
              <td class='td3'>$row[family]</td>
              <td class='td6'>$row[n_plus]</td>
              <td class='td5'>$row[tst_pf]</td>
              <td class=''>$row[status]</td>
              <td class=''>$row[tester_id]</td>
              <td class=''>$row[handler_id]</td>
              <td class=''>$row[loc]</td>
              <td class='td8'>$row[storage]</td>
              <td class='td4'>$row[vendor]</td>
              <td class='td7'>$row[line]</td>
              <td class='td9'>$row[remarks]</td>
              <td class=''>$row[clerk]</td>
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
        $result = $conn->query('SELECT * FROM socket WHERE socket_id LIKE "%'.$id.'%" or family LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='td0' scope='row' style='display: none;'>$row[id]</td>
              <td class='td1'>$row[socket_id]</td>
              <td class='td2'>$row[family]</td>
              <td class='td11'>$row[package_type]</td>
              <td class='td12'>$row[part_no]</td>
              <td class='td7'>$row[tst_pf]</td>
              <td class=''>$row[status]</td>
              <td class=''>$row[tester_id]</td>
              <td class=''>$row[handler_id]</td>
              <td class=''>$row[loc]</td>
              <td class='td5'>$row[storage]</td>
              <td class='td3'>$row[vendor]</td>
              <td class='td9'>$row[line]</td>
              <td class='td4'>$row[pin_type]</td>
              <td class='td8'>$row[pin_count]</td>
              <td class=''>$row[shotcount]</td>
              <td class='td13'>$row[max_shotcount]</td>
              <td class='td10'>$row[site]</td>
              <td class='td6'>$row[gs_code]</td>
              <td class='td14'>$row[remarks]</td>
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
    case "GNG":
        $result = $conn->query('SELECT * FROM gng WHERE serial_id LIKE "%'.$id.'%" or family LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='td0' scope='row' style='display: none;'>$row[id]</td>
              <td class='td1'>$row[serial_id]</td>
              <td class='td5'>$row[family]</td>
              <td class='td13'>$row[package_type]</td>
              <td class='td2'>$row[tst_pf]</td>
              <td class='td3'>$row[test_type]</td>
              <td class=''>$row[status]</td>
              <td class=''>$row[tester_id]</td>
              <td class=''>$row[handler_id]</td>
              <td class='td4'>$row[good_qty]</td>
              <td class='td8'>$row[nogood_qty]</td>
              <td class=''>$row[loc]</td>
              <td class='td7'>$row[storage]</td>
              <td class=''>'$row[remarks]</td>
              <td class='td9'>$row[collection_date]</td>
              <td class='td10'>$row[expired_date]</td>
              <td class='td11'>$row[qa_stamp_date]</td>
              <td class='td14'>$row[area]</td>
              <td class='td6'>$row[line]</td>
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
    case "BIB":
        $result = $conn->query('SELECT * FROM bib WHERE serial_id LIKE "%'.$id.'%" OR family LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='td0' scope='row' style='display: none;'>$row[id]</td>
              <td class='td1'>$row[serial_id]</td>
              <td class='td2'>$row[family]</td>
              <td class='td3'>$row[tst_pf]</td>
              <td class=''>$row[status]</td>
              <td class=''>$row[tester_id]</td>
              <td class=''>$row[handler_id]</td>
              <td class=''>$row[loc]</td>
              <td class='td4'>$row[storage]</td>
              <td class='td6'>$row[vendor]</td>
              <td class=''>$row[remarks]</td>
              <td class='td5'>$row[line]</td>
              <td class='updated'>$row[last_update]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "NOZZLE":
        $result = $conn->query('SELECT * FROM nozzle WHERE nozzle_partno LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR  box_no LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='td0' scope='row' style='display: none;'>$row[id]</td>
              <td class='td2'>$row[box_no]</td>		
              <td class='td1'>$row[nozzle_partno]</td>
              <td class='td7'>$row[altrntv_nozzle]</td>
              <td class='td3'>$row[package]</td>
              <td class=''>$row[status]</td>
              <td class='td4'>$row[machine_model]</td>
              <td class=''>$row[machine_id]</td>
              <td class='ShotCnt'>$row[shots]</td>
              <td class='td5'>$row[max_shots]</td>
              <td class=''>$row[remarks]</td>
              <td class='td8'>$row[line]</td>
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
        case "COLLET":
          $result = $conn->query('SELECT * FROM collet WHERE nozzle_partno LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR  box_no LIKE "%'.$id.'%"');
          $count=mysqli_num_rows($result);
          // $cntr = 0;
          if ($count > 0){
            while ($row = $result->fetch_assoc()) {
              echo "<tr>
                <td class='td0' scope='row' style='display: none;'>$row[id]</td>
                <td class='td2'>$row[box_no]</td>		
                <td class='td1'>$row[nozzle_partno]</td>
                <td class='td7'>$row[altrntv_nozzle]</td>
                <td class='td3'>$row[package]</td>
                <td class=''>$row[status]</td>
                <td class='td4'>$row[machine_model]</td>
                <td class=''>$row[machine_id]</td>
                <td class='ShotCnt'>$row[shots]</td>
                <td class='td5'>$row[max_shots]</td>
                <td class=''>$row[remarks]</td>
                <td class='td8'>$row[line]</td>
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
            $result = $conn->query('SELECT * FROM spanker WHERE nozzle_partno LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR  box_no LIKE "%'.$id.'%"');
            $count=mysqli_num_rows($result);
            // $cntr = 0;
            if ($count > 0){
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                  <td class='td0' scope='row' style='display: none;'>$row[id]</td>
                  <td class='td2'>$row[box_no]</td>		
                  <td class='td1'>$row[nozzle_partno]</td>
                  <td class='td7'>$row[altrntv_nozzle]</td>
                  <td class='td3'>$row[package]</td>
                  <td class=''>$row[status]</td>
                  <td class='td4'>$row[machine_model]</td>
                  <td class=''>$row[machine_id]</td>
                  <td class='ShotCnt'>$row[shots]</td>
                  <td class='td5'>$row[max_shots]</td>
                  <td class=''>$row[remarks]</td>
                  <td class='td8'>$row[line]</td>
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
        $result = $conn->query('SELECT * FROM IC WHERE box_no LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR lf_name LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='td0' scope='row' style='display: none;'>$row[id]</td>
              <td class='td2'>$row[box_no]</td>		
              <td class='td1'>$row[lf_name]</td>
              <td class='td3'>$row[package]</td>
              <td class='td6'>$row[machine_model]</td>
              <td class=''>$row[machine_id]</td>
              <td class='td8'>$row[dra]</td>
              <td class='td4'>$row[insert_sn]</td>
              <td class='td9'>$row[clamp_sn]</td>
              <td class=''>$row[loc]</td>
              <td class=''>$row[out_count]</td>
              <td class=''>$row[status]</td>
              <td class=''>$row[shots]</td>
              <td class='td7'>$row[max_shots]</td>
              <td class=''>$row[remarks]</td>
              <td class='td5'>$row[line]</td>
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
    case "WP":
        $result = $conn->query('SELECT * FROM wp WHERE serial_id LIKE "%'.$id.'%" OR package_type LIKE "%'.$id.'%" OR part_no LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td class='td0' scope='row' style='display: none;'>$row[id]</td>
              <td class='td1'>$row[serial_id]</td>
              <td class='td2'>$row[package_type]</td>
              <td class='td3'>$row[part_no]</td>
              <td class='td4'>$row[dut_req]</td>
              <td class='td11'>$row[material]</td>
              <td class=''>$row[status]</td>
              <td class='td7'>$row[tst_model]</td>
              <td class=''>$row[tester_id]</td>
              <td class='td8'>$row[hd_model]</td>
              <td class=''>$row[handler_id]</td>
              <td class=''>$row[loc]</td>
              <td class='td5'>$row[rack]</td>
              <td class=''>$row[shot_count]</td>
              <td class='td10'>$row[max_shot_count]</td>
              <td class='td12'>$row[vendor]</td>
              <td class='td9'>$row[line]</td>
              <td class='td13'>$row[remarks]</td>
              <td class='td6'>$row[gs_code]</td>
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
    case "SB":
        $result = $conn->query('SELECT * FROM socket_board WHERE socket_id LIKE "%'.$id.'%" OR package_type LIKE "%'.$id.'%" OR part_no LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>             
              <td class='td0' scope='row' style='display: none;'>$row[id]</td>
              <td class='td1'>$row[socket_id]</td>
              <td class='td2'>$row[family]</td>
              <td class='td5'>$row[temp]</td>
              <td class='td9'>$row[package_type]</td>
              <td class='td10'>$row[part_no]</td>
              <td class='td4'>$row[tst_pf]</td>
              <td class='stats'>$row[status]</td>
              <td class='tstID'>$row[tester_id]</td>
              <td class='hdID'>$row[handler_id]</td>
              <td class='loc'>$row[loc]</td>
              <td class='td6'>$row[storage]</td>
              <td class='td3'>$row[vendor]</td>
              <td class='td13'>$row[line]</td>
              <td class='ShotCnt'>$row[shotcount]</td>
              <td class='td7'>$row[max_shotcount]</td>
              <td class='site'>$row[site]</td>
              <td class='remarks'>$row[remarks]</td>
              <td class='updated'>$row[last_update]</td>
            </tr>";
          }
          echo "<tr>
            <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
    case "ATC":
        $result = $conn->query('SELECT * FROM atc WHERE serial_id LIKE "%'.$id.'%" OR package_type LIKE "%'.$id.'%" OR family LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>            
              <td class='td1'>$row[serial_id]</td>
              <td class='td3'>$row[family]</td>
              <td class='td4'>$row[package_type]</td>
              <td class='td6'>$row[acu_need]</td>
              <td class=''>$row[acu_id]</td>
              <td class=''>$row[tester_id]</td>
              <td class='td2'>$row[tst_pf]</td>
              <td class='td8'>$row[pcb_board]</td>
              <td class='td7'>$row[bare_devices]</td>
              <td class='td9'>$row[adap_board]</td>
              <td class='stats'>$row[status]</td>
              <td class='loc'>$row[loc]</td>
              <td class='td10'>$row[storage]</td>
              <td class=''>$row[remarks]</td>
              <td class='td5'>$row[line]</td>
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
        $result = $conn->query('SELECT * FROM mc WHERE serial_id LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR mold_die_id LIKE "%'.$id.'%" OR 
        die_model LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR machine_pf LIKE "%'.$id.'%" OR machine_id LIKE "%'.$id.'%" OR rack LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        // $cntr = 0;
        if ($count > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<tr>            
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
              <td class='btn-link'><a href='uploads/. $row[sFile] .' target='_blank'>. $row[sFile] .</a></td>
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
    case "TP":
        $result = $conn->query('SELECT * FROM tstpartstrck WHERE itm_nm LIKE "%'.$id.'%" OR dscrptn LIKE "%'.$id.'%" OR vendor LIKE "%'.$id.'%" OR mchn_type LIKE "%'.$id.'%" OR 
        mchn_model LIKE "%'.$id.'%" OR prt_no LIKE "%'.$id.'%" OR srl_no LIKE "%'.$id.'%" OR status LIKE "%'.$id.'%" OR lction LIKE "%'.$id.'%" OR 
        remarks LIKE "%'.$id.'%" OR prson LIKE "%'.$id.'%" OR installedTo LIKE "%'.$id.'%"');
        $count=mysqli_num_rows($result);
        $style = 'class="style="cursor: pointer;"';
        // $cntr = 0;
        if ($count > 0){
         
          while ($row = $result->fetch_assoc()) {
            echo "<tr ".$style." data-tester-parts='$row[id]' data-current-quantity='$row[quantity]'>
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
            <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
      case "TFD":
          $result = $conn->query('SELECT * FROM tfd WHERE dieset_number LIKE "%'.$id.'%" OR package LIKE "%'.$id.'%" OR dieset_serial_number LIKE "%'.$id.'%" OR die_model LIKE "%'.$id.'%" OR 
          status LIKE "%'.$id.'%" OR machine_pf LIKE "%'.$id.'%" OR machine_id LIKE "%'.$id.'%" OR rack LIKE "%'.$id.'%" OR vendor LIKE "%'.$id.'%" OR 
          remarks LIKE "%'.$id.'%" OR line LIKE "%'.$id.'%" OR sFile LIKE "%'.$id.'%" OR date_time LIKE "%'.$id.'%"');
          $count=mysqli_num_rows($result);
          $style = 'class="style="cursor: pointer;"';
          // $cntr = 0;
          if ($count > 0){
           
            while ($row = $result->fetch_assoc()) {
              echo "<tr ".$style." data-tester-parts='$row[id]' data-current-quantity='$row[quantity]'>
              <td class='dieset_number'>$row[dieset_number]</td>
              <td class='package'>$row[package]</td>
              <td class='dieset_serial_number'>$row[dieset_serial_number]</td>
              <td class='die_model'>$row[die_model]</td>
              <td class='status'>$row[status]</td>
              <td class='machine_pf'>$row[machine_pf]</td>
              <td class='machine_id'>$row[machine_id]</td>
              <td class='rack'>$row[rack]</td>
              <td class='vendor'>$row[vendor]</td>
              <td class='remarks'>$row[remarks]</td>
              <td class='line'>$row[line]</td>
              <td class='sFile'>$row[sFile]</td>
              <td class='date_time'>$row[date_time]</td>
            </tr>";
            }
            echo "<tr>
              <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
            </tr>";
          }else{
            echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
          }
          break;
      case "SP":
        $result = $conn->query('SELECT * FROM spare_parts WHERE (description LIKE "%'.$id.'%" OR parts_code LIKE "%'.$id.'%" OR updated_qty LIKE "%'.$id.'%" OR 
        maker LIKE "%'.$id.'%") AND isDeleted = 0');
        $count=mysqli_num_rows($result);
        $style = 'class="style="cursor: pointer;"';
        // $cntr = 0;
        if ($count > 0){
          
          while ($row = $result->fetch_assoc()) {

            if($row['uploadImage'] == "")
            {
              $imageUpload = "noimage.jpg"; 
            }
            else{
              $imageUpload = $row['uploadImage'];
            }
            echo '<tr '.$style.' data-tester-parts='. $row['id']. '>
            <td class="image"><a href="uploads/spareParts/'. $imageUpload  .'" target="_blank"><img class="img-responsive" src="uploads/spareParts/'. $imageUpload .'" style="width:100%"></a> </td>
            <td class="description">' . $row['description'] . '</td>
            <td class="parts_code">' . $row['parts_code'] . '</td>
            <td class="quantity">' . $row['current_qty'] . '</td>
            <td class="updated_qty">' . $row['updated_qty'] . '</td>
            <td class="maker">' . $row['maker'] . '</td>
            <td class="lction">' . $row['location'] . '</td>
            <td class="requesting_personnel">' . $row['personnel'] . '</td>
            <td class="line">' . $row['line'] . '</td>
            <td class="status">' . $row['status'] . '</td>
            <td class="machine">' . $row['machine'] . '</td>
            <td class="date_requested">' . $row['date_requested'] . '</td>
            <td class="remarks">' . $row['remarks'] . '</td>
          </tr>';
          }
          echo "<tr>
            <th colspan='20' class='text-center bg-success' scope='row'>SEARCH RESULT: $count</th>
          </tr>";
        }else{
          echo "<th colspan='20' class='text-center bg-warning' scope=''>SEARCH RESULT: 0</th>";
        }
        break;
        case "CK":
          $result = $conn->query('SELECT * FROM ck WHERE category LIKE "%'.$id.'%" OR handler_pf LIKE "%'.$id.'%" OR storage LIKE "%'.$id.'%" OR package_type LIKE "%'.$id.'%" OR serial_id LIKE "%'.$id.'%"');
          $count=mysqli_num_rows($result);
          // $cntr = 0;
          if ($count > 0){
            while ($row = $result->fetch_assoc()) {
              echo "<tr data-change-kit='". $row['id'] ."'>             
              <td class='srID'>". $row['serial_id'] ."</td>
              <td class='hdPF'>". $row['handler_pf'] ."</td>
              <td class='pkgType'>". $row['package_type'] ."</td>
              <td class='cat'>". $row['category'] ."</td>
              <td class='strg'>". $row['storage'] ."</td>
              <td class='size'>". $row['size'] ."</td>
              <td class='ckResult'>". $row['ckResult'] ."</td>
              <td class='date'>". $row['date_time'] ."</td>
              <td class='updated'>". $row['last_update'] ."</td>
              <td class=''>". $row['remarks'] ."</td>
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
