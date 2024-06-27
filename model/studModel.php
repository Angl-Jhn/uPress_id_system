<?php
include_once("connection/PDOModel.php");
@session_start();
class StudentModel{
    function requestId($type,$formType,$studId,$wmsuEmail,$fname,$mdname,$lname,$nameExt,$program,
        $emgfname,$emgMname,$emgLname,$emgNameExt,$emgAddress,$emgContact,$photo,$signature,$cor,$oldId,$oldIdBack,$aol) {
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
                var_dump($cor);
                $stmt1 = $db->prepare("
                    INSERT INTO student (clientIDStudent, studentNum, collegeProgram, COR, oldIDFront, oldIDBack, affidavitOfLoss) 
                    VALUES (:clientIDstud, :studnum, :programs, :cor, :oldId, :oldIdBack, :aol)
                ");
                $stmt1->bindParam(':clientIDstud', $res);
                $stmt1->bindParam(':studnum', $studId);
                $stmt1->bindParam(':programs', $program);
                $stmt1->bindParam(':cor', $cor);
                $stmt1->bindParam(':oldId', $oldId);
                $stmt1->bindParam(':oldIdBack', $oldIdBack);
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