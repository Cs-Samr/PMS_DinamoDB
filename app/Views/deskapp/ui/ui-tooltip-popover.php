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

<body class="header-white sidebar-dark" data-new-gr-c-s-check-loaded="14.1117.0" data-gr-ext-installed="">
    <!-- echo header,rightsidebar,leftsidebar and loader -->
    <?php 
		echo view('deskapp/includes/_header');
		echo view('deskapp/includes/_sidebar');
	?>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Projects</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">المشاريع</li>
                                    <li class="breadcrumb-item active" aria-current="page">تعديل المشروع</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <h4 class="text-blue h4">تعديل المشروع</h4>
                    </div>
                    <div class="wizard-content">
                        <?php foreach ($projects as $project) {
        $id= $project['id_project'] ;
        } ?>
                        <form method="post" action="/MS/deskapp/ui/updateProject/<?=$id?>">
                            <?= csrf_field() ?>
                            <!-- Add a hidden input field to store the project ID -->
                            <?php foreach ($projects as $project) { ?>
                            <input type="hidden" name="project_id" value="<?= $project['id_project'] ?>">
                            <?php } ?>
                            <div class="content clearfix">
                                <!-- Project info -->
                                <section id="steps-uid-1-p-0" role="tabpanel" aria-labelledby="steps-uid-1-h-0"
                                    class="body current" aria-hidden="false">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>اسم المشروع</label>
                                                <input name="pro_name" type="text" class="form-control"
                                                    value="<?= $project['pro_name'] ?>">
                                                <input name="id_project" type="hidden" class="form-control"
                                                    value="<?= $project['id_project'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>تفاصيل المشروع</label>
                                                <input name="details" type="text" class="form-control"
                                                    value="<?= $project['details'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>اضافة اعضاء </label>
                                                <select name="selected_names[]"
                                                    class="custom-select form-control selectpicker" multiple>
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
                                                    placeholder="Select Date" value="<?= $project['d_start'] ?>">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="d_end">تاريخ النهاية </label>
                                                <input name="d_end" type="date" id="d_end" class="form-control"
                                                    placeholder="Select Date" value="<?= $project['d_end'] ?>">
                                            </div>
                                        </div>

                                    </div>
                                </section>


                            </div>

                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="تحديث"
                                herf="http://localhost/MS/deskapp/ui/sweet-alert">
                            <a class="btn btn-warning btn-lg btn-block"
                                href="http://localhost/MS/deskapp/forms/wizard?id_project=<?= $project['id_project'] ?>">تعديل
                                المراحل</a>
                        </form>
                    </div>
                </div>

            </div>
            <!-- footer -->
            <?php echo view('deskapp/includes/_footer'); ?>
        </div>
    </div>
    </div>
    <!-- js -->
    <script src="http://localhost/MS/assets/vendors/scripts/core.js"></script>
    <script src="http://localhost/MS/assets/vendors/scripts/script.min.js"></script>
    <script src="http://localhost/MS/assets/vendors/scripts/process.js"></script>
    <script src="http://localhost/MS/assets/vendors/scripts/layout-settings.js"></script>

</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
<div class="abineContentPanel"
    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent !important; margin: 0px !important; padding: 0px !important; display: none; opacity: 1 !important; z-index: 2147483647 !important; position: absolute !important; top: 20px !important; right: 20px !important; overflow: hidden !important; border-width: 0px !important; visibility: visible !important;">
    <iframe class="abineContentFrame" width="310px" allowtransparency="true" frameborder="0" height="0px" scrolling="no"
        src="chrome-extension://caljgklbbfbcjjanaijlacgncafpegll/html/inlineForm.html?abine61269498doNotRemove"
        id="abine61269498doNotRemove" position="undefined"
        style="display:block !important;position:relative !important;background:transparent !important;border-width:0px !important;left:0px !important;top:0px !important;visibility:visible !important;opacity:1 !important;filter:alpha(opacity:100) !important;margin:0 !important;padding:0 !important;height:0px !important;width:310px"></iframe>
</div>

</html>