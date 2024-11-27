<?php

function insert_document($conn, $data){
    $sql = "INSERT INTO documents (doc_name, file_path, uploaded_for, upload_date,uploaded_by) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt-> execute($data);
}
function get_all_documents_through_id($conn, $id){
    $sql = "SELECT * FROM documents WHERE uploaded_by=?";
    $stmt = $conn->prepare($sql);
    $stmt-> execute([$id]);
    
    if($stmt->rowCount() > 0){
        $documents = $stmt->fetchAll();

    }
    else $documents = 0;

    return $documents;
}
function get_all_documents($conn){
    $sql = "SELECT * FROM documents";
    $stmt = $conn->prepare($sql);
    $stmt-> execute([]);
    
    if($stmt->rowCount() > 0){
        $tasks = $stmt->fetchAll();

    }
    else $tasks = 0;

    return $tasks;
}
function get_document_by_id($conn, $id){
	$sql = "SELECT * FROM documents WHERE `document_id`=? ";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);

	if($stmt->rowCount() > 0){
		$document= $stmt->fetch();
	}else $document= 0;

	return $document;
}
function delete_document($conn, $data){
	$sql = "DELETE FROM documents WHERE `document_id`=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}