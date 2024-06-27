<?php
include_once("connection/PDOModel.php");
@session_start();
class EmployeeModel{
    function requestId($type,$formType,$idNumber,$wmsuEmail,$fname,$mdname,$lname,$nameExt,$academicRank,$designation,$resAddress,$DoB,$contact,$civilStatus,$bloodType,$emgfname,$emgMname,$emgLname,$emgNameExt,$emgAddress,$emgContact,$photo,$signature,$hrmoScanned,$hrmoNew,$aol) {
        $conn = new PDOModel();
        $db = $conn->getDb();

        try {
            // Prepare the SQL statement
            $stmt = $db->prepare("
                INSERT INTO 
                clients (clientType, formType, wmsuEmail, firstName, middleName, lastName, nameExt, emergencyFirstName, emergencyMiddleName, emergencyLastName, emergencyNameExt, emergencyAddress, emergencyContactNum, clientSignature, clientPhoto)
                VALUES (:clientType, :formType, :wmsuEmail, :firstName, :middleName, :lastName, :nameExt, :emergencyfname, :emergencymname, :emergencylname, :emergencyNameExt, :emergencyaddress, :emergencycontact, :signature, :photo)
            ");

            // Bind the parameters
            $stmt->bindParam(':clientType', $type);
            $stmt->bindParam(':formType', $formType);
            $stmt->bindParam(':wmsuEmail', $wmsuEmail);
            $stmt->bindParam(':firstName', $fname);
            $stmt->bindParam(':middleName', $mdname);
            $stmt->bindParam(':lastName', $lname);
            $stmt->bindParam(':nameExt', $nameExt);
            $stmt->bindParam(':emergencyfname', $emgfname);
            $stmt->bindParam(':emergencymname', $emgMname);
            $stmt->bindParam(':emergencylname', $emgLname);
            $stmt->bindParam(':emergencyNameExt', $emgNameExt);
            $stmt->bindParam(':emergencyaddress', $emgAddress);
            $stmt->bindParam(':emergencycontact', $emgContact);
            $stmt->bindParam(':photo', $photo);
            $stmt->bindParam(':signature', $signature);

            // Execute the statement
            $stmt->execute();

            // Optionally, you can return the ID of the inserted row
            // variable res as lastinsertid
            $res = $db->lastInsertId();
            if($res){
                 var_dump($res);
                $stmt1 = $db->prepare("
                    INSERT INTO 
                    employee (clientIDEmp, empNum, plantillaPos, designation, residentialAddress, birthDate, contactNum, civilStatus, bloodType, hrmoScanned, hrmoNew, affidavitOfLoss) 
                    VALUES (:clientIDEmp, :idNumber, :academicRank, :designation, :residentialAddress, :dateofbirth, :contactNumber, :civilStatus, :bloodType, :hrmoScanned, :hrmoNew, :aol)
                ");
                $stmt1->bindParam(':clientIDEmp', $res);
                $stmt1->bindParam(':idNumber', $idNumber);
                $stmt1->bindParam(':academicRank', $academicRank);
                $stmt1->bindParam(':designation', $designation);
                $stmt1->bindParam(':residentialAddress', $resAddress);
                $stmt1->bindParam(':dateofbirth', $DoB);
                $stmt1->bindParam(':contactNumber', $contact);
                $stmt1->bindParam(':civilStatus', $civilStatus);
                $stmt1->bindParam(':bloodType', $bloodType);
                $stmt1->bindParam(':hrmoScanned', $hrmoScanned);
                $stmt1->bindParam(':hrmoNew', $hrmoNew);
                $stmt1->bindParam(':aol', $aol);

                $stmt1->execute();
                return $db->lastInsertId();
            }
            

        } catch (PDOException $e) {
            // Handle any errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}