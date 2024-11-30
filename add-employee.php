<?php
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id']) && $_SESSION['position'] == "admin") {
?>

<!DOCTYPE html>

<html>
<head>
	<title>Add Employees</title>
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
			<nav class = "navbar">
		<h4 class="title">Add Employees<a href="employees.php">Employees</a></h4>
</nav>
        <form class ="form-1"
            method = "POST"
            action = "app/add-employee.php">
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
                <input type = "text" name = "name" class = "input-1" placeholder = "Full Name"><br></br>
            </div>           
            <div class = "input-holder">
                <label class = "info">Email</label>
                <input type = "text" name = "email"  class = "input-1" placeholder = "Email"><br></br>
            </div>
            <div class = "input-holder">
                <label class = "info">Password</label>
                <input type = "text" name = "password" class = "input-1" placeholder = "Password"><br></br>
            </div>

            <button class = "assign-btn">Add</button>


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
