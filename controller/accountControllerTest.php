<?php
include_once("model/accountManageModel.php");
$newAcc = new AccountManageModel();

if (isset($_POST["type"])) {
    switch ($_POST["type"]) {
        case 'add':
            handleAddAccount($newAcc);
            break;
        case 'viewUser':
            handleViewAccount($newAcc);
            break;
        case 'updateUser':
            handleUpdateAccount($newAcc);
            break;
        case 'delete':
            handleDeleteAccount($newAcc);
            break;
    }
}

function handleUpdateAccount($accountModel){
    $uname = htmlentities($_POST["uname"]);
    $pw = htmlentities($_POST["pw"]);
    $fname = htmlentities($_POST["fname"]);
    $middleName = htmlentities($_POST["mname"]);
    $lastName = htmlentities($_POST["lname"]);
    $nameExt = htmlentities($_POST["nameExt"]);
    $role = htmlentities($_POST["role"]);
    $img = uploadImage('accountPhoto');
    $id = $_POST["accId"];
    
    $updateAcc = $accountModel->updateAccount($id,$uname, $pw, $fname, $middleName, $lastName, $nameExt, $role, $img);  
    
    if ($updateAcc) {
        echo json_encode(['message'=>'succesfully updated the user '.$uname,'status'=>'success']);
    } else {
        echo json_encode(['message'=>'failed to update user '.$uname,'status'=>'error']);
    }
    
}

function handleViewAccount($accountModel){
    $id = $_POST["accId"];
    $result = $accountModel->getAccountById($id);
    if($result){
        echo json_encode($result);
    }
}

function handleAddAccount($accountModel) {
    header('Content-Type: application/json');
    // For debugging
    error_log('Inside handleAddAccount function');

    try {
        $uname = htmlentities($_POST["uname"]);
        $pw = htmlentities($_POST["pw"]);
        $fname = htmlentities($_POST["fname"]);
        $middleName = htmlentities($_POST["mname"]);
        $lastName = htmlentities($_POST["lname"]);
        $nameExt = htmlentities($_POST["nameExt"]);
        $role = htmlentities($_POST["role"]);
        $img = uploadImage('accountPhoto');

        $addAcc = $accountModel->addAccount($uname, $pw, $fname, $middleName, $lastName, $nameExt, $role, $img);

        if ($addAcc) {
            echo json_encode(['message' => 'Successfully created user ' .$uname. 'as ' .$role, 'status' => 'success']);
        } else {
            echo json_encode(['message' => 'Failed to create the user ' .$uname. 'as ' .$role, 'status' => 'error']);
        }
    } catch (Exception $e) {
        echo json_encode(['message' => 'Server error: ' . $e->getMessage(), 'status' => 'error']);
    }
}


function handleDeleteAccount($accountModel) {
    $id = $_POST['id'];
    $deleteAcc = $accountModel->softDeleteAccount($id);
    if($deleteAcc){
        echo json_encode(['message'=>'Successfully deleted the user'.$id,'status'=>'success']);
    } else {
        echo json_encode(['message'=>'Failed to delete user'.$id,'status'=>'error']);
    }
}

function uploadImage($fieldName) {
    $errors = array();
    $uploadedFiles = array();

    $allowedExtensions = array("jpeg", "jpg", "png", "gif");
    foreach ($_FILES as $fileKey => $fileArray) {
        if (isset($fileArray)) {
            foreach ($fileArray['tmp_name'] as $key => $tmp_name) {
                $file_name = $fileArray['name'][$key];
                $file_tmp = $fileArray['tmp_name'][$key];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);

                if (!in_array($ext, $allowedExtensions)) {
                    $errors[] = "Extension not allowed for $file_name, please choose a JPEG, JPG, PNG, or GIF file.";
                    continue;
                }

                $filename = basename($file_name, "." . $ext);
                $photoName = $filename . time() . "." . $ext;
                $uploadPath = "uploads/account/" . $photoName;

                if (move_uploaded_file($file_tmp, $uploadPath)) {
                    $uploadedFiles[$fileKey][] = $photoName;
                } else {
                    $errors[] = "Failed to upload $file_name.";
                }
            }
        }
    }

    if (!empty($errors)) {
        
        return false;
    }

    return $uploadedFiles[$fieldName][0] ?? false;
}

function getUploadPath($fileKey) {
    $uploadPaths = [
        "accountPhoto" => "account",
        "userPhoto" => "student",
        "signature" => "student",
        "cor" => "student",
        "oldId" => "student",
        "oldIdBack" => "student",
        "aol" => "student"
    ];
    return $uploadPaths[$fileKey] ?? "other";
}


?>