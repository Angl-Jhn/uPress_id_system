<?php
include_once("connection/PDOModel.php");
@session_start();

class TransactionManageModel{
    function getAll() {
        $conn = new PDOModel();
        $db = $conn->getDb();

        try{
            $stmt = $db->prepare(" SELECT 
                clients.id AS client_id, clients.clientType, clients.formType, clients.wmsuEmail, clients.firstName,
                clients.middleName, clients.lastName, clients.nameExt, clients.emergencyFirstName, clients.emergencyMiddleName,
                clients.emergencyLastName, clients.emergencyNameExt, clients.emergencyAddress, clients.emergencyContactNum,
                clients.clientSignature, clients.clientPhoto, clients.status, clients.createdAt,
                student.id AS student_id, student.clientIDStudent, student.studentNum, student.collegeProgram, student.COR,
                student.oldIDFront, student.oldIDBack, student.affidavitOfLoss,
                employee.id AS employee_id, employee.clientIDEmp, employee.empNum, employee.plantillaPos, employee.designation,
                employee.residentialAddress, employee.birthDate, employee.contactNum, employee.civilStatus, employee.bloodType,
                employee.hrmoScanned, employee.hrmoNew, employee.affidavitOfLoss AS empAffidavitOfLoss
                FROM clients
                LEFT JOIN student ON clients.id = student.clientIDStudent
                LEFT JOIN employee ON clients.id = employee.clientIDEmp
                WHERE clients.deletedAt IS NULL
            ");
            $stmt->execute();
            $fetch_acc = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $fetch_acc[$row['client_id']]=$row;
            }
            return ($stmt->rowCount() > 0) ? $fetch_acc :0;
        } catch (PDOException $e) {
            // Handle any errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    function softDeleteClient($id) {
        $conn = new PDOModel();
        $db = $conn->getDb();
        
        $stmt = $db->prepare("UPDATE clients SET deletedAt = NOW() WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    function reactivateClient($id) {
        $conn = new PDOModel();
        $db = $conn->getDb();

        // Reactivate the account by setting deleted_at to NULL
        $stmt = $db->prepare("UPDATE clients SET deletedAt = NULL WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>