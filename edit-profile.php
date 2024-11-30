<?php 
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id']) && $_SESSION['position'] == "employee") {

    include "database-link.php";
    include "app/model/employee.php";
	include "app/model/project.php";

    $employee = get_employee_by_id($conn, $_SESSION['employee_id']);
	$projects = get_all_projects_through_id($conn, $_SESSION['employee_id']);
 ?>
<!DOCTYPE html>    
<html>
<head>
	<title>Edit Profile</title>
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
		<h4 class="title">Change Password <a href="profile.php">Profile</a></h4>
        <form class ="form-1"
            method = "POST"
            action = "app/update-password.php">
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
                <label class = "info">Old Password</label>
                <input type = "text" name = "password" class = "input-1" placeholder = "Old Password" value ="**********"><br></br>
            </div>
            <div class = "input-holder">
                <label class = "info">New Password</label>
                <input type = "text" name = "new-password" class = "input-1" placeholder = "New Password" ><br></br>
            </div>
            <div class = "input-holder">
                <label class = "info">Confirm Password</label>
                <input type = "text" name = "confirm-password" class = "input-1" placeholder = "Confirm New Password"><br></br>
            </div>
            <input type = "text" name = "employee_id" value = "<?=$employee['employee_id']?>"hidden>

            <button class = "edit-btn">Update Password</button>

        </div>    


</form>
    
    </nav>
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
