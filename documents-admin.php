<?php
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id'])) {
	include "database-link.php";
	include "app/model/document.php";
    include "app/model/project.php";
	include "app/model/employee.php";

    $projects = get_all_projects($conn);
    $employees = get_all_employees($conn);
    $documents = get_all_documents($conn);
	
?>

<!DOCTYPE html>

<html>
<head>
	<title>Documents</title>
	<script src="https://kit.fontawesome.com/6eda733120.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
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
		<h4 class="title">Documents</h4>
</nav>
         <?php if(isset($_GET['success'])){?>

        <div class="success" role="alert">
        <?php echo stripcslashes($_GET['success']);?> 
        </div>
		 <?php } ?>

        <?php if ($documents != 0){?>	
		<table class="main-table">
			<thead>
		        <tr>
					<th>Document ID</th>
					<th>Document Name</th>
					<th>Uploaded For</th>
                    <th>Uploaded By</th>
					<th>Uploaded On</th>
					<th>Action</th>

				</tr>

</thead>
<tbody>        
	        <?php $i=0; foreach($documents as $document){?>	
             <tr>
					<td><?=++$i?></td>
					<td><?=$document['doc_name']?></td>
					<td>
						<?php
						if (is_array($projects) || is_object($projects)){
						foreach ($projects as $project){
						if ($project['task_id'] == $document['uploaded_for']){
							echo $project['task_name'];

						} 			
						
						}}?>
                        <td>
						<?php
						if (is_array($employees) || is_object($employees)){
						foreach ($employees as $employee){
						if ($employee['employee_id'] == $document['uploaded_by']){
							echo $employee['name'];

						} 			
						
						}}?>
                        



					<td><?=$document['upload_date']?></td>

					<td><a href="<?=$document['file_path']?>" class = "assign-btn" download>Download</a>
				

           
</tbody>
            <?php } ?>
</table>
<?php }
     
	 else{?>
	<h3></h3>

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
