<?php
$errors = array();
if (isset($_SESSION['message'])) {
    unset($_SESSION['message']);
}
if ((isset($_POST['btnSaveNew']) || isset($_POST['btnSaveClose'])) && token()) {
    if (empty($_POST['txtEmail']) || is_null($_POST['txtEmail'])) {
        $errors[] = 'Please enter your email !';
    }
    if (empty($_POST['txtPass']) || is_null($_POST['txtPass'])) {
        $errors[] = 'Please enter your password !';
    }
    if (empty($errors)) {
        $data = array(
            'email' => $_POST['txtEmail'],
            'pass' => md5($_POST['txtPass']),
            'level' => $_POST['sltLevel'],
            'firstname' => emptyToNull($_POST['txtFirstName']),
            'lastname' => emptyToNull($_POST['txtLastName']),
            'phone' => emptyToNull($_POST['txtPhone']),
            'address' => emptyToNull($_POST['txtAddress']),
            'facebook' => emptyToNull($_POST['txtFacebook']),
            'avatar' => emptyToNull($_POST['txtImage']),
            'status' => (isset($_POST['chkStatus'])) ? 'On' : 'Off',
            'created_at' => time(),
        );
        add($conn, $data, $errors);
    }
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
                    <input type="email" name="txtEmail" class="form-control"
                           placeholder="Please Enter Email" <?php issetInput('txtEmail') ?> />
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-12" style="padding-left:0px">Password</label>
                    <div class="col-lg-9" style="padding-left:0px">
                        <div class="label-indicator">
                            <input name="txtPass" type="password" class="form-control" <?php issetInput('txtPass') ?>
                                   placeholder="Enter your password">
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
                           placeholder="Please Enter First Name" <?php issetInput('txtFirstName') ?>/>
                </div>
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input type="text" name="txtLastName" class="form-control"
                           placeholder="Please Enter Last Name" <?php issetInput('txtLastName') ?>/>
                </div>
                <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input type="text" name="txtPhone" class="form-control"
                           placeholder="Please Enter Phone Number" <?php issetInput('txtPhone') ?>/>
                </div>
                <div class="form-group">
                    <label class="control-label">Address</label>
                    <input type="text" name="txtAddress" class="form-control"
                           placeholder="Please Enter Address" <?php issetInput('txtAddress') ?>/>
                </div>
                <div class="form-group">
                    <label class="control-label">Facebook</label>
                    <input type="text" name="txtFacebook" class="form-control" <?php issetInput('txtFacebook1') ?>
                           placeholder="Please Enter Link Facebook"/>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h6 class="panel-title">Add User</h6>
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
                    <label class="control-label">Level</label>
                    <select name="sltLevel" class="form-control">
                        <option value="1">Member</option>
                        <option value="2">Member Vip</option>
                        <option value="3">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Avatar</label><br/>
                    <center>
                        <img class="img-responsive" id="main-image" <?php issetInputImage('txtImage') ?>/>
                        <input type="hidden" name="txtImage"
                               id="main-image-input" <?php issetInputImage('txtImage') ?>/>
                    </center>
                    <br/>
                </div>
                <br/>
                <div class="checkbox checkbox-switch">
                    <input type="checkbox" data-on-color="success" data-off-color="danger" data-on-text="Status Online"
                           data-off-text="Status Offline" class="switch" checked="checked"/>
                </div>
            </div>
        </div>
    </div>
</form>