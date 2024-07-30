<?php
include_once("connection/PDOModel.php");

class DsaListModel {
    function getList() {
        $conn = new PDOModel();
        $db = $conn->getDb();
        
        $stmt = $db->prepare("SELECT * FROM dsa_list");
        $stmt->execute();
        
        $fetch_acc = $stmt->fetchAll();
        $res = array();
        foreach($fetch_acc as $row){
            $res[$row['id']]=$row;
        }
        return ($stmt->rowCount() > 0) ? $res :0;
    }
    
    function getDefault(){
        $conn = new PDOModel();
        $db = $conn->getDb();
        
        $stmt = $db->prepare("SELECT * FROM dsa_list WHERE status = 1");
        $stmt->execute();
        
        $fetch_acc = $stmt->fetch();

        return ($stmt->rowCount() > 0) ? $fetch_acc :0;
    }
    
    function addNewDirector($title,$firstName,$middleName,$familyName,$suffix,$signature,$year){
        $conn = new PDOModel();
        $db = $conn->getDb();

        try{
            $stmt = $db->prepare("
            INSERT INTO
            dsa_list (title, firstName, middleName, familyName, suffix, signature, year)
            VALUES (:title, :firstName, :middleName, :familyName, :suffix, :signature, :year)
            ");
            $stmt->bindParam(':title',$title);
            $stmt->bindParam(':firstName',$firstName);
            $stmt->bindParam(':middleName',$middleName);
            $stmt->bindParam(':familyName',$familyName);
            $stmt->bindParam(':suffix',$suffix);
            $stmt->bindParam(':signature',$signature);
            $stmt->bindParam(':year',$year);
            
            $stmt->execute();
            return $db->lastInsertId();
            
        }catch (PDOException $e) {
            // Handle any errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function updateDefault($id){
        $conn = new PDOModel();
        $db = $conn->getDb();
        try{
            $stmt = $db->prepare("
            UPDATE dsa_list SET status = 0
            ");
            $stmt->execute();

            $stmt1 = $db->prepare("UPDATE dsa_list SET status = 1 where id = :id");
            $stmt1->bindParam(":id",$id);
            $stmt1->execute();

            return true;
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>