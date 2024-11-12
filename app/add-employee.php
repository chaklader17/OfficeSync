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
      
      if(empty($email)){
        $em = "OMS email is required.";
        header("Location: ../add-employee.php?error=$em");
        exit();


      } else  if(empty($password)){
        $em = "OMS password is required.";
        header("Location: ../add-employee.php?error=$em");
        exit();


      } else  if(empty($full_name)){
        $em = "Full name is required.";
        header("Location: ../add-employee.php?error=$em");
        exit();


      }
      else{

        include "model/employee.php";
        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = array($full_name, $email, $password, "employee");
        insert_employee ($conn, $data);

        $em = "Employee added successfully!";
        header("Location: ../add-employee.php?success=$em");
        exit();


      }
    }
    

else {
    
    $em = "An error has occured.";
    header("Location: ../add-employee.php?error=$em");
    exit();
}

} else {

	$em = "First Login.";
    header("Location: ../add-employee.php?error=$em");
    exit();

}

