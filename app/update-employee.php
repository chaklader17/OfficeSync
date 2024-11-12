<?php
session_start();
if (isset($_SESSION['position']) && isset($_SESSION['employee_id'])) {
if(isset($_POST['email']) && $_POST['password'] && isset($_POST['name']) && $_SESSION['position'] == 'admin') {
    include "../database-link.php";

    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $email = validate_input($_POST['email']);
      $password = validate_input($_POST['password']);
      $full_name = validate_input($_POST['name']);
      $employee_id = validate_input($_POST['employee_id']);
      
      if(empty($email)){
        $em = "OMS email is required.";
        header("Location: ../edit-employee.php?error=$em&id=$employee_id");
        exit();


      } else  if(empty($password)){
        $em = "OMS password is required.";
        header("Location: ../edit-employee.php?error=$em&id=$employee_id");
        exit();


      } else  if(empty($full_name)){
        $em = "Full name is required.";
        header("Location: ../edit-employee.php?error=$em&id=$employee_id");
        exit();

      }
      else{

        include "model/employee.php";
        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = array($full_name, $email, $password, "Employee", $employee_id, "Employee");
        update_employee($conn, $data);

        $em = "Employee updated successfully!";
        header("Location: ../edit-employee.php?success=$em&id=$employee_id");
        exit();


      }
    }
    

else {
    
    $em = "An error has occured.";
    header("Location: ../edit-employee.php?error=$em");
    exit();
}

} else {

	$em = "First Login.";
    header("Location: ../edit-employee.php?error=$em");
    exit();

}