<?php
include_once("model/accountManageModel.php");
include_once("model/clientModel.php");
$obj = new AccountManageModel();
$client = new ClientModel();

if(isset($_POST["type"]) == "student"){
  $type = $_POST["type"];
  $studId = $_POST["studentId"];
  $studEmail = $_POST["studentEmail"];
  $firstname = $_POST["firstName"];
  $middlename = $_POST["middleName"];
  $familyname = $_POST["familyName"];
  $nameExt = $_POST["nameExt"];
  $res = $client->requestId($type,$firstname,$familyname,$middlename);
  if($res){
    var_dump($res);
  }
} else {
  var_dump("employee");
}

/*if(isset($_FILES['images'])) {
    $errors = array();
    $uploadedFiles = array();
    $extension = array("jpeg","jpg","png","gif");
    
    foreach($_FILES['images']['tmp_name'] as $key => $tmp_name ) {
      $file_name = $_FILES['images']['name'][$key];
      $file_tmp = $_FILES['images']['tmp_name'][$key];
      
      $ext = pathinfo($file_name,PATHINFO_EXTENSION);
      if(in_array($ext,$extension) === false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if(empty($errors)==true) {
        $filename = basename($file_name,$ext);
        $newFileName = $filename.time().".".$ext;
        if(move_uploaded_file($file_tmp,"../../uploads/".$newFileName)) {
            //$uploadedFiles[] = $newFileName;
            $obj->addAccount($newFileName,$_POST['poiType'],$_POST['title'],$_POST['description'],$_POST['city']);
            $uploadedFiles['status'] = 1;
        }
      }
    }
    
    if(empty($uploadedFiles)==false) {
      echo json_encode($uploadedFiles);
    }
    else {
      echo json_encode($errors);
    }
}*/
?>