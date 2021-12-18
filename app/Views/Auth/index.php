<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icon -->
    <link rel="icon" href="<?= base_url(); ?>/public/assets/img/logo/logo.png" type="image/x-icon" />
    <title>E-Marketing | Nusamed HC</title>
    <link href="<?= base_url(); ?>/public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/public/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/public/assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/public/assets/css/style.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="<?= base_url(); ?>/public/assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <img src="<?= base_url(); ?>/public/assets/img/logo/1.png" width="250px">
            </div>
            <!-- <form class="m-t" role="form" action="#"> -->
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required="" id="username" name="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b" onclick="process()">Login</button>
            <a href="<?php echo base_url('Auth/forgot'); ?>"><small>Forgot password?</small></a>
            <!-- </form> -->
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url(); ?>/public/assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/bootstrap.js"></script><!-- Sweet alert -->
    <script src="<?= base_url(); ?>/public/assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript">
        document.getElementById("username").focus();

        function process() {
            var username = $('#username').val();
            var password = $('#password').val();
            //alert(username + '-' + password);
            if (username != '' && password != '') {
                swal({
                    title: "Welcome Users",
                    text: "Login Successfully",
                    type: "success"
                }, function() {
                    window.location = "<?= base_url('Apps') ?>";
                });
            }

        }
    </script>

</body>

</html>