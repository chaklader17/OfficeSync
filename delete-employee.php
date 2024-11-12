<?php 
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id']) && $_SESSION['position'] == "admin") {

    include "database-link.php";
    include "app/model/employee.php";
    
    if (!isset($_GET['id'])) {
    	 header("Location: employees.php");
    	 exit();
    }
    $id = $_GET['id'];    
    $employee = get_employee_by_id($conn, $id);

    if ($employee == 0) {
    	 header("Location: employees.php");
    	 exit();
    }

    $data = array($id, "employee");
    delete_employee($conn, $data);
    $sm = "Employee has been deleted";
    header("Location: employees.php?success=$sm");
    exit();

  

} else {

	$em = "First Login.";
    header("Location: ../login.php?error=$em");
    exit();

}
?>
