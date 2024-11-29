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
        <table class="main-table" style="max-width: 100vh;">
		<tr>
		        <td>Employee ID</td>
                <td><?=$employee['employee_id']?></td>
            </tr>
			<tr>
		        <td>Name</td>
                <td><?=$employee['name']?></td>
            </tr>
            <tr>
		        <td>Designation</td>
                <td><?=$employee['position']?></td>
            </tr>
			<tr>
		        <td>Email</td>
                <td><?=$employee['email']?></td>
            </tr>
			<tr>
		        <td>Password</td>
                <td>**********</td>
            </tr>
			<tr>	
		
			<?php if(is_array($projects) || is_object($projects)){foreach($projects as $project){?>	
				    <td>Project</td>
					<td><?=$project['task_name']?></td>
			</tr>

			<?php
			}
		
		}?>


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
