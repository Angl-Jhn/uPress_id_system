<?php
include_once("connection/PDOModel.php");

class formConfigModel {
    function getForm() {
        $conn = new PDOModel();
        $db = $conn->getDb();

        $stmt = $db->prepare("SELECT * FROM formconfig");
        $stmt->execute();
        
        $fetch_acc = $stmt->fetchAll();
        $res = array();
        foreach($fetch_acc as $row){
            $res[$row['type']] = ['value'=>$row['value'],'id'=>$row['row_id']];
        }
        return ($stmt->rowCount() > 0) ? $res :0;
    }

    function updateForm($id,$version,$effectiveDate,$type){
        $conn = new PDOModel();
        $db = $conn->getDb();
        try{
            $db->beginTransaction(); // Begin a transaction

            // Prepare the first statement
            if($type == "student"){
                $stmt = $db->prepare("UPDATE formconfig SET  value = :version WHERE row_id = :row_id and type = 'StudentFormVersion'");
                $stmt->bindParam(":row_id", $id);
                $stmt->bindParam(":version", $version);
                $stmt->execute();
            
                // Prepare the second statement
                $stmt = $db->prepare("UPDATE formconfig SET  value = :effectiveDate WHERE row_id = :row_id and type = 'StudentFormEDate'");
                $stmt->bindParam(":row_id", $id);
                $stmt->bindParam(":effectiveDate", $effectiveDate);
                $stmt->execute();
            } else {
                $stmt = $db->prepare("UPDATE formconfig SET  value = :version WHERE row_id = :row_id and type = 'EmployeeFormVersion'");
                $stmt->bindParam(":row_id", $id);
                $stmt->bindParam(":version", $version);
                $stmt->execute();
            
                // Prepare the second statement
                $stmt = $db->prepare("UPDATE formconfig SET  value = :effectiveDate WHERE row_id = :row_id and type = 'EmployeeFormEDate'");
                $stmt->bindParam(":row_id", $id);
                $stmt->bindParam(":effectiveDate", $effectiveDate);
                $stmt->execute();
            }
        
            $db->commit(); // Commit the transaction
            return true;
        
        }catch (PDOException $e) {
            $db->rollBack(); // Rollback in case of an error
            // Handle any errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function getPrograms(){
        $conn = new PDOModel();
        $db = $conn->getDb();

        $stmt = $db->prepare("SELECT * FROM schoolprog");
        $stmt->execute();

        $fetch_acc = $stmt->fetchAll();
        
        return $fetch_acc;
    }
    function getProgCat(){
        $conn = new PDOModel();
        $db = $conn->getDb();

        $stmt = $db->prepare("SELECT * FROM progcategory");
        $stmt->execute();

        $fetch_acc = $stmt->fetchAll();
        
        return $fetch_acc;
    }

    // function newProgram(){
    //     $conn = new PDOModel();
    //     $db = $conn->getDb();

    //     try {
    //         // Prepare the SQL statement
    //         $stmt = $db->prepare("
    //             INSERT INTO
    //             progcategory
    //         ");

    //         // Bind the parameters
    //         $stmt->bindParam(':clientType', $type);
    //         // Execute the statement
    //         $stmt->execute();
    //         // Optionally, you can return the ID of the inserted row
    //         // variable res as lastinsertid
            
    //         $res = $db->lastInsertId();
    //         // var_dump($res);
    //         if($res){
    //             $stmt1 = $db->prepare("
                
    //             ");
    //             $stmt1->bindParam(':clientIDstud', $res);
                
                
    //             $stmt1->execute();
    //             return $db->lastInsertId();
    //         }
            

    //     } catch (PDOException $e) {
    //         // Handle any errors
    //         echo "Error: " . $e->getMessage();
    //         return false;
    //     }
    // }

}
?>