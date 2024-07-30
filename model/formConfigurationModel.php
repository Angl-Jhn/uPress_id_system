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

        $fetch = $stmt->fetchAll();
        
        return $fetch;
    }
    function getProgCat(){
        $conn = new PDOModel();
        $db = $conn->getDb();

        $stmt = $db->prepare("SELECT * FROM progcategory");
        $stmt->execute();

        $fetch = $stmt->fetchAll();
        
        return $fetch;
    }
    function getall(){
        $conn = new PDOModel();
        $db = $conn->getDb();

        try{
            $stmt = $db->prepare("SELECT 
            schoolprog.id AS schoolprog_id, schoolprog.programName, 
            progcategory.id AS progcategory_id, progcategory.schoolProgID, progcategory.programCatg,
            specialization.id AS specialization_id, specialization.programID, specialization.specialization
            FROM schoolprog
            LEFT JOIN progcategory ON schoolprog.id = progcategory.schoolProgID
            LEFT JOIN specialization ON progcategory.id = specialization.programID
            ");
      
            $stmt->execute();
            $fetch_acc = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Check if the key already exists to avoid overwriting
                if (!isset($fetch_acc[$row['schoolprog_id']])) {
                    $fetch_acc[$row['schoolprog_id']] = [
                        'programName' => $row['programName'],
                        'progcategory' => [],
                    ];
                }
                
                if ($row['progcategory_id']) {
                    $fetch_acc[$row['schoolprog_id']]['progcategory'][] = [
                        'progcategory_id' => $row['progcategory_id'],
                        'programCatg' => $row['programCatg'],
                        'specialization' => []
                    ];
                    
                    if ($row['specialization_id']) {
                        $lastIndex = count($fetch_acc[$row['schoolprog_id']]['progcategory']) - 1;
                        $fetch_acc[$row['schoolprog_id']]['progcategory'][$lastIndex]['specialization'][] = [
                            'specialization_id' => $row['specialization_id'],
                            'specialization' => $row['specialization']
                        ];
                    }
                }
            }

            return $fetch_acc;
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    function getByID() {
        $conn = new PDOModel();
        $db = $conn->getDb();

        try{
            $stmt = $db->prepare("SELECT 
                schoolprog.id AS schoolprog_id, 
                progcategory.id AS progcategory_id, 
                specialization.id AS specialization_id
                FROM schoolprog
                LEFT JOIN progcategory ON schoolprog.id = progcategory.schoolProgID
                LEFT JOIN specialization ON progcategory.id = specialization.programID
                WHERE progcategory.schoolProgID = schoolprog.id
                AND specialization.programID = progcategory.id
            ");
      
      $stmt->execute();
      $fetch_id = [];
  
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          // Check if the key already exists to avoid overwriting
          if (!isset($fetch_id[$row['schoolprog_id']])) {
              $fetch_id[$row['schoolprog_id']] = [
                  'programName' => $row['programName'],
                  'progcategory' => [],
              ];
          }
  
          if ($row['progcategory_id']) {
              $fetch_id[$row['schoolprog_id']]['progcategory'][] = [
                  'progcategory_id' => $row['progcategory_id'],
                  'programCatg' => $row['programCatg'],
                  'specialization' => []
              ];
  
              if ($row['specialization_id']) {
                  $lastIndex = count($fetch_id[$row['schoolprog_id']]['progcategory']) - 1;
                  $fetch_id[$row['schoolprog_id']]['progcategory'][$lastIndex]['specialization'][] = [
                      'specialization_id' => $row['specialization_id'],
                      'specialization' => $row['specialization']
                  ];
              }
          }
      }
            return $fetch_id;
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function newProgCat($programCatg,$programName,$specialization) {
        $conn = new PDOModel();
        $db = $conn->getDb();
        if (is_numeric($programCatg)) {
            $id = $programCatg;
        } else {
            $stmt = $db->prepare("INSERT INTO progcategory (programCatg,schoolProgID) VALUES (:programCatg,:schoolProgID)");
            $stmt->bindParam(':programCatg', $programCatg);
            $stmt->bindParam(':schoolProgID',$programName);
            $stmt->execute();
            $id = $db->lastInsertId();
        }
        
        if($id){
            $stmt1 = $db->prepare("INSERT INTO specialization (programID,specialization) VALUES (:programID,:specialization)");
            $stmt1->bindParam(':programID',$id);
            $stmt1->bindParam(':specialization',$specialization);
            $stmt1->execute();
            return $db->lastInsertId();
        }
    }
}
?>