<nav class="side-bar">
			<div class="user-p">
			</div>

			<?php
			//$user = "admin";
			if($_SESSION['position'] == "employee"){

			?>

			<ul id = "navigation-list">
				<li>
					<a href="profile.php">
					<i class='bx bx-face'></i>
						<span>Profile</span>
					</a>
				</li>
				<li>
					<a href="my-projects.php">
					<i class='bx bx-layer'></i>
						<span>Projects</span>
					</a>
				</li>
				<li>
					<a href="documents.php">
					<i class='bx bx-file'></i>
						<span>Documents</span>
					</a>
				</li>
				<li>
					<a href="logout.php">
					<i class='bx bx-log-out'></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
			<?php }
			else{ ?>
			<ul id = "navigation-list">
				<li class = "active">
					<a href="employees.php">
					
					<i class='bx bx-user-check'></i>
						<span>Manage Employees</span>
					</a>
				</li>
				<li>
					<a href="assign-project.php">
					    <i class='bx bx-edit'></i>
						<span>Assign Projects</span>
					</a>
				</li>
				<li>
					<a href="projects.php">
					<i class='bx bx-list-check'></i>
						<span>Project List</span>
					</a>
				</li>
				<li>
					<a href="logout.php">
					<i class='bx bx-log-out'></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
			<?php } ?>
		</nav>
