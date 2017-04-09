<?php
include '../../configuration.php';
include '../../vendor/database.php';
include '../../vendor/functions.php';
if (isset($_GET['status']) && $_GET['id'] && isset($_GET['table']) && isset($_GET['col'])) {
    $status = $_GET['status'] == 'true' ? 'On' : 'Off';
    $table = $_GET['table'];
    $col = $_GET['col'];
    $id = $_GET['id'];
    $stmt = $conn->prepare("UPDATE `$table` SET $col = :$col WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":$col", $status, PDO::PARAM_STR);
    $stmt->execute();
    echo 'Success';
}
?>