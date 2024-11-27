<?php
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id']) && $_SESSION['position'] == "employee") {
	include "database-link.php";
	include "app/model/project.php";
    include "app/model/employee.php";
	$projects = get_all_projects_through_id($conn, $_SESSION['employee_id']);
    $employees = get_employee_by_id($conn, $_SESSION['employee_id']);


    

?>

<!DOCTYPE html>

<html>
<head>
	<title>Upload Documents</title>
	<script src="https://kit.fontawesome.com/6eda733120.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	

</head>
</head>
<body>
	<input type="checkbox" id="checkbox">
	<?php include "include/header.php"?>
	<div class="body">
	<?php include "include/navigation.php"?>
	
	<section class = "section-1">
		<div class = "option-box">
		<h4 class="title">Upload Documents
        <form class ="form-1"
            method = "POST"
            action = "app/add-document.php">
            <?php if(isset($_GET['error'])){?>

        <div class="danger" role="alert">
        <?php echo stripcslashes($_GET['error']);?>
        </div>
        <?php }?>
        <?php if(isset($_GET['success'])){?>

        <div class="success" role="alert">
        <?php echo stripcslashes($_GET['success']);?>
        </div>
        <?php }

//$pass = "123";
//$pass = password_hash($pass, PASSWORD_DEFAULT);
//echo $pass;

?>
            <div class = "input-holder">
                <label class = "info">Document Title</label>
                <input type = "text" name = "doc_title" class = "input-1" placeholder = "Project Title"><br></br>
            </div>  
            <div class = "input-holder">
                <label class = "info">Select File</label>
                <input type = "file" name = "file_path" class = "input-1" id ="file"><br></br>
            </div>  
           

            <div class = "input-holder">
                <label class = "info">Upload For</label>
                <select name ="uploaded_for" class = "input-1">
                    <option value = "0">Select Project</option>
                    <?php if ($projects !=0) { 
							foreach ($projects as $project) {        
                                                                    
						?>
                  <option value="<?=$project['task_id']?>"><?=$project['task_name']?></option>
						<?php } }  ?>
					</select><br><br>
            </div>      
         
                <input type="text" name="upload_date" id="upload_date" value="<?php echo(date("Y-m-d", time())); ?>" hidden>
                <input type="text" name="uploaded_by" value="<?=$employees['employee_id']?>" hidden>


            

            <button type = "submit" class = "assign-btn">Upload</button>


        </div>    
</form>
</section>

    </div>
</section>
</div>   

	<script type = "text/javascript">
		var active = document.querySelector("#navigation-list li:nth-child(2)");
		active.classList.add("active");
		</script>       


</body>
</html>

<?php
} 

else {

	$em = "First Login.";
    header("Location: login.php?error=$em");
    exit();

}
?>
