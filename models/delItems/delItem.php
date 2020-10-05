<?php
require('../../frameworks/connection.php');
// $id_count = count($_POST['id']); // count array

$id = $_POST['id'];
$cat = $_POST['cat'];

switch($cat)
{
    case "LOADBOARD":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM loadboard WHERE id IN ('$dataID')");
        
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO lb_archive SELECT * FROM loadboard WHERE id=$post[id]");
            echo $post['id'];
        }
        
        $db->query("DELETE FROM loadboard WHERE id IN ('$dataID')");
        break;
    case "SOCKET":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from socket WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO socket_archive SELECT * FROM socket WHERE id=$post[id]");
        }
    
        $db->query("DELETE from socket WHERE id in ('$dataID')");
        break;
    case "GNG":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from gng WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO gng_archive SELECT * FROM gng WHERE id=$post[id]");
        }
    
        $db->query("DELETE from gng WHERE id in ('$dataID')");
        break;
    case "BIB":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from bib WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO bib_archive SELECT * FROM bib WHERE id=$post[id]");
        }
    
        $db->query("DELETE from bib WHERE id in ('$dataID')");
        break;
    case "NOZZLE":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from nozzle WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO nozzle_archive SELECT * FROM nozzle WHERE id=$post[id]");
        }
    
        $db->query("DELETE from nozzle WHERE id in ('$dataID')");
        break;
    case "IC":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from ic WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO ic_archive SELECT * FROM ic WHERE id=$post[id]");
        }
    
        $db->query("DELETE from ic WHERE id in ('$dataID')");
        break;
    case "MC":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from mc WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO mc_archive SELECT * FROM mc WHERE id=$post[id]");
        }
    
        $db->query("DELETE from mc WHERE id in ('$dataID')");
        break;
    case "WP":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from wp WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO wp_archive SELECT * FROM wp WHERE id=$post[id]");
        }
    
        $db->query("DELETE from wp WHERE id in ('$dataID')");
        break;
    case "SB":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from socket_board WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO socket_board_archive SELECT * FROM socket_board WHERE id=$post[id]");
        }
    
        $db->query("DELETE from socket_board WHERE id in ('$dataID')");
        break;
    case "ATC":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from atc WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO atc_archive SELECT * FROM atc WHERE id=$post[id]");
        }
    
        $db->query("DELETE from atc WHERE id in ('$dataID')");
        break;
    case "CK":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from ck WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO ck_archive SELECT * FROM ck WHERE id=$post[id]");
        }
    
        $db->query("DELETE from ck WHERE id in ('$dataID')");
        break;
    case "TP":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from tstpartstrck WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO tstpartstrck_archive SELECT * FROM tstpartstrck WHERE id=$post[id]");
        }
    
        $db->query("DELETE from tstpartstrck WHERE id in ('$dataID')");
        break;
    case "CB":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from center_board WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO center_board_archive SELECT * FROM center_board WHERE id=$post[id]");
        }
    
        $db->query("DELETE from center_board WHERE id in ('$dataID')");
        break;
    case "TFD":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from tfd WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO tfd_archive SELECT * FROM tfd WHERE id=$post[id]");
        }
    
        $db->query("DELETE from tfd WHERE id in ('$dataID')");
        break;
    case "RC":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from rubber_collet WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO rubber_collet_archive SELECT * FROM rubber_collet WHERE id=$post[id]");
        }
    
        $db->query("DELETE from rubber_collet WHERE id in ('$dataID')");
        break;
    case "SP":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from spare_parts WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("UPDATE spare_parts SET isDeleted = '1' WHERE id=$post[id]");
        }
    
        // $db->query("DELETE from rubber_collet WHERE id in ('$dataID')");
        break;
    case "PG":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM program WHERE id IN ('$dataID')");
        
        foreach($req->fetchAll() as $post) {
            $db->query("UPDATE program SET isDeleted = '1' WHERE id=$post[id]");
        }
        
        // $db->query("DELETE FROM loadboard WHERE id IN ('$dataID')");
        break; 
    case "CABLE":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM cable WHERE id IN ('$dataID')");
        
        foreach($req->fetchAll() as $post) {
            $db->query("UPDATE cable SET isDeleted = '1' WHERE id=$post[id]");
        }
        
        // $db->query("DELETE FROM loadboard WHERE id IN ('$dataID')");
        break;  
    case "COLLET":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from collet WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO collet_archive SELECT * FROM nozzle WHERE id=$post[id]");
        }
    
        $db->query("DELETE from collet WHERE id in ('$dataID')");
        break; 
    case "SPANKER":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from spanker WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO spanker_archive SELECT * FROM nozzle WHERE id=$post[id]");
        }
    
        $db->query("DELETE from spanker WHERE id in ('$dataID')");
        break; 
    case "TT":
        $dataID = implode("','", $id);

        $db = Db::getInstance();
        $req = $db->query("SELECT * from test_stand WHERE id in ('$dataID')");
    
        foreach($req->fetchAll() as $post) {
            $db->query("INSERT INTO test_stand_archive SELECT * FROM test_stand WHERE id=$post[id]");
        }
    
        $db->query("DELETE from test_stand WHERE id in ('$dataID')");
        break;                       
    default:
        break;
}

?>