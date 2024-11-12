<?php 

function get_all_employees($conn){
    $sql = "SELECT * FROM employees WHERE position = ?";
    $stmt = $conn->prepare($sql);
    $stmt-> execute(["employee"]);
    
    if($stmt->rowCount() > 0){
        $employees = $stmt->fetchAll();

    }
    else $employees = 0;

    return $employees;
}
function insert_employee ($conn, $data){
    $sql = "INSERT into employees('name', email, 'password', position) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt-> execute($data);
}
function get_employee_by_id($conn, $id){
	$sql = "SELECT * FROM employees WHERE employee_id = ? ";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);

	if($stmt->rowCount() > 0){
		$employee = $stmt->fetch();
	}else $employee = 0;

	return $employee;
}
function update_employee($conn, $data){
	$sql = "UPDATE employees SET `name`=?, `email`=?, `password`=?, `position`=? WHERE `employee_id`=? AND `position`=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}
function delete_employee($conn, $data){
	$sql = "DELETE FROM employees WHERE `employee_id`=? AND `position`=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}
