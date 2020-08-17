<?php 
    session_start();
    if(empty($_SESSION['loggedin_id']))
    {
        header("Location: index.php");
    } else {

    include("db_connection.php"); 

    $sql = "SELECT tbm.*,wt.wood_type wood_type_name,tg.gradation gradation_name FROM ta_board_manufacturing tbm join ta_wood_type wt on (wt.id = tbm.type_of_wood) left join ta_gradation tg on (tg.id = tbm.gradiation)";
    $closingresp = $conn->query($sql);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Timber ERP system</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <style type="text/css">
            .nav-tabs li a {
                height: 35px;
            }
            
            .nav-tabs li {
                margin: 0 1px;
                width: 25%;
                padding: 0px !important;
            }
        </style>
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <?php include "sidebar.php"; ?>
                <!-- End of Sidebar -->
                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">
                        <!-- Topbar -->
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome Admin</span>
                                        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                        </a>
                                    </div>
                                </li>

                            </ul>

                        </nav>
                        <!-- End of Topbar -->
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h2 class="h5 mb-0 text-gray-800 text-center" style="width: 100%;">Reports</h2>

                            </div>
                            <div class="container">
                                <ul class="nav nav-tabs">
                                    <li class=" py-3 "><a data-toggle="tab" href="#closing_stock" class="active">Closing Stock</a></li>
                                    <li class="py-3 "><a data-toggle="tab" href="#consumtion_stock">Consumtion Stock</a></li>
                                </ul>
                                <div class="tab-content" >
                                    <div id="closing_stock" class="tab-pane fade show in active" style="background: white;">
                                        <div class="table-responsive">
                                            <table class="table table-bordered requestTable" id="" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Type</th>
                                                        <th>Wood</th>
                                                        <th>Gradiation</th>
                                                        <th>Width</th>
                                                        <th>Length</th>
                                                        <th>Width</th>
                                                        <th>Thickness</th>
                                                        <th>No. of Pieces</th>
                                                        <th>Sqm</th>
                                                        <th>Sqft</th>
                                                        <th>Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $sno = 1;
                                                    while ($closingrows = $closingresp->fetch_array()) {
                                                    // echo "<pre>";print_r($closingrows);die;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sno++;?></td>
                                                        <td><?php //echo $closingrows['wood_type_name']; ?></td>
                                                        <td><?php echo $closingrows['wood_type_name']; ?></td>
                                                        <td><?php echo $closingrows['gradation_name']; ?></td>
                                                        <td><?php echo $closingrows['width']; ?></td>
                                                        <td><?php echo $closingrows['length'];?></td>
                                                        <td><?php echo $closingrows['widthg'];?></td>
                                                        <td><?php echo $closingrows['thickness']; ?></td>
                                                        <td><?php echo $closingrows['no_of_pieces']; ?></td>
                                                        <td><?php echo $closingrows['sqm']; ?></td>
                                                        <td><?php echo $closingrows['sqft']; ?></td>
                                                        <td><?php //echo $closingrows['thickness']; ?></td>

                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div id="consumtion_stock" class="tab-pane fade in show" style="background: white;">
                                        <div class="table-responsive">
                                            <table class="table table-bordered requestTable" id="" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Type</th>
                                                        <th>Wood</th>
                                                        <th>Gradiation</th>
                                                        <th>Width</th>
                                                        <th>Length</th>
                                                        <th>Width</th>
                                                        <th>Thickness</th>
                                                        <th>Opening Stock</th>
                                                        <th>Material In</th>
                                                        <th>Material Out</th>
                                                        <th>Closing Stock</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $sno = 1;
                                                    //while ($packingrows = $packresp->fetch_array()) {
                                                    // echo "<pre>";print_r($packingrows);
                                                    ?>
                                                        <tr>
                                                            <td><?php //echo $sno++;?></td>
                                                            <td><?php //echo $packingrows['packing_type']; ?></td>
                                                            <td><?php //echo $packingrows['brand']; ?></td>
                                                            <td><?php //echo $packingrows['no_roels']; ?></td>
                                                            <td><?php //echo $packingrows['weight'];?></td>
                                                            <td><?php ?></td>
                                                            <td><?php ?></td>
                                                            <td><?php ?></td>
                                                            <td><?php ?></td>
                                                            <td><?php ?></td>
                                                            <td><?php ?></td>
                                                            <td><?php ?></td>
                                                        </tr>
                                                    <?php //} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <?php include "footer.php"; ?>
                        <!-- End of Footer -->
                </div>
                <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="sav_files/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <!--script src="vendor/jquery/jquery.min.js"></script-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
    </body>

    </html>
    <?php } ?>