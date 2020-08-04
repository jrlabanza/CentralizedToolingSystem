<?php
ob_start();
session_start();
if (isset($_SESSION['level'])){
}else{
  $_SESSION['level'] = "";
}
if (isset($_SESSION['line'])){
}else{
  $_SESSION['line'] = "";
}

?>
<div class="wrapper">
  <nav id="sidebar" style="z-index: 1;background-color:#133445;" >
    <!-- <div class="sidebar-header fixed-top">
        <h3>CENTS</h3>
    </div> -->
    <!-- <ul class="list-unstyled components">
        
    </ul> -->
    <ul class="list-unstyled components" style="background-color:#133455;">
        <li class="">        
          <!-- <a href="?controller=pages&action=home">HOME</a> -->

<?php
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-th-large fa-stack-2x"></i>
              </span> Load Board</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <!-- <li><a href="?controller=pages&action=underCon">
                  <span class="fa-stack fa-md">
                    <i class="fa fa-share-square-o fa-stack-2x"></i>
                  </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <li><a id="navTrack" href="?controller=pages&action=trkLB">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a></li>
<?php } ?>
                <!-- <li><a href="?controller=pages&action=pizzaLB">
                  <span class="fa-stack fa-md">
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> Pizza Board</a></li> -->
                <li><a href="?controller=pages&action=lbPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
                <li><a href="?controller=posts&action=lbHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
                <li></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
            <a href="#socket" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-plug fa-stack-2x"></i>
              </span> Socket</a>
            <ul class="collapse list-unstyled" id="socket">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <li><a id="navTrack" href="?controller=pages&action=trkSocket">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a></li>
<?php } ?>
              <li><a href="?controller=pages&action=socketPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=socketHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
            <a href="#gonogo" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-chain-broken fa-stack-2x"></i>
              </span> GoNoGo</a>
            <ul class="collapse list-unstyled" id="gonogo">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <li><a id="navTrack" href="?controller=pages&action=trkGNG">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a></li>
<?php } ?>
              <li><a href="?controller=pages&action=gngPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=gngHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
<!-- START OF AUTO CORR -->
            <a href="#autoCorr" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-link fa-stack-2x"></i>
              </span> Auto Corr</a>
            <ul class="collapse list-unstyled" id="autoCorr">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <li><a id="navTrack" href="?controller=pages&action=trkATC">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a></li>
<?php } ?>
              <li><a href="?controller=pages&action=atcPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=atcHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
<!-- START OF CABLE -->
<a href="#cable" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-code-fork fa-stack-2x"></i>
              </span> Cable</a>
            <ul class="collapse list-unstyled" id="cable">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <li><a id="navTrack" href="?controller=pages&action=trkCable">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a></li>
<?php } ?>
              <li><a href="?controller=pages&action=cablePagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=cableHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
<!-- START OF TEST STAND -->
<a href="#testStand" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-bookmark fa-stack-2x"></i>
              </span> Test Stand</a>
            <ul class="collapse list-unstyled" id="testStand">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <li><a id="navTrack" href="?controller=pages&action=trkTS">
                  <span class="fa-stack fa-md">
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a></li>
<?php } ?>
              <li><a href="?controller=pages&action=testStandPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=testStandHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
<!-- START OF BIB -->
            <a href="#BiB" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-qrcode fa-stack-2x"></i>
              </span> Burn in Board</a>
            <ul class="collapse list-unstyled" id="BiB">
                <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <li><a id="navTrack" href="?controller=pages&action=trkBIB">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a></li>
<?php } ?>
                <li><a href="?controller=pages&action=bibPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
                <li><a href="?controller=posts&action=bibHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
                <li></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
            <a href="#SocketB" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-codepen fa-stack-2x"></i>
              </span> Socket Board</a>
            <ul class="collapse list-unstyled" id="SocketB">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
                
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <li><a href="?controller=pages&action=trkSocket">
                  <span class="fa-stack fa-md">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a>
                </li>
