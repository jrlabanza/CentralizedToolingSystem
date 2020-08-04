<?php

class lbList {
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

    public function __construct($lb_id, $family, $dut_req, $tst_pf, $status, $loc, $storage, $line, $vendor, $tester_id, $handler_id='', $borrower='', $clerk='', $date_time='',  $sFile='') {
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
        $req = $db->query('SELECT * FROM loadboard LIMIT 20');

          // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $post) {
            $list[] = new lbList($post['lb_id'], $post['family'], $post['dut_req'],
            $post['tst_pf'], $post['status'], $post['loc'], $post['storage'], $post['line'],
            $post['vendor'], $post['tester_id'], $post['handler_id'], $post['lastupdate']);
        }

      return $list;
    }

    public static function history() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM lb_history ORDER BY ID DESC LIMIT 50');

          // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $post) {
            $list[] = new lbList($post['lb_id'], $post['family'], $post['dut_req'],
            $post['tst_pf'], $post['status'], $post['loc'], $post['storage'], $post['line'],
            $post['vendor'], $post['tester_id'], $post['handler_id'], $post['borrower'],
            $post['clerk'], $post['date_time'], $post['sFile']);
        }

      return $list;
    }
}

class saveData{

    public function __construct() {

    }

    public static function saveLB() {
        if(isset($_POST['submit'])){

            $lb_id = $_POST['lbid'];
            $family = $_POST['family'];
            $dut_req = $_POST['dutReq'];
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
            //$clerk = $_POST['clerk'];
            date_default_timezone_set("Asia/Manila");
            $dates=(date("y.m.d H:i"));

            $folder="uploads/";
            $imagename=$_FILES['sfile']['name'];
            $file_name = preg_replace("/[^a-zA-Z0-9.]/", "", $imagename);
            move_uploaded_file($_FILES['sfile']['tmp_name'], "$folder".$file_name);

            $db = Db::getInstance();

            $db->query("UPDATE loadboard set status='".$status."',tester_id='".$tstID."',handler_id='".$hdID."', loc='".$loc."' WHERE lb_id = '".$lb_id."'");

            $db->query("INSERT INTO lb_history(lb_id,family,dut_req,tst_pf,status,tester_id,handler_id,loc,storage,line,vendor,borrower,clerk,sfile) VALUES('".$lb_id."','".$family."','".$dut_req."','".$tst_pf."','".$status."','".$tstID."','".$hdID."','".$loc."','".$storage."','".$line."','".$vendor."','".$borrower."','clerk','".$file_name."')");

            header('Location: ?controller=posts&action=loadboard');
            // echo '<script type="text/javascript">
            //     location.replace("?controller=posts&action=loadboard");
            //   </script>';

        }else{

        }

    }
}

class signInUser{
  public static function login() {
        // we create a list of Post objects from the database results
        //header('Location: ?controller=posts&action=loadboard');
       if(isset($_POST['username']) && isset($_POST['password'])){

           $adServer = "ldap://ad.onsemi.com";

           $ldap = ldap_connect($adServer);

           $username = $_POST['username']; // FF ID
           $password = $_POST['password'];
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

               $_SESSION['logged_in'] = true;
               $_SESSION['userEmail'] = strtolower($username); // FFID

               // require_once("model/User.php");
               // $userObj = new User();

               // $empIDArr = $userObj->getUserEmployeeTbID(strtolower($username));
               // $empID = $empIDArr['id'];
               // $_SESSION['employee_ID'] = $empID;
               //
               // $empAreas = $userObj->getEmployeeAreas($empID);
               // $_SESSION['empAreas'] = $empAreas;

               // if ($task === "1"){
               //     $_SESSION['user_type'] = 3;
               // }else{
                   // EHS personnel and Head only
                   // $userData = $userObj->getUserType($username);
                   //
                   // if (sizeof($userData) === 1){
                   //     $_SESSION['user_type'] = $userData['userType'];
                   //
                   //     if ($task === "2"){
                   //         if ($_SESSION['user_type'] == "1"){
                   //             $_SESSION['user_type'] = 2;
                   //         }
                   //     }
                   //
                   // }else{
                   //     $_SESSION['user_type'] = 3;
                   // }
               // }

               // for ($i=0; $i<$info["count"]; $i++)
               // {
               //     if($info['count'] > 1)
               //         break;
               //     echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
               //     echo '<pre>';
               //     var_dump($info);
               //     echo '</pre>';
               //     $userDn = $info[$i]["distinguishedname"][0];
               // }

               @ldap_close($ldap);

               $list = [];
               $db2 = DbUser::getInstance2();
               $req = $db2->query('SELECT firstName,email FROM employeeinfos WHERE ffid="'.$username.'" LIMIT 1');

                 // we create a list of Post objects from the database results
               foreach($req->fetchAll() as $post) {
                   //$list[] = new lbList($post['firstName'], $post['email']);
                   $_SESSION['userEmail'] = $post['firstName'];
               }

               //return $list;

               echo "TRUE";
               echo $_POST['username'];
               echo $_POST['password'];
               //return;
               header('Location: index.php');
           }
       }
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
