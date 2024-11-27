<?php 
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id']) && $_SESSION['position'] == "employee") {

    include "database-link.php";
    include "app/model/document.php";
    
    if (!isset($_GET['id'])) {
    	 header("Location: documents.php");
    	 exit();
    }
    $id = $_GET['id'];    
    $document = get_document_by_id($conn, $id);

    if ($document == 0) {
        header("Location: projects.php");
        exit();
   }


    $data = array($id);
    delete_document($conn, $data);
    $sm = "Document has been deleted";
    header("Location: documents.php?success=$sm");
    exit();

  

} else {

	$em = "First Login.";
    header("Location: ../login.php?error=$em");
    exit();

}
?>
