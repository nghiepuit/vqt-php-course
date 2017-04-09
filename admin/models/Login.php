<?php

function login($conn, $data, &$errors)
{
    $stmt = $conn->prepare("SELECT * FROM `u8tr_user` WHERE `email` = :email AND `password` = :password AND `status` = :status AND `level` = :level");
    $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
    $stmt->bindParam(":status", $data["status"], PDO::PARAM_STR);
    $stmt->bindParam(":level", $data["level"], PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->rowCount();
    if ($row != 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["login"]["kt3V_id"] = $user["id"];
        $_SESSION["login"]["kt3V_email"] = $user["email"];
        $_SESSION["login"]["kt3V_level"] = $user["level"];
        $_SESSION["login"]["kt3V_firstname"] = $user["firstname"];
        $_SESSION["login"]["kt3V_lastname"] = $user["lastname"];
        $_SESSION["login"]["kt3V_avatar"] = $user["avatar"];
        redirect();
    } else {
        $errors[] = "Tài khoản không tồn tại";
    }
}

?>