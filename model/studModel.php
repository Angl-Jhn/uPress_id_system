<?php
include_once("connection/PDOModel.php");
@session_start();
class StudentModel{
    function requestId($type,$formType,$studId,$email,$fname,$mdname,$lname,$nameExt,$program,
        $emgfname,$emgMname,$emgLname,$emgNameExt,$emgAddress,$emgContact,$photo,$signature,$cor,$oldId,$oldIdBack,$aol,$DSAForm) {
        $conn = new PDOModel();
        $db = $conn->getDb();

        try {
            // Prepare the SQL statement
            $stmt = $db->prepare("
                INSERT INTO 
                clients (clientType, formType, email, firstName, middleName, lastName, nameExt, emergencyFirstName, emergencyMiddleName, emergencyLastName, emergencyNameExt, emergencyAddress, emergencyContactNum, clientSignature, clientPhoto)
                VALUES (:clientType, :formType, :email, :firstName, :middleName, :lastName, :nameExt, :emergencyfname, :emergencymname, :emergencylname, :emergencyNameExt, :emergencyaddress, :emergencycontact, :signature, :photo)
            ");

            // Bind the parameters
            $stmt->bindParam(':clientType', $type);
            $stmt->bindParam(':formType', $formType);
            $stmt->bindParam(':email', $email);
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
            // var_dump($res);
            if($res){
                $stmt1 = $db->prepare("
                    INSERT INTO student (clientIDStudent, studentNum, progCategoryID, COR, oldIDFront, oldIDBack, affidavitOfLoss, DSA) 
                    VALUES (:clientIDstud, :studnum, :progCategoryID, :cor, :oldId, :oldIdBack, :aol, :DSAForm)
                ");
                $stmt1->bindParam(':clientIDstud', $res);
                $stmt1->bindParam(':studnum', $studId);
                $stmt1->bindParam(':progCategoryID', $program);
                $stmt1->bindParam(':cor', $cor);
                $stmt1->bindParam(':oldId', $oldId);
                $stmt1->bindParam(':oldIdBack', $oldIdBack);
                $stmt1->bindParam(':aol', $aol);
                $stmt1->bindParam(':DSAForm', $DSAForm);
                
                $stmt1->execute();
                return $db->lastInsertId();
            }
            

        } catch (PDOException $e) {
            // Handle any errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    function updateStudent($id, $type, $formType, $studId, $email, $fname, $mdname, $lname, $nameExt, $program,
        $emgfname, $emgMname, $emgLname, $emgNameExt, $emgAddress, $emgContact, $photo, $signature, $cor, $oldId, $oldIdBack, $aol, $DSAForm) {
        
        $conn = new PDOModel();
        $db = $conn->getDb();

        try {
            $db->beginTransaction(); // Begin a transaction

            // Prepare the SQL statement for clients
            $stmt = $db->prepare("
                UPDATE clients SET 
                clientType = :clientType, formType = :formType, email = :email, firstName = :firstName, middleName = :middleName, 
                lastName = :lastName, nameExt = :nameExt, emergencyFirstName = :emergencyfname, emergencyMiddleName = :emergencymname, 
                emergencyLastName = :emergencylname, emergencyNameExt = :emergencyNameExt, emergencyAddress = :emergencyaddress, 
                emergencyContactNum = :emergencycontact, clientSignature = :signature, clientPhoto = :photo
                WHERE id = :id
            ");

            // Bind the parameters for clients
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':clientType', $type);
            $stmt->bindParam(':formType', $formType);
            $stmt->bindParam(':email', $email);
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

            // Execute the statement for clients
            $stmt->execute();

            // Prepare the SQL statement for student
            $stmt1 = $db->prepare("
                UPDATE student SET 
                studentNum = :studnum, progCategoryID = :progCategoryID, COR = :cor, oldIDFront = :oldId, oldIDBack = :oldIdBack, 
                affidavitOfLoss = :aol, DSA = :DSAForm
                WHERE clientIDStudent = :clientIDstud
            ");

            // Bind the parameters for student
            $stmt1->bindParam(':clientIDstud', $id);
            $stmt1->bindParam(':studnum', $studId);
            $stmt1->bindParam(':progCategoryID', $program);
            $stmt1->bindParam(':cor', $cor);
            $stmt1->bindParam(':oldId', $oldId);
            $stmt1->bindParam(':oldIdBack', $oldIdBack);
            $stmt1->bindParam(':aol', $aol);
            $stmt1->bindParam(':DSAForm', $DSAForm);

            // Execute the statement for student
            $stmt1->execute();

            $db->commit(); // Commit the transaction

            return $id; // Return the ID of the updated row

        } catch (PDOException $e) {
            $db->rollBack(); // Rollback the transaction in case of error
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

}