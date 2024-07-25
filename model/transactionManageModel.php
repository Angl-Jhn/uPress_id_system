<?php
include_once("connection/PDOModel.php");
@session_start();

class TransactionManageModel{
    function getAll() {
        $conn = new PDOModel();
        $db = $conn->getDb();

        try{
            $stmt = $db->prepare(" SELECT 
                clients.id AS client_id, clients.clientType, clients.formType, clients.email, clients.firstName,
                clients.middleName, clients.lastName, clients.nameExt, clients.emergencyFirstName, clients.emergencyMiddleName,
                clients.emergencyLastName, clients.emergencyNameExt, clients.emergencyAddress, clients.emergencyContactNum,
                clients.clientSignature, clients.clientPhoto, clients.status, clients.createdAt,
                student.id AS student_id, student.clientIDStudent, student.studentNum, student.schoolProgID, student.COR,
                student.oldIDFront, student.oldIDBack, student.affidavitOfLoss,
                employee.id AS employee_id, employee.clientIDEmp, employee.empNum, employee.academicRank, employee.plantillaPos, employee.designation,
                employee.residentialAddress, employee.birthDate, employee.contactNum, employee.civilStatus, employee.bloodType,
                employee.hrmoScanned, employee.hrmoNew, employee.affidavitOfLoss
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
    function getAccountById($id){
        $conn = new PDOModel();
        $db = $conn->getDb();
        
        $res = $db->prepare("select*from clients c LEFT JOIN student stud on stud.clientIDStudent = c.id LEFT JOIN employee e ON e.clientIDEmp = c.id where c.deletedAt IS NULL and c.id = ?");
        $res->execute([$id]);
        $fetch_acc = $res->fetch(PDO::FETCH_ASSOC);
        return ($res->rowCount() > 0) ? $fetch_acc :0;
        //echo "test";
        
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