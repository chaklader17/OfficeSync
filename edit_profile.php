<?php
session_start();
if (isset($_SESSION['position']) && $_SESSION['position'] == "employee" && isset($_SESSION['employee_id'])) {
    include "database-link.php"; 
    include "app/model/employee.php"; 

    $employee_id = $_SESSION['employee_id'];

    $employee = get_employee_by_id($conn, $employee_id);

    if (!$employee) {
        echo "Employee not found.";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $position = $employee['position']; 
        $salary = $employee['salary']; 

        $update_status = update_employee($conn, $employee_id, $name, $email, $position, $salary);

        if ($update_status) {
            echo "Profile updated successfully.";
        } else {
            echo "Failed to update profile.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Edit Your Profile</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($employee['name']); ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($employee['email']); ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>

<?php
} else {
    echo "Unauthorized access.";
}
?>
