<?php
function checkEmailExisting($conn, $data)
{
    $stmt = $conn->prepare("SELECT email FROM `u8tr_user` WHERE email = :email");
    $stmt->bindParam(":email", $data['email'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount() == 0;
}

function add($conn, $data, &$error)
{
    if (checkEmailExisting($conn, $data)) {
        $stmt = $conn->prepare('INSERT INTO u8tr_user(email,password,level,firstname,lastname,phone,address,facebook,avatar,status,created_at) VALUES(:email,:password,:level,:firstname,:lastname,:phone,:address,:facebook,:avatar,:status,:created_at)');
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $data['pass'], PDO::PARAM_STR);
        $stmt->bindParam(':level', $data['level'], PDO::PARAM_INT);
        $stmt->bindParam(':firstname', $data['firstname'], PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $data['lastname'], PDO::PARAM_STR);
        $stmt->bindParam(':phone', $data['phone'], PDO::PARAM_STR);
        $stmt->bindParam(':address', $data['address'], PDO::PARAM_STR);
        $stmt->bindParam(':facebook', $data['facebook'], PDO::PARAM_STR);
        $stmt->bindParam(':avatar', $data['avatar'], PDO::PARAM_STR);
        $stmt->bindParam(':status', $data['status'], PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $data['created_at'], PDO::PARAM_INT);
        $stmt->execute();
        if (isset($_POST['btnSaveNew'])) {
            setFlash('success', 'Insert user successfully.');
            redirect('con=user&act=add');
        }
        if (isset($_POST['btnSaveClose'])) {
            setFlash('success', 'Insert user successfully.');
            redirect('con=user&act=list');
        }
    } else {
        $error[] = 'This email has been exist';
    }
}

function edit($conn, $data)
{
    $stmt = $conn->prepare('UPDATE `u8tr_user` SET `password`=:password, `level`=:level, `firstname`=:firstname, `lastname`=:lastname, `phone`=:phone, `address`=:address,`facebook`=:facebook,`avatar`=:avatar,`status`=:status,`updated_at`=:updated_at WHERE `id` = :id');
    $stmt->bindParam(':password', $data['pass'], PDO::PARAM_STR);
    $stmt->bindParam(':level', $data['level'], PDO::PARAM_INT);
    $stmt->bindParam(':firstname', $data['firstname'], PDO::PARAM_STR);
    $stmt->bindParam(':lastname', $data['lastname'], PDO::PARAM_STR);
    $stmt->bindParam(':phone', $data['phone'], PDO::PARAM_STR);
    $stmt->bindParam(':address', $data['address'], PDO::PARAM_STR);
    $stmt->bindParam(':facebook', $data['facebook'], PDO::PARAM_STR);
    $stmt->bindParam(':avatar', $data['avatar'], PDO::PARAM_STR);
    $stmt->bindParam(':status', $data['status'], PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $data['updated_at'], PDO::PARAM_INT);
    $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
    $stmt->execute();
    if (isset($_POST['btnSaveNew'])) {
        setFlash('success', 'Update user successfully.');
        redirect('con=user&act=edit&cid=' . $data['id']);
    }
    if (isset($_POST['btnSaveClose'])) {
        setFlash('success', 'Update user successfully.');
        redirect('con=user&act=list');
    }
}

function delete($conn, $id)
{
    $stmt = $conn->prepare('DELETE FROM `u8tr_user` WHERE `id` = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    redirect('con=user');
}

function listAll($conn)
{
    $stmt = $conn->prepare('SELECT id,email,level,status FROM `u8tr_user`');
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function dataEdit($conn, $id)
{
    $stmt = $conn->prepare('SELECT * FROM `u8tr_user` WHERE id = :id');
    $stmt->bindParam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

?>