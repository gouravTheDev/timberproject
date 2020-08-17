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
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
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
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Add New Season Input</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- <form class="user" method="post" action="sav_files/sav_seasoning_input.php" style="clear: both;"> -->
            <div class="col-lg-12">
            <div class="">
             
                <div class="form-group row">
                    <!-- <h3 class="text-center col-lg-12">Customer Details</h3> -->
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <form class="user" method="post" id="seasnoing_chamber1_form" name="seasnoing_chamber1_form" style="clear: both;">
                        <!-- Chamber 1 -->                        
                        <?php 
                          $sql = "Select batch_no,batch_id from ta_season_batch_nos where status = 1 and chamber = 'chamber1'";
                          $resp = $conn->query($sql);

                          if($resp->num_rows >= 1) {
                            $row=mysqli_fetch_row($resp);
                            $batch_no = $row[0];
                          } else {
                            $batch_no = '';
                          }
                        ?>
                        <div class="col-lg-12">
                          <div class="row">                            
                            <div class="col-lg-6">Currently Running Batch No:</div>
                            <div class="col-lg-3">
                              <h6 style="color: red;text-decoration: underline;"><?php echo $batch_no; ?></h4>
                            </div>
                            <?php if(!empty($batch_no)) { ?>
                            <div class="col-lg-3">
                              <a href="editSeasoning_input.php?id=<?php echo $row[1]; ?>" id="update_batch" class="open-homeEvents btn btn-primary">Edit</a>
                            </div>
                          <?php } ?>
                          </div>
                        </div>
                        <input type="hidden" name="chamber" class="chamber" value="<?php echo 'chamber1'; ?>">
                        <h3 class="text-center col-lg-12">Chamber 1</h3>
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <label>Type of Wood :</label>
                          </div>
                          <div class="col-sm-6">
                            <select type="text" class="form-control type_of_wood" name="type_of_wood">
                              <option value="">Select Wood</option>
                              <?php
                                $sql = "SELECT * FROM ta_wood_type where status = 1";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                              ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['wood_type']; ?></option>
                            <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <label>Batch No:</label>
                          </div>
                          <div class="col-sm-6">
                            <input type="text" name="seasonin_batch" placeholder="SIBTN1" id="seasonin_batch" class="form-control" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <label>Input Date :</label>
                          </div>
                          <div class="col-sm-6">
                            <input type="date" class="form-control form-control-user" name="input_date">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-3">
                            <label>Input Time :</label>
                          </div>
                          <div class="col-sm-6">
                            <input type="time" class="form-control form-control-user" name="input_time">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Trolly 1 (Kgs):</label>
                          </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="trolly1_weight" placeholder="1000 kgs">
                          </div>                        
                          <div class="col-sm-3 mb-3 mb-sm-0">
                            <select type="text" class="form-control" name="trolly1">
                              <option value="">Trolly</option>
                              <option value="trolly1">Trolly 1</option>
                              <option value="trolly2">Trolly 2</option>
                              <option value="trolly3">Trolly 3</option>
                              <option value="trolly4">Trolly 4</option>
                              <option value="trolly5">Trolly 5</option>
                              <option value="trolly6">Trolly 6</option>
                              <option value="trolly7">Trolly 7</option>
                              <option value="trolly8">Trolly 8</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Trolly 2 (Kgs):</label>
                          </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="trolly2_weight" placeholder="1000 kgs">
                          </div>                        
                          <div class="col-sm-3 mb-3 mb-sm-0">
                            <select type="text" class="form-control" name="trolly2">
                              <option value="">Trolly</option>
                              <option value="trolly1">Trolly 1</option>
                              <option value="trolly2">Trolly 2</option>
                              <option value="trolly3">Trolly 3</option>
                              <option value="trolly4">Trolly 4</option>
                              <option value="trolly5">Trolly 5</option>
                              <option value="trolly6">Trolly 6</option>
                              <option value="trolly7">Trolly 7</option>
                              <option value="trolly8">Trolly 8</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-3">
                            <label>Moisture Level (%):</label>
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" name="moisture_level" placeholder="07%">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-3">
                            <label>Thickness :</label>
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" name="thickness">
                          </div>
                        </div>

                        <div class="form-group row col-sm-12">
                          <div class="col-sm-3"></div>
                          <div class="col-sm-6">
                            <input type="submit" class="btn btn-primary btn-user btn-block" name="add_new_order" value="Submit">
                          </div>
                          <div class="col-sm-3"></div>
                        </div>
                      </form>
                    </div>
                    <!-- Chamber 2 -->
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <form class="user" method="post" id="seasnoing_chamber2_form" name="seasnoing_chamber1_form" style="clear: both;">
                        <!-- Chamber 2 -->
                        <?php 
                          $sql = "Select batch_no,batch_id from ta_season_batch_nos where status = 1 and chamber = 'chamber2'";
                          $resp = $conn->query($sql);

                          if($resp->num_rows >= 1) {
                            $row=mysqli_fetch_row($resp);
                            $batch_no = $row[0];
                          } else {
                            $batch_no = '';
                          }
                        ?>
                        <div class="col-lg-12">
                          <div class="row">                            
                            <div class="col-lg-6">Currently Running Batch No:</div>
                            <div class="col-lg-3">
                              <h6 style="color: red;text-decoration: underline;"><?php echo $batch_no; ?></h4>
                            </div>
                            <?php if(!empty($batch_no)) { ?>
                            <div class="col-lg-3">
                              <!--button class="open-homeEvents1 btn btn-primary" data-batch_id1 = "<?php echo $row[1]; ?>" data-batch_no1 = "<?php echo $row[0]; ?>"  data-toggle="modal" data-target="#myModal1">Edit</button-->
                              <a href="editSeasoning_input.php?id=<?php echo $row[1]; ?>" id="update_batch" class="open-homeEvents btn btn-primary">Edit</a>
                            </div>
                          <?php } ?>
                          </div>
                        </div>
                        <input type="hidden" name="chamber2" class="chamber2" value="<?php echo 'chamber2'; ?>">
                        <h3 class="text-center col-lg-12">Chamber 2</h3>
                          <div class="form-group row">
                            <div class="col-sm-3">
                              <label>Type of Wood :</label>
                            </div>
                            <div class="col-sm-6">
                              <select type="text" class="form-control type_of_wood1" name="type_of_wood">
                                <option value="">Select Wood</option>
                                <?php
                                  $sql = "SELECT * FROM ta_wood_type where status = 1";
                                  $result = $conn->query($sql);
                                  while($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['wood_type'];?></option>
                              <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-3">
                              <label>Batch No:</label>
                            </div>
                            <div class="col-sm-6">
                              <input type="text" name="seasonin_batch" placeholder="SIBTN1" id="seasonin_batch1" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-3">
                              <label>Input Date :</label>
                            </div>
                            <div class="col-sm-6">
                              <input type="date" class="form-control form-control-user" name="input_date">
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-3">
                              <label>Input Time :</label>
                            </div>
                            <div class="col-sm-6">
                              <input type="time" class="form-control form-control-user" name="input_time">
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                              <label>Trolly 1 (Kgs):</label>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="text" class="form-control form-control-user" name="trolly1_weight" placeholder="1000 kgs">
                            </div>                        
                            <div class="col-sm-3 mb-3 mb-sm-0">
                              <select type="text" class="form-control" name="trolly1">
                                <option value="">Trolly</option>
                                <option value="trolly1">Trolly 1</option>
                                <option value="trolly2">Trolly 2</option>
                                <option value="trolly3">Trolly 3</option>
                                <option value="trolly4">Trolly 4</option>
                                <option value="trolly5">Trolly 5</option>
                                <option value="trolly6">Trolly 6</option>
                                <option value="trolly7">Trolly 7</option>
                                <option value="trolly8">Trolly 8</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                              <label>Trolly 2 (Kgs):</label>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="text" class="form-control form-control-user" name="trolly2_weight" placeholder="1000 kgs">
                            </div>                        
                            <div class="col-sm-3 mb-3 mb-sm-0">
                              <select type="text" class="form-control" name="trolly2">
                                <option value="">Trolly</option>
                                <option value="trolly1">Trolly 1</option>
                                <option value="trolly2">Trolly 2</option>
                                <option value="trolly3">Trolly 3</option>
                                <option value="trolly4">Trolly 4</option>
                                <option value="trolly5">Trolly 5</option>
                                <option value="trolly6">Trolly 6</option>
                                <option value="trolly7">Trolly 7</option>
                                <option value="trolly8">Trolly 8</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-3">
                              <label>Moisture Level (%):</label>
                            </div>
                            <div class="col-sm-6">
                              <input type="text" class="form-control form-control-user" name="moisture_level" placeholder="07%">
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-3">
                              <label>Thickness :</label>
                            </div>
                            <div class="col-sm-6">
                              <input type="text" class="form-control form-control-user" name="thickness">
                            </div>
                          </div>

                          <div class="form-group row col-sm-12">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                              <input type="submit" class="btn btn-primary btn-user btn-block" name="add_new_order" value="Submit">
                            </div>
                            <div class="col-sm-3"></div>
                          </div>
                        </form>
                      </div>
                </div>                
              </div>
				    </div>
				
    				<!-- <div class="form-group row col-sm-12">
    				  <div class="col-sm-4" style="float:right">
    						<input type="submit" class="btn btn-primary btn-user btn-block" name="add_new_order" value="Add New Order">
    					</div>
    				</div> --> 	
				  <!-- </form> -->
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
      $(document).on("click", ".open-homeEvents", function () {
          var batch_id = $(this).data('batch_id');
          var batch_no = $(this).data('batch_no');
          $("#batch_id").val( batch_id );
          $("#batch_no").val( batch_no );
      });

      $(document).on("click", ".open-homeEvents1", function () {
          var batch_id1 = $(this).data('batch_id1');
          var batch_no1 = $(this).data('batch_no1');
          $("#batch_id1").val( batch_id1 );
          $("#batch_no1").val( batch_no1 );
      });
        $(function () {
            $('#seasnoing_chamber1_form').on('submit',function (e) {
                $.ajax({
                    type: 'post',
                    dataType: 'JSON',
                    url: 'sav_files/save_season_input.php',
                    data: $('#seasnoing_chamber1_form').serialize(),
                    success: function (response) {
                      // console.log(response);
                        alert(response.message);
                        $("#seasnoing_chamber1_form")[0].reset();
                    }
                });
                e.preventDefault();
            });
        });

        $(function () {
            $('#seasnoing_chamber2_form').on('submit',function (e) {
                $.ajax({
                    type: 'post',
                    // dataType: 'JSON',
                    url: 'sav_files/save_season_input.php',
                    data: $('#seasnoing_chamber2_form').serialize(),
                    success: function (response) {
                      console.log(response);
                        alert(response.message);
                        $("#seasnoing_chamber2_form")[0].reset();
                    }
                });
                e.preventDefault();
            });
        });

        $(".type_of_wood").change(function(){
          var type_of_wood = this.value;
          var chamber = $('.chamber').val();
          $.ajax({
            type: 'post',
            dataType: 'JSON',
            data: {type_of_wood:type_of_wood,chamber:chamber},
            url: 'sav_files/get_seasonin_batchNo.php',
            success: function(response) {
              console.log(response);
              $('#seasonin_batch').val(response.data);
            }
          });
        });

        $(".type_of_wood1").change(function(){
          var type_of_wood = this.value;          
          var chamber = $('.chamber2').val();
          $.ajax({
            type: 'post',
            dataType: 'JSON',
            data: {type_of_wood:type_of_wood,chamber:chamber},
            url: 'sav_files/get_seasonin_batchNo.php',
            success: function(response) {
              console.log(response);
              $('#seasonin_batch1').val(response.data);
            }
          });
        });
        // $("#update_batch").click(function(){
        //   var batch_id = $(this).data('batch_id');
        //   // alert(batch_id);
        //   $.ajax({
        //     type: 'post',
        //     data: {batch_id:batch_id},
        //     url: 'editSeasoning_input.php',
        //     success: function(response) {
        //       console.log(response);
        //     }
        //   });
        // });
    </script>
</body>

</html>
<?php } ?>