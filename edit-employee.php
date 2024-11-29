<?php 
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id']) && $_SESSION['position'] == "admin") {

    include "database-link.php";
    include "app/model/employee.php";
    
    if (!isset($_GET['employee_id'])) {
    	 header("Location: employees.php");
    	 exit();
    }
    $id = $_GET['employee_id'];
    $employee = get_employee_by_id($conn, $id);

    if ($employee == 0) {
    	 header("Location: employees.php");
    	 exit();
    }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<input type="checkbox" id="checkbox">
	<?php include "include/header.php" ?>
	<div class="body">
		<?php include "include/navigation.php" ?>
		<section class="section-1">
        <div class = "option-box">
			<nav class = "navbar">
		<h4 class="title">Edit Employees<a href="employees.php">Employees</a></h4>
</nav>
        <form class ="form-1"
            method = "POST"
            action = "app/update-employee.php">
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
                <label class = "info">Full Name</label>
                <input type = "text" name = "name" class = "input-1" placeholder = "Full Name" value ="<?=$employee['name']?>"><br></br>
            </div>           
            <div class = "input-holder">
                <label class = "info">Email</label>
                <input type = "text" name = "email"  class = "input-1" placeholder = "Email" value ="<?=$employee['email']?>"><br></br>
            </div>
            <div class = "input-holder">
                <label class = "info">Password</label>
                <input type = "text" name = "password" class = "input-1" placeholder = "Password" value ="**********"><br></br>
            </div>
            <input type = "text" name = "employee_id" value = "<?=$employee['employee_id']?>"hidden>

            <button class = "edit-btn">Update</button>

        </div>    


</form>
</section>

    </div>

	<script type = "text/javascript">
		var active = document.querySelector("#navigation-list li:nth-child(0)");
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
