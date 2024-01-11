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

    <!-- ____________________________________________________ -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Bar & Column Charts in Codeigniter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- ____________________________________________________ -->

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
                                <h4>Charts</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Charts</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown">
                                    January 2020
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Export List</a>
                                    <a class="dropdown-item" href="#">Policies</a>
                                    <a class="dropdown-item" href="#">View Assets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="bg-white pd-20 card-box mb-30">
                    <canvas id="projectBarChart"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <style>
                    canvas {
                        max-width: 800px;
                        margin: 20px auto;
                        display: block;
                    }
                    </style>
                    <script>
                    var ctx = document.getElementById('projectBarChart').getContext('2d');
                    var projectNames = <?php echo json_encode($projectNames); ?>;
                    var projectStates = <?php echo json_encode($projectStates); ?>;
                    var projectColors = ['#FFFACD', '#FFB6C1', '#AFEEEE', '#8FBC8F'];

                    var projectBarChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: projectNames,
                            datasets: [{
                                    label: 'المرحلة الاولى #' + <?php echo $level1Number[0]; ?>,
                                    data: projectStates.map(state => state === 1 ? 1 : 0),
                                    backgroundColor: projectColors[0],
                                },
                                {
                                    label: 'المرحلة الثانية #' + <?php echo $level2Number[0]; ?>,
                                    data: projectStates.map(state => state === 2 ? 1 : 0),
                                    backgroundColor: projectColors[1],
                                },
                                {
                                    label: 'المرحلة الثالثة #' + <?php echo $level3Number[0]; ?>,
                                    data: projectStates.map(state => state === 2 ? 1 : 0),
                                    backgroundColor: projectColors[2],
                                },
                                {
                                    label: 'المرحلة الرابعة #' + <?php echo $level4Number[0]; ?>,
                                    data: projectStates.map(state => state === 2 ? 1 : 0),
                                    backgroundColor: projectColors[3],
                                }
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1,
                                        callback: function(value, index, values) {}
                                    }
                                }
                            }
                        }
                    });
                    </script>
                </div>



            </div>

            <!-- footer -->
            <?php echo view('deskapp/includes/_footer'); ?>
        </div>
    </div>
    <!-- js -->
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/core.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/script.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/process.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/layout-settings.js"></script>
    <script src="<?php echo base_url(); ?>/assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="<?php echo base_url(); ?>/assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/highchart-setting.js"></script>
</body>

</html>
