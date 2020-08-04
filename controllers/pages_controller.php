<?php
  class PagesController {
    public function home() {
      // $first_name = 'Victor';
      // $last_name  = 'Nacino';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }

    public function trackInLB() {
      require_once('views/pages/trackInLB.php');
    }

    public function lbPagination() {
      require_once('views/pages/loadboard.php');
    }

    public function socketPagination() {
      require_once('views/pages/socket.php');
    }

    public function socketBoardPagination() {
      require_once('views/pages/socketBoard.php');
    }

    public function bibPagination() {
      require_once('views/pages/bib.php');
    }

    public function gngPagination() {
      require_once('views/pages/gng.php');
    }

    public function nozzlePagination() {
      require_once('views/pages/nozzle.php');
    }

    public function chipnzlPagination() {
      require_once('views/pages/chipmountNozzle.php');
    }

    public function icPagination() {
      require_once('views/pages/ic.php');
    }

    public function mcPagination() {
      require_once('views/pages/moldChase.php');
    }

    public function tfdPagination() {
      require_once('views/pages/trimandformDiesets.php');
    }

    public function wpPagination() {
      require_once('views/pages/workPress.php');
    }

    public function atcPagination() {
      require_once('views/pages/atc.php');
    }

    public function testStandPagination() {
      require_once('views/pages/testStand.php');
    }

    public function cablePagination() {
      require_once('views/pages/cable.php');
    }

    public function ckPagination() {
      require_once('views/pages/changeKit.php');
    }

    public function tpPagination() {
      require_once('views/pages/testerParts.php');
    }

    public function cbPagination() {
      require_once('views/pages/centerBoard.php');
    }

    public function underCon() {
      require_once('views/pages/undercons.php');
    }

    public function rcPagination() {
      require_once('views/pages/rubberCollet.php');
    }

    public function spPagination() {
      require_once('views/pages/spareParts.php');
    }

    public function pgPagination() {
      require_once('views/pages/program.php');
    }

    public function pizzaLB() {
      require_once('views/pages/pizzaBoard.php');
    }

    public function colletPagination() {
      require_once('views/pages/collet.php');
    }

    public function spankerPagination() {
      require_once('views/pages/spanker.php');
    }

    public function trkLB() {
      if (!empty($_SESSION['userEmail'])){
        require_once('views/pages/trkLB.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function trkSocket() {
      if (!empty($_SESSION['userEmail'])){
        require_once('views/pages/trkSocket.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function trkSocketBoard() {
      if (!empty($_SESSION['userEmail'])){
        require_once('views/pages/trkSocketBoard.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function trkBIB() {
      if (!empty($_SESSION['userEmail'])){
        require_once('views/pages/trkBIB.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function trkGNG() {
      if (!empty($_SESSION['userEmail'])){
        require_once('views/pages/trkGNG.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function trkCB() {
      if (!empty($_SESSION['userEmail'])){
        require_once('views/pages/trkCB.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function trkCable() {
      if (!empty($_SESSION['userEmail'])){
        require_once('views/pages/trkCable.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function trkTS() {
      if (!empty($_SESSION['userEmail'])){
        require_once('views/pages/trkTS.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function trkCK() {
      if (!empty($_SESSION['userEmail'])){
        require_once('views/pages/trkCK.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function trkATC() {
      if (!empty($_SESSION['userEmail'])){
        require_once('views/pages/trkATC.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function manageUser() {
      if (!empty($_SESSION['userEmail'])){
        require_once('views/pages/userMgt.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }
  }
?>
