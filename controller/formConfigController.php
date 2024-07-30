<?php
include_once("model/formConfigurationModel.php");
$form = new formConfigModel();

if($_POST['action'] == 'updateForm'){
    $id = htmlentities($_POST["id"]);
    $version = htmlentities($_POST["version"]);
    $effectiveDate = htmlentities($_POST["effectiveDate"]);
    $type = htmlentities($_POST['type']);
    $update = $form->updateForm($id,$version,$effectiveDate,$type);

    if($update){
        echo json_encode(['message'=>'Form succesfully updated','status'=>'success']);
    } else {
        echo json_encode(['message'=>'Form failed to update','status'=>'error']);
    }
} else if($_POST['action'] == 'insertNew') {
    $programCatg = htmlentities($_POST['programCatg']);
    $new = $form->newProgCat($programCatg,$_POST['programName'],$_POST['specialization']);
    if($new){
        echo json_encode(['message'=>'Succesfully added new category','status'=>'success']);
    } else {
        echo json_encode(['message'=>'Failed to add new category','status'=>'error']);
    }
    

}
?>