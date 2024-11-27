<?php
session_start();
if (isset($_SESSION['position']) && isset($_SESSION['employee_id'])) {
if(isset($_POST['title']) && $_POST['description'] && isset($_POST['assigned_to']) && $_SESSION['position'] == 'admin') {
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
      
      if(empty($title)){
        $em = "Project Title is required.";
        header("Location: ../assign-project.php?success=$em");
        exit();


      } 
      else  if(empty($description)){
        $em = "Description is required.";
        header("Location: ../assign-project.php?error=$em");
        exit();


      } else  if(empty($assigned_to)){
        $em = "Specify the employee you want to assign the project to.";
        header("Location: ../assign-project.php?error=$em");
        exit();


      } 

      else{

       include "model/project.php";

        $data = array($title , $description, $assigned_to, $deadline);
        insert_project($conn, $data);

        $em = "Project has been assigned.";
        header("Location: ../assign-project.php?success=$em");
        exit();

      }
    }
    

else {
    
    $em = "Please check your project details.";
    header("Location: ../assign-project.php?error=$em");
    exit();
}

} else {

	$em = "First Login.";
    header("Location: ../assign-project.php?error=$em");
    exit();

}

