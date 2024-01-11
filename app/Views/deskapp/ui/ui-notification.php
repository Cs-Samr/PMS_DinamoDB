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
								<h4>Projects Archive</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="http://localhost/MS/deskapp/dashboard/three">Dashboard Member</a></li>
									<li class="breadcrumb-item active" aria-current="page">Projects Archive</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								
								<div class="dropdown-menu dropdown-menu-right" style="">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Export Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Projects Archive Table</h4>
					</div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">اسم المشروع</th>
									<th>رمز المشروع</th>
									<th>حالة المشروع</th>
									<th>تاريخ البداية</th>
									<th>تاريخ النهاية</th>

								</tr>
							</thead>
							
							<tbody>
								
							<?php foreach ($projects as $project) : ?>
    <?php foreach ($project_data['pro_name'] as $index => $pro_name): ?>
        <?php if ($project_data['state'][$index] === 'منتهي'): ?>
            <?php if ($project['state'] === 'منتهي'): ?>
                <tr>
                    <td><?= $project['pro_name'] ?></td>
                    <td><?= $project['project_code'] ?></td>
                    <td><?= $project['state'] ?></td>
                    <td><?= $project['d_start'] ?></td>
                    <td><?= $project['d_end'] ?></td>
                    <td>
                        <!-- Additional columns or data can be added here -->
                    </td>
                </tr>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>

				
           
							</tbody>
						</table>
					</div>
				</div>
				<!-- Export Datatable End -->
			</div>
			<!-- footer -->
			<div class="footer-wrap pd-20 mb-20 card-box">© 2023 Security Forces Hospital</div>		</div>
	</div>
	<!-- js -->
	<script src="http://localhost/MS/assets/vendors/scripts/core.js"></script>
	<script src="http://localhost/MS/assets/vendors/scripts/script.min.js"></script>
	<script src="http://localhost/MS/assets/vendors/scripts/process.js"></script>
	<script src="http://localhost/MS/assets/vendors/scripts/layout-settings.js"></script>
	<script src="http://localhost/MS/assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="http://localhost/MS/assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="http://localhost/MS/assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="http://localhost/MS/assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="http://localhost/MS/assets/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="http://localhost/MS/assets/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="http://localhost/MS/assets/src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="http://localhost/MS/assets/src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="http://localhost/MS/assets/src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="http://localhost/MS/assets/src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="http://localhost/MS/assets/src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="http://localhost/MS/assets/vendors/scripts/datatable-setting.js"></script>
</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration><div class="abineContentPanel" style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent !important; margin: 0px !important; padding: 0px !important; display: none; opacity: 1 !important; z-index: 2147483647 !important; position: absolute !important; top: 20px !important; right: 20px !important; overflow: hidden !important; border-width: 0px !important; visibility: visible !important;"><iframe class="abineContentFrame" width="310px" allowtransparency="true" frameborder="0" height="0px" scrolling="no" src="chrome-extension://caljgklbbfbcjjanaijlacgncafpegll/html/inlineForm.html?abine14379266doNotRemove" id="abine14379266doNotRemove" position="undefined" style="display:block !important;position:relative !important;background:transparent !important;border-width:0px !important;left:0px !important;top:0px !important;visibility:visible !important;opacity:1 !important;filter:alpha(opacity:100) !important;margin:0 !important;padding:0 !important;height:0px !important;width:310px"></iframe></div></html>