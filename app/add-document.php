<?php
session_start();
if (isset($_SESSION['position']) && isset($_SESSION['employee_id'])) {
if(isset($_POST['doc_title']) && $_POST['file_path'] && isset($_POST['uploaded_for']) && isset($_POST['upload_date']) && isset($_POST['uploaded_by']) && $_SESSION['position'] == 'employee') {
    include "../database-link.php";

    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $doc_title = validate_input($_POST['doc_title']);
      $file = validate_input($_POST['file_path']);
      $uploaded_for = validate_input($_POST['uploaded_for']);
      $upload_date = validate_input($_POST['upload_date']); 
      $uploaded_by = validate_input($_POST['uploaded_by']); 

      $target_dir = "uploads/";
      
      if(empty($doc_title)){
        $em = "Document Title is required.";
        header("Location: ../upload-documents.php?success=$em");
        exit();


      } 
      else  if(empty($file)){
        $em = "Please select a file.";
        header("Location: ../upload-documents.php?error=$em");
        exit();


      } else  if(empty($uploaded_for)){
        $em = "Specify the project you want to upload the document for.";
        header("Location: ../upload-documents.php?error=$em");
        exit();


      } 

      else{

       include "model/document.php";

        $data = array($doc_title , $file, $uploaded_for, $upload_date, $uploaded_by);
        insert_document($conn, $data);

        $em = "Document has been uploaded.";
        header("Location: ../upload-documents.php?success=$em");
        exit();

      }
    }
    

else {
    
    $em = "Please check your document details.";
    header("Location: ../upload-documents.php?error=$em");
    exit();
}

} else {

	$em = "First Login.";
    header("Location: ../upload-documents.php?error=$em");
    exit();

}
