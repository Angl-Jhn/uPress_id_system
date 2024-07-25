<?php
include_once("connection/PDOModel.php");

class formConfigModel {
    function getForm() {
        $conn = new PDOModel();
        $db = $conn->getDb();

        $stmt = $db->prepare("SELECT * FROM formconfig");
        $stmt->execute();
        
        $fetch_acc = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($stmt->rowCount() > 0) ? $fetch_acc :0;
    }
}

?>