<?php
ob_start();
session_start();
if (!isset($_SESSION["login"]["kt3V_level"]) || $_SESSION["login"]["kt3V_level"] != 3) {
    header("location:login.php");
    exit();
}
include '../configuration.php';
include '../vendor/database.php';
include '../vendor/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/images/favicon.ico" type="image/x-icon">

    <title>Admin</title>

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
    <script type="text/javascript" src="public/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="public/js/ckfinder/ckfinder.js"></script>
    <script type="text/javascript" src="public/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="public/js/plugins/forms/inputs/touchspin.min.js"></script>
    <script type="text/javascript" src="public/js/plugins/forms/styling/switch.min.js"></script>
    <script type="text/javascript" src="public/js/plugins/forms/tags/tagsinput.min.js"></script>
    <script type="text/javascript" src="public/js/plugins/forms/inputs/maxlength.min.js"></script>
    <script type="text/javascript" src="public/js/plugins/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript" src="public/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="public/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="public/js/plugins/forms/inputs/passy.js"></script>

    <script type="text/javascript" src="public/js/core/app.js"></script>
    <script type="text/javascript" src="public/js/pages/layout_fixed_custom.js"></script>
    <script type="text/javascript" src="public/js/core/myscript.js"></script>
    <!-- /theme JS files -->

</head>

<body class="navbar-top">

<!-- Main navbar -->
<?php include 'resources/blocks/nav.php' ?>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <?php include 'resources/blocks/sidebar.php' ?>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <?php include 'resources/blocks/header.php'; ?>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <div class="row">

                    <?php
                    if (isset($_GET["con"])) {
                        $con = $_GET["con"];
                        switch ($con) {
                            case 'category':
                                include 'controllers/CategoryController.php';
                                break;
                            case 'course':
                                include 'controllers/CourseController.php';
                                break;
                            case 'lession':
                                include 'controllers/LessionController.php';
                                break;
                            case 'user':
                                include 'controllers/UserController.php';
                                break;
                            case 'product':
                                include 'controllers/ProductController.php';
                                break;
                            default:
                                include 'resources/views/dashboard/index.php';
                                break;
                        }
                    } else {
                        include 'resources/views/dashboard/index.php';
                    }
                    ?>

                </div>

                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; 2017. <a href="#">Vũ Quốc Tuấn</a> by <a href="http://quoctuan.info" target="_blank">QuocTuan.Info</a>
                </div>
                <!-- /footer -->

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
