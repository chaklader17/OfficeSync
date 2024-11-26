<?php
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id'])) {
	include "database-link.php";
	include "app/model/employee.php";
	$employees = get_all_employees($conn);
?>

<!DOCTYPE html>

<html>
<head>
	<title>Manage Employees</title>
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
		<h4 class="title">Manage Users <a href="add-employee.php">Add Employee</a></h4>
</nav>
         <?php if(isset($_GET['success'])){?>

        <div class="success" role="alert">
        <?php echo stripcslashes($_GET['success']);?> 
        </div>
		 <?php } ?>

        <?php if ($employees != 0){?>	
		<table class="main-table">
			<thead>
		        <tr>
					<th>OMS ID</th>
					<th>Full Name</th>
					<th>Email</th>
					<th>Position</th>
					<th>Action</th>

				</tr>

</thead>
<tbody>        
	        <?php $i=0; foreach($employees as $employee){?>	
             <tr>
					<td><?=++$i?></td>
					<td><?=$employee['name']?></td>
					<td><?=$employee['email']?></td>
					<td><?=$employee['position']?></td>
				<td>				
				<a href ="edit-employee.php?id=<?=$employee['employee_id']?>" class = "edit-btn">Edit</a>
				<a href ="delete-employee.php?id=<?=$employee['employee_id']?>" class = "delete-btn">Delete</a>
            </td>
           
</tbody>
            <?php } ?>
</table>
<?php }
     
	 else{?>
	<h3> empty </h3>

	<?php
	 }?>
        </div>
    </section>
    </div>

	<script type = "text/javascript">
		var active = document.querySelector("#navigation-list li:nth-child(1)");
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
