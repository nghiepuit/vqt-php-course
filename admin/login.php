<?php
session_start();
include '../vendor/functions.php';
logIp();

if(isset($_SESSION["login"]["kt3V_level"]) && $_SESSION["login"]["kt3V_level"] == 3){
    redirect();
}

$errors = array();
if(isset($_POST['btnLogin']) && token()){
    $email = cleanString($_POST["txtEmail"]);
    $password = md5($_POST["txtPass"]);
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = "Đây không phải là email hoặc email không hợp lệ !";
    }
    if($_POST['txtLock'] != "nghiepuit"){
        $errors[] = "Sai mã lock!";
    }
    if(empty($errors)){
        include '../configuration.php';
        include '../vendor/database.php';
        include 'models/Login.php';
        $login = array(
            'email' => $email,
            'password' => $password,
            'status' => 'On',
            'level' => 3
        );
        login($conn,$login,$errors);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/images/favicon.ico" type="image/x-icon">
    <title>Login</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="public/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="public/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="public/css/core.css" rel="stylesheet" type="text/css">
    <link href="public/css/components.css" rel="stylesheet" type="text/css">
    <link href="public/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="public/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="public/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="public/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="public/js/plugins/forms/validation/validate.min.js"></script>
    <script type="text/javascript" src="public/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="public/js/core/app.js"></script>
    <script type="text/javascript" src="public/js/pages/login_validation.js"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container login-cover">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content pb-20">

                <!-- Form with validation -->
                <form class="form-validate" method="POST">
                    <?php form_token(); ?>
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">Login to your account
                                <small class="display-block">Your credentials</small>
                            </h5>
                        </div>
                        <?php include 'resources/blocks/error.php'; ?>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="Email" name="txtEmail"
                                   required="required">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" placeholder="Password" name="txtPass"
                                   required="required">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" placeholder="Lock" name="txtLock"
                                   required="required">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block" name="btnLogin">Login <i
                                        class="icon-arrow-right14 position-right"></i></button>
                        </div>

                    </div>
                </form>
                <!-- /form with validation -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
