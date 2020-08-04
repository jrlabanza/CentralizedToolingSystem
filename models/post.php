<?php
class lbList {
    public $sr_id;
    public $lb_id;
    public $family;
    public $dut_req;
    public $tst_pf;
    public $status;
    public $loc;
    public $storage;
    public $line;
    public $vendor;
    public $borrower;
    public $clerk;
    public $date_time;
    public $tester_id;
    public $handler_id;
    public $sFile;

    public function __construct($sr_id, $lb_id, $family, $dut_req, $tst_pf, $status, $loc, $storage, $line, $vendor, $pintype, $tester_id, $handler_id='', $borrower='', $clerk='', $date_time='',  $sFile='') {
        $this->lb_id = $sr_id;
        $this->lb_id = $lb_id;
        $this->family = $family;
        $this->dut_req = $dut_req;
        $this->tst_pf = $tst_pf;
        $this->status = $status;
        $this->loc = $loc;
        $this->storage = $storage;
        $this->line = $line;
        $this->vendor = $vendor;

        $this->borrower = $borrower;
        $this->clerk = $clerk;
        $this->date_time = $date_time;
        $this->tester_id = $tester_id;
        $this->handler_id = $handler_id;
        $this->sFile = $sFile;

    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM loadboard order by lastupdate desc LIMIT 20');

          // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $post) {
            $list[] = new lbList($post['serial_id'],$post['lb_id'], $post['family'], $post['dut_req'],
            $post['tst_pf'], $post['status'], $post['loc'], $post['storage'], $post['line'],
            $post['vendor'], $post['tester_id'], $post['handler_id'], $post['lastupdate']);
        }

      return $list;
    }

    public static function lbHistory() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM lb_history ORDER BY id DESC LIMIT 50');

          // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $post) {
            $list[] = new lbList($post['lb_id'], $post['family'], $post['dut_req'],
            $post['tst_pf'], $post['status'], $post['loc'], $post['storage'], $post['line'],
            $post['vendor'], $post['tester_id'], $post['handler_id'], $post['borrower'],
            $post['clerk'], $post['date_time'], $post['sFile'], $post['remarks']);
        }

      return $list;
    }
}

class socketList {
  public $lb_id;
  public $family;
  public $dut_req;
  public $tst_pf;
  public $status;
  public $loc;
  public $storage;
  public $line;
  public $vendor;
  public $borrower;
  public $clerk;
  public $date_time;
  public $tester_id;
  public $handler_id;
  public $sFile;

  public function __construct($lb_id, $family, $dut_req, $tst_pf, $status, $loc, $storage, $line, $vendor, $pintype, $tester_id, $handler_id='', $borrower='', $clerk='', $date_time='',  $sFile='') {
      $this->lb_id = $lb_id;
      $this->family = $family;
      $this->dut_req = $dut_req;
      $this->tst_pf = $tst_pf;
      $this->status = $status;
      $this->loc = $loc;
      $this->storage = $storage;
      $this->line = $line;
      $this->vendor = $vendor;

      $this->borrower = $borrower;
      $this->clerk = $clerk;
      $this->date_time = $date_time;
      $this->tester_id = $tester_id;
      $this->handler_id = $handler_id;
      $this->sFile = $sFile;

  }

//   public static function allSocket() {
//       $list = [];
//       $db = Db::getInstance();
//       $req = $db->query('SELECT * FROM socket order by lastupdate desc LIMIT 20');

//         // we create a list of Post objects from the database results
//       foreach($req->fetchAll() as $post) {
//           $list[] = new lbList($post['socket_id'], $post['family'], $post['dut_req'],
//           $post['tst_pf'], $post['status'], $post['loc'], $post['storage'], $post['line'],
//           $post['vendor'], $post['tester_id'], $post['handler_id'], $post['lastupdate'],
//           $post['pin_type'], $post['pin_count'], $post['shotcount'], $post['max_shotcount'],
//           $post['site'], $post['description']);
//       }

//     return $list;
//   }

  public static function socketHistory() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM socket_history ORDER BY id DESC LIMIT 50');

        // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
          $list[] = new lbList($post['socket_id'], $post['family'], $post['dut_req'],
          $post['tst_pf'], $post['status'], $post['loc'], $post['storage'], $post['line'],
          $post['vendor'], $post['tester_id'], $post['handler_id'], $post['client'],
          $post['clerk'], $post['date_time'], $post['sFile']);
      }

    return $list;
  }

}

class saveData{

    public function __construct() {

    }

    public static function addLB() {
        if(isset($_POST['submit'])){

            $srID = $_POST['srID'];
            $lb_id = $_POST['lbID'];
            $family = $_POST['family'];
            $dut_req = $_POST['dutReq'];
            $tst_pf = $_POST['tstPF'];
            $status = $_POST['status'];
            $loc = "HARDWARE";
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            $vendor = $_POST['vendor'];
            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d H:i"));

            $folder="uploads/";
            $imagename=$_FILES['sfile']['name'];
            $file_name = preg_replace("/[^a-zA-Z0-9.]/", "", $imagename);
            move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);

            $db = Db::getInstance();

            $db->query("INSERT INTO loadboard(serial_ID,lb_id,family,dut_req,tst_pf,status,loc,storage,line,vendor,clerk,sfile)
            VALUES('".$srID."','".$lb_id."','".$family."','".$dut_req."','".$tst_pf."','".$status."','".$loc."','".$storage."','".$line."',
              '".$vendor."','".$_SESSION['userEmail']."','".$file_name."')");

            header('Location: ?controller=posts&action=addItem');
        }

    }

