<?php
include_once("model/dsaListModel.php");
$director = new DsaListModel();

$uploadedFiles = array();
$uploadedFiles['signature'] = array();

if(isset($_POST['action'])){
    switch($_POST['action']) {
        case 'addDirector':
            handleAddDirector($director);
            break;
         case 'makeDefault':
            handleUpdateDefault($director);
            break;
            
    }
}

function handleAddDirector($objModel){
    var_dump("test");
    $title = htmlentities($_POST["title"]);
    $firstName = htmlentities($_POST["firstName"]);
    $middleName = htmlentities($_POST["middleName"]);
    $familyName = htmlentities($_POST["familyName"]);
    $nameExt = htmlentities($_POST["nameExt"]);
    $year = htmlentities($_POST["year"]);
    
    uploadImage('signature','layout/DSA');

    global $uploadedFiles;
    $signature = !empty($uploadedFiles['signature'][0]) ? $uploadedFiles['signature'][0]:"";

    $res = $objModel->addNewDirector($title,$firstName,$middleName,$familyName,$nameExt,$year,$signature);
    if ($res){
        echo json_encode(['message'=>'Successfully added '.$firstName.' '.$familyName.' as Director','status'=>'success']);
    } else {
        echo json_encode(['message'=>'Failed to add'.$firstName.' '.$familyName.' as Director', 'status'=>'error']);
    }

}

function uploadImage($fieldName,$folder) {
    $errors = array();
    global $uploadedFiles;
    
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
                $uploadPath = "uploads/".$folder."/" . $photoName;

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

function handleUpdateDefault($objModel){
    $id= $_POST['id'];
    $res = $objModel->updateDefault($id);
    if ($res){
        echo json_encode(['message'=>'Successfully set as default','status'=>'success']);
    } else {
        echo json_encode(['message'=>'Failed to set default', 'status'=>'error']);
    }
}
?>