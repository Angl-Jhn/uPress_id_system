<?php
include_once("model/studModel.php");
include_once("model/empModel.php");
$client = new StudentModel();
$client1 = new EmployeeModel();  

if(isset($_POST["type"])){
if($_POST["type"] == "student"){
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
    $photo = "";
    $signature = "";
    $cor = "";
    $oldId = "";
    $oldIdBack = "";
    $aol = "";
  
    $status = false; // Initialize $status to false
    $cntData = 0; // Initialize $index to 0

    $arr = ["userPhoto","signature","cor","oldId","oldIdBack","aol"];
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
                if (move_uploaded_file($file_tmp, "uploads/student/" . $photoName)) {
                    if ($i == "userPhoto") {
                        $photo = $photoName;
                    } elseif ($i == "signature") {
                        $signature = $photoName;
                    } elseif ($i == "cor") {
                        $cor = $photoName;
                    } elseif ($i == "oldId") {
                        $oldId = $photoName;
                    } elseif ($i == "oldIdBack") {
                        $oldIdBack = $photoName;
                    } elseif ($i == "aol") {
                        $aol = $photoName;
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
        $res = $client->requestId(
            $type, $formtype, $studId, $wmsuEmail, $firstname, $middlename, $familyname, $nameExt,
            $program, $emgfname, $emgMname, $emgLname, $emgNameExt, $emgAddress, $emgContact, $photo, $signature, $cor, $oldId, $oldIdBack, $aol
        );
        /*if($res){
            var_dump($res); 
        }*/
    }
} elseif ($_POST["type"] == "employee"){
    
    $type = $_POST["type"];
    $formtype = $_POST["formType"];
    $idNumber = $_POST["idNumber"];
    $wmsuEmail = $_POST["wmsuEmail"];
    $firstname = $_POST["firstName"];
    $middlename = $_POST["middleName"];
    $familyname = $_POST["familyName"];
    $nameExt = $_POST["nameExt"];
    $academicRank = $_POST["academicRank"];
    $designation = $_POST["designation"];
    $resAddress = $_POST["residentialAddress"];
    $DoB = $_POST["dateofbirth"];
    $contact = $_POST["contactNumber"];
    $civilStatus = $_POST["civilStatus"];
    $bloodType = $_POST["bloodType"];
    $emgfname = $_POST["emergencyFirstName"];
    $emgMname = $_POST["emergencyMiddleName"];
    $emgLname = $_POST["emergencyFamilyName"];
    $emgNameExt = $_POST["emergencyNameExt"];
    $emgAddress = $_POST["emergencyAddress"];
    $emgContact = $_POST["emergencyContact"];
    $photo = "";
    $signature = "";
    $hrmoScanned = "";
    $hrmoNew = "";
    $aol = "";
    
    $status = false; // Initialize $status to false
    $cntData = 0; // Initialize $index to 0

    $arr = ["userPhoto","signature","hrmoScanned","hrmoNew","aol"];
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
                if (move_uploaded_file($file_tmp, "uploads/employee/" . $photoName)) {
                    if ($i == "userPhoto") {
                        $photo = $photoName;
                    } elseif ($i == "signature") {
                        $signature = $photoName;
                    } elseif ($i == "hrmoScanned") {
                        $hrmoScanned = $photoName;
                    } elseif ($i == "hrmoNew") {
                        $hrmoNew = $photoName;
                    } elseif ($i == "aol") {
                        $aol = $photoName;
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
        $res = $client1->requestId(
            $type,$formtype,$idNumber,$wmsuEmail,$firstname,$middlename,$familyname,$nameExt,$academicRank,$designation,$resAddress,$DoB,$contact,
            $civilStatus,$bloodType,$emgfname,$emgMname,$emgLname,$emgNameExt,$emgAddress,$emgContact,$photo,$signature,
            $hrmoScanned,$hrmoNew,$aol
        );
        /*if($res){
            var_dump($res); 
        }*/
    }
}
}

?>