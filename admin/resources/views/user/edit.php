<?php
if (isset($_SESSION['message'])) {
    unset($_SESSION['message']);
}
if (isset($_GET['cid'])) {
    $id = $_GET['cid'];
    checkId($id, 'con=user');
    $data = dataEdit($conn, $id);

    $edit_myself = null;
    if ($_SESSION["login"]["kt3V_id"] == $id) {
        $edit_myself = true;
    } else {
        $edit_myself = false;
    }

    if (($_SESSION["login"]["kt3V_id"] != 1 && ($id == 1 || ($data["level"] == 3 && $edit_myself == false)))) {
        setFlash("error", "Bạn không được phép sửa thành viên này");
        redirect("con=user");
    }

    if (empty($_POST['txtPass']) || is_null($_POST['txtPass'])) {
        $pass = $data["password"];
    } else {
        $pass = md5($_POST['txtPass']);
    }

    if (isset($_POST['sltLevel'])) {
        $level = $_POST['sltLevel'];
    } else {
        $level = $data['level'];
    }

    if ((isset($_POST['btnSaveNew']) || isset($_POST['btnSaveClose'])) && token()) {
        $edit = array(
            'pass' => $pass,
            'level' => $level,
            'firstname' => emptyToNull($_POST['txtFirstName']),
            'lastname' => emptyToNull($_POST['txtLastName']),
            'phone' => emptyToNull($_POST['txtPhone']),
            'address' => emptyToNull($_POST['txtAddress']),
            'facebook' => emptyToNull($_POST['txtFacebook']),
            'avatar' => emptyToNull($_POST['txtImage']),
            'status' => (isset($_POST['chkStatus'])) ? 'On' : 'Off',
            'updated_at' => time(),
            'id' => $id
        );
        if (($_SESSION["login"]["kt3V_id"] != 1 && ($id == 1 || ($data["level"] == 3 && $edit_myself == false)))) {
            setFlash("error", "Bạn không được phép sửa thành viên này");
            redirect("con=user");
        } else {
            edit($conn, $edit);
        }
    }
} else {
    redirect('con=user');
}
?>
<form action="" method="POST" accept-charset="utf-8">
    <?php form_token(); ?>
    <div class="col-md-12">
        <div class="panel panel-body border-top-primary text-left">
            <button type="submit" name="btnSaveNew" value="btnSaveNew" class="btn btn-success btn-labeled"><b><i
                            class="icon-add"></i></b> Save & New
            </button>
            <button type="submit" name="btnSaveClose" value="btnSaveClose" class="btn btn-default btn-labeled"><b><i
                            class="icon-add-to-list"></i></b> Save & Close
            </button>
            <a href="index.php?con=user" class="btn btn-danger btn-labeled"><b><i class="icon-close2"></i></b> Close</a>
        </div>
    </div>
    <div class="col-md-12">
        <?php include 'resources/blocks/error.php' ?>
        <?php include 'resources/blocks/success.php' ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h6 class="panel-title">User Login</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse" class=""></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body" style="display: block;">
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" name="txtEmail" class="form-control" readonly
                           placeholder="Please Enter Email" <?php issetInput('txtEmail', $data['email']); ?> />
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-12" style="padding-left:0px">Password</label>
                    <div class="col-lg-9" style="padding-left:0px">
                        <div class="label-indicator">
                            <input type="password" class="form-control" name="txtPass"
                                   placeholder="Enter your password" <?php issetInput('txtPass', $data['password']); ?>>
                            <span class="label label-block password-indicator-label"></span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-info generate-label">Generate 15 characters</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h6 class="panel-title">User Infomation</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse" class=""></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body" style="display: block;">
                <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input type="text" name="txtFirstName" class="form-control"
                           placeholder="Please Enter First Name" <?php issetInput('txtFirstName', $data['firstname']); ?>/>
                </div>
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input type="text" name="txtLastName" class="form-control"
                           placeholder="Please Enter Last Name" <?php issetInput('txtLastName', $data['lastname']); ?>/>
                </div>
                <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input type="text" name="txtPhone" class="form-control"
                           placeholder="Please Enter Phone Number" <?php issetInput('txtPhone', $data['phone']); ?>/>
                </div>
                <div class="form-group">
                    <label class="control-label">Address</label>
                    <input type="text" name="txtAddress" class="form-control"
                           placeholder="Please Enter Address" <?php issetInput('txtAddress', $data['address']); ?>/>
                </div>
                <div class="form-group">
                    <label class="control-label">Facebook</label>
                    <input type="text" name="txtFacebook" class="form-control"
                           placeholder="Please Enter Link Facebook" <?php issetInput('txtFacebook', $data['facebook']); ?>/>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h6 class="panel-title">Edit User</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse" class=""></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body" style="display: block;">
                <?php if (!$edit_myself) { ?>
                    <div class="form-group">
                        <label class="control-label">Level</label>
                        <select name="sltLevel" class="form-control">
                            <option value="1" <?php issetSelect('sltLevel', 1, $data['level']) ?>>Member</option>
                            <option value="2" <?php issetSelect('sltLevel', 2, $data['level']) ?>>Member Vip</option>
                            <option value="3" <?php issetSelect('sltLevel', 3, $data['level']) ?>>Admin</option>
                        </select>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label class="control-label">Avatar</label><br/>
                    <center>
                        <img class="img-responsive" id="main-image"
                            <?php
                            issetInputImage('txtImage', $data['avatar'], 'src');
                            ?> />
                        <input type="hidden" name="txtImage"
                               id="main-image-input"
                            <?php
                            issetInputImage('txtImage', $data['avatar'], 'value');
                            ?>
                        />
                    </center>
                    <br/>
                </div>
                <br/>
                <div class="checkbox checkbox-switch">
                    <input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger"
                           data-on-text="Status Online" data-off-text="Status Offline" class="switch chkStatus"
                           data-table="u8tr_user"
                           data-col="status"
                           data-id="<?php echo $data['id']; ?>" <?php if ($data['status'] == 'On') { ?> checked <?php } ?>/>
                </div>
            </div>
        </div>
    </div>
</form>