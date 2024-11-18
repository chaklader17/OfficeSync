<?php
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id'])) {
	include "database-link.php";
	include "app/model/project.php";
	$projects = get_all_projects($conn);
?>

<!DOCTYPE html>

<html>
<head>
	<title>Project List</title>
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
		<h4 class="title">Project List <br></br> <a href="assign-project.php">Add Project</a></h4>
</nav>
         <?php if(isset($_GET['success'])){?>

        <div class="success" role="alert">
        <?php echo stripcslashes($_GET['success']);?> 
        </div>
		 <?php } ?>

        <?php if ($projects != 0){?>	
		<table class="main-table">
			<thead>
		        <tr>
					<th>Project ID</th>
					<th>Project Title</th>
					<th>Description</th>
					<th>Assigned To</th>
                    <th>Deadline</th>
					<th>Action</th>

				</tr>

</thead>
<tbody>        
	        <?php $i=0; foreach($projects as $project){?>	
             <tr>
					<td><?=++$i?></td>
					<td><?=$project['task_name']?></td>
					<td><?=$project['description']?></td>
					<td><?=$project['assigned_to']?></td>
                    <td><?=$project['deadline']?></td>

				<td>				
				<a href ="edit-project.php?id=<?=$project['task_id']?>" class = "edit-btn">Edit</a>
				<a href ="delete-project.php?id=<?=$project['task_id']?>" class = "delete-btn">Delete</a>
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
		var active = document.querySelector("#navigation-list li:nth-child(3)");
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