<?php
include_once("model/formConfigurationModel.php");
$form = new formConfigModel();

$id = htmlentities($_POST["id"]);
$version = htmlentities($_POST["version"]);
$effectiveDate = htmlentities($_POST["effectiveDate"]);
$type = htmlentities($_POST['type']);
$update = $form->updateForm($id,$version,$effectiveDate,$type);

if($update){
    echo json_encode(['message'=>'Form succesfully updated','status'=>'success']);
} else {
    echo json_encode(['message'=>'Form failed to update','status'=>'success']);
}
?>