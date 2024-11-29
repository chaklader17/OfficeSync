<?php 
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id']) && $_SESSION['position'] == "employee") {

    include "database-link.php";
    include "app/model/project.php";
    include "app/model/employee.php";
    
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
    $employees = get_all_employees($conn);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
	<input type="checkbox" id="checkbox">
	<?php include "include/header.php" ?>
	<div class="body">
		<?php include "include/navigation.php" ?>
		<section class="section-1">
        <div class = "option-box">
			<nav class = "navbar">
		<h4 class="title">Project<a href="my-projects.php">Projects</a></h4>
</nav>
        <form class ="form-1"
            method = "POST"
            action = "app/update-project-employee.php">
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
                <label class = "info">Project Title<Title></Title></label>
                <p><?=$project['task_name']?></p></br>        
            <div class = "input-holder">
                <label class = "info">Project Description</label>
                <p><?=$project['description']?></p></br>
            </div>
            <div class = "input-holder">
                <label class = "info">Progress</label>
                <select name="status" class="input-1">
						<option 
						      <?php if( $project['progress'] == "pending") echo"selected"; ?> >Pending</option>
						<option <?php if( $project['progress'] == "in-progress") echo"selected"; ?>>In-progress</option>
						<option <?php if( $project['progress'] == "completed") echo"selected"; ?>>Completed</option>
					</select><br>
				</div>
				

            
            <input type="text" name="id" value="<?=$project['task_id']?>" hidden>
            <button class = "assign-btn">Update</button>

        </div>  
    </form>
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
    header("Location: ../login.php?error=$em");
    exit();

}
?>
