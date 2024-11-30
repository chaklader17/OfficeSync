<?php
session_start();
if (isset($_SESSION['position']) && isset($_SESSION['employee_id'])) {
if(isset($_POST['password']) && isset($_POST['new-password']) && isset($_POST['confirm-password']) && $_SESSION['position'] == 'employee') {
    include "../database-link.php";

    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

     
      $password = validate_input($_POST['password']);
      $new_password = validate_input($_POST['new-password']);
      $confirm_password = validate_input($_POST['confirm-password']);
      $employee_id = $_SESSION['employee_id'];


      
      if(empty($password) || empty($new_password) || empty($confirm_password)){
        $em = "OMS password is required.";
        header("Location: ../edit-profile.php?error=$em&id=$employee_id");
        exit();


      } else  if($new_password != $confirm_password){
        $em = "Your passwords do not match.";
        header("Location: ../edit-profile.php?error=$em&id=$employee_id");
        exit();

      }
      else{

        include "model/employee.php";
        $employee = get_employee_by_id($conn, $employee_id);
        if($employee){
            if(password_verify($password, $employee['password'])){
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);

                $data = array($new_password, $employee_id);
                update_password($conn, $data);
                
                $em = "Password has been updated successfully.";
                header("Location: ../edit-profile.php?success=$em&id=$employee_id");
                exit();

            } else{
                $em = "Password is incorrect.";
                header("Location: ../edit-profile.php?error=$em&id=$employee_id");
                exit();

            }
        }
    }
    

} else {
    
    $em = "An error has occured.";
    header("Location: ../edit-profile.php?error=$em");
    exit();
}

}else {

	$em = "First Login.";
    header("Location: ../login.php?error=$em");
    exit();

}