    public static function addNozzle() {
        if(isset($_POST['submit'])){

            $nozzlePrtNO = $_POST['nozzlePrtNO'];
            $boxNo = $_POST['boxNo'];
            $package = $_POST['package'];
            $altrntvNozzle = $_POST['altrntvNozzle'];
            $machineModel = $_POST['machineModel'];
            $line = $_POST['line'];
            $mShot = $_POST['mShot'];
            $remarks = $_POST['remarks'];

            $db = Db::getInstance();

            $db->query("INSERT INTO nozzle(nozzle_partno,box_no,package,altrntv_nozzle,machine_model,line,max_shots,remarks)
            VALUES('".$nozzlePrtNO."','".$boxNo."','".$package."','".$altrntvNozzle."','".$machineModel."','".$line."','".$mShot."','".$remarks."')");

            header('Location: ?controller=posts&action=addItem');
        }

    }

    // public static function delLB() {
    //     if(isset($_POST['submit'])){
    //         $dataID = implode("','", $_POST['cbox']);

    //         $db = Db::getInstance();
    //         $req = $db->query("SELECT * FROM loadboard WHERE id IN ('$dataID')");
            
    //         foreach($req->fetchAll() as $post) {
    //             $db->query("INSERT INTO lb_archive SELECT * FROM loadboard WHERE id=$post[id]");
    //         }
            
    //         $db->query("DELETE FROM loadboard WHERE id IN ('$dataID')");

    //     }
    //     header('Location: ?controller=posts&action=delItem');
    //     // if(isset($_POST['submit'])){
    //     //     $dataID = implode("','", $_POST['cbox']);

    //     //     $db = Db::getInstance();
    //     //     $req = $db->query("SELECT * from loadboard WHERE id in ('$dataID')");
            
    //     //     foreach($req->fetchAll() as $post) {
    //     //         $db->query("INSERT INTO lb_archive (serial_ID,lb_id,family,dut_req,tst_pf,status,loc,storage,line,vendor,clerk,sfile)
    //     //         VALUES('".$post['serial_ID']."','".$post['lb_id']."','".$post['family']."','".$post['dut_req']."','".$post['tst_pf']."','".$post['status']."','".$post['loc']."','".$post['storage']."','".$post['line']."','".$post['vendor']."','".$_SESSION['userEmail']."','".$post['sfile']."')");
    //     //     }
    //     //     $db->query("DELETE from loadboard WHERE id in ('$dataID')");

    //     //     header('Location: ?controller=posts&action=delItem');
    //     // }

    // }

    public static function addSocket() {
        if(isset($_POST['submit'])){

            $socketid = $_POST['socketid'];
            $family = $_POST['family'];
            // $dut_req = $_POST['dutReq'];
            $tst_pf = $_POST['tstPf'];
            // $tstID = $_POST['tstID'];
            // $hdID = $_POST['hdID'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            $vendor = $_POST['vendor'];
            $track = $_POST['track'];
            // $client = $_POST['client'];

            $gsCode = $_POST['gsCode'];
            $pckgType = $_POST['pckgType'];
            $prtNo = $_POST['prtNo'];
            $pinType = $_POST['pinType'];
            $pinCnt = $_POST['pinCnt'];
            $mShot = $_POST['mShot'];
            // $shotCnt = $_POST['shotCnt'];
            $site = $_POST['site'];
            $remarks = $_POST['remarks'];

            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d Hi "));

            // $folder="uploads/";
            // $imagename=$_FILES['sfile']['name'];
            // if ($imagename == ""){
            // }else{
            //   $file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $dates.$imagename);
            //   move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);
            // }

            if(!empty($_FILES)){
                if(is_uploaded_file($_FILES['sfile']['tmp_name'])){
                    sleep(1);
                    $source_path = $_FILES['sfile']['tmp_name'];
                    $fileName=$dates.$_FILES['sfile']['name'];
                    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
                    $target_path = 'uploads/' . $fileName;
                    if(move_uploaded_file($source_path, '../../uploads/'.$fileName)){
                        echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
                    }
                }
            }

            $db = Db::getInstance();

            $db->query("INSERT INTO socket(socket_id,family,package_type,part_no,tst_pf,status,loc,storage,vendor,line,pin_type,pin_count,max_shotcount,site,gs_code,remarks,sFile,clerk)
            VALUES('".$socketid."','".$family."','".$pckgType."','".$prtNo."','".$tst_pf."','".$status."','".$loc."','".$storage."','".$vendor."','".$line."','".$pinType."','".$pinCnt."','".$mShot."','".$site."','".$gsCode."','".$remarks."','".$file_name."','".$_SESSION['userEmail']."')");

            header('Location: ?controller=posts&action=addItem');
        }

    }

    public static function addSocketBoard() {
        if(isset($_POST['submit'])){

            $socketid = $_POST['socketid'];
            $family = $_POST['family'];
            // $dut_req = $_POST['dutReq'];
            $tst_pf = $_POST['tstPf'];
            // $tstID = $_POST['tstID'];
            // $hdID = $_POST['hdID'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            $vendor = $_POST['vendor'];
            $track = $_POST['track'];
            // $client = $_POST['client'];

            $gsCode = $_POST['gsCode'];
            $pckgType = $_POST['pckgType'];
            $prtNo = $_POST['prtNo'];
            $pinType = $_POST['pinType'];
            $pinCnt = $_POST['pinCnt'];
            $mShot = $_POST['mShot'];
            // $shotCnt = $_POST['shotCnt'];
            $site = $_POST['site'];
            $remarks = $_POST['remarks'];

            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d Hi "));

            // $folder="uploads/";
            // $imagename=$_FILES['sfile']['name'];
            // if ($imagename == ""){
            // }else{
            //   $file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $dates.$imagename);
            //   move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);
            // }

            if(!empty($_FILES)){
                if(is_uploaded_file($_FILES['sfile']['tmp_name'])){
                    sleep(1);
                    $source_path = $_FILES['sfile']['tmp_name'];
                    $fileName=$dates.$_FILES['sfile']['name'];
                    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
                    $target_path = 'uploads/' . $fileName;
                    if(move_uploaded_file($source_path, '../../uploads/'.$fileName)){
                        echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
                    }
                }
            }

            $db = Db::getInstance();

            $db->query("INSERT INTO socketBoard(socket_id,family,package_type,part_no,tst_pf,status,loc,storage,vendor,line,pin_type,pin_count,max_shotcount,site,gs_code,remarks,sFile,clerk)
            VALUES('".$socketid."','".$family."','".$pckgType."','".$prtNo."','".$tst_pf."','".$status."','".$loc."','".$storage."','".$vendor."','".$line."','".$pinType."','".$pinCnt."','".$mShot."','".$site."','".$gsCode."','".$remarks."','".$file_name."','".$_SESSION['userEmail']."')");

            header('Location: ?controller=posts&action=addItem');
        }

    }

    // public static function delSocket() {
    //     if(isset($_POST['submit'])){
    //         $dataID = implode("','", $_POST['cbox']);

    //         $db = Db::getInstance();
    //         $req = $db->query("SELECT * from socket WHERE id in ('$dataID')");
            
    //         foreach($req->fetchAll() as $post) {
    //             $db->query("INSERT INTO socket_archive SELECT * FROM socket WHERE id=$post[id]");
    //         }
            
    //         $db->query("DELETE from socket WHERE id in ('$dataID')");

    //         header('Location: ?controller=posts&action=delItem');
    //     }

    // }

    public static function addBIB() {
        if(isset($_POST['submit'])){

            $srID = $_POST['srID'];
            $family = $_POST['family'];
            $dut_req = $_POST['dutReq'];
            $tst_pf = $_POST['tstPF'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            $vendor = $_POST['vendor'];
            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d H:i"));

            $folder="uploads/";
            $imagename=$_FILES['sfile']['name'];
            $file_name = preg_replace("/[^a-zA-Z0-9.]/", "", $imagename);
            move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);

            $db = Db::getInstance();

            $db->query("INSERT INTO bib (serial_ID,family,dut_req,tst_pf,status,loc,storage,line,vendor,clerk,sfile)
            VALUES('".$srID."','".$family."','".$dut_req."','".$tst_pf."','".$status."','".$loc."','".$storage."','".$line."',
              '".$vendor."','".$_SESSION['userEmail']."','".$file_name."')");

            header('Location: ?controller=posts&action=addItem');
        }

    }

    public static function delBIB() {
        if(isset($_POST['submit'])){
            $dataID = implode("','", $_POST['cbox']);

            $db = Db::getInstance();
            $req = $db->query("SELECT * from bib WHERE id in ('$dataID')");
            
            foreach($req->fetchAll() as $post) {
                $db->query("INSERT INTO bib_archive SELECT * FROM bib WHERE id=$post[id]");
            }
            
            $db->query("DELETE from bib WHERE id in ('$dataID')");

            header('Location: ?controller=posts&action=delItem');
        }

    }

    public static function addGNG() {
        if(isset($_POST['submit'])){

            $srID = $_POST['srID'];
            $family = $_POST['family'];
            $dut_req = $_POST['dutReq'];
            $tst_pf = $_POST['tstPF'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            $vendor = $_POST['vendor'];
            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d H:i"));

            $folder="uploads/";
            $imagename=$_FILES['sfile']['name'];
            $file_name = preg_replace("/[^a-zA-Z0-9.]/", "", $imagename);
            move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);

            $db = Db::getInstance();

            $db->query("INSERT INTO gng (serial_ID,family,dut_req,tst_pf,status,loc,storage,line,vendor,clerk,sfile)
            VALUES('".$srID."','".$family."','".$dut_req."','".$tst_pf."','".$status."','".$loc."','".$storage."','".$line."',
              '".$vendor."','".$_SESSION['userEmail']."','".$file_name."')");

            header('Location: ?controller=posts&action=addItem');
        }

    }

    public static function delGNG() {
        if(isset($_POST['submit'])){
            $dataID = implode("','", $_POST['cbox']);

            $db = Db::getInstance();
            $req = $db->query("SELECT * from gng WHERE id in ('$dataID')");
            
            foreach($req->fetchAll() as $post) {
                $db->query("INSERT INTO gng_archive SELECT * FROM bib WHERE id=$post[id]");
            }
            
            $db->query("DELETE from gng WHERE id in ('$dataID')");

            header('Location: ?controller=posts&action=delItem');
        }

    }

    public static function saveLB() {
        if(isset($_POST['submit'])){

            $srid = $_POST['srid'];
            $lb_id = $_POST['lbid'];
            $family = $_POST['family'];
            $tst_pf = $_POST['tstPf'];
            $tstID = $_POST['tstID'];
            $hdID = $_POST['hdID'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            $vendor = $_POST['vendor'];
            $track = $_POST['track'];
            $borrower = $_POST['borrower'];
            $remarks = $_POST['remarks'];
            //$clerk = $_POST['clerk'];
            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d Hi "));

            // $folder="uploads/";
            // $imagename=$_FILES['sfile']['name'];
            // if ($imagename == ""){
            // }else{
            //   $file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $dates.$imagename);
            //   move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);
            // }

            if(!empty($_FILES)){
                if(is_uploaded_file($_FILES['sfile']['tmp_name'])){
                    sleep(1);
                    $source_path = $_FILES['sfile']['tmp_name'];
                    $fileName=$dates.$_FILES['sfile']['name'];
                    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
                    $target_path = 'uploads/' . $fileName;
                    if(move_uploaded_file($source_path, $target_path)){
                        //echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
                        //echo '<img src="'.$target_path.'" class="img-thumbnail" width="300" height="250" />';
                    }
                }
            }


            $db = Db::getInstance();

            $db->query("UPDATE loadboard set status='".$status."',tester_id='".$tstID."',handler_id='".$hdID."', loc='".$loc."', remarks='".$remarks."' WHERE serial_id = '".$srid."'");

            $db->query("INSERT INTO lb_history(serial_id,lb_id,family,tst_pf,status,tester_id,handler_id,loc,storage,line,vendor,borrower,clerk,sfile,remarks)
            VALUES('".$srid."','".$lb_id."','".$family."','".$tst_pf."','".$status."','".$tstID."','".$hdID."','".$loc."','".$storage."','".$line."',
              '".$vendor."','".$borrower."','".$_SESSION['userEmail']."','".$fileName."','".$remarks."')");

            header('Location: ?controller=pages&action=trkLB');
        }

    }

    public static function saveBIB() {
        if(isset($_POST['submit'])){

            $barcode = $_POST['barcode'];
            $srid = $_POST['srid'];
            $family = $_POST['family'];
            $bib = $_POST['bib_id'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            // $vendor = $_POST['vendor'];
            // $track = $_POST['track'];
            $borrower = $_POST['borrower'];
            $remarks = $_POST['remarks'];
            //$clerk = $_POST['clerk'];
            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d Hi "));

            // $folder="uploads/";
            // $imagename=$_FILES['sfile']['name'];
            // if ($imagename == ""){
            // }else{
            //   $file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $dates.$imagename);
            //   move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);
            // }

            // if(!empty($_FILES)){
            //     if(is_uploaded_file($_FILES['sfile']['tmp_name'])){
            //         sleep(1);
            //         $source_path = $_FILES['sfile']['tmp_name'];
            //         $fileName=$dates.$_FILES['sfile']['name'];
            //         $fileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
            //         $target_path = 'uploads/' . $fileName;
            //         if(move_uploaded_file($source_path, $target_path)){
            //             //echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
            //             //echo '<img src="'.$target_path.'" class="img-thumbnail" width="300" height="250" />';
            //         }
            //     }
            // }


            $db = Db::getInstance();

            $db->query("UPDATE bib set barcode = '".$barcode."',status='".$status."', loc='".$loc."', remarks='".$remarks."' WHERE serial_id = '".$srid."'");

            $db->query("INSERT INTO bib_history (barcode,bib_id,serial_id,family,status,loc,storage,line,clerk,remarks)
            VALUES('".$barcode."','".$bib."','".$srid."','".$family."','".$status."','".$loc."','".$storage."','".$line."',
            '".$_SESSION['userEmail']."','".$remarks."')");

            header('Location: ?controller=pages&action=trkBIB');
        }

    }

    public static function saveSocket() {
        if(isset($_POST['submit'])){

            $socketid = $_POST['socketid'];
            $family = $_POST['family'];
            // $dut_req = $_POST['dutReq'];
            $tst_pf = $_POST['tstPf'];
            $tstID = $_POST['tstID'];
            $hdID = $_POST['hdID'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            $vendor = $_POST['vendor'];
            $track = $_POST['track'];
            $client = $_POST['client'];

            $gsCode = $_POST['gsCode'];
            $pckgType = $_POST['pckgType'];
            $prtNo = $_POST['prtNo'];
            $pinType = $_POST['pinType'];
            $pinCnt = $_POST['pinCnt'];
            $mShot = $_POST['mShot'];
            $crrntShotCnt = $_POST['crrntShotCnt'];
            $shotCnt = $_POST['shotCnt'];
            $site = $_POST['site'];
            $remarks = $_POST['remarks'];

            $shotCnt += $crrntShotCnt;

            //$clerk = $_POST['clerk'];
            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d H:i"));

            if(!empty($_FILES)){
                if(is_uploaded_file($_FILES['sfile']['tmp_name'])){
                    sleep(1);
                    $source_path = $_FILES['sfile']['tmp_name'];
                    $fileName=$dates.$_FILES['sfile']['name'];
                    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
                    $target_path = 'uploads/' . $fileName;
                    if(move_uploaded_file($source_path, $target_path)){
                        //echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
                        //echo '<img src="'.$target_path.'" class="img-thumbnail" width="300" height="250" />';
                    }
                }
            }

            $db = Db::getInstance();

            $db->query("UPDATE socket set status='".$status."',tester_id='".$tstID."',handler_id='".$hdID."',loc='".$loc."',shotcount='".$shotCnt."',site='".$site."',remarks='".$remarks."',sFile='".$file_name."' WHERE socket_id = '".$socketid."'");

            $db->query("INSERT INTO socket_history(socket_id,family,package_type,part_no,tst_pf,status,tester_id,handler_id,loc,storage,vendor,line,pin_type,pin_count,shotcount,max_shotcount,site,gs_code,remarks,sFile,client,clerk)
            VALUES('".$socketid."','".$family."','".$pckgType."','".$prtNo."','".$tst_pf."','".$status."','".$tstID."','".$hdID."','".$loc."','".$storage."','".$vendor."','".$line."','".$pinType."','".$pinCnt."','".$shotCnt."','".$mShot."','".$site."','".$gsCode."','".$remarks."','".$fileName."','".$client."','".$_SESSION['userEmail']."')");

            header('Location: ?controller=pages&action=socketPagination');
        }

    }

    public static function saveSocketBoard() {
        if(isset($_POST['submit'])){

            $socketid = $_POST['socketid'];
            $family = $_POST['family'];
            // $dut_req = $_POST['dutReq'];
            $tst_pf = $_POST['tstPf'];
            $tstID = $_POST['tstID'];
            $hdID = $_POST['hdID'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            $vendor = $_POST['vendor'];
            $track = $_POST['track'];
            $client = $_POST['client'];

            $gsCode = $_POST['gsCode'];
            $pckgType = $_POST['pckgType'];
            $prtNo = $_POST['prtNo'];
            $pinType = $_POST['pinType'];
            $pinCnt = $_POST['pinCnt'];
            $mShot = $_POST['mShot'];
            $crrntShotCnt = $_POST['crrntShotCnt'];
            $shotCnt = $_POST['shotCnt'];
            $site = $_POST['site'];
            $remarks = $_POST['remarks'];

            $shotCnt += $crrntShotCnt;

            //$clerk = $_POST['clerk'];
            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d H:i"));

            if(!empty($_FILES)){
                if(is_uploaded_file($_FILES['sfile']['tmp_name'])){
                    sleep(1);
                    $source_path = $_FILES['sfile']['tmp_name'];
                    $fileName=$dates.$_FILES['sfile']['name'];
                    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
                    $target_path = 'uploads/' . $fileName;
                    if(move_uploaded_file($source_path, $target_path)){
                        //echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
                        //echo '<img src="'.$target_path.'" class="img-thumbnail" width="300" height="250" />';
                    }
                }
            }

            $db = Db::getInstance();

            $db->query("UPDATE socketBoard set status='".$status."',tester_id='".$tstID."',handler_id='".$hdID."',loc='".$loc."',shotcount='".$shotCnt."',site='".$site."',remarks='".$remarks."',sFile='".$file_name."' WHERE socket_id = '".$socketid."'");

            $db->query("INSERT INTO socket_Board_history(socket_id,family,package_type,part_no,tst_pf,status,tester_id,handler_id,loc,storage,vendor,line,pin_type,pin_count,shotcount,max_shotcount,site,gs_code,remarks,sFile,client,clerk)
            VALUES('".$socketid."','".$family."','".$pckgType."','".$prtNo."','".$tst_pf."','".$status."','".$tstID."','".$hdID."','".$loc."','".$storage."','".$vendor."','".$line."','".$pinType."','".$pinCnt."','".$shotCnt."','".$mShot."','".$site."','".$gsCode."','".$remarks."','".$fileName."','".$client."','".$_SESSION['userEmail']."')");

            header('Location: ?controller=pages&action=socketPagination');
        }

    }

    public static function saveCB() {
        if(isset($_POST['submit'])){

            $srid = $_POST['srid'];
            $type = $_POST['lbid']; //as type
            $family = $_POST['family'];
            $tst_pf = $_POST['tstPf'];
            $tstID = $_POST['tstID'];
            $hdID = $_POST['hdID'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            $vendor = $_POST['vendor'];
            $track = $_POST['track'];
            $borrower = $_POST['borrower'];
            $remarks = $_POST['remarks'];
            //$clerk = $_POST['clerk'];
            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d Hi "));
            $lastUpdate = date("y/m/d H:i"); // IMPLEMENT THIS TO ALL CATEGORY

            // $folder="uploads/";
            // $imagename=$_FILES['sfile']['name'];
            // if ($imagename == ""){
            // }else{
            //   $file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $dates.$imagename);
            //   move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);
            // }

            if(!empty($_FILES)){
                if(is_uploaded_file($_FILES['sfile']['tmp_name'])){
                    sleep(1);
                    $source_path = $_FILES['sfile']['tmp_name'];
                    $fileName=$dates.$_FILES['sfile']['name'];
                    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
                    $target_path = 'uploads/' . $fileName;
                    if(move_uploaded_file($source_path, $target_path)){
                        //echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
                        //echo '<img src="'.$target_path.'" class="img-thumbnail" width="300" height="250" />';
                    }
                }
            }


            $db = Db::getInstance();

            $db->query("UPDATE center_board set `status`='".$status."',tester_id='".$tstID."',handler_id='".$hdID."', loc='".$loc."', remarks='".$remarks."', last_update='".$lastUpdate."' WHERE serial_id = '".$srid."'");

            $db->query("INSERT INTO center_board_history(serial_id,type,family,tst_pf,status,tester_id,handler_id,loc,storage,line,vendor,borrower,clerk,sfile,remarks)
            VALUES('".$srid."','".$type."','".$family."','".$tst_pf."','".$status."','".$tstID."','".$hdID."','".$loc."','".$storage."','".$line."',
              '".$vendor."','".$borrower."','".$_SESSION['userEmail']."','".$fileName."','".$remarks."')");

            header('Location: ?controller=pages&action=trkCB');
        }

    }

    public static function saveCable() {
        if(isset($_POST['submit'])){

            $srid = $_POST['srid'];
            $type = $_POST['lbid']; //as type
            //$family = $_POST['family'];
            $tst_pf = $_POST['tstPf'];
            $tstID = $_POST['tstID'];
            $hdID = $_POST['hdID'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            //$vendor = $_POST['vendor'];
            $track = $_POST['track'];
            $borrower = $_POST['borrower'];
            $remarks = $_POST['remarks'];
            //$clerk = $_POST['clerk'];
            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d Hi "));
            $lastUpdate = date("y/m/d H:i"); // IMPLEMENT THIS TO ALL CATEGORY

            // $folder="uploads/";
            // $imagename=$_FILES['sfile']['name'];
            // if ($imagename == ""){
            // }else{
            //   $file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $dates.$imagename);
            //   move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);
            // }

            if(!empty($_FILES)){
                if(is_uploaded_file($_FILES['sfile']['tmp_name'])){
                    sleep(1);
                    $source_path = $_FILES['sfile']['tmp_name'];
                    $fileName=$dates.$_FILES['sfile']['name'];
                    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
                    $target_path = 'uploads/' . $fileName;
                    if(move_uploaded_file($source_path, $target_path)){
                        //echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
                        //echo '<img src="'.$target_path.'" class="img-thumbnail" width="300" height="250" />';
                    }
                }
            }


            $db = Db::getInstance();

            $db->query("UPDATE cable set status='".$status."',tester_id='".$tstID."',handler_id='".$hdID."', loc='".$loc."',remarks='".$remarks."', last_update='".$lastUpdate."' WHERE serial_id = '".$srid."'");

            $db->query("INSERT INTO cable_history (serial_id,status,conn_type,tst_pf,tester_id,hd_pf,handler_id,loc,storage,line,client,clerk,sFile,remarks) 
            SELECT serial_id,status,conn_type,tst_pf,tester_id,hd_pf,handler_id,loc,storage,line,'".$borrower."','".$_SESSION['userEmail']."',sFile,remarks FROM cable WHERE serial_id = '".$srid."'");

            header('Location: ?controller=pages&action=trkCable');
        }

    }

    public static function saveTS() {
        if(isset($_POST['submit'])){

            $srid = $_POST['srid'];
            $type = $_POST['lbid']; //as type
            //$family = $_POST['family'];
            $tst_pf = $_POST['tstPf'];
            $tstID = $_POST['tstID'];
            $hdID = $_POST['hdID'];
            $status = $_POST['status'];
            $loc = $_POST['loc'];
            $storage = $_POST['storage'];
            $line = $_POST['line'];
            //$vendor = $_POST['vendor'];
            $track = $_POST['track'];
            $borrower = $_POST['borrower'];
            $remarks = $_POST['remarks'];
            //$clerk = $_POST['clerk'];
            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d Hi "));
            $lastUpdate = date("y/m/d H:i"); // IMPLEMENT THIS TO ALL CATEGORY

            // $folder="uploads/";
            // $imagename=$_FILES['sfile']['name'];
            // if ($imagename == ""){
            // }else{
            //   $file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $dates.$imagename);
            //   move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);
            // }

            if(!empty($_FILES)){
                if(is_uploaded_file($_FILES['sfile']['tmp_name'])){
                    sleep(1);
                    $source_path = $_FILES['sfile']['tmp_name'];
                    $fileName=$dates.$_FILES['sfile']['name'];
                    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
                    $target_path = 'uploads/' . $fileName;
                    if(move_uploaded_file($source_path, $target_path)){
                        //echo '<div class="alert alert-success" role="alert" id="message" for="name"><b>Record successfully save</b></div>';
                        //echo '<img src="'.$target_path.'" class="img-thumbnail" width="300" height="250" />';
                    }
                }
            }


            $db = Db::getInstance();

            $db->query("UPDATE test_stand set status='".$status."',tester_id='".$tstID."',handler_id='".$hdID."', loc='".$loc."', remarks='".$remarks."', last_update='".$lastUpdate."' WHERE serial_id = '".$srid."'");

            $db->query("INSERT INTO test_stand_history (serial_id, family, tst_pf, status, tester_id, handler_id, hd_pf, loc, rack, line, vendor, sFile, client, clerk, remarks) 
            SELECT serial_id, family, tst_pf, status, tester_id, handler_id, hd_pf, loc, rack, line, vendor, sFile, '".$borrower."','".$_SESSION['userEmail']."',remarks FROM test_stand WHERE serial_id = '".$srid."'");

            header('Location: ?controller=pages&action=trkCable');
        }

    }
}

class signInUser{
    public static function login() {
        // we create a list of Post objects from the database results
        // if (empty($_POST['pass'])){
        //     return false;
        // }else{
        //     $username = $_SESSION['username'];
        //     $password = $_POST['pass'];
        // }

       if(isset($_POST['username']) && isset($_POST['password'])){

           $adServer = "ldap://ad.onsemi.com";

           $ldap = ldap_connect($adServer);

           $username = $_POST['username']; // FF ID
           $password = $_POST['password'];
           
           if (empty($username) || empty($password));{

           }
           //$task = $_POST['task'];

           $ldaprdn = 'onsemi' . "\\" . $username;
           ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
           ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
           $bind = @ldap_bind($ldap, $ldaprdn, $password);

           if ($bind) {

               // if (ldap_get_option($ldap, LDAP_OPT_DIAGNOSTIC_MESSAGE, $extended_error)) {
               //     echo "Error Binding to LDAP: $extended_error";
               // } else {
               //     echo "Error Binding to LDAP: No additional information is available.";
               // }

               $filter="(sAMAccountName=$username)";
               $result = ldap_search($ldap,"dc=MYDOMAIN,dc=COM",$filter);
               @ldap_sort($ldap,$result,"sn");
               $info = ldap_get_entries($ldap, $result);
               @ldap_close($ldap);

               //$list = [];
               $db2 = DbUser::getInstance2();
               $req = $db2->query('SELECT firstName,lastName,email FROM employeeinfos WHERE ffid="'.$username.'" LIMIT 1');

                 // we create a list of Post objects from the database results
               foreach($req->fetchAll() as $post) {
                   //$list[] = new lbList($post['firstName'], $post['email']);
                   $_SESSION['userEmail'] = $post['firstName']." ".$post['lastName'];
               }

               $db = Db::getInstance();
               $req2 = $db->query('SELECT cents_auth,line FROM users WHERE ad_accnt="'.$username.'" LIMIT 1');
            //    $number_of_rows = $req2->fetchColumn();

            //    if ($number_of_rows > 0){
                    foreach($req2->fetchAll() as $post2) {
                        //$list[] = new lbList($post['firstName'], $post['email']);
                        $_SESSION['username'] = $username;
                        $_SESSION['level'] = $post2['cents_auth'];
                        $_SESSION['line'] = $post2['line'];
                    // $_SESSION['level'] = 0;
                    }
            //    }
                 // we create a list of Post objects from the database results
               

               //return $list;

               //echo "TRUE";
               //echo $_POST['username'];
               //echo $_POST['password'];
               //return;
               header('Location: index.php');
               exit();
           }else if(isset($_POST['nonAD'])){
                $username = $_POST['username']; // FF ID
                $password = $_POST['password'];

                $db = Db::getInstance();
                $req = $db->query('SELECT f_name,l_name,line FROM nonaduser WHERE cId_no="'.$username.'" AND password="'.md5($password).'"');
                $number_of_rows = $req->rowCount();
                if ($number_of_rows > 0){
                    foreach($req->fetchAll() as $post) {
                        $_SESSION['userEmail'] = $post['f_name']." ".$post['l_name'];
                        $_SESSION['level'] = '0';
                        $_SESSION['line'] = $post['line'];
                        $_SESSION['username'] = $username;
                    }
                    header('Location: index.php');
                    exit();
                }
            }
       }
       $_SESSION['loginError'] = "Invalid username or password. Please try again.";
       header('Location: index.php');
       exit();
       //echo "FALSE";
       //exit();
  }

  public static function logout() {
    // session_start();
    session_destroy();
    //unset($_SESSION['login_user']);
    header('Location: index.php');
  }

}

class PerPage {
	public $perpage;

	function __construct() {
		$this->perpage = 10;
	}

	function getAllPageLinks($count,$href) {
		$output = '';
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		if($this->perpage != 0)
			$pages  = ceil($count/$this->perpage);
		if($pages>1) {
			if($_GET["page"] == 1)
				$output = $output . '<span class="link first disabled">&#8810;</span><span class="link disabled">&#60;</span>';
			else
				$output = $output . '<a class="link first" onclick="getresult(\'' . $href . (1) . '\')" >&#8810;</a><a class="link" onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" >&#60;</a>';


			if(($_GET["page"]-3)>0) {
				if($_GET["page"] == 1)
					$output = $output . '<span id=1 class="link current">1</span>';
				else
					$output = $output . '<a class="link" onclick="getresult(\'' . $href . '1\')" >1</a>';
			}
			if(($_GET["page"]-3)>1) {
					$output = $output . '<span class="dot">...</span>';
			}

			for($i=($_GET["page"]-2); $i<=($_GET["page"]+2); $i++)	{
				if($i<1) continue;
				if($i>$pages) break;
				if($_GET["page"] == $i)
					$output = $output . '<span id='.$i.' class="link current">'.$i.'</span>';
				else
					$output = $output . '<a class="link" onclick="getresult(\'' . $href . $i . '\')" >'.$i.'</a>';
			}

			if(($pages-($_GET["page"]+2))>1) {
				$output = $output . '<span class="dot">...</span>';
			}
			if(($pages-($_GET["page"]+2))>0) {
				if($_GET["page"] == $pages)
					$output = $output . '<span id=' . ($pages) .' class="link current">' . ($pages) .'</span>';
				else
					$output = $output . '<a class="link" onclick="getresult(\'' . $href .  ($pages) .'\')" >' . ($pages) .'</a>';
			}

			if($_GET["page"] < $pages)
				$output = $output . '<a  class="link" onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >></a><a  class="link" onclick="getresult(\'' . $href . ($pages) . '\')" >&#8811;</a>';
			else
				$output = $output . '<span class="link disabled">></span><span class="link disabled">&#8811;</span>';


		}
    // $output = $output . '<span class=""><input type="text" style="width:50px;height:100%; margin-left:10px;" placeholder="GOTO"></span><span class="link disabled">GO</span>';
		return $output;
	}
	function getPrevNext($count,$href) {
		$output = '';
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		if($this->perpage != 0)
			$pages  = ceil($count/$this->perpage);
		if($pages>1) {
			if($_GET["page"] == 1)
				$output = $output . '<span class="link disabled first">Prev</span>';
			else
				$output = $output . '<a class="link first" onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" >Prev</a>';

			if($_GET["page"] < $pages)
				$output = $output . '<a  class="link" onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >Next</a>';
			else
				$output = $output . '<span class="link disabled">Next</span>';


		}
		return $output;
	}
}

class userMgt{
    public static function addUser() {
        if(isset($_POST['save'])){
            $adAccount = $_POST['adAccount'];
            $level = $_POST['level'];
            $line = $_POST['line'];
    
            $db = Db::getInstance();    
            $hasRows = $db->query("SELECT * FROM users WHERE ad_accnt ='$adAccount'")->fetchColumn();
            
            if ($hasRows > 0){
                $_SESSION['userRows'] = '<div class="alert alert-danger" role="alert" id="message" for="name"><b>AD Account already exist!</b></div>';
            }else{
                $db->query("INSERT INTO users(ad_accnt,level,cents_auth,added_by,line)
                VALUES('".$adAccount."','".$level."','".$level."','".$_SESSION['userEmail']."','".$line."')");
        
                
            }
            header('Location: ?controller=pages&action=manageUser');
        }

        if(isset($_POST['update'])){
            $id = $_POST['userID'];
            $adAccount = $_POST['adAccount'];
            $level = $_POST['level'];
            $line = $_POST['line'];
    
            $db = Db::getInstance();    
            $db->query("UPDATE users set ad_accnt='".$adAccount."',level='".$level."',
            added_by='".$_SESSION['userEmail']."',line='".$line."' WHERE id='".$id."'");
    
            header('Location: ?controller=pages&action=manageUser');
        }

        if(isset($_POST['delete'])){
            $id = $_POST['userID'];
    
            $db = Db::getInstance();    
            $db->query("DELETE FROM users WHERE id='".$id."'");
    
            header('Location: ?controller=pages&action=manageUser');
        }
    }
}