<?php } ?>

              <li><a href="?controller=pages&action=socketBoardPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=socketBoardHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
            <a href="#CBoard" data-toggle="collapse" aria-expanded="false"> 
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-minus-square-o fa-stack-2x"></i>
              </span> Center Board</a>
            <ul class="collapse list-unstyled" id="CBoard">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
                
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <li><a href="?controller=pages&action=trkCB">
                  <span class="fa-stack fa-md">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a>
                </li>
<?php } ?>

              <li><a href="?controller=pages&action=cbPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=cbHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
            <a href="#CKit" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-magic fa-stack-2x"></i>
              </span> Change Kit</a>
            <ul class="collapse list-unstyled" id="CKit">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->

<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <li><a href="?controller=pages&action=trkCK">
                  <span class="fa-stack fa-md">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a>
                </li>
<?php } ?>

              <li><a href="?controller=pages&action=ckPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=ckHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
            <a href="#WPress" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-eraser fa-stack-2x"></i>
              </span> Work Press</a>
            <ul class="collapse list-unstyled" id="WPress">
                <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->

<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <!-- <li><a href="?controller=pages&action=underCon">
                  <span class="fa-stack fa-md">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a>
                </li> -->
<?php } ?>

                <li><a href="?controller=pages&action=wpPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
                <li><a href="?controller=posts&action=wpHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
            <a href="#SParts" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-houzz fa-stack-2x"></i>
              </span> Spare Parts </a>
            <ul class="collapse list-unstyled" id="SParts">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->

<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <!-- <li><a href="?controller=pages&action=underCon">
                  <span class="fa-stack fa-md">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a>
                </li> -->
<?php } ?>

              <li><a href="?controller=pages&action=spPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=spHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
            <a href="#TParts" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-window-restore fa-stack-2x"></i>
              </span> Tester Parts</a>
            <ul class="collapse list-unstyled" id="TParts">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->

<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <!-- <li><a href="?controller=pages&action=underCon">
                  <span class="fa-stack fa-md">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a>
                </li> -->
<?php } ?>

              <li><a href="?controller=pages&action=tpPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=tpHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-FT' || $_SESSION['line'] == 'QFN-FT'){
}else{
?>            
            <a href="#nozzle" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-yelp fa-stack-2x"></i>
              </span> Nozzle</a>
            <ul class="collapse list-unstyled" id="nozzle">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
              <?php
  if (!empty($_SESSION['userEmail'])){
?>
                <!-- <li><a id="navTrack" href="?controller=pages&action=trkLB">Track</a></li> -->
<?php } ?>
              <li><a href="?controller=pages&action=nozzlePagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=nozzleHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-FT' || $_SESSION['line'] == 'QFN-FT'){
}else{
?>            
            <a href="#chipnzl" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-yelp fa-stack-2x"></i>
              </span> Chipmount Nozzle</a>
            <ul class="collapse list-unstyled" id="chipnzl">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
              <?php
  if (!empty($_SESSION['userEmail'])){
?>
                <!-- <li><a id="navTrack" href="?controller=pages&action=trkLB">Track</a></li> -->
<?php } ?>
              <li><a href="?controller=pages&action=chipnzlPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=chipnzlHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-FT' || $_SESSION['line'] == 'QFN-FT'){
}else{
?>
            <a href="#ic" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-sign-in fa-stack-2x"></i>
              </span> Clamp & Insert</a>
            <ul class="collapse list-unstyled" id="ic">
              <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <!-- <li><a id="navTrack" href="?controller=pages&action=trkLB">Track</a></li> -->
<?php } ?>
              <li><a href="?controller=pages&action=icPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
              <li><a href="?controller=posts&action=icHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-FT' || $_SESSION['line'] == 'QFN-FT'){
}else{
?>
            <a href="#mc" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-film fa-stack-2x"></i>
              </span> Mold Chase</a>
            <ul class="collapse list-unstyled" id="mc">
                <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <!-- <li><a id="navTrack" href="?controller=pages&action=trkMC">Track</a></li> -->
<?php } ?>
                <li><a href="?controller=pages&action=mcPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
                <li><a href="?controller=posts&action=mcHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
                <li></li>
            </ul>
