<!DOCTYPE html>

<html data-select2-id="14">

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
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url(); ?>/assets/src/plugins/jquery-steps/jquery.steps.css">
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

<body data-gr-ext-installed="" data-new-gr-c-s-check-loaded="14.1117.0" data-select2-id="13"
    class="header-white active sidebar-dark">
    <!-- echo header,rightsidebar,leftsidebar and loader -->

    <?php 
		echo view('deskapp/includes/_header');
		echo view('deskapp/includes/_sidebar');

	?>

    <div class="main-container" data-select2-id="12">

        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Projects</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">المشاريع</li>
                            <li class="breadcrumb-item active" aria-current="page">إنشاء مشروع</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="text-right">
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Export List</a>
                    <a class="dropdown-item" href="#">Policies</a>
                    <a class="dropdown-item" href="#">View Assets</a>
                </div>

            </div>

        </div>
        <div class="pd-20 card-box mb-30">

            <div class="clearfix">
                <h4 class="text-blue h4">انشاء مشروع</h4>


            </div>

            <div class="wizard-content">
                <form method="post" enctype="multipart/form-data" action="/MS/deskapp/forms/save">
                    <div class="content clearfix">

                        <section id="steps-uid-1-p-0" role="tabpanel" aria-labelledby="steps-uid-1-h-0"
                            class="body current" aria-hidden="false">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اسم المشروع</label>
                                        <input name="pro_name" type="text" class="form-control" require>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تفاصيل المشروع</label>
                                        <input name="details" type="text" class="form-control" require>
                                    </div>
                                </div>

                                <input name="state" type="hidden" value="قيد الإنشاء" require>

                                <!-- <?php
                                    // Initialize the variable to store selected names as a comma-separated string
                                    $selectedNamesString = '';

                                    // Check if the array of selected names is not empty
                                    if (!empty($selectedNames)) {
                                        // Convert the array of selected names to a comma-separated string
                                        $selectedNamesString = implode(', ', $selectedNames);
                                    }
                                    ?> -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اضافة اعضاء</label>
                                        <select name="selected_names[]" class="custom-select form-control selectpicker"
                                            multiple>
                                            <?php foreach ($users as $user): ?>
                                            <option value="<?= $user['id_mem'] ?>">
                                                <?= $user['name'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="d_start">تاريخ البداية </label>
                                        <input name="d_start" type="date" id="d_start" class="form-control"
                                            placeholder="Select Date" require>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="d_end">تاريخ النهاية </label>
                                        <input name="d_end" type="date" id="d_end" class="form-control"
                                            placeholder="Select Date" require>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
            <input class="btn btn-primary btn-lg btn-block" type="submit" value="حفظ">

        </div>

        </form>
    </div>
    <div> <?php echo view('deskapp/includes/_footer'); ?> </div>

    </div><!-- footer -->

    <!-- js -->
    <script src="http://localhost/MS/assets/vendors/scripts/core.js"></script>
    <script src="http://localhost/MS/assets/vendors/scripts/script.min.js"></script>
    <script src="http://localhost/MS/assets/vendors/scripts/process.js"></script>
    <script src="http://localhost/MS/assets/vendors/scripts/layout-settings.js"></script>
    <!-- switchery js -->
    <script src="http://localhost/MS/assets/src/plugins/switchery/switchery.min.js"></script>
    <!-- bootstrap-tagsinput js -->
    <script src="http://localhost/MS/assets/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <!-- bootstrap-touchspin js -->
    <script src="http://localhost/MS/assets/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
    <script src="http://localhost/MS/assets/vendors/scripts/advanced-components.js"></script>




</body>

</html>