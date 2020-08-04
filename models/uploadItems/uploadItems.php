<?php

require('../../frameworks/ajaxConn.php');
date_default_timezone_set("Asia/Manila");

// $connection = mysqli_connect('phsm01ws012', 'cents','cents_user01','cents');
// if(!$connection){
// die ('DATABASE NOT CONNECTED');
// }

print_r($_FILES);
$cat = $_POST["cat"];


function get_data_array($result){
        
    $data = array();
    
    if (is_object($result) && !empty($result->num_rows)) {
        while ($row = $result->fetch_assoc()) {
            foreach($row as $col => $value){
                $data[$col] = $value;
            }
        }
        $result->free();
    }
    
    return $data;
    
}

switch ($cat)
{
    case "SP":
        if(is_array($_FILES)) {
            if(is_uploaded_file($_FILES['Image']['tmp_name'])) {
                //Checking
                $validExtensions = array('jpg' , 'png' , 'jpeg');
        
                $sourcePath = $_FILES['Image']['tmp_name'];
        
                $target_path = $_FILES['Image']['name'];
        
                $target_dir =  "../../uploads/spareParts/";
        
                $target_info = $target_dir . $target_path;
        
                $uploadOk = 1;
        
                $uploadFileType = strtolower(pathinfo($target_path,PATHINFO_EXTENSION));
        
                if($_FILES["Image"]["size"] > 50000000){
                    echo ("<script LANGUAGE='JavaScript'>
                        window.alert('File is too large');
                        </script>");
                    $uploadOk = 0;
                }
        
                if(!in_array($uploadFileType."", $validExtensions)) {
        
                    echo ("<script LANGUAGE='JavaScript'>
                            window.alert('File Upload Failed / Invalid File, Returning to Create Form');
                            </script>");
                    $uploadOk = 0;
                }
        
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                }
                else{
                    $uploadCheckerSQL = "SELECT uploadImage FROM spare_parts WHERE uploadImage = '".$target_path."'";
                    $uploadResult = $conn-> query($uploadCheckerSQL);
                    $dataResultChecker = get_data_array($uploadResult);

                    if($dataResultChecker["uploadImage"] == $target_path)
                    {
                            $sql = "SELECT id FROM spare_parts ORDER BY id DESC LIMIT 1";
                            $results = $conn-> query($sql);
                            $data = get_data_array($results);
                            $sql2 = "UPDATE spare_parts SET uploadImage = '". $target_path ."' WHERE id = '". $data['id'] ."'";
                            mysqli_query($conn, $sql2);
                            echo "UPLOAD FILE EXISTS";
                    }
                    else{
                        if(move_uploaded_file($sourcePath,$target_info)) {
                            $sql = "SELECT id FROM spare_parts ORDER BY id DESC LIMIT 1";
                            $results = $conn-> query($sql);
                            $data = get_data_array($results);
                            $sql2 = "UPDATE spare_parts SET uploadImage = '". $target_path ."' WHERE id = '". $data['id'] ."'";
                            mysqli_query($conn, $sql2);
                            echo "UPLOADING FILE";
                            
                        }        
                    }
                }
            }
        }
        else{
            echo ("ERROR");
        }
        
        break;
    case "PG":
        if(is_array($_FILES)) {
            if(is_uploaded_file($_FILES['Image']['tmp_name'])) {
                //Checking
                $validExtensions = array('jpg' , 'png' , 'jpeg');
        
                $sourcePath = $_FILES['Image']['tmp_name'];
        
                $target_path = $_FILES['Image']['name'];
        
                $target_dir =  "../../uploads/program/";
        
                $target_info = $target_dir . $target_path;
        
                $uploadOk = 1;
        
                $uploadFileType = strtolower(pathinfo($target_path,PATHINFO_EXTENSION));
        
                if($_FILES["Image"]["size"] > 50000000){
                    echo ("<script LANGUAGE='JavaScript'>
                        window.alert('File is too large');
                        </script>");
                    $uploadOk = 0;
                }
        
                if(!in_array($uploadFileType."", $validExtensions)) {
        
                    echo ("<script LANGUAGE='JavaScript'>
                            window.alert('File Upload Failed / Invalid File, Returning to Create Form');
                            </script>");
                    $uploadOk = 0;
                }
        
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                }
                else{
                    $uploadCheckerSQL = "SELECT uploadImage FROM program WHERE uploadImage = '".$target_path."'";
                    $uploadResult = $conn-> query($uploadCheckerSQL);
                    $dataResultChecker = get_data_array($uploadResult);

                    if($dataResultChecker["uploadImage"] == $target_path)
                    {
                            $sql = "SELECT id FROM program ORDER BY id DESC LIMIT 1";
                            $results = $conn-> query($sql);
                            $data = get_data_array($results);
                            $sql2 = "UPDATE program SET uploadImage = '". $target_path ."' WHERE id = '". $data['id'] ."'";
                            mysqli_query($conn, $sql2);
                            echo "UPLOAD FILE EXISTS";
                    }
                    else{
                        if(move_uploaded_file($sourcePath,$target_info)) {
                            $sql = "SELECT id FROM program ORDER BY id DESC LIMIT 1";
                            $results = $conn-> query($sql);
                            $data = get_data_array($results);
                            $sql2 = "UPDATE program SET uploadImage = '". $target_path ."' WHERE id = '". $data['id'] ."'";
                            mysqli_query($conn, $sql2);
                            echo "UPLOADING FILE";
                            
                        }        
                    }
                }
            }
        }
        else{
            echo ("ERROR");
        }
        
        break;
	default:
		break;
}






?>
