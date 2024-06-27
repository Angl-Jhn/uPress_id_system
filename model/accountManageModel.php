<?php
include_once("connection/PDOModel.php");
@session_start();

class AccountManageModel{
    function addAccount($uname,$pw,$fname,$mname,$lname,$nameExt,$role,$img) {
        $conn = new PDOModel();
        $db = $conn->getDb();
        // var_dump("test");

        try {
            $stmt = $db->prepare("`
                INSERT INTO
                account (username, password, firstName, middleName, lastName, nameExt, role, accountPhoto)
                VALUES  (:uname, :pw, :fname, :mname, :lname, :nameExt, :role, :accountPhoto)
            ");
            // bind the parameters
            $stmt->bindParam(':uname', $uname);
            $stmt->bindParam(':pw', $pw);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':mname', $mname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':nameExt', $nameExt);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':accountPhoto', $img);
            
            // execute statement
            $stmt->execute();

            var_dump($uname);
            // Optionally, you can return the ID of the inserted row
            // variable res as lastinsertid
            echo $db->lastInsertId();

        } catch (PDOException $e) {
            // Handle any errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    function getAccount() {
        $conn = new PDOModel();
        $db = $conn->getDb();

        $res = $db->prepare("SELECT * FROM account WHERE deletedAt IS NULL AND status = '0' ORDER BY `role` DESC");
        $res->execute();
        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $fetch_acc[$row['id']]=$row;
        }
        return ($res->rowCount() > 0) ? $fetch_acc :0;
    }
    function updateAccount($id,$uname,$pw,$fname,$mname,$lname,$nameExt,$role,$img){
        $conn = new PDOModel();
        $db = $conn->getDb();
        
        try {
            $stmt = $db->prepare("
                UPDATE account 
                SET username = :uname, password = :pw, firstName = :fname, middleName = :mname, lastName = :lname, 
                nameExt = :nameExt, role = :role, accountPhoto = :accountPhoto 
                WHERE id = :id
                ");
            // bind the parameters
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(':uname', $uname);
            $stmt->bindParam(':pw', $pw);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':mname', $mname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':nameExt', $nameExt);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':accountPhoto', $img);
            
            // execute statement
            return $stmt->execute();

        } catch (PDOException $e) {
            // Handle any errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    function softDeleteAccount($id) {
        $conn = new PDOModel();
        $db = $conn->getDb();
    
        // Update the deleted_at timestamp to mark soft deletion
        // $stmt = $db->prepare("UPDATE account SET deletedAt = NOW(), status = 1 WHERE id = :id");
        $stmt = $db->prepare("UPDATE account SET deletedAt = NOW() WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    function reactivateAccount($id) {
        $conn = new PDOModel();
        $db = $conn->getDb();

        // Reactivate the account by setting deleted_at to NULL
        $stmt = $db->prepare("UPDATE account SET deletedaT = NULL WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>