<?php session_start();
/**
 * Created by Joe of ExchangeCore.com
 */
 echo $_POST['username'];
 echo $_POST['password'];

// if(isset($_POST['username']) && isset($_POST['password'])){
//
//     $adServer = "ldap://ad.onsemi.com";
//
//     $ldap = ldap_connect($adServer);
//
//     $username = $_POST['username']; // FF ID
//     $password = $_POST['password'];
//     $task = $_POST['task'];
//
//     $ldaprdn = 'onsemi' . "\\" . $username;
//     ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
//     ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
//     $bind = @ldap_bind($ldap, $ldaprdn, $password);
//
//     if ($bind) {
//
//         // if (ldap_get_option($ldap, LDAP_OPT_DIAGNOSTIC_MESSAGE, $extended_error)) {
//         //     echo "Error Binding to LDAP: $extended_error";
//         // } else {
//         //     echo "Error Binding to LDAP: No additional information is available.";
//         // }
//
//         $filter="(sAMAccountName=$username)";
//         $result = ldap_search($ldap,"dc=MYDOMAIN,dc=COM",$filter);
//         ldap_sort($ldap,$result,"sn");
//         $info = ldap_get_entries($ldap, $result);
//
//         $_SESSION['ess_logged_in'] = true;
//         $_SESSION['ess_userEmail'] = strtolower($username); // FFID
//
//         require_once("model/User.php");
//         $userObj = new User();
//
//         $empIDArr = $userObj->getUserEmployeeTbID(strtolower($username));
//         $empID = $empIDArr['id'];
//         $_SESSION['employee_ID'] = $empID;
//
//         $empAreas = $userObj->getEmployeeAreas($empID);
//         $_SESSION['empAreas'] = $empAreas;
//
//         // if ($task === "1"){
//         //     $_SESSION['user_type'] = 3;
//         // }else{
//             // EHS personnel and Head only
//             $userData = $userObj->getUserType($username);
//
//             if (sizeof($userData) === 1){
//                 $_SESSION['user_type'] = $userData['userType'];
//
//                 if ($task === "2"){
//                     if ($_SESSION['user_type'] == "1"){
//                         $_SESSION['user_type'] = 2;
//                     }
//                 }
//
//             }else{
//                 $_SESSION['user_type'] = 3;
//             }
//         // }
//
//         // for ($i=0; $i<$info["count"]; $i++)
//         // {
//         //     if($info['count'] > 1)
//         //         break;
//         //     echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
//         //     echo '<pre>';
//         //     var_dump($info);
//         //     echo '</pre>';
//         //     $userDn = $info[$i]["distinguishedname"][0];
//         // }
//
//         @ldap_close($ldap);
//
//         echo "TRUE";
//         exit();
//     }
// }
echo "FALSE";
exit();
?>
