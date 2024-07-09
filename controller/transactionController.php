<?php
include_once("model/studModel.php");
include_once("model/empModel.php");
include_once("model/transactionManageModel.php");
$Stud = new StudentModel();
$Employ = new EmployeeModel();
$clients = new TransactionManageModel();
// $clients = $obj->getAll();
// $delClient = $obj->softDeleteClient($id);

if(isset($_POST["type"])){
    if($_POST["type"] == "student"){
        switch($_POST["type2"]) {
            case 'addStud':
                handleAddStud($Stud);
                break;
            case 'viewClients':
                handleViewClients($clients);
                break;
            case 'delete':
                handleDeleteClient($clients);
                break;
            
        }
    }
}
function handleAddStud($objModel){
    // var_dump($objModel);
    $type = $_POST["type"];
    $formtype = $_POST["formType"];
    $studId = $_POST["studnum"];
    $wmsuEmail = $_POST["wmsuEmail"];
    $firstname = $_POST["firstName"];
    $middlename = $_POST["middleName"];
    $familyname = $_POST["familyName"];
    $nameExt = $_POST["nameExt"];
    $program = $_POST["programs"];
    $emgfname = $_POST["firstNameEmg"];
    $emgMname = $_POST["middleNameEmg"];
    $emgLname = $_POST["familyNameEmg"];
    $emgNameExt = $_POST["nameExtEmg"];
    $emgAddress = $_POST["address"];
    $emgContact = $_POST["contactNumber"];
    $photo = uploadImage('userPhoto');
    $signature = uploadImage('signature');
    $cor = uploadImage('cor');
    $oldId = uploadImage('oldId');
    $oldIdBack = uploadImage('oldIdBack');
    $aol = uploadImage('aol');

    $res1 = $objModel->requestId(
        $type, $formtype, $studId, $wmsuEmail, $firstname, $middlename, $familyname, $nameExt,
            $program, $emgfname, $emgMname, $emgLname, $emgNameExt, $emgAddress, $emgContact, $photo, $signature, $cor, $oldId, $oldIdBack, $aol
    );
    if ($res1) {
        echo json_encode(['message'=>'Successfully added '.$firstname.' '.$familyname,'status'=>'success']);
    } else {
        echo json_encode(['message'=>'Failed to add'.$firstname.' '.$familyname,'status'=>'error']);
    }

}

function handleViewClients($objModel){
    $id = $_POST("client_id");
    $result = $objModel->getAll($id);
    if($result){
        echo json_encode($result);
    }
}

function handleDeleteClient($objModel) {
    $id = $_POST['client_id'];
    $deleteAcc = $objModel->softDeleteClient($id);
    if($deleteAcc){
        echo json_encode(['message'=>'Successfully deleted client '.$id,'status'=>'success']);
    } else {
        echo json_encode(['message'=>'Failed to delete client'.$id,'status'=>'error']);
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
        echo json_encode($errors);
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