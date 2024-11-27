<?php
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id']) && $_SESSION['position'] == "admin") {
	include "database-link.php";
	include "app/model/employee.php";
	$employees = get_all_employees($conn);
?>

<!DOCTYPE html>

<html>
<head>
	<title>Assign Projects</title>
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
		<h4 class="title">Assign Projects
        <form class ="form-1"
            method = "POST"
            action = "app/add-project.php">
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
                <label class = "info">Project Title</label>
                <input type = "text" name = "title" class = "input-1" placeholder = "Project Title"><br></br>
            </div>        
            <div class = "input-holder">
                <label class = "info">Project Description</label>
                <textarea type="text" name ="description" class="input-1" placeholder="Description"></textarea><br>
			</div> 
            <div class = "input-holder">
                <label class = "info">Assigned To</label>
                <select name ="assigned_to" class = "input-1">
                    <option value = "0">Select Employee</option>
                    <?php if ($employees !=0) { 
							foreach ($employees as $employee) {
						?>
                  <option value="<?=$employee['employee_id']?>"><?=$employee['name']?></option>
						<?php } } ?>
					</select><br><br>
            <div class = "input-holder">
                <label class = "info">Deadline</label>
                <input type = "text" name = "deadline" class = "input-1" placeholder = "Deadline"><br></br>
            </div>      

            <button class = "assign-btn">Assign</button>


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

