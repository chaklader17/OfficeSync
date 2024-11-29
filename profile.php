<?php 
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id']) && $_SESSION['position'] == "employee") {

    include "database-link.php";
    include "app/model/employee.php";
    $employee = get_employee_by_id($conn, $_SESSION['employee_id']);
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
		<h4 class="title">Profile<a href="edit_profile.php">Edit Profile</a></h4>
        <table class="main-table" style="max-width: 300px;">
			<tr>
		        <td>Full name</td>
                <td><?=$employee['name']?></td>
            </tr>
            <tr>
		        <td>Designation</td>
                <td><?=$employee['position']?></td>
            </tr>
        </table>
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
