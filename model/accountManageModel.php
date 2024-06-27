<?php
include_once("connection/PDOModel.php");
@session_start();

class AccountManageModel{
    function addAccount($uname,$pw,$fname,$mname,$lname,$nameExt,$role,$img) {
        $conn = new PDOModel();
        $db = $conn->getDb();
        // var_dump("test");

        try {
            $stmt = $db->prepare("
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
    function updateAccount( $id,$uname,$pw,$fname,$lname,$nameExt,$role,$img){
        $conn = new PDOModel();
        $db = $conn->getDb();
        if($img == NULL){    
            $stmt = $db->prepare("UPDATE `account` SET `uname`=:username, `pw`=:password, 
            `fname`=:firstName, `lname`=:lastName, `nameExt`=:nameExt, `role`=:role, 
            `img`=:accountPhoto,");
        } else {
            $stmt = $db->prepare("UPDATE `account` SET `uname`=:username, `pw`=:password, 
            `fname`=:firstName, `lname`=:lastName, `nameExt`=:nameExt, `role`=:role, 
            `img`=:accountPhoto WHERE `id`=:id");
            $stmt->bindParam(':accountPhoto', $img);
        }
        $stmt->bindParam(':username', $uname);
        $stmt->bindParam(':password', $pw);
        $stmt->bindParam(':firstName', $fname);
        $stmt->bindParam(':lastName', $lname);
        $stmt->bindParam(':nameExt', $nameExt);
        $stmt->bindParam(':role', $role);
        $stmt->execute();

    }
    function deleteAccount( $id ) {
        $conn = new PDOModel();
        $db = $conn->getDb();

        $stmt = $db->prepare("UPDATE `account` SET `status`=1 WHERE `id`=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>