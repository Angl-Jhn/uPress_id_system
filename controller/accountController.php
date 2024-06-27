<?php
include_once("model/accountManageModel.php");
$newAcc = new AccountManageModel();

if(isset($_POST["type"])) {
    
    if(isset($_POST["type"]) == 'add'){
        var_dump("Test");
        $uname = htmlentities($_POST["uname"]);
        $pw = htmlentities($_POST["pw"]);
        $fname = htmlentities($_POST["fname"]);
        $middleName = htmlentities($_POST["mname"]);
        $lastName = htmlentities($_POST["lname"]);
        $nameExt = htmlentities($_POST["nameExt"]);
        $role = htmlentities($_POST["role"]);
        $img = ""; 
        
        $status = false; // Initialize $status to false
        $cntData = 0; // Initialize $index to 0
    
        $arr = ["accountPhoto"];
        $errors = array();
        $uploadedFiles = array();
    
        foreach ($arr as $i) {
            if (isset($_FILES[$i])) {
                $extension = array("jpeg", "jpg", "png", "gif");
    
                foreach ($_FILES[$i]['tmp_name'] as $key => $tmp_name) {
                    $file_name = $_FILES[$i]['name'][$key];
                    $file_tmp = $_FILES[$i]['tmp_name'][$key];
                    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
                    if (in_array($ext, $extension) === false) {
                        $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
                        continue; // Skip to the next file
                    }
    
                    $filename = basename($file_name, "." . $ext);
                    $photoName = $filename . time() . "." . $ext;
                    if (move_uploaded_file($file_tmp, "uploads/account/" . $photoName)) {
                        if ($i == "accountPhoto") {
                            $img = $photoName;
                        }
                        $uploadedFiles[$i][] = $photoName; // Store the uploaded file name
                    }
                }
            }
    
            if (count($arr) === ++$cntData) {
                $status = true;
            }
            // var_dump($cntData);
            // var_dump($i);
        }
        // var_dump($status);
        if (!empty($uploadedFiles)) {
            echo json_encode($uploadedFiles);
        } else {
            echo json_encode($errors);
        }
        if ($status == true) {
            $addAcc = $newAcc->addAccount($uname,$pw,$fname,$middleName,$lastName,$nameExt,$role,$img);
            if($addAcc){
                return $addAcc;
            }
            $_SESSION['message'] = "Account Created Successfully!";
        } else {
            $_SESSION['message'] = "Account Creation Failed!!";
        }
            
    } elseif($_POST["type"] == 'save'){
        // Handling edit account functionality
        // Example of handling edit functionality:
        $id = $_POST['id'];
        $uname = htmlentities($_POST["uname"]);
        $pw = htmlentities($_POST["pw"]);
        $fname = htmlentities($_POST["fname"]);
        $middleName = htmlentities($_POST["mname"]);
        $lastName = htmlentities($_POST["lname"]);
        $nameExt = htmlentities($_POST["nameExt"]);
        $role = htmlentities($_POST["role"]);
        $img = ""; // Initialize image variable

        // Processing uploaded files (if needed)
        $status = false; // Initialize $status to false
        $cntData = 0; // Initialize $index to 0
    
        $arr = ["accountPhoto"];
        $errors = array();
        $uploadedFiles = array();
    
        foreach ($arr as $i) {
            if (isset($_FILES[$i])) {
                $extension = array("jpeg", "jpg", "png", "gif");
    
                foreach ($_FILES[$i]['tmp_name'] as $key => $tmp_name) {
                    $file_name = $_FILES[$i]['name'][$key];
                    $file_tmp = $_FILES[$i]['tmp_name'][$key];
                    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
                    if (in_array($ext, $extension) === false) {
                        $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
                        continue; // Skip to the next file
                    }
    
                    $filename = basename($file_name, "." . $ext);
                    $photoName = $filename . time() . "." . $ext;
                    if (move_uploaded_file($file_tmp, "uploads/account/" . $photoName)) {
                        if ($i == "accountPhoto") {
                            $img = $photoName;
                        }
                        $uploadedFiles[$i][] = $photoName; // Store the uploaded file name
                    }
                }
            }
    
            if (count($arr) === ++$cntData) {
                $status = true;
            }
            // var_dump($cntData);
            // var_dump($i);
        }
        // var_dump($status);
        if (!empty($uploadedFiles)) {
            echo json_encode($uploadedFiles);
        } else {
            echo json_encode($errors);
        }
        if ($status == true) {
            $updateAcc = $newAcc->updateAccount($id, $uname, $pw, $fname, $mname, $lname, $nameExt, $role, $img);
            if($updateAcc){
                echo json_encode(array('status' => 'success', 'message' => 'Account Updated Successfully!'));
            }else {
                echo json_encode(array('status' => 'error', 'message' => 'Account Update Failed!!'));
            }
        }
    } elseif ($_POST["type"] == 'delete') {
        $id = $_POST['id'];
        $delAcc = $newAcc->softDeleteAccount($id);  

        if($delAcc){
            echo json_encode(['success' => true, 'message' => 'Account Deleted Successfully']);
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to delete account'));
        }
        
    }
}
    
?>