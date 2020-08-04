<?php

$connection = mysqli_connect('phsm01ws012', 'cents','cents_user01','cents');
if(!$connection){
die ('DATABASE NOT CONNECTED');
}
print_r($_FILES);
$cat = $_POST["cat"];
$id = $_POST["id"];

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
                    $uploadResult = $connection-> query($uploadCheckerSQL);
                    $dataResultChecker = get_data_array($uploadResult);

                    // if($dataResultChecker["uploadImage"] == $target_path)
                    // {
                    //         $sql2 = "UPDATE spare_parts SET uploadImage = '". $target_path ."' WHERE id = '". $id ."'";
                    //         mysqli_query($connection, $sql2);
                    //         echo "UPLOAD FILE EXISTS";
                    // }
                    // else{
                    //     if(move_uploaded_file($sourcePath,$target_info)) {
    
                    //         $sql2 = "UPDATE spare_parts SET uploadImage = '". $target_path ."' WHERE id = '". $id ."'";
                    //         mysqli_query($connection, $sql2);
                    //         echo "UPLOADING FILE";
                            
                    //     }        
                    // }

                    if(move_uploaded_file($sourcePath,$target_info)) {
    
                        $sql2 = "UPDATE spare_parts SET uploadImage = '". $target_path ."' WHERE id = '". $id ."'";
                        mysqli_query($connection, $sql2);
                        echo "UPLOADING FILE";
                        
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
