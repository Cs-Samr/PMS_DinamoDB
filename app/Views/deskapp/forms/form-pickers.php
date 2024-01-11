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
                            <li class="breadcrumb-item active" aria-current="page">عرض المشروع</li>
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
        <div class="pd-30 card-box mb-40">

            <div class="clearfix">
                <h4 class="text-blue h4">عرض المشروع</h4>


            </div>

            <div class="wizard-content">
                <?php foreach ($projects as $project) {
        $id= $project['id_project'] ;
        } ?>
                <form method="post" enctype="multipart/form-data" action="/MS/deskapp/forms/save/<?=$id?>">
                    <div class="content clearfix">
                        <?php foreach ($projects as $project) { ?>
                        <input type="hidden" name="project_id" value="<?= $project['id_project'] ?>">
                        <?php } ?>

                        <section id="steps-uid-1-p-0" role="tabpanel" aria-labelledby="steps-uid-1-h-0"
                            class="body current" aria-hidden="false">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اسم المشروع</label>
                                        <div class name="pro_name" type="text" class="form-control" require>
                                            <?= $project['pro_name'] ?>
                                            <input name="id_project" type="hidden" class="form-control"
                                                value="<?= $project['id_project'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تفاصيل المشروع</label>
                                        <div class name="details" type="text" class="form-control" require>
                                            <?= $project['details'] ?>
                                        </div>
                                    </div>
                                    <label> حالة المشروع</label>

                                    <div class name="state" type="hidden" value="قيد الإنشاء" require>

                                        <!-- <?php
                                    // Initialize the variable to store selected names as a comma-separated string
                                    $selectedNamesString = '';

                                    // Check if the array of selected names is not empty
                                    if (!empty($selectedNames)) {
                                        // Convert the array of selected names to a comma-separated string
                                        $selectedNamesString = implode(', ', $selectedNames);
                                    }
                                    ?> -->
                                        <?= $project['state'] ?>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <!-- <label>اعضاء المشروع</label>-->
                                     
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="d_start">تاريخ البداية </label><br>
                                        <div class name="d_start" type="date" id="d_start" class="form-control">
                                            <?= $project['d_start'] ?>
                                          </div>
                                    </div>
                                 </div>
                               
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="d_end">تاريخ النهاية </label>
                                        <div class name="d_end" type="date" id="d_end" class="form-control">
                                            <?= $project['d_end'] ?>
                                        </div>

                                    </div>
                                </div>
                            
                    </div>
            </div>

        </div>

        </form>
    </div>
    </div><!-- footer -->
    </div>

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





    <!-- echo header,rightsidebar,leftsidebar and loader -->
    <?php 
		echo view('deskapp/includes/_header');
		echo view('deskapp/includes/_sidebar');
	?>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-300px">
                    
                      

                    </div>
                </div>


                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <style>
                .level {
                    display: none;
                    /* text-align: center; */
                    margin: 0 auto;
                }

                .level form {
                    /* width: 300px; */
                    margin: 0 auto;
                }

                .level form label {
                    display: block;
                    margin-bottom: 10px;
                    font-size: 22px;

                }

                .level form input {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 20px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }

                .level-indicator {
                    display: inline-block;
                    width: 80px;
                    /* Increase the width to make the circle bigger */
                    height: 80px;
                    /* Increase the height to make the circle bigger */
                    border-radius: 50%;
                    background-color: gray;
                    margin: 0 15px;
                    /* Increase the margin value for bigger spacing */
                    text-align: center;
                    line-height: 80px;
                    /* Adjust line-height to vertically center content */
                    color: white;
                    font-weight: bold;
                    cursor: pointer;
                }


                /* Change the background color of the active level indicator */
                .level-indicator.active {
                    background-color: #2fb5ba;
                    /* Change to the desired color */
                }
                </style>
                <div class="pd-20 card-box height-100-p">
                    <div style="text-align: center;">
                        <span class="level-indicator active" onclick="goTolevel(1)">1</span>
                        <span class="level-indicator" onclick="goTolevel(2)">2</span>
                        <span class="level-indicator" onclick="goTolevel(3)">3</span>
                        <span class="level-indicator" onclick="goTolevel(4)">4</span>
                        <br>
                        <br>
                    </div>

                    <?php if (session()->getFlashdata('form_success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('form_success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <div class="level" id="level1" <?php foreach ($projects as $project) {
        $id= $project['id_project'] ;
        } ?>>

                        <div class="alert alert-warning" style="text-align: center;">
                            <h4> المرحلة الأولى : استلام طلب المشروع </h4>
                        </div>



                        <form id="level1Form" action="/MS/deskapp/forms/saveForm" method="post">
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="title" type="hidden" value="استلام طلب المشروع" required>
                                            <input name="level#" type="hidden" value="1" required>
                                            <input name="id_project" type="hidden" value="<?= session('id_project') ?>"
                                                required>

                                            <label>تفاصيل المشروع</label>
                                            <div class="readonly-input">
                                                <?php foreach ($levels as $level) { 
                               if ($level['id_project'] ===  $id_project) { ?>
                                                <option value="<?= $level['details'] ?>"><?= $level['details'] ?>
                                                </option>
                                                <?php } 
                                        } ?>
                                            </div>

                                        </div>
                                        <div>
                                            <label>اختر الحالة</label>
                                            <div class="readonly-input">
                                                <?php foreach ($levels as $level) { 
                               if ($level['id_project'] === $project['id_project']) { ?>
                                                <option value="<?= $level['states'] ?>"><?= $level['states'] ?></option>
                                                <?php } 
                                        } ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>تاريخ البداية</label>
                                            <div class="readonly-input">
                                                <?php foreach ($levels as $level) { 
                               if ($level['id_project'] === $project['id_project']) { ?>
                                                <option value="<?= $level['d_start'] ?>"><?= $level['d_start'] ?>
                                                </option>
                                                <?php } 
                                        } ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>تاريخ النهاية</label>
                                            <div class="readonly-input">
                                                <?php foreach ($levels as $level) { 
                               if ($level['id_project'] === $project['id_project']) { ?>
                                                <option value="<?= $level['d_end'] ?>"><?= $level['d_end'] ?></option>
                                                <?php } 
                                        } ?>

                                            </div>
                                            <div class="form-group">
                                                <label>المسوؤل</label>
                                                <div class name="id_mem">
                                                    <?php foreach ($levels as $level) { 
                                               foreach ($users as $user) { 
                                           if ($user['id_mem'] === $level['id_mem']&& $level['id_project'] === $project['id_project']) { ?>
                                                    <option value="<?= $user['id_mem'] ?>"><?= $user['name'] ?></option>
                                                    <?php } 
                                             }  
                                           } ?>

                                                </div>
                                            </div>
                                        </div>

                            </section>

                            <div class="col">
                                <button class="btn btn-outline-primary btn-block" type="button"
                                    onclick="nextlevel('level1', 'level2')">التالي</button>
                            </div>

                    </div>

                    </form>
                </div>

                <div class="level" id="level2">
                    <div class="alert alert-danger" style="text-align: center;">
                        <h4> المرحلة الثانية : دراسة طلب المشروع </h4>
                    </div>



                    <form id="level2Form" action="/MS/deskapp/forms/saveForm/" method="post">
                        <input name="title" type="hidden" value="دراسة طلب المشروع" required>
                        <input name="level#" type="hidden" value="2" required>
                        <input name="id_project" type="hidden" value="<?= session('id_project') ?>">
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تفاصيل طلب المشروع</label>
                                        <div class="readonly-input">
                                            <?= $project['details'] ?>
                                        </div>
                                    </div>
                                    <div>
                                        <label>اختر الحالة</label>
                                        <div class="readonly-input">
                                            <?= $project['state'] ?>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تاريخ البداية</label>
                                        <div class="readonly-input">
                                            <?= $project['d_start'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>تاريخ النهاية</label>
                                        <div class="readonly-input">
                                            <?= $project['d_end'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>المسوؤل</label>
                                        <select name="id_mem" class="custom-select form-control selectpicker" required>
                                            <?php foreach ($users as $user) { ?>
                                            <option value="<?= $user['id_mem'] ?>"><?= $user['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-outline-secondary btn-block" type="button"
                                    onclick="prevlevel('level2', 'level1')">السابق</button>
                            </div>

                            <div class="col">
                                <button class="btn btn-outline-primary btn-block" type="button"
                                    onclick="nextlevel('level2', 'level3')">التالي</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="level" id="level3">
                    <div class="alert alert-success" style="text-align: center;">
                        <h4> المرحلة الثالثة : جمع متطلبات المشروع </h4>
                    </div>



                    <form id="level3Form" action="/MS/deskapp/forms/saveForm/" method="post">
                        <input name="title" type="hidden" value="جمع متطلبات المشروع" required>
                        <input name="level#" type="hidden" value="3" required>
                        <input name="id_project" type="hidden" value="<?= session('id_project') ?>">
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>كتابة المتطلبات المطلوبة</label>
                                        <textarea name="details" class="form-control"></textarea>
                                    </div>
                                    <div>

                                        <label>اختر الحالة</label>
                                        <div class="readonly-input">
                                            <?= $project['state'] ?>
                                        </div>


                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>نوع متطلبات المشروع</label>
                                        <select name="type" class="form-control" required>
                                            <option value="منافسة">منافسة</option>
                                            <option value="امر شراء مباشر">امر شراء مباشر</option>
                                            <option value="سلفة ادارية">سلفة ادارية</option>
                                            <option value="مشروع داخلي">مشروع داخلي</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تاريخ البداية</label>
                                        <div class="readonly-input">
                                            <?= $project['d_start'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>تاريخ النهاية</label>
                                        <div class="readonly-input">
                                            <?= $project['d_end'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>المسوؤل</label>
                                        <select name="id_mem" class="custom-select form-control selectpicker" required>
                                            <?php foreach ($users as $user) { ?>
                                            <option value="<?= $user['id_mem'] ?>"><?= $user['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-outline-secondary btn-block" type="button"
                                    onclick="prevlevel('level3', 'level2')">السابق</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-success btn-block" type="submit" name="submit_form">حفظ
                                    المرحلة
                                    الثالثة</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-primary btn-block" type="button"
                                    onclick="nextlevel('level3', 'level4')">التالي</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="level" id="level4">
                    <div class="alert alert-success" style="text-align: center;">
                        <h4> المرحلة الرابعة : متطلبات المشروع </h4>
                    </div>


                    <form id="level4Form" action="/MS/deskapp/forms/saveForm/" method="post">
                        <input name="title" type="hidden" value="متطلبات المشروع" require>
                        <input name="level#" type="hidden" value="4" require>
                        <input name="id_project" type="hidden" value="<?= session('id_project') ?>">
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المسوؤل</label>
                                        <select name="id_mem" class="custom-select form-control selectpicker" required>
                                            <?php foreach ($users as $user) { ?>
                                            <option value="<?= $user['id_mem'] ?>"><?= $user['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div>
                                        <label>اختر الحالة</label>
                                        <select name="states" class="form-control selectpicker" required>
                                            <option value="جديد">جديد</option>
                                            <option value="متوقف">متوقف</option>
                                            <option value="مكتمل">مكتمل</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تاريخ البداية</label>
                                        <input type="date" name="d_start" class="form-control" placeholder="Select Date"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>تاريخ النهاية</label>
                                        <input type="date" name="d_end" class="form-control" placeholder="Select Date"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المتطلبات</label>
                                        <textarea name="details" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-outline-secondary btn-block " type="button"
                                    onclick="prevlevel('level4', 'level3')">السابق</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-success btn-block" type="submit">حفظ المرحلة
                                    الرابعة و الأخيرة</button>
                            </div>
                        </div>

                    </form>
                </div>

                <div id="result" style="display: none;">
                    <h4>Form Completed</h4>
                </div>
            </div>

        </div>
        <br>
        <?php echo view('deskapp/includes/_footer'); ?>
    </div>
    </div>
    <!-- js -->
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/core.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/script.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/process.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/layout-settings.js"></script>
    <script src="<?php echo base_url(); ?>/assets/src/plugins/jquery-levels/jquery.levels.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/levels-setting.js"></script>
    <!-- levell script  -->
    <script>
    let currentlevel = 1;

    function showlevel(levelId) {
        const levels = document.querySelectorAll('.level');
        levels.forEach(level => {
            level.style.display = 'none';
        });
        document.getElementById(levelId).style.display = 'block';
    }

    function updatelevelIndicators(levelNum) {
        const indicators = document.querySelectorAll('.level-indicator');
        indicators.forEach((indicator, index) => {
            if (index + 1 === levelNum) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
    }

    function nextlevel(currentlevelId, nextlevelId) {
        currentlevel++;
        updatelevelIndicators(currentlevel);
        showlevel(nextlevelId);
    }

    function prevlevel(currentlevelId, prevlevelId) {
        currentlevel--;
        updatelevelIndicators(currentlevel);
        showlevel(prevlevelId);
    }

    // function submitlevel(formId) {
    //     const form = document.getElementById(formId);
    //     form.submit();
    // }

    function goTolevel(levelNum) {
        currentlevel = levelNum;
        updatelevelIndicators(currentlevel);
        showlevel(`level${levelNum}`);
    }

    showlevel('level1');
    updatelevelIndicators(currentlevel);
    </script>



</body>

</html>