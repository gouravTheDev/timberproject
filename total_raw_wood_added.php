<?php 
  session_start();
  if(empty($_SESSION['loggedin_id']))
  {
    header("location: index.php");
  } else {

  include("db_connection.php"); 
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
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-0 static-top shadow">

                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                            <!-- Topbar Search -->
                            <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                                <!-- Nav Item - Alerts -->

                                <!-- Nav Item - Messages -->

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome Admin</span>
                                        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
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
                        <div class="">

                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <!--h2 class="h5 mb-0 text-gray-800 text-center" style="width: 100%;">Add Raw Material</h2-->

                            </div>
                            <div class="">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">total raw wood added</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Recieved date</th>
                                                        <th>Name</th>
                                                        <th>Vehicle number</th>
                                                        <th>Reference</th>
                                                        <th>Wood Type</th>
                                                        <th>Length</th>
                                                        <th>width </th>
                                                        <th>thickness </th>
                                                        <th>pieces</th>
                                                        <th>cft</th>
                                                        <th>cbm</th>
                                                        <th>weight</th>
                                                        <th>price</th>
                                                        <th>value</th>
                                                        <th>gst</th>
                                                        <th>Other Charges</th>
                                                        <th>Transportation Charges</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Recieved date</th>
                                                        <th>Name</th>
                                                        <th>Vehicle number</th>
                                                        <th>Reference</th>
                                                        <th>Wood Type</th>
                                                        <th>Length</th>
                                                        <th>width </th>
                                                        <th>thickness </th>
                                                        <th>pieces</th>
                                                        <th>cft</th>
                                                        <th>cbm</th>
                                                        <th>weight</th>
                                                        <th>price</th>
                                                        <th>value</th>
                                                        <th>gst</th>
                                                        <th>Other Charges</th>
                                                        <th>Transportation Charges</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php
                                                        $sql = "SELECT trw.*,twt.id wood_id, twt.wood_type as twt_wood_type FROM ta_raw_wood trw join ta_wood_type twt on (trw.wood_type = twt.id) where trw.status = 1";
                                                        $result = $conn->query($sql);
                                                        while($row = $result->fetch_assoc()) {
                                                            // echo "<pre>";print_r($row);die;
                                                      ?>

                                                    <tr>
                                                        <td>
                                                            <?php echo $row["rw_id"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["recieved_date"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["name"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["vehicle_number"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["reference"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["twt_wood_type"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["length"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["width"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["thickness"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["pieces"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["cft"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["cbm"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["weight"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["price"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["value"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["gst"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['other_charges']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['transport_charges']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="total_raw_wood_added_edit.php?id=<?php echo $row["rw_id"]; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                            <button class="btn btn-danger btn-sm raw_wood_delete" data-rw_id = "<?php echo $row["rw_id"]; ?>">Delete</button>
                                                        </td>

                                                    </tr>

                                                    <?php
                                                        }
                                                   ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Content Row -->
                            <!-- Content Row -->
                            <!-- Content Row -->
                        </div>
                        <!-- /.container-fluid -->
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
        <script src="vendor/jquery/jquery.min.js"></script>
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
        <script type="text/javascript">
            $(".raw_wood_delete").on("click", function(){
                alert("delete00");
                var rw_id = $(this).data("rw_id");
                // alert(rw_id);   
                $.ajax({
                    // data: {rw_id: rw_id},
                    type: "post",
                    method: "JSON",
                    url: "sav_files/delete_raw_wood_material.php?id="+rw_id,
                    success: function(resp){
                        // console.log(resp);
                        var jsonResp = JSON.parse(resp);
                        
                        if(jsonResp.message == 'Deleted successfully') {
                            alert(jsonResp.message);
                            location.reload();
                        } else {
                            alert(jsonResp.message);
                        }
                        
                    }
                })
            });
        </script>
    </body>

    </html>
    <?php } ?>