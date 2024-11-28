<?php 
session_start();
if (isset($_SESSION['position']) && isset($_SESSION['employee_id'])) {

if (isset($_POST['id']) && isset($_POST['status']) && $_SESSION['position'] == 'employee') {
	include "../database-link.php";

    function validate_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$progress = validate_input($_POST['status']);
	$id = validate_input($_POST['id']);

	if (empty($progress)) {
		$em = "Please select the stage of progress.";
	    header("Location: ../edit-project-employee.php?error=$em&id=$id");
	    exit();
	}else {
    
       include "Model/project.php";

       $data = array($progress, $id);
       update_project_progress($conn, $data);

       $em = "Project progress updated successfully.";
	    header("Location: ../edit-project-employee.php?success=$em&id=$id");
	    exit();

    
	}
}else {
   $em = "Unknown error occurred";
   header("Location: ../edit-project-employee.php?error=$em");
   exit();
}

}else{ 
   $em = "First login";
   header("Location: ../login.php?error=$em");
   exit();
}
