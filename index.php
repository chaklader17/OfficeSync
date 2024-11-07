<?php
session_start();
if (isset ($_SESSION['position']) &&  isset($_SESSION['employee_id'])) {
?>

<!DOCTYPE html>

<html>
<head>
	<title>OMS Home Page</title>
	<script src="https://kit.fontawesome.com/6eda733120.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="navigation-body">
	<input type="checkbox" id="checkbox">
	<?php include "include/header.php"?>
	<div class="body">
	<?php include "include/navigation.php"?>
		
		<section class = "section-1">
			</section>
			</div>
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


