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

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
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
                        <div class="">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            </div>
                            <div class="">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;float:left">Total paper grids types added</h6>
                                        <a class="open-homeEvents btn btn-primary" style="float:right" href="add_sanding_paper.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add paper grid type</a>

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Sanding Paper Grid Name</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Sanding Paper Grid Name</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
                                                        $result = $conn->query($sql);
                                                        while($row = $result->fetch_assoc()) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row["id"]; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row["paper_grid"]; ?>
                                                            </td>
                                                            <td>
                                                                <!-- <a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary">Edit</a> -->
                                                                <button class="open-homeEvents btn btn-primary" data-id="<?php echo $row["id"]; ?>"  data-toggle="modal" data-target="#myModal">Edit</button>
                                                                <button class="delete btn btn-danger" data-id="<?php echo $row["id"]; ?>" data-table_name = "ta_sanding_grid_types">Delete</button>
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

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php 
                            // $sql = "select * from ta_wood_type ";
                        ?>
                        <form class="user" method="post" action="sav_files/sav_sand_grid.php" style="clear: both;">
                            <input type="hidden" name="id" id="grid_id" value=""/>
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="form-group row">
                                        <!-- <h3 class="text-center col-lg-12">Customer Details</h3> -->
                                        <div class="col-sm-3 mb-4 mb-sm-0">
                                            <label class="">Sanding paper grid</label>
                                        </div>
                                        <div class="col-sm-9 mb-8 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="paper_grid" placeholder="Ex: 36 Grid" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>
                        </form>
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
            $(document).on("click", ".open-homeEvents", function () {
                 var grid_id = $(this).data('id');
                 $(".modal-body #grid_id").val( grid_id );
                 // As pointed out in comments, 
                 // it is unnecessary to have to manually call the modal.
                 // $('#addBookDialog').modal('show');
            });

            $(document).ready(function(){
              $('.delete').click(function(){
                var id = $(this).data('id');                
                var table_name = $(this).data('table_name');
                var choice = confirm('Do you really want to delete this record?');
             
                   if(choice === true){
                     $.ajax({
                        url: 'sav_files/delete.php',
                        type: 'POST',
                        data: { id:id,table_name:table_name },
                        dataType: 'JSON',
                        success: function(response){
                            if(response.status == 1){
                                alert("Record deleted successfully");
                                if(table_name === 'ta_wood_type') {
                                    window.location.href = "total_wood_types.php";
                                } else if(table_name === 'ta_gradation')
                                {
                                    window.location.href = "total_gradations.php";
                                } else if(table_name === 'ta_glue')
                                {
                                    window.location.href = "total_glue.php";
                                } else {
                                    window.location.href = "total_paper_grids.php";
                                }
                            }else{
                                alert("Record not deleted");
                                if(table_name === 'ta_wood_type') {
                                    window.location.href = "total_wood_types.php";
                                } else if(table_name === 'ta_gradation')
                                {
                                    window.location.href = "total_gradations.php";
                                } else if(table_name === 'ta_glue')
                                {
                                    window.location.href = "total_glue.php";
                                } else {
                                    window.location.href = "total_paper_grids.php";
                                }
                            }
                        }
                     });
                   }
              });
            });
        </script>

    </body>

    </html>
    <?php } ?>