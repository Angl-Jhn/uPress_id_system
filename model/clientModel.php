<?php
include_once("connection/PDOModel.php");
@session_start();
class ClientModel{
    public function requestId($type,$fname,$lname,$mdname) {
        $conn = new PDOModel();
        $db = $conn->getDb();

        try {
            // Prepare the SQL statement
            $stmt = $db->prepare("
                INSERT INTO clients (clientType, firstname, middleName, lastName)
                VALUES (:clientType, :firstname, :middleName, :lastName)
            ");

            // Bind the parameters
            $stmt->bindParam(':clientType', $type);
            $stmt->bindParam(':firstname', $fname);
            $stmt->bindParam(':middleName', $mdname);
            $stmt->bindParam(':lastName', $lname);

            // Execute the statement
            $stmt->execute();

            // Optionally, you can return the ID of the inserted row
            return $db->lastInsertId();
        } catch (PDOException $e) {
            // Handle any errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}