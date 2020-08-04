<?php
  class PostsController {
    public function loadboard() {
      $posts = lbList::all();
      require_once('views/posts/loadboard.php');
    }

    public function socket() {
      $posts = socketList::allSocket();
      require_once('views/posts/socket.php');
    }

    public function socketBoard() {
      $posts = socketBoardList::allSocketBoard();
      require_once('views/posts/socketBoard.php');
    }

    public function addItem() {
      //$posts = lbList::all();
      if ($_SESSION['level'] != ""){
        require_once('views/posts/addItem.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
      
    }

    public function delLB() {
      saveData::delLB();
    }

    public function delSocket() {
      saveData::delSocket();
    }

    public function delSocketBoard() {
      saveData::delSocketBoard();
    }

    public function delBIB() {
      saveData::delBIB();
    }

    public function delGNG() {
      saveData::delGNG();
    }

    public function editItem() {
      if ($_SESSION['level'] != ""){
        require_once('views/posts/editItem.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function delItem() {
      if ($_SESSION['level'] != ""){
        require_once('views/posts/delItem.php');
      }else{
        header('location: ?controller=pages&action=error');
      }
    }

    public function filtrLB() {
      $posts = lbList::fltr();
    }

    public function lbHistory() {
      //$posts = lbList::lbHistory();
      require_once('views/posts/lbHistory.php');
    }

    public function socketHistory() {
      //$posts = socketList::socketHistory();
      require_once('views/posts/socketHistory.php');
    }

    public function socketBoardHistory() {
      //$posts = socketList::socketHistory();
      require_once('views/posts/socketBoardHistory.php');
    }

    public function bibHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/bibHistory.php');
    }

    public function gngHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/gngHistory.php');
    }

    public function nozzleHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/nozzleHistory.php');
    }

    public function icHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/icHistory.php');
    }

    public function mcHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/mcHistory.php');
    }

    public function tfdHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/tfdHistory.php');
    }

    public function atcHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/atcHistory.php');
    }

    public function testStandHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/testStandHistory.php');
    }

    public function cableHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/cableHistory.php');
    }

    public function wpHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/wpHistory.php');
    }
    
    public function ckHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/ckHistory.php');
    }

    public function tpHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/tpHistory.php');
    }

    public function cbHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/cbHistory.php');
    }

    public function rcHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/rcHistory.php');
    }

    public function spHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/spHistory.php');
    }

    public function pgHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/pgHistory.php');
    }

    public function colletHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/colletHistory.php');
    }

    public function spankerHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/spankerHistory.php');
    }

    public function chipnzlHistory() {
      //$posts = bibList::bibHistory();
      require_once('views/posts/chipnzlHistory.php');
    }
    public function saveLB() {
      saveData::saveLB();
    }

    public function saveBIB() {
      saveData::saveBIB();
    }

    public function saveSocket() {
      saveData::saveSocket();
    }

    public function saveSocketBoard() {
      saveData::saveSocketBoard();
    }

    public function saveGNG() {
      saveData::saveGNG();
    }

    public function saveCB() {
      saveData::saveCB();
    }

    public function saveCable() {
      saveData::saveCable();
    }

    public function saveTS() {
      saveData::saveTS();
    }

    public function addLB() {
      saveData::addLB();
    }

    public function addSocket() {
      saveData::addSocket();
    }
    
    public function addSocketBoard() {
      saveData::addSocketBoard();
    }

    public function addBIB() {
      saveData::addBIB();
    }

    public function addGNG() {
      saveData::addGNG();
    }

    public function signin() {
      signInUser::login();
    }

    public function signout() {
      signInUser::logout();
    }

    public function addUser() {
      userMgt::addUser();
    }

    public function addNozzle() {
      saveData::addNozzle();
    }
  }
?>
