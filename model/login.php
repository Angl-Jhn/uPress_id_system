<?php
include_once("connection/PDOModel.php");
@session_start();
class loginModel {
    // Function to handle the login process
    function login($uname, $pw) {
        $conn = new PDOModel();
        $db = $conn->getDb();
        //$hashed_pw = password_hash($pw,PASSWORD_DEFAULT);
        // Use prepared statements to prevent SQL injection
        $query = "SELECT * FROM `account` WHERE `username` = :username";
        
        // Prepare the statement
        $stmt = $db->prepare($query);
        
        // Bind the parameters
        $stmt->bindParam(':username', $uname);
        

        // Execute the statement
        $stmt->execute();
        $userExist = $stmt->rowCount();
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        // Check if any user exists with the provided username and password
        if(password_verify($pw,$userRow['password'])){
            if( $userExist == 1) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['isLogin'] = 1;
                $_SESSION["role"] = $userRow['role'];
                $_SESSION["firstName"] = $userRow["firstName"];
                $_SESSION["lastName"] = $userRow["lastName"];
                $_SESSION["accountPhoto"] = $userRow['accountPhoto'];
                
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['error'] = "USER UNKNOWN";

            header("location: /admin");
            exit();
        }
        return $userExist;
    }
}
?>