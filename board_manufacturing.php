<?php 
  session_start();
  if(empty($_SESSION['loggedin_id']))
  {
    header("Location: index.php");
  } else {
    
  include("db_connection.php"); 
  // $sql = "SELECT * FROM ta_board_manufacturing";
  $sql = "SELECT llm.*,wt.id wood_id,wt.wood_type,sbn.batch_id,sbn.batch_no season_batch_no FROM ta_ll_manufacturing llm join ta_wood_type wt on (wt.id = llm.type_of_wood) join ta_season_batch_nos sbn on (sbn.batch_id = llm.batch_no) where llm.status = 1";
  $resp = $conn->query($sql);
  // print_r($resp);die;
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
  <style>
    [contenteditable="true"]
    {
    border-style: solid;
        border-width: 2px;
        background-color: #fff;

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
  
 

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Board Manufacturing</h6>
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0">
                    <!-- <input type="date" class="form-control form-control-user text-center" name="board_date"> -->
                  </div>
            <div class="card-body">
              
              <div class="table-responsive">
              	<!-- Board Manufacturing Table starts  -->
        				<div class="table-responsive">
        					<table class="table table-bordered requestTable" id="dataTable" width="100%" cellspacing="0">
        						<thead>
        							<tr>
                        <th></th>
        								<th>S.No</th>
        								<th>Wood</th>
                        <th>Batch No</th>
        								<th>Length</th>
        								<th>Width</th>
        								<th>Thickness</th>
                        <th>Total Pieces</th>
        								<th>Remaining Pieces</th>
        								<th>Consumed</th>
        							</tr>
        						</thead>
        						<tfoot>
        							<tr>
                        <th></th>
        								<th>S.No</th>
        								<th>Wood</th>
                        <th>Batch No</th>
        								<th>Length</th>
        								<th>Width</th>
        								<th>Thickness</th>
        								<th>Total Pieces</th>
                        <th>Remaining Pieces</th>
        								<th>Consumed</th>
        							</tr>
        						</tfoot>
        						<tbody>
                      <?php 
                      $sno = 1;
                        while ($rows = mysqli_fetch_assoc($resp)) {
                          // print_r($rows);die;
                      ?>
        							<tr>
                        <th><input type="radio" name="boardRadio" value="<?php echo $rows['llm_id']; ?>" id="season_out_radio"></th>
        								<th><?php echo $sno++;?></th>
        								<th><?php echo $rows['wood_type']; ?></th>
                        <th><?php echo $rows['season_batch_no']?></th>
        								<th><?php echo $rows['length'].' m';?></th>
        								<th><?php echo $rows['width'].' mm';?></th>
        								<th><?php echo $rows['thickness'].' mm';?></th>
        								<th><?php echo $rows['pieces']; ?></th>
                        <th><?php if(!empty($rows['consumed'])) { echo $rows['pieces'] - $rows['consumed']; } else { echo $rows['pieces']; } ?></th>
        								<th class="txt"><?php echo $rows['consumed']; ?>  &nbsp;
                          <!-- <a class="btn btn-primary btn-sm consumedEdit" href="#" data-toggle="modal" data-target="#consumedModal" data-llm_id="<?php echo $rows['llm_id']; ?>" data-consumed="<?php echo $rows['consumed']; ?>">
                            <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>Edit
                          </a> -->
                        </th>
        							</tr>
                    <?php } ?>
        						</tbody>
        					</table>
        				</div>
            	<!-- Board Manufacturing Table ends  -->
            	<hr>
                <form class="user" method="post" id="board_manu" style="clear: both;display:none;">
                  <input type="hidden" name="prodution_type" value="board_manu">
                  <input type="hidden" name="llm_id" id="llm_idconsumed">
                    <div class="col-lg-12">
                        <div class="form-group row">
                             <h5 class="text-center col-lg-12">Board Manufacturing</h5><br>
                            <br>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Date :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control form-control-user" name="bm_date" id="bm_date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Type of Wood :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control type_of_wood" name="type_of_wood" id="type_of_wood" readonly>
                                            <option value="">Select Type of Wood</option>
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
                                        <label>Batch No :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="bm_batch_no" class="form-control" id="bm_batch_no" placeholder="BMBATN1" id="bm_batch_no" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Gradiation :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <select type="text" class="form-control" name="gradiation" id="gradiation">
                                        <option value="">Select Gradiation</option>
                                        <?php
                                            $sql = "SELECT * FROM ta_gradation where status = 1";
                                            $result = $conn->query($sql);
                                            while($row = $result->fetch_assoc()) {
                                          ?>
                                          <option value="<?php echo $row['id'];?>"><?php echo $row['gradation'];?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Width (mm):</label>
                                    </div>
                                    <div class="col-sm-6">
                                      <?php 
                                        $query = "SELECT llm.*,wt.id wood_id,wt.wood_type,sbn.batch_id,sbn.batch_no season_batch_no FROM ta_ll_manufacturing llm join ta_wood_type wt on (wt.id = llm.type_of_wood) join ta_season_batch_nos sbn on (sbn.batch_id = llm.batch_no) where llm.status = 1 order by llm.llm_id ASC limit 1";
                                          $res = $conn->query($query);
                                          $rows= $res->fetch_assoc();
                                          $llm_width = $rows['width'];
                                      ?>
                                      <input type="text" name="board_width" class="form-control form-control-user" placeholder="75mm" id="board_width" value="<?php //echo $llm_width; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Length (mm):</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="board_length" class="form-control form-control-user" placeholder="2440mm" id="board_length" onkeyup="sqm_calc();">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Width (G) (mm):</label>
                                    </div>
                                    <div class="col-sm-6">
                                      <input type="text" name="board_widthg" class="form-control form-control-user" placeholder="1200mm" id="board_widthg" onkeyup="sqm_calc();">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Thickness :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="thickness" class="form-control form-control-user" placeholder="17mm" id="thickness">
                                    </div>
                                </div>                        

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>No. of Boards :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="pieces" class="form-control form-control-user" placeholder="12 Pieces" id="pieces" onkeyup="sqm_calc();">
                                    </div>
                                </div>                        

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Sqm :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="sqm" id="sqm" class="form-control form-control-user" placeholder="35.72" readonly>
                                    </div>
                                    <div class="col-sm-3"><p style="font-size: 10px;">Length * Width * No.of Pieces, Divide by 10,00,000 = SQM</p></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Sqft :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="sqft" id="sqft" class="form-control form-control-user" placeholder="389.48" readonly>
                                    </div>
                                    <div class="col-sm-3"><p style="font-size: 10px;">(Sqm * 10.764 = Sqft)</p></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Consumed :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="consumed_qty" id="consumed_qty" class="form-control form-control-user" placeholder="700">
                                    </div>
                                    <!-- <div class="col-sm-3"><p style="font-size: 10px;">(Sqm * 10.764 = Sqft)</p></div> -->
                                </div>

                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <hr>
                        <div class="form-group row" >
                             <h3 class="text-center col-lg-12">Glue Consumed</h3>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <table class="form-table" id="customFieldsbm">
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
                                            <option value="<?php echo $row['id'];?>" <?php if($row['glue_type'] == 'D4 Regular') { echo "selected";} ?>><?php echo $row['glue_type'];?></option>
                                          <?php } ?>
                                      </select>
                                    </td>

                                    <th scope="row">
                                      <label>Quantity :</label>
                                    </th>
                                    <td>
                                      <input type="text" name="glow_quantity[]" class="form-control form-control-type" placeholder="07">
                                    </td>

                                    <th scope="row">
                                      <label>UOM (Kgs): </label>
                                    </th>
                                    <td>
                                      <input type="text" name="uom[]" class="form-control form-control-type" placeholder="Kgs">
                                      
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
                                            ?>
                                            <option value="<?php echo $row['id'];?>" <?php if($row['glue_type'] == 'Hardener') { echo "selected";} ?>><?php echo $row['glue_type'];?></option>
                                          <?php } ?>
                                      </select>
                                    </td>

                                    <th scope="row">
                                      <label>Quantity :</label>
                                    </th>
                                    <td>
                                      <input type="text" name="glow_quantity[]" class="form-control form-control-type" placeholder="07">
                                    </td>

                                    <th scope="row">
                                      <label>UOM (Kgs): </label>
                                    </th>
                                    <td>
                                      <input type="text" name="uom[]" class="form-control form-control-type" placeholder="Kgs">
                                      
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
                                            ?>
                                            <option value="<?php echo $row['id'];?>" ><?php echo $row['glue_type'];?></option>
                                          <?php } ?>
                                      </select>
                                    </td>

                                    <th scope="row">
                                      <label>Quantity :</label>
                                    </th>
                                    <td>
                                      <input type="text" name="glow_quantity[]" class="form-control form-control-type" placeholder="07">
                                    </td>

                                    <th scope="row">
                                      <label>UOM (Kgs): </label>
                                    </th>
                                    <td>
                                      <input type="text" name="uom[]" class="form-control form-control-type" placeholder="Kgs">
                                      
                                    </td>
                                    <td>
                                      <a href="javascript:void(0);" class="addCF btn btn-primary btn-sm">Add</a>
                                    </td>
                                  </tr>
                                </table>

                                <!-- <div class="form-group row" id="textboxDiv">
                                    <div class="col-sm-2">
                                        <label>Glue Type :</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="glow_type[]">
                                            <option value="">Glue Type</option>
                                            <?php
                                                $sql = "SELECT * FROM ta_glue where status = 1";
                                                $result = $conn->query($sql);
                                                while($row = $result->fetch_assoc()) {
                                              ?>
                                              <option value="<?php echo $row['id'];?>"><?php echo $row['glue_type'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Quantity :</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="glow_quantity[]" class="form-control form-control-type" placeholder="07">
                                    </div>
                                    <div class="col-sm-1">
                                        <label>UOM :</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="uom[]" class="form-control form-control-type" placeholder="Kg">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-lg-12">
                                    <div class="col-lg-4 col-xs-6" style="float: right;margin-bottom: 15px;text-align: right;">
                                      <div class="small-box bg-green">
                                        <a class="small-box-footer" id="Add" style="color: #4e73df; cursor: pointer;">Add More <i class="fas fa-fw fa-plus-circle"></i></a>
                                      </div>
                                    </div>
                                  </div>  
                                </div> -->
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4" style="float:center">
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Submit">
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
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

  <div class="modal fade" id="consumedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update consumed quantity</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="sav_files/udateConsumed.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="llm_id" id="llm_id">
            <div class="form-group row">
              <div class="col-sm-6">
                <label>Consumed Quantity :</label>
              </div>
              <div class="col-sm-6">
                <input type="text" name="consumed_qty" placeholder="777" id="consumed_qty" class="form-control consumed_qty" required >
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> 
            <input type="submit" class="btn btn-primary" style="color: white;cursor: pointer;" value="Update">
          </div>
        </form>
      </div>
    </div>
  </div>

   <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script type="text/javascript">
    
  </script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script type="text/javascript">

    $(document).ready(function () {
            $("input[name=boardRadio]:radio").change(function () {
                var id = this.value;
                alert(id);
                $.ajax({
                    type: 'post',
                    url: 'sav_files/get_llm_details.php',
                    data: {id:id},
                    dataType: 'JSON',
                    success: function (response) {
                        console.log(response);
                      $('#llm_idconsumed').val(response.data['llm_id']);
                      $('#bm_date').val(response.data['llm_date']);
                      $('#type_of_wood').val(response.data['type_of_wood']);
                      // $('#long_batch_no').val(response.data['batch_no']);
                      $('#long_batch_id').val(response.data['seasonout_batch']);
                      $('#board_length').val(response.data['length']);
                      $('#board_width').val(response.data['width']);
                      $('#thickness').val(response.data['thickness']);
                      $('#pieces').val(response.data['pieces']);
                      // $('#cbm').val(response.data['cbm']);
                      // $('#cft').val(response.data['cft']);
                      $('#board_manu').show();
                        console.log(response.data['seasonout_id']);
                        // location.reload();
                    }
                });
            });
        });

  $('.consumedEdit').click(function(){
    var llm_id = $(this).data('llm_id');
    var consumed = $(this).data('consumed');
    $('#consumed_qty').val(consumed);
    $('#llm_id').val(llm_id);
  });
    $(document).ready(function(){
          $(".addCF").click(function(){
            $("#customFieldsbm").append('<tr valign="top" style="padding: 5px;"><th scope="row"><label>Glue Type :</label></th><td><select class="form-control" name="glow_type[]"><option value="">Glue Type</option><?php
              $sql = "SELECT * FROM ta_glue where status = 1";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['id'];?>"><?php echo $row['glue_type'];?></option><?php } ?>
            </select></td><th scope="row"><label>Quantity :</label></th><td><input type="text" name="glow_quantity[]" class="form-control form-control-type" placeholder="07"></td><th scope="row"><label>UOM (Kgs): </label></th><td><input type="text" name="uom[]" class="form-control form-control-type" placeholder="Kgs"></td><td>&nbsp; <a href="javascript:void(0);" class="remCF btn btn-primary btn-sm">Remove</a></td></tr>');
          });
          $("#customFieldsbm").on('click','.remCF',function(){
              $(this).parent().parent().remove();
          });
        });

    function sqm_calc() {
        var board_widthg = document.getElementById('board_widthg').value;
        var board_length = document.getElementById('board_length').value;
        var pieces = document.getElementById('pieces').value;
        var result = parseFloat(board_widthg) * parseFloat(board_length) * parseFloat(pieces);
        var sqm = parseFloat(result) / 1000000;
        var sqft = parseFloat(sqm) * parseFloat(10.764);
        if (!isNaN(result)) {
            document.getElementById('sqm').value = sqm.toFixed(2);
            document.getElementById('sqft').value = sqft.toFixed(2);
        }
    }
    $(function () {
      $('#board_manu').hide();
            $('#board_manu').on('submit',function (e) {
                $.ajax({
                    type: 'post',
                    dataType: 'JSON',
                    url: 'sav_files/sav_board_manu.php',
                    data: $('#board_manu').serialize(),
                    success: function (response) {
                        alert(response.message);
                        // $("#board_manu")[0].reset();
                        location.reload();
                    }
                });
                e.preventDefault();
            });
        });

    $(".type_of_wood").change(function(){
          var type_of_wood = this.value;
          $.ajax({
            type: 'post',
            dataType: 'JSON',
            data: {type_of_wood:type_of_wood},
            url: 'sav_files/get_board_batchNo.php',
            success: function(response) {
              console.log(response);
              $('#bm_batch_no').val(response.data);
            }
          });
        });

    $(document).ready(function () {
        $(".requestTable tr th").click(function () {
            // alert("Make This td editable :" + jQuery(this).closest('tr').find('.txt').text());
          $(".txt").attr("contenteditable",true);
        });
    });

    $(function() {
        $('#Add').click(function(){
          var newDiv = $('<div class="col-sm-2"><label>Glue Type :</label></div><div class="col-sm-3"><select class="form-control" name="glow_type[]"><option value="">Glue Type</option><?php
                                                $sql = "SELECT * FROM ta_glue where status = 1";
                                                $result = $conn->query($sql);
                                                while($row = $result->fetch_assoc()) {
                                              ?>
                                              <option value="<?php echo $row['id'];?>"><?php echo $row['glue_type'];?></option><?php } ?></select></div><div class="col-sm-2"><label>Quantity :</label></div><div class="col-sm-2"><input type="text" name="glow_quantity[]" class="form-control form-control-type" placeholder="07"></div><div class="col-sm-1"><label>UOM :</label></div><div class="col-sm-2"><input type="text" name="uom[]" class="form-control form-control-type" placeholder="Kg"></div><br>');
          //newDiv.style.background = "#000";
          $('#textboxDiv').append(newDiv);
        });
      });
  </script>
</body>

</html>
<?php } ?>