<?php
}
if ($_SESSION['line'] == 'LSI-FT' || $_SESSION['line'] == 'QFN-FT'){
}else{
?>
            <a href="#tfd" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-cut fa-stack-2x"></i>
              </span> Trim and Form Diesets</a>
            <ul class="collapse list-unstyled" id="tfd">
                <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <!-- <li><a id="navTrack" href="?controller=pages&action=trkMC">Track</a></li> -->
<?php } ?>
                <li><a href="?controller=pages&action=tfdPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
                <li><a href="?controller=posts&action=tfdHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
                <li></li>
            </ul>
<?php }
if ($_SESSION['line'] == 'LSI-FT' || $_SESSION['line'] == 'QFN-FT'){
}else{
?>
            <a href="#rc" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-columns fa-stack-2x"></i>
              </span> Rubber Collet</a>
            <ul class="collapse list-unstyled" id="rc">
                <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <!-- <li><a id="navTrack" href="?controller=pages&action=trkMC">Track</a></li> -->
<?php } ?>
                <li><a href="?controller=pages&action=rcPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
                <li><a href="?controller=posts&action=rcHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
                <li></li>
            </ul>
<?php }
if ($_SESSION['line'] == 'LSI-ASSY' || $_SESSION['line'] == 'QFN-ASSY'){
}else{
?>
            <a href="#pg" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-columns fa-stack-2x"></i>
              </span> Program</a>
            <ul class="collapse list-unstyled" id="pg">
                <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <li><a id="navTrack" href="?controller=pages&action=trkPG">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-check-square-o fa-stack-2x"></i>
                  </span> Track</a></li>
                <!-- <li><a id="navTrack" href="?controller=pages&action=trkMC">Track</a></li> -->
<?php } ?>
                <li><a href="?controller=pages&action=pgPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
                <li><a href="?controller=posts&action=pgHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
                <li></li>
            </ul>
<?php }
if ($_SESSION['line'] == 'LSI-FT' || $_SESSION['line'] == 'QFN-FT'){
}else{
?>
            <a href="#mvc" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-columns fa-stack-2x"></i>
              </span> Metal / Vespel Collet</a>
            <ul class="collapse list-unstyled" id="mvc">
                <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <!-- <li><a id="navTrack" href="?controller=pages&action=trkMC">Track</a></li> -->
<?php } ?>
                <li><a href="?controller=pages&action=colletPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
                <li><a href="?controller=posts&action=colletHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
                <li></li>
            </ul>
