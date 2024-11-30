<?php
session_start();
if (isset($_SESSION['position']) && isset($_SESSION['employee_id'])) {
    if (isset($_POST['confirm_password']) && isset($_POST['new_password']) && isset($_POST['password']) && isset($_POST['full_name']) && $_SESSION['role'] == 'employee') {
    include "../database-link.php";
    include "../edit_profile.php";

    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    
      $password = validate_input($_POST['password']);
      $full_name = validate_input($_POST['name']);
      $new_password = validate_input($_POST['new_password']);
	  $confirm_password = validate_input($_POST['confirm_password']);
      
      $id = $_SESSION['id']; 
      if (empty($password) || empty($new_password) || empty($confirm_password) ) {
		$em = "Password is required";
	    header("Location: ../edit_profile.php?error=$em");
	    exit();
	}else if (empty($full_name)) {
		$em = "Full name is required";
	    header("Location: ../edit_profile.php?error=$em");
	    exit();
	}else if ($confirm_password != $new_password) {
		$em = "New password and confirm password do not match";
	    header("Location: ../edit_profile.php?error=$em");
	    exit();
	}else {

        include "model/employee.php";
        $employee = get_employee_by_id($conn, $id);
       if ($employee) {
       	 if (password_verify($password, $employee['password'])) {

			       $new_password = password_hash($new_password, PASSWORD_DEFAULT);



			       $data = array($full_name, $new_password, $id);
			       update_profile($conn, $data);

			       $em = "User created successfully";
				    header("Location: ../edit_profile.php?success=$em");
				    exit();
			    }else {
			    	$em = "Incorrect password";
				   header("Location: ../edit_profile.php?error=$em");
				   exit();
			    }
		   }else {
            $em = "Unknown error occurred";
			   header("Location: ../edit_profile.php?error=$em");
			   exit();
		   }

    
	}
    }
    

else {
    
    $em = "An error has occured.";
    header("Location: ../edit-profile.php?error=$em");
    exit();
}

} else {

	$em = "First Login.";
    header("Location: ../login.php?error=$em");
    exit();

}