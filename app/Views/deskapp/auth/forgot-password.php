<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Project Manegment System </title>
   
    <!-- Site favicon -->
    <link rel="sfhm-touch-icon" sizes="180x180"
        href="<?php echo base_url(); ?>/assets/vendors/images/sfhm-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo base_url(); ?>/assets/vendors/images/sfhm-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo base_url(); ?>/assets/vendors/images/sfhm-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendors/styles/style.css">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
    </script>
</head>

<body>
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="<?php echo base_url('deskapp/login') ?>">
                    <img src="<?php echo base_url(); ?>/assets/vendors/images/logo-white.png" alt="">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="<?php echo base_url(); ?>/assets/vendors/images/Reset-vector.png" alt="">
                </div>
                <div class="col-md-6">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Forgot Password</h2>
                        </div>
                        <h6 class="mb-20">Enter your email address to reset your password</h6>
						<form action="<?= base_url('email/sendEmail_ForgotPassword') ?>" method="post">
    <div class="input-group custom">
        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="row align-items-center mt-3">
        <div class="col-5">
            <div class="input-group mb-0">
                <input class="btn btn-primary btn-lg btn-block" name="submit" type="submit" value="Submit">
            </div>
        </div>
        <div class="col-2">
            <div class="font-16 weight-600 text-center" data-color="#707373">OR</div>
        </div>
        <div class="col-5">
            <div class="input-group mb-0">
                <a class="btn btn-outline-primary btn-lg btn-block" href="<?php echo base_url('deskapp/login'); ?>">Login</a>
            </div>
        </div>
    </div>
</form>

<?php if (session()->has('success_message')): ?>
    <div class="alert alert-success mt-3">
        <?= session('success_message') ?>
    </div>
<?php elseif (session()->has('error_message')): ?>
    <div class="alert alert-danger mt-3">
        <?= session('error_message') ?>
    </div>
<?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/core.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/script.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/process.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/layout-settings.js"></script>
</body>

</html>