<?php }
if ($_SESSION['line'] == 'LSI-FT' || $_SESSION['line'] == 'QFN-FT'){
}else{
?>
            <a href="#spanker" data-toggle="collapse" aria-expanded="false">
              <span class="fa-stack fa-md">
                  <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                  <i class="fa fa-columns fa-stack-2x"></i>
              </span> Spanker</a>
            <ul class="collapse list-unstyled" id="spanker">
                <!-- <li><a href="?controller=pages&action=underCon">
                <span class="fa-stack fa-md">
                  <i class="fa fa-share-square-o fa-stack-2x"></i>
                </span> Request</a></li> -->
<?php
  if (!empty($_SESSION['userEmail'])){
?>
                <!-- <li><a id="navTrack" href="?controller=pages&action=trkMC">Track</a></li> -->
<?php } ?>
                <li><a href="?controller=pages&action=spankerPagination">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-th-list fa-stack-2x"></i>
                  </span> View All</a></li>
                <li><a href="?controller=posts&action=spankerHistory">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-leanpub fa-stack-2x"></i>
                  </span> History</a></li>
                <li></li>
            </ul>
<?php }
?>
        </li>
    </ul>
    <!-- <ul class="list-unstyled CTAs" style="padding-bottom: 75px;">
        <li><a href="http://phsm01ws013/ess" class="download">E-SAFETY</a></li>
        <li><a href="http://phsm01ws011/" class="download">PROMIS</a></li>
    </ul> -->
  </nav>
    <br>
    <br>
    <!-- <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                <i class="fa fa-align-justify"></i>
                <span>Menus</span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </div>
    </nav> -->
    <nav class="fixed-top navbar navbar-expand-sm navbar-dark" style='height:50px;background-color:#133455;'>
      <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn" style="margin-right: 10px;">
          <i class="fa fa-align-justify"></i>
          <span>Menus</span>
      </button>
      <a class="navbar-brand" href="index.php">CENTS <span style="font-size: 12px;">v2.8</span></a>
      <a class="btn btn-primary" href="http://phsm01ws014.ad.onsemi.com/fthrdr/"><span style="font-size: 16px;">FTHRDR</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <!-- <div class="dropdown">
        <button class="btn btn-primary " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ITEM MENU
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <a class="dropdown-item" type="button" href="?controller=pages&action=itemMenu">ADD</a>
          <button class="dropdown-item" type="button">EDIT</button>
          <button class="dropdown-item" type="button">DELETE</button>
        </div>
      </div> -->

      <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto"> -->
      <!-- <li class="nav-item active">
      <a class="nav-link" href="?controller=posts&action=index">Schedule<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
      </li> -->
      <!-- </ul>
      <ul class="navbar-nav mr-right">
      <li class="nav-item active"> -->
        <?php
        if (!empty($_SESSION['userEmail'])){
        ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav mr-right">
            
        <?php if ($_SESSION['level'] != ""){ ?>
          
            <!-- <a class="btn btn-primary" href="?controller=pages&action=underCon">PENDING</a> -->
            <div class="dropdown">
              <button class="btn btn-primary" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-cubes fa-stack-1x"></i>
                </span>INVENTORY
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="?controller=posts&action=addItem">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-plus-circle fa-stack-1x"></i>
                  </span> ADD</a>
                <a class="dropdown-item" href="?controller=posts&action=editItem">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-check-circle fa-stack-1x"></i>
                  </span> EDIT</a>
                <a class="dropdown-item" href="?controller=posts&action=delItem">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-times-circle fa-stack-1x"></i>
                  </span> DELETE</a>
              </div>
            </div>
        <?php } ?>  
        <?php if ($_SESSION['level'] > 1){ ?>
            <div class="dropdown">
              <button class="btn btn-primary" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-cogs fa-stack-1x"></i>
                </span>MANAGEMENT
              </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <a class="dropdown-item" href="?controller=pages&action=manageUser">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-users fa-stack-1x"></i>
                  </span> Manage User</a>
                </div>
              </div>
        <?php } ?>
            <div class="dropdown" style="margin-left: 5px;">
              <button class="btn btn-primary " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-user fa-stack-1x"></i>
                </span><?php echo $_SESSION['userEmail']; ?>
                <?php echo "| ".$_SESSION['line']; ?>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="?controller=posts&action=signout">
                  <span class="fa-stack fa-md">
                    <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
                    <i class="fa fa-sign-out fa-stack-1x"></i>
                  </span> Log out</a>
              </div>
            </div>

        <?php }else{ ?>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <ul class="navbar-nav mr-right">
          <li class="nav-item active">
          <button class="btn btn-primary " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa-stack fa-md">
              <!-- <i class="fa fa-square-o fa-stack-2x"></i> -->
              <i class="fa fa-sign-in fa-stack-2x"></i>
            </span> Sign in
          </button>
          <form class="dropdown-menu p-4 dropdown-menu-right signIn" method="post" action="?controller=posts&action=signin">
            <div class="form-group">
              <label>User name</label>
              <input name="username" type="text" class="form-control myusername">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input name="password" type="password" class="form-control mypassword">
            </div>
            <div class="form-check">
              <input name="nonAD" type="checkbox" class="form-check-input" id="dropdownCheck">
              <label class="form-check-label" for="dropdownCheck">
                Non-AD Account
              </label>
            </div>
            <input type="button" class="btn btn-primary signin" value="Sign in">
          </form>

        <?php } ?>

        </div>
      </ul>
      </div>
    </nav>

    <div id="content">
