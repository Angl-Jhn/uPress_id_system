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
}
?>