<?php
session_start();
if (isset($_SESSION['position']) && isset($_SESSION['employee_id'])) {
if(isset($_POST['id']) && isset($_POST['title']) && $_POST['description'] && isset($_POST['assigned_to']) && isset($_POST['deadline']) && $_SESSION['position'] == 'admin') {
    include "../database-link.php";

    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $title = validate_input($_POST['title']);
      $description = validate_input($_POST['description']);
      $assigned_to = validate_input($_POST['assigned_to']);
      $deadline = validate_input($_POST['deadline']);
      $id = validate_input($_POST['id']);
      
      if (empty($title)) {
		$em = "Project title is required";
	    header("Location: ../edit-project.php?error=$em&id=$id");
	    exit();
	}else if (empty($description)) {
		$em = "Project description is required";
	    header("Location: ../edit-project.php?error=$em&id=$id");
	    exit();
	}else if ($assigned_to == 0) {
		$em = "Specify the employee you want to assign the project to.";
	    header("Location: ../edit-project.php?error=$em&id=$id");
	    exit();
    }
      else{

       include "model/project.php";

        $data = array($title , $description, $assigned_to, $deadline, $id);
        update_project($conn, $data);

        $em = "Project has been updated.";
        header("Location: ../edit-project.php?success=$em&id=$id");
        exit();

      }
    }
    

else {
    
    $em = "Please check your project details.";
    header("Location: ../edit-project.php?error=$em");
    exit();
}

} else {

	$em = "First Login.";
    header("Location: ../login.php?error=$em");
    exit();

}