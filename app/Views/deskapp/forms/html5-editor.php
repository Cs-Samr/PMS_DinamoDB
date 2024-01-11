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
        href="<?php echo base_url(); ?>/assets/src/plugins/jquery-levels/jquery.levels.css">
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
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Projects</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">المشاريع</li>
                                    <li class="breadcrumb-item active" aria-current="page">إنشاء مشروع جديد</li>
                                </ol>
                            </nav>
                        </div>

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

                    <div class="level" id="level2">
                        <div class="alert alert-danger" style="text-align: center;">
                            <h4> المرحلة الثانية : دراسة طلب المشروع </h4>
                        </div>

                         

                        <form id="level2Form"  action="<?= base_url('deskapp/forms/saveForm'); ?>" method="post">
                        <input name="title" type="hidden" value="دراسة طلب المشروع" required>
                            <input name="level#" type="hidden" value="2" required>
							<input name="id_project" type="hidden" value="<?= $_GET['id_project'] ?>">
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>تفاصيل طلب المشروع</label>
                                            <textarea class="form-control" name="details" ></textarea>
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
                                            <input type="date" name="d_start" class="form-control"
                                                placeholder="Select Date" required >
                                        </div>
                                        <div class="form-group">
                                            <label>تاريخ النهاية</label>
                                            <input type="date" name="d_end" class="form-control"
                                                placeholder="Select Date">
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
                                    <a class="btn btn-outline-secondary btn-block" type="button"
                                      href = "http://localhost/MS/deskapp/forms/wizard?id_project=<?= $_GET['id_project'] ?>" >السابق</a>
                                </div>
                                <div class="col">
                                    <button class="btn btn-outline-success btn-block"  type="submit"
                                        name="submit_form">حفظ
                                        المرحلة
                                        الثانية</button>
                                </div>
                                <div class="col">
                                    <a class="btn btn-outline-primary btn-block" type="button"
                                       href = "http://localhost/MS/deskapp/forms/imagecropper?id_project=<?= $_GET['id_project'] ?>" >التالي</a>
                                </div>
                            </div>
                        </form>
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
    let currentlevel = 2;

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

    function submitlevel(formId) {
        const form = document.getElementById(formId);
        form.submit();
    }

    // function goTolevel(levelNum) {
    //     currentlevel = levelNum;
    //     updatelevelIndicators(currentlevel);
    //     showlevel(`level${levelNum}`);
    // }

    showlevel('level2');
    updatelevelIndicators(currentlevel);
    </script>



</body>

</html>