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

<body class="header-white active sidebar-dark" data-new-gr-c-s-check-loaded="14.1117.0" data-gr-ext-installed="">
    <!-- echo header,rightsidebar,leftsidebar and loader -->
    <?php 
		echo view('deskapp/includes/_header');
		echo view('deskapp/includes/_sidebar');
	?>

    <!-- _________________________________________________________START CSS________________________________________________________________________________ -->

    <style>
    /*________________________User + Project + Statistics  cards style________________________________________*/

    .card {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px auto;

        width: 500px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 80px;

    }

    .card_icon {
        font-size: 48px;
        color: #3366cc;
    }

    .card_title {
        font-size: 24px;
        margin: 10px 0;
        color: #333333;
    }

    .card_button-container {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
    }

    .card_button {
        padding: 10px 20px;
        background-color: #2fb5ba;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Flexbox to center the button in the card */
    .card_center-button {
        display: flex;
        justify-content: center;
    }

    .card_footer {
        font-size: 14px;
        color: #999999;
    }


    /* ________________________________project cards CSS__________________________________________ */

    .project-card {

        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 300px;
        margin: 20px auto;
    }

    .project-card h2 {
        font-size: 24px;
        margin: 0 0 10px;
        color: #007bff;
    }

    .project-info {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .project-info .icon {
        font-size: 24px;
        margin-right: 10px;
        color: #007bff;
    }

    .project-info span {
        color: #444;
    }

    .buttons {
        display: flex;
        justify-content: space-between;
    }

    .btn {
        padding: 8px 12px;
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: background-color 0.3s ease;
    }

    .btn-edit {
        background-color: #007bff;
    }

    .btn-view {
        background-color: #28a745;
    }

    .btn-edit:hover,
    .btn-view:hover {
        background-color: #0056b3;
    }
    </style>
    <!-- _________________________________________________________END CSS________________________________________________________________________________ -->
    <div class="main-container">
        <div class="pd-ltr-20">

            <div class="row">
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

                <?php
    $numProjects = count($project_data['pro_name']);
    $startIdx = max(0, $numProjects - 3); // Start index for the last three projects

    for ($index = $startIdx; $index < $numProjects; $index++):
    ?>
                <!-- Adjust the column width based on your layout -->
                <div class="col-md-4" style="flex: 1; margin-bottom: 20px;">
                    <div class="project-card">
                        <div class="project-info">
                            <h2><?php echo $project_data['pro_name'][$index]; ?></h2>
                        </div>
                        <div class="project-info">
                            <?php
                if ($project_data['state'][$index] === 'قيد الإنشاء') {
                    echo '<span class="icon"><i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i></span>';
                } else {
                    echo '<span class="icon"><i class="icon-copy fa fa-check-circle-o" aria-hidden="true"></i></span>';
                }
                echo $project_data['state'][$index];
                ?>
                        </div>

                        <div class="project-info">
                            <span class="icon"><i class="icon-copy fa fa-hashtag" aria-hidden="true"></i></span>
                            <?php echo $project_data['project_code'][$index]; ?>

                        </div>
                        <div class="buttons">
                            <a class="btn btn-edit"
                                href="http://localhost/MS/deskapp/ui/tooltip/<?= $project_data['id_project'][$index] ?>">تعديل</a>
                            <!-- <a class="btn btn-view"
                            href="http://localhost/MS/deskapp/icons/fontawesome/<?= urlencode($project_data['id_project'][$index]) ?>">عرض</a> -->
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>



            <div class="row">
                <div class="card">
                    <div style="text-align: center;">

                        <div class="card_icon">☰</div> <!-- Project Icon -->
                        <div class="card_title">Projects</div>
                        <div class="card_button-container">

                            <a href="http://localhost/MS/deskapp/ui/cards" class="card_button">New Project</a>

                            <a href="http://localhost/MS/deskapp/ui/sweetAlert" class="card_button">All Projects</a>
                        </div>
                        <div class="card_footer">
                            Number of projects: <?php echo $projectsCount; ?>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div style="text-align: center;">
                        <div class="card_icon">👤</div> <!-- User Icon -->
                        <div class="card_title">Users</div>
                        <div class="card_button-container">
                            <a href="http://localhost/MS/deskapp/register" class="card_button">Add User</a>
                            <a href="http://localhost/MS/deskapp/ui/buttons" class="card_button">View All Users</a>
                        </div>

                        <div class="card_footer">
                            Number of users: <?php echo $userCount; ?>
                            <!-- Display the number of users here -->
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div style="text-align: center;">
                        <div class="card_icon">📊</div> <!-- Statistics Icon -->
                        <div class="card_title">Statistics</div>
                        <div class="card_center-button">
                            <!-- Centering the button in the card -->
                            <a href="http://localhost/MS/deskapp/charts/apexcharts" class="card_button">View Stats</a>
                        </div>
                    </div>

                    <!-- 
            <div class="card_footer">
                Stats data: <span id="statsData">0</span>
            </div>
            -->
                </div>


            </div>
            <!-- footer -->
            <?php echo view('deskapp/includes/_footer'); ?>
        </div>
    </div>
    <!-- js -->
    <script src="http://localhost/MS/assets/vendors/scripts/core.js"></script>
    <script src="http://localhost/MS/assets/vendors/scripts/script.min.js"></script>
    <script src="http://localhost/MS/assets/vendors/scripts/process.js"></script>
    <script src="http://localhost/MS/assets/vendors/scripts/layout-settings.js"></script>
    <script src="http://localhost/MS/assets/src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="http://localhost/MS/assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/MS/assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="http://localhost/MS/assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="http://localhost/MS/assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="http://localhost/MS/assets/vendors/scripts/dashboard.js"></script>

    <svg id="SvgjsSvg1230" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1231"></defs>
        <polyline id="SvgjsPolyline1232" points="0,0"></polyline>
        <path id="SvgjsPath1233" d="M0 0 "></path>
    </svg>
    <grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
    <div class="abineContentPanel"
        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent !important; margin: 0px !important; padding: 0px !important; display: none; opacity: 1 !important; z-index: 2147483647 !important; position: absolute !important; top: 20px !important; right: 20px !important; overflow: hidden !important; border-width: 0px !important; visibility: visible !important;">
        <iframe class="abineContentFrame" width="310px" allowtransparency="true" frameborder="0" height="0px"
            scrolling="no"
            src="chrome-extension://caljgklbbfbcjjanaijlacgncafpegll/html/inlineForm.html?abine50719337doNotRemove"
            id="abine50719337doNotRemove" position="undefined"
            style="display:block !important;position:relative !important;background:transparent !important;border-width:0px !important;left:0px !important;top:0px !important;visibility:visible !important;opacity:1 !important;filter:alpha(opacity:100) !important;margin:0 !important;padding:0 !important;height:0px !important;width:310px"></iframe>
    </div><svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg><svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg><svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg><svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg>


    <svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg><svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg><svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg><svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg><svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg><svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg><svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg><svg id="SvgjsSvg1109" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1110"></defs>
        <polyline id="SvgjsPolyline1111" points="0,0"></polyline>
        <path id="SvgjsPath1112" d="M0 0 "></path>
    </svg>


    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg><svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
</body>

</html>