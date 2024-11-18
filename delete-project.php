<?php 
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id']) && $_SESSION['position'] == "admin") {

    include "database-link.php";
    include "app/model/project.php";
    
    if (!isset($_GET['id'])) {
    	 header("Location: projects.php");
    	 exit();
    }
    $id = $_GET['id'];    
    $project = get_project_by_id($conn, $id);

    if ($project == 0) {
    	 header("Location: projects.php");
    	 exit();
    }

    $data = array($id);
    delete_project($conn, $data);
    $sm = "Project has been deleted";
    header("Location: projects.php?success=$sm");
    exit();

  

} else {

	$em = "First Login.";
    header("Location: ../login.php?error=$em");
    exit();

}
?>
