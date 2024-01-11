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
                                <h4>Statistics</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">الإحصائيات</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">إحصاءيات المشاريع</li>
                                </ol>
                            </nav>
                        </div>
                        
                    </div>
                </div>
                <div class="bg-white pd-20 card-box mb-30">
				<canvas id="projectBarChart" width="1000" height="500"
                        style="margin: 20px auto; display: block;">
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
                    var projectColors = ['#F0E68C', '#D3D3D3'];

                    var projectBarChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: projectNames,
                            datasets: [{
                                    label: 'قيد الإنشاء',
                                    data: projectStates.map(state => state === 1 ? 1 : 0),
                                    backgroundColor: projectColors[0],
                                },
                                {
                                    label: 'منتهي',
                                    data: projectStates.map(state => state === 2 ? 1 : 0),
                                    backgroundColor: projectColors[1],
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
    <script src="<?php echo base_url(); ?>/assets/src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/apexcharts-setting.js"></script>
</body>

</html>