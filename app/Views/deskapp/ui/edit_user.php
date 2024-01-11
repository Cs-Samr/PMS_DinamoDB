<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Project Manegment System </title>
   
    <!-- Site favicon -->
    <link rel="sfhm-touch-icon" sizes="180x180" href="http://localhost/MS/assets/vendors/images/sfhm-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/MS/assets/vendors/images/sfhm-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/MS/assets/vendors/images/sfhm-16x16.png">

    <!-- Mobile Specific Metas  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="http://localhost/MS/assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/MS/assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/MS/assets/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
</head>

<body class="login-page">

	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="<?php echo base_url('deskapp/login'); ?>">
					<img src="<?php echo base_url(); ?>/assets/vendors/images/logo-white.png" alt="">
				</a>
			</div>
			
				
				<a class="btn btn-primary " href="javascript:history.go(-1)">Back &gt;</a>
				
			
		</div>
	</div>
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="<?php echo base_url(); ?>/assets/vendors/images/Update-cuate.png" alt="">
				</div>
				<?php if(isset($validation)):?>
                    <div class="alert alert-danger">
                    	<?= $validation->listErrors() ?></div>
                <?php endif;?>
				<div class="col-md-6 col-lg-5">
					<div class="register-box container-fluid pt-4 pb-4 bg-white box-shadow border-radius-10">
						<form method="post" enctype="multipart/form-data" action="/MS/deskapp/Ui/update" >
							<?= csrf_field() ?>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Full Name*</label>
                                <div class="col-sm-8">
                                    <input   name="name" type="text" class="form-control" value ="<?= $user['name'] ?>">
                                    <input   name="id_mem" type="hidden" class="form-control" value ="<?= $user['id_mem'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Email*</label>
                            <div class="col-sm-8">
                                <input   name="email" type="email" class="form-control" value ="<?= $user['email'] ?>">
                            </div>
                        </div>
							<div class="form-group row">
                                <label class="col-sm-4 col-form-label">Department*</label>
                                <div class="col-sm-8">
                                    <input   name="department" type="text" class="form-control" value ="<?= $user['department'] ?>">
                                </div>
                            </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Employee Number*</label>
                            <div class="col-sm-8">
                                <input   name="employee_no" type="text" class="form-control" value ="<?= $user['employee_no'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Password*</label>
                            <div class="col-sm-8">
                                <input   name="password" type="password" class="form-control"  value ="<?= $user['password'] ?>">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label">Job Title*</label>
                            <div class="col-sm-8">
                                <input   name="job_t" type="text" class="form-control"  value ="<?= $user['job_t'] ?>" >
                            </div>
                        </div>
						<form>
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label>User Type</label>
									<select  name="rules" class="selectpicker form-control" data-style="btn-outline-primary" data-size="5">
										<optgroup data-max-options="2">
											<option value=1>System Manger</option>
											<option value=2>Manger</option>
											<option value=3>Member</option>
										</optgroup>
									</select>
								</div>
							</div>
				        </form>
                        <div class="col-sm-12">
                        <div class="input-group mb-0">
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Save Changes">
                        </div>
						</form>
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
	<script src="<?php echo base_url(); ?>/assets/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendors/scripts/steps-setting.js"></script>
</body>
<!-- success Popup html Start -->
<button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered max-width-400" role="document">
		<div class="modal-content">
			<div class="modal-body text-center font-18">
				<h3 class="mb-20">Form Submitted!</h3>
				<div class="mb-30 text-center"><img src="<?php echo base_url(); ?>/assets/vendors/images/success.png"></div>
				Your account has been updated successfully. 
			</div>
			<div class="modal-footer justify-content-center">
				<a href="<?php echo base_url('deskapp/login'); ?>" class="btn btn-primary">Done</a>
				<input type="hidden" name="submit">
			</div>
		</div>
	</div>
</div>
<!-- success Popup html End -->
</html>
