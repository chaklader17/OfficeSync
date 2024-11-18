<?php

function insert_project($conn, $data){
    $sql = "INSERT into tasks(`task_name`, `description`, `assigned_to`, `deadline` ) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt-> execute($data);
}
function get_all_projects($conn){
    $sql = "SELECT * FROM tasks";
    $stmt = $conn->prepare($sql);
    $stmt-> execute([]);
    
    if($stmt->rowCount() > 0){
        $tasks = $stmt->fetchAll();

    }
    else $tasks = 0;

    return $tasks;
}
function get_project_by_id($conn, $id){
	$sql = "SELECT * FROM tasks WHERE `task_id`=? ";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);

	if($stmt->rowCount() > 0){
		$task = $stmt->fetch();
	}else $task = 0;

	return $task;
}
function delete_project($conn, $data){
	$sql = "DELETE FROM tasks WHERE `task_id`=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}
function update_project($conn, $data){
	$sql = "UPDATE tasks SET task_name=?, description=?, assigned_to=?, deadline=? WHERE task_id=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}