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

<body class="header-white sidebar-dark active">
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
                                <h4>Users</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">المستخدمين</li>
                                    <li class="breadcrumb-item active" aria-current="page">جدول كل المستخدمين</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Simple Datatable start -->

                <div class="card-box mb-30">
                    <div class="pd-20 d-flex align-items-center justify-content-between">
                        <h4 class="text-blue h4">Users table</h4>
                        <a class="btn btn-primary" href="<?php echo base_url('deskapp/register'); ?>">إضافة مستخدم جديد</a>
                    </div>

                    <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline "
                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr role="row">
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1"
                                    aria-label="Name">الإسم الثلاثي</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="department: activate to sort column ascending">القسم
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Employee_No: activate to sort column ascending">رقم الموظف
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Email Date: activate to sort column ascending">البريد الإلكتروني</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Job Type Date: activate to sort column ascending">المسمى الوطيفي
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Rules Date: activate to sort column ascending">الصلاحية</th>
                                <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Action">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['department'] ?></td>
                                <td><?= $user['employee_no'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['job_t'] ?></td>
                                <td><?= $user['rules'] ?></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item"
                                                href="http://localhost/MS/deskapp/ui/edit/<?= $user['id_mem'] ?>"><i
                                                    class="dw dw-edit2"></i> تعديل</a>
                                            <a class="dropdown-item delete-user"
                                                href="http://localhost/MS/deskapp/ui/delete/<?= $user['id_mem'] ?>"><i
                                                    class="dw dw-delete-3"></i> حذف</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Export Datatable End -->
        </div>

        <script>
        $(document).ready(function() {
            $('.delete-user').on('click', function(e) {
                e.preventDefault();
                var userId = $(this).data('user-id');
                var rowElement = $(this).closest('tr');

                $.ajax({
                    type: 'POST',
                    url: 'Deskapp/Ui/deleteUser', // Updated URL to point to the deleteUser method in the Ui controller
                    data: {
                        user_id: userId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Remove the row from the table on successful deletion
                            rowElement.remove();
                        } else {
                            // Handle deletion failure, show an error message, etc.
                            alert('Failed to delete the user.');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX request error, show an error message, etc.
                        alert('Error: ' + error);
                    }
                });
            });
        });
        </script>
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
</body>

</html>