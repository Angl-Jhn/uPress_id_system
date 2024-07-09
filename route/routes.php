<?php
$requestUrl = $_SERVER['REQUEST_URI'];
$segments = explode('/', $requestUrl);
$segmentPage = explode('?', $segments[0]);
array_shift($segments);
@session_start();
$_SESSION["navTitle"] = $segments[0];

if(isset($_SESSION["isLogin"]) == 1){
    if($_SESSION["role"] == "admin"){
        $acctype = "Admin";
        if(isset($_POST['ignoreHeaderFooter']) != 1){
            include_once("view/admin/dash-header.php");
            include_once("view/admin/dash-sidenav-bar.php");
        }
        switch($segments[0]){
            case "dashboard":
                require_once("view/admin/dashboard.php");
                break;
            case "transaction":
                require_once("view/admin/transactions.php");
                $page_name = "Client Transactions";
                break;
            case "add-student":
                require_once("controller/transactionController.php");
                break;
            case "edit-student":
                break;
            case "del-client":
                require_once("controller/transactionController.php");
                break;
            case "student-layout":
                require_once("view/admin/student.php");
                break;
            case "employee-layout":
                require_once("view/admin/employee.php");
                break;
            case "manage-accounts":
                require_once("view/admin/manage-account.php");
                break;
            case "add-account":
                require_once("controller/accountControllerTest.php");
                break;
            case "edit-account":
                require_once("controller/accountControllerTest.php");
                break;
            case "del-account":
                require_once("controller/accountControllerTest.php");
            case "my-profile":
                require_once("view/admin/page-profile.php");
                break;
            case "settings":
                require_once("view/admin/page-setting.php");
                break;
            case "admin":
                include_once("view/login/index.php");
                break; 
            case "logout":
                session_destroy();
                echo "<script>location.href = 'admin';</script>";
                break;
            default:
                echo "<script>location.href = 'admin';</script>";
                break;
            
        }
        if(isset($_POST["ignoreHeaderFooter"]) != 1){
            include_once("view/admin/dash-footer.php");
        }
    } else {
        if($_SESSION["role"] == "operator"){
            $acctype = "Operator";
            include_once("view/admin/dash-header.php");
            include_once("view/admin/dash-sidenav-bar.php");
            
            switch($segments[0]){
                case "dashboard":
                    require_once("view/admin/dashboard.php");
                    break;
                case "transaction":
                    require_once("view/admin/transactions.php");
                    break;
                case "student-layout":
                    require_once("view/admin/student.php");
                    break;
                case "employee-layout":
                    require_once("view/admin/employee.php");
                    break;
                case "manage-accounts";
                    require_once("view/admin/manage-account.php");
                    break;
                case "add-account";
                    require_once("controller/accountController.php");
                    break;
                case "my-profile";
                    require_once("view/admin/page-profile.php");
                    break;
                case "settings";
                    require_once("view/admin/page-setting.php");
                    break;
                case "admin":
                    include_once("view/login/index.php");
                    break; 
                case "logout":
                    session_destroy();
                    echo "<script>location.href = 'admin';</script>";
                    break;
                default:
                    echo "<script>location.href = 'admin';</script>";
                    break;
                
            }
            include_once("view/admin/dash-footer.php");
        }
    }
} else {
    if(isset($segments[0])){
        if($segments[0] !="admin"){
            include_once("view/shared/header.php");
            include_once("view/shared/offcanvas-nav.php");
        }
        switch($segments[0]){
            case "about-us":
                require_once("view/about/about-us.php");
            break;
            case "tutorial":
                require_once("view/guide/tutorial.php");
            break;
            case "get-id-now":
                require_once("view/form/id-form.php");
            break;
            case "admin":
                include_once("view/login/index.php");
                break;
            case "login":
                require_once("controller/loginController.php");
                break;
            case "request-id":
                require_once("controller/clientController.php");
                break;
            default:
                include_once("view/shared/body-content.php");
            break;
        }
        if($segments[0] !="admin"){
        include_once("view/shared/footer.php");
        }
    }
    
}

?>