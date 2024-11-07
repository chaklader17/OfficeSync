<nav class="side-bar">
			<div class="user-p">
			</div>

			<?php
			//$user = "admin";
			if($_SESSION['position'] == "employee"){

			?>

			<ul>
				<li>
					<a href="#">
					<i class='bx bx-calendar-check'></i>
						<span>Schedules</span>
					</a>
				</li>
				<li>
					<a href="#">
					<i class='bx bx-layer'></i>
						<span>Projects</span>
					</a>
				</li>
				<li>
					<a href="#">
					<i class='bx bx-file'></i>
						<span>Documents</span>
					</a>
				</li>
				<li>
					<a href="#">
					<i class='bx bx-message'></i>
						<span>Messages</span>
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
			<ul>
				<li>
					<a href="#">
					<i class='bx bx-user-check'></i>
						<span>Manage Employees</span>
					</a>
				</li>
				<li>
					<a href="#">
					    <i class='bx bx-edit'></i>
						<span>Assign Projects</span>
					</a>
				</li>
				<li>
					<a href="#">
					<i class='bx bx-list-check'></i>
						<span>Project List</span>
					</a>
				</li>
				<li>
					<a href="#">
					<i class='bx bx-message'></i>
						<span>Messages</span>
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