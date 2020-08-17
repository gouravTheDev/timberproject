  <?php 
 session_start();
  if(empty($_SESSION['loggedin_id']))
  {
      header("location: index.php");
     // header("Location: index.php"); exit();
    } 
    include("db_connection.php");
    // $sql = "SELECT * FROM ta_board_manufacturing";
    $sql = "SELECT tso.*,twt.wood_type,twt.id wood_id,sbn.batch_no FROM ta_seasoning_output tso join ta_wood_type twt on (twt.id = tso.type_of_wood) join ta_season_batch_nos sbn on (tso.seasonout_batch = sbn.batch_id and sbn.status = 1)";
    $resp = $conn->query($sql);
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
    <style type="text/css">
      #customFields th, td
      {
        padding: 5px;
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

                  <!-- Long Length Manufacturing Table starts  -->
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table-responsive">
                    <table class="table table-bordered requestTable" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>S.No</th>
                          <th>Wood</th>
                          <th>Batch No</th>
                          <th>Input Date</th>
                          <th>Trolly 1</th>
                          <th>Trolly 2</th>
                          <th>Moisture Level</th>
                          <th>Thickness </th>
                          <th>Weight</th>
                          <th>Total Weight</th>
                          <th>CFT</th>
                          <th>Per CFT Weight</th>
                          <th>Total CFT</th>
                          <th>Total Consumed CFT</th>
                          <th>Total Pieces</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>S.No</th>
                          <th>Wood</th>
                          <th>Batch No</th>
                          <th>Input Date</th>
                          <th>Trolly 1</th>
                          <th>Trolly 2</th>
                          <th>Moisture Level</th>
                          <th>Thickness </th>
                          <th>Weight</th>
                          <th>Total Weight</th>
                          <th>CFT</th>
                          <th>Per CFT Weight</th>
                          <th>Total CFT</th>
                          <th>Total Consumed CFT</th>
                          <th>Total Pieces</th>
                          <th>Actions</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php 
                        $sno = 1;
                          while ($rows = mysqli_fetch_assoc($resp)) {
                            // echo "<pre>";print_r($rows);die;
                            $totlPieces = "select sum(pieces) as total_pieces, sum(cft) as total_cft from ta_ll_manufacturing where batch_no = '".$rows['seasonout_batch']."' and type_of_wood = '".$rows['wood_id']."'";
                            $respTtoal = $conn->query($totlPieces);
                            $totalData = mysqli_fetch_assoc($respTtoal);
                            // echo "<pre>";print_r($totalData);die();
                        ?>
                        <tr>
                          <th><input type="radio" name="outputRadio" value="<?php echo $rows['seasonout_id']; ?>" id="season_out_radio"></th>
                          <th><?php echo $sno++;?></th>
                          <th><?php echo $rows['wood_type']; ?></th>
                          <th><?php echo $rows['batch_no']?></th>
                          <th><?php echo $rows['output_date'];?></th>
                          <th><?php echo $rows['trolly1_weight'].' kgs';?></th>
                          <th><?php echo $rows['trolly2_weight'].' kgs';?></th>
                          <th><?php echo $rows['moisture_level'].' %'; ?></th>
                          <th><?php echo $rows['thickness']?></th>
                          <th><?php echo $rows['weight']?></th>                          
                          <th><?php echo $rows['total_weight']?></th>
                          <th><?php echo $rows['cft']?></th>
                          <th><?php echo $rows['per_cft_weight']?></th>
                          <th><?php echo $rows['total_cft']?></th>
                          <th><?php echo $totalData['total_cft']?></th>
                          <th><?php echo $totalData['total_pieces']?></th>
                          <th><button class="btn btn-danger btn-sm" onclick="close_batch_no('<?php echo $rows['seasonout_batch']; ?>')" id="close_batch_no">Close Batch</button></th>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                <!-- Long Length Manufacturing Table ends  -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Long Length Manufacturing</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <form class="user" method="post" id="long_manu" style="clear: both;" enctype="multipart/form-data">
                    <input type="hidden" name="prodution_type" value="long_length">
                      <div class="col-lg-12">
                          <div class="form-group row">
                              <!-- <h3 class="text-center col-lg-12">Customer Details</h3>-->
                              <br>
                              <div class="col-sm-2"></div>
                              <div class="col-sm-8">
                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>Date :</label>
                                      </div>
                                      <div class="col-sm-6">
                                          <input type="date" class="form-control form-control-user" name="llm_date" id="llm_date">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>Type of Wood :</label>
                                      </div>
                                      <div class="col-sm-6">
                                        <input class="form-control type_of_wood" type="text" name="type_of_woodname" readonly id="wood_type_name">
                                        <input type="hidden" name="type_of_wood" id="type_of_wood">
                                          <!-- <select class="form-control type_of_wood" name="type_of_wood" id="type_of_wood">
                                              <option value="">Type of Wood</option>
                                              <?php
                                                  $sql = "SELECT * FROM ta_wood_type where status = 1";
                                                  $result = $conn->query($sql);
                                                  while($row = $result->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['wood_type'];?></option>
                                              <?php } ?>
                                          </select> -->
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>Batch No :</label>
                                      </div>
                                      <div class="col-sm-6">
                                          <input type="text" name="long_batch_no1" class="form-control" placeholder="LBATN1" id="long_batch_no" readonly>
                                          <input type="hidden" name="long_batch_no" class="form-control" id="long_batch_id" placeholder="LBATN1" readonly>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>Length (mm):</label>
                                      </div>
                                      <div class="col-sm-6">
                                          <input type="text" id="length" name="length" class="form-control form-control-user" placeholder="2700mm" onkeyup="cbm_calc();">
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>Width (mm):</label>
                                      </div>
                                      <div class="col-sm-6">
                                          <input type="text" id="width" name="width" class="form-control form-control-user" placeholder="77mm" onkeyup="cbm_calc();">
                                      </div>
                                  </div>                        

                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>Thickness (mm):</label>
                                      </div>
                                      <div class="col-sm-6">
                                          <input type="text" id="thickness" name="thickness" class="form-control form-control-user" placeholder="17mm" onkeyup="cbm_calc();">
                                      </div>
                                  </div>                        

                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>No. of Pieces :</label>
                                      </div>
                                      <div class="col-sm-6">
                                          <input type="text" id="pieces" name="pieces" class="form-control form-control-user" placeholder="200" onkeyup="cbm_calc();">
                                      </div>
                                  </div>                        

                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>CBM :</label>
                                      </div>
                                      <div class="col-sm-6">
                                          <input type="text" id="cbm" name="cbm" class="form-control form-control-user" placeholder="0.765" readonly>
                                      </div>
                                      <div class="col-sm-3"><p style="font-size: 10px;">Length*Width*Thickness*No.of Pieces, Divide by 1000000000<br>2700*77*17*200 divided by 1000000000</p></div>
                                  </div>

                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>CFT :</label>
                                      </div>
                                      <div class="col-sm-6">
                                          <input type="text" id="cft" name="cft" class="form-control form-control-user" placeholder="24.962" readonly>
                                      </div>
                                      <div class="col-sm-3"><p style="font-size: 10px;">Automated value<br>CBM * 35.315</p></div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>Thikness of the board :</label>
                                      </div>
                                      <div class="col-sm-6">
                                          <input type="text" id="thickness_of_the_board" name="thickness_of_the_board" class="form-control form-control-user" placeholder="07">
                                      </div>
                                  </div>
                                  
                              </div>
                              <div class="col-sm-2"></div>
                          </div>
                          <hr>
                          <div class="form-group row">
                               <h3 class="text-center col-lg-12">Glue Consumed</h3>
                              <div class="col-sm-1"></div>
                              <div class="col-sm-10">

                                <table class="form-table" id="customFields">
                                  <tr valign="top" style="padding: 5px;">
                                    <th scope="row">
                                      <label>Glue Type :</label>
                                    </th>
                                    <td>
                                      <select class="form-control" name="glow_type[]">
                                          <option value="">Glue Type</option>
                                          <?php
                                              $sql = "SELECT * FROM ta_glue where status = 1";
                                              $result = $conn->query($sql);
                                              while($row = $result->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['id'];?>" <?php if($row['glue_type'] == 'D3 Regular') { echo "selected";} ?>><?php echo $row['glue_type'];?></option>
                                          <?php } ?>
                                      </select>
                                    </td>

                                    <th scope="row">
                                      <label>Quantity :</label>
                                    </th>
                                    <td>
                                      <input type="text" name="glow_quantity[]" class="form-control form-control-type" placeholder="1.25">
                                    </td>

                                    <th scope="row">
                                      <label>UOM (Kgs): </label>
                                    </th>
                                    <td>
                                      <input type="text" name="uom[]" class="form-control form-control-type" placeholder="Kgs" value="Kgs">
                                      
                                    </td>
                                    <td>
                                      <a href="javascript:void(0);" class="addCF btn btn-primary btn-sm">Add</a>
                                    </td>
                                  </tr>

                                  <tr valign="top" style="padding: 5px;">
                                    <th scope="row">
                                      <label>Glue Type :</label>
                                    </th>
                                    <td>
                                      <select class="form-control" name="glow_type[]">
                                          <option value="">Glue Type</option>
                                          <?php
                                              $sql = "SELECT * FROM ta_glue where status = 1";
                                              $result = $conn->query($sql);
                                              while($row = $result->fetch_assoc()) {
                                                // echo "<pre>";print_r($row);die;
                                            ?>
                                            <option value="<?php echo $row['id'];?>" <?php if($row['glue_type'] == 'D3 Regular') { echo "selected";} ?>><?php echo $row['glue_type'];?></option>
                                          <?php } ?>
                                      </select>
                                    </td>

                                    <th scope="row">
                                      <label>Quantity :</label>
                                    </th>
                                    <td>
                                      <input type="text" name="glow_quantity[]" class="form-control form-control-type" placeholder="1.25">
                                    </td>

                                    <th scope="row">
                                      <label>UOM (Kgs): </label>
                                    </th>
                                    <td>
                                      <input type="text" name="uom[]" class="form-control form-control-type" placeholder="Kgs" value="Kgs">
                                      
                                    </td>
                                    <td>
                                      <a href="javascript:void(0);" class="addCF btn btn-primary btn-sm">Add</a>
                                    </td>
                                  </tr>

                                  <tr valign="top" style="padding: 5px;">
                                    <th scope="row">
                                      <label>Glue Type :</label>
                                    </th>
                                    <td>
                                      <select class="form-control" name="glow_type[]">
                                          <option value="">Glue Type</option>
                                          <?php
                                              $sql = "SELECT * FROM ta_glue where status = 1";
                                              $result = $conn->query($sql);
                                              while($row = $result->fetch_assoc()) {
                                                // echo "<pre>";print_r($row);die;
                                            ?>
                                            <option value="<?php echo $row['id'];?>" ><?php echo $row['glue_type'];?></option>
                                          <?php } ?>
                                      </select>
                                    </td>

                                    <th scope="row">
                                      <label>Quantity :</label>
                                    </th>
                                    <td>
                                      <input type="text" name="glow_quantity[]" class="form-control form-control-type" placeholder="1.25">
                                    </td>

                                    <th scope="row">
                                      <label>UOM (Kgs): </label>
                                    </th>
                                    <td>
                                      <input type="text" name="uom[]" class="form-control form-control-type" placeholder="Kgs" value="Kgs">
                                      
                                    </td>
                                    <td>
                                      <a href="javascript:void(0);" class="addCF btn btn-primary btn-sm">Add</a>
                                    </td>
                                  </tr>
                                </table>                                 
                                  
                                  <div class="form-group row">
                                      <div class="col-sm-4"></div>
                                      <div class="col-sm-4" style="float:center">
                                          <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Submit">
                                      </div>
                                      <div class="col-sm-4"></div>
                                  </div>
                              </div>
                              <div class="col-sm-1"></div>
                          </div>
                      </div>
                      
                  </form>
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
      
      <script>

        $(document).ready(function(){

          $("#long_manu").hide();

          $(".addCF").click(function(){
            $("#customFields").append('<tr valign="top" style="padding: 5px;"><th scope="row"><label>Glue Type :</label></th><td><select class="form-control" name="glow_type[]"><option value="">Glue Type</option><?php
              $sql = "SELECT * FROM ta_glue where status = 1";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['id'];?>"><?php echo $row['glue_type'];?></option><?php } ?>
            </select></td><th scope="row"><label>Quantity :</label></th><td><input type="text" name="glow_quantity[]" class="form-control form-control-type" placeholder="07"></td><th scope="row"><label>UOM (Kgs): </label></th><td><input type="text" name="uom[]" class="form-control form-control-type" placeholder="Kgs"></td><td>&nbsp; <a href="javascript:void(0);" class="remCF btn btn-primary btn-sm">Remove</a></td></tr>');
          });
          $("#customFields").on('click','.remCF',function(){
              $(this).parent().parent().remove();
          });
        });


        $(document).ready(function () {
            $("input[name=outputRadio]:radio").change(function () {
                var id = this.value;
                $.ajax({
                    type: 'post',
                    url: 'sav_files/get_seasonout_details.php',
                    data: {id:id},
                    dataType: 'JSON',
                    success: function (response) {
                        // alert(response.message);
                      $('#wood_type_name').val(response.data['wood_type']);
                      $('#llm_date').val(response.data['output_date']);
                      $('#type_of_wood').val(response.data['type_of_wood']);
                      $('#long_batch_no').val(response.data['batch_no']);
                      $('#long_batch_id').val(response.data['seasonout_batch']);
                      $('#length').val(response.data['length']);
                      $('#width').val(response.data['width']);
                      $('#thickness').val(response.data['thickness']);
                      $('#pieces').val(response.data['pieces']);
                      $('#cbm').val(response.data['cbm']);
                      $('#cft').val(response.data['cft']);


                        console.log(response.data['seasonout_id']);
                        // location.reload();
                        $('#long_manu').show();
                    }
                });
            });

            // $("#close_batch_no").click(function() { 
            //       var batch_id = $(this).data("batch_id");
            //       alert(batch_id);
            //   }); 
        });

        function close_batch_no(batch_id)
        {
            $.ajax({
                type: 'post',
                url: 'sav_files/delete_batch.php',
                data: {batch_id:batch_id},
                dataType: 'JSON',
                success: function (response) {
                  alert(response.message);
                  console.log(response);
                  location.reload();
                }
            });
        }

        $(function () {
              $('#long_manu').on('submit',function (e) {
                  $.ajax({
                      type: 'post',
                      // dataType: 'JSON',
                      url: 'sav_files/sav_long_manu.php',
                      data: $('#long_manu').serialize(),
                      success: function (response) {
                          alert(response.message);
                          console.log(response);
                          // $("#long_manu")[0].reset();
                          location.reload();
                      }
                  });
                  e.preventDefault();
              });
          });

          function cbm_calc() {
              var length = document.getElementById('length').value;
              var width = document.getElementById('width').value;
              var thickness = document.getElementById('thickness').value;
              var pieces = document.getElementById('pieces').value;
              var divider = 1000000000;
              var cft_auto = 35.315;
              var result = (parseFloat(length) * parseFloat(width) * parseFloat(thickness) * parseFloat(pieces))/parseFloat(divider);
              var cft_auto_result = parseFloat(result) * parseFloat(cft_auto);
              if (!isNaN(result)) {
                  document.getElementById('cbm').value = result.toFixed(2);
                  
                  document.getElementById('cft').value = cft_auto_result.toFixed(2);
              }
          }

          $(".type_of_wood").change(function(){
            var type_of_wood = this.value;
            $.ajax({
              type: 'post',
              data: {type_of_wood:type_of_wood},
              url: 'sav_files/get_long_batchNo.php',
              success: function(response) {
                console.log(response);
                $('#long_batch_no').val(response.data);
              }
            });
          });

          // Add more Button Functionality
          $(function() {
            $('#Add').click(function(){
              var newDiv = $('<div class="col-sm-2"><label>Glue Type :</label></div><div class="col-sm-3"><select class="form-control" name="glow_type[]"><option value="">Glue Type</option><?php
                                                  $sql = "SELECT * FROM ta_glue where status = 1";
                                                  $result = $conn->query($sql);
                                                  while($row = $result->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['glue_type'];?></option><?php } ?></select></div><div class="col-sm-2"><label>Quantity :</label></div><div class="col-sm-2"><input type="text" name="glow_quantity[]" class="form-control form-control-type" placeholder="07"></div><div class="col-sm-1"><label>UOM (Kgs):</label></div><div class="col-sm-2"><input type="text" name="uom[]" class="form-control form-control-type" placeholder="Kg"></div></br>');
              //newDiv.style.background = "#000";
              $('#textboxDiv').append(newDiv);
            });
          });

          $('.Remove').on('click', function(){
            alert("remove");
            $(this).closest("#textboxDiv").remove();
        });
      </script>
  </body>

  </html>

