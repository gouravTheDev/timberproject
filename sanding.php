<?php 
  session_start();
  if(empty($_SESSION['loggedin_id']))
  {
    header("Location: index.php");
  } else {
    
  include("db_connection.php"); 
  $sql = "SELECT tbm.*,wt.id wood_id,wt.wood_type, tg.gradation  FROM ta_board_manufacturing tbm join ta_gradation tg on (tg.id = tbm.gradiation) join ta_wood_type wt on (wt.id = tbm.type_of_wood)";
  $resp = $conn->query($sql);


  $sandsql = "SELECT ts.*,tsgt.id grid_id, tsgt.paper_grid FROM ta_sanding ts join ta_sanding_grid_types tsgt on (tsgt.id = ts.grid_type)";
  $sandresp = $conn->query($sandsql);  
  $sandrespnew = $conn->query($sandsql);
  // print_r($resp);die;
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
  <style>
    [contenteditable="true"]
    {
    border-style: solid;
        border-width: 2px;
        background-color: #fff;

    }

    #customFieldsASOld th, td
    {
      padding: 10px;
      width: 100px;
    }

    #customFieldsNew th, td
    {
      padding: 5px;
      /*width: 100px;*/
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
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Sanding</h6>
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
                        <th>Gradiation</th>
                        <th>Width</th>
        								<th>Length</th>
        								<th>Width</th>
        								<th>Thickness</th>
                        <th>Total Boards</th>
        								<th>Remaining Boards</th>
                        <th>Rough Quantity Consumed</th>
                        <th>Final Quantity Consumed</th>
        								<th>Quantity Consumed</th>
        							</tr>
        						</thead>
        						<tfoot>
        							<tr>
                        <th></th>
                        <th>S.No</th>
                        <th>Wood</th>
                        <th>Gradiation</th>
                        <th>Width</th>
                        <th>Length</th>
                        <th>Width</th>
                        <th>Thickness</th>
                        <th>Total Boards</th>
                        <th>Remaining Boards</th>
                        <th>Rough Quantity Consumed</th>
                        <th>Final Quantity Consumed</th>
                        <th>Quantity Consumed</th>
        							</tr>
        						</tfoot>
        						<tbody>
                      <?php 
                      $sno = 1;
                        while ($rows = mysqli_fetch_assoc($resp)) {
                          // print_r($rows);die;
                          $finalconsumed_qty = "select sum(final_qty) as finalconsumed_qty ,rough_qty, final_qty from ta_sanding where grid_type = 2 and boardmanu_id = ".$rows['bm_id'];
                          $finalconsumedQtyresp = $conn->query($finalconsumed_qty);
                          $finalconsumedResp = mysqli_fetch_assoc($finalconsumedQtyresp);

                          $roughconsumed_qty = "select sum(rough_qty) as roughconsumed_qty ,rough_qty, final_qty from ta_sanding where grid_type = 1 and boardmanu_id = ".$rows['bm_id'];
                          $roughconsumedQtyresp = $conn->query($roughconsumed_qty);
                          $roughconsumedResp = mysqli_fetch_assoc($roughconsumedQtyresp);
                          // if($consumedResp['consumed_qty'] != $rows['no_of_pieces']) {
                      ?>
        							<tr>
                        <th><input type="radio" name="sandingRadio" value="<?php echo $rows['bm_id']; ?>" id="season_out_radio"></th>
        								<th><?php echo $sno++;?></th>
        								<th><?php echo $rows['wood_type']; ?></th>
                        <th><?php echo $rows['gradation']; ?></th>
                        <!-- <th><?php echo $rows['bm_batch_no']?></th> -->
                        <th><?php echo $rows['width'].'mm';?></th>
        								<th><?php echo $rows['length'].'mm';?></th>
        								<th><?php echo $rows['widthg'];?></th>
        								<th><?php echo $rows['thickness'].'mm';?></th>
        								<th><?php echo $rows['no_of_pieces']?></th>
                        <!-- <th></th> -->
                        <th><?php if(!empty($finalconsumedResp['finalconsumed_qty'])) { echo $rows['no_of_pieces'] - $finalconsumedResp['finalconsumed_qty']; } else { echo $rows['no_of_pieces']; }?></th>
                        <th><?php echo $roughconsumedResp['roughconsumed_qty']?></th>
                        <th><?php echo $finalconsumedResp['finalconsumed_qty']?></th>
        								<th class="txt"><?php echo $finalconsumedResp['finalconsumed_qty']; ?>  &nbsp; 
                          <!-- <a class="btn btn-primary btn-sm consumedEdit" href="#" data-toggle="modal" data-target="#bmconsumedModal" data-bm_id="<?php echo $rows['bm_id']; ?>" data-bmconsumed="<?php echo $rows['consumed']; ?>">
                            <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>Edit
                          </a> -->
                        </th>
        							</tr>
                    <?php //} 
                  }?>
        						</tbody>
        					</table>
        				</div>
            	<!-- Board Manufacturing Table ends  -->
            	<hr>
              <div class="sanding_forms">
                <form class="user" action = "sav_files/sav_sanding.php" method="post" id="old_grid" style="clear: both;">
                  <input type="hidden" class="form-control" name="type" value="old">
                  <input type="hidden" class="form-control board_id" name="board_id" value="">
                    <div class="col-lg-12">
                        <div class="form-group row">
                             <h5 class="text-center col-lg-12">Old Grid Type</h5><br>
                            <br>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-11">
                                <div id="textboxDiv11">
                                  <table class="form-table" id="customFieldsASOld">
                                    <tr valign="top" style="padding: 5px;">
                                      <th scope="row">
                                        <label>Grid Type :</label>
                                      </th>
                                      <td>
                                        <select class="form-control grid_type" name="grid_type[]">
                                            <option value="">Select Grid</option>
                                            <?php
                                              $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
                                              $result = $conn->query($sql);
                                              while($row = $result->fetch_assoc()) {
                                                // echo "<pre>";print_r($row);
                                            ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['paper_grid'];?></option>
                                          <?php } ?>
                                        </select>
                                      </td>

                                      <th scope="row">
                                        <label>Brand :</label>
                                      </th>
                                      <td>
                                        <input type="text" name="brand[]" class="form-control" id="brand" placeholder="Newton" id="brand">
                                      </td>

                                      <th scope="row">
                                        <label>Quantity :</label>
                                      </th>
                                      <td>
                                        <input type="text" name="rough_qty" placeholder="07" class="form-control">
                                      </td>
                                      <!-- <td>
                                        <a href="javascript:void(0);" class="addSanding btn btn-primary btn-sm">Add</a>
                                      </td> -->
                                    </tr>

                                    <tr valign="top" style="padding: 5px;">
                                      <th scope="row">
                                        <label>Grid Type :</label>
                                      </th>
                                      <td>
                                        <select class="form-control grid_type" name="grid_type[]">
                                            <option value="">Select Grid</option>
                                            <?php
                                              $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
                                              $result = $conn->query($sql);
                                              while($row = $result->fetch_assoc()) {
                                                // echo "<pre>";print_r($row);
                                            ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['paper_grid'];?></option>
                                          <?php } ?>
                                        </select>
                                      </td>

                                      <th scope="row">
                                        <label>Brand :</label>
                                      </th>
                                      <td>
                                        <input type="text" name="brand[]" class="form-control" id="brand" placeholder="Newton" id="brand">
                                      </td>

                                      <th scope="row">
                                        <label>Quantity :</label>
                                      </th>
                                      <td>
                                        <input type="text" name="final_qty" placeholder="07" class="form-control">
                                      </td>
                                      <!-- <td>
                                        <a href="javascript:void(0);" class="addSanding btn btn-primary btn-sm">Add</a>
                                      </td> -->
                                    </tr>
                                  </table>
                                  <!-- <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>Grid Type :</label>
                                      </div>
                                      <div class="col-sm-6">
                                          <select class="form-control grid_type" name="grid_type[]">
                                              <option value="">Select Grid</option>
                                              <?php
                                                $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
                                                $result = $conn->query($sql);
                                                while($row = $result->fetch_assoc()) {
                                              ?>
                                              <option value="<?php echo $row['id'];?>"><?php echo $row['paper_grid'];?></option>
                                            <?php } ?>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>Brand :</label>
                                      </div>
                                      <div class="col-sm-6">
                                          <input type="text" name="brand[]" class="form-control" id="brand" placeholder="Newton" id="brand">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                          <label>Quantity :</label>
                                      </div>
                                      <div class="col-sm-6">
                                        <input type="text" name="qty[]" placeholder="07" class="form-control">
                                      </div>
                                  </div> -->
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="offset-6 col-sm-3" style="float: right;margin-bottom: 15px;text-align: right;">
                                      <div class="small-box bg-green">
                                        <a class="small-box-footer" id="Add1" style="color: #4e73df; cursor: pointer;">Add More <i class="fas fa-fw fa-plus-circle"></i></a>
                                      </div>
                                    </div>
                                </div> -->
                                <center>
                                <div class="row">
                                  <div class="offset-5">
                                    <input type="submit" name="submit" class="form-control btn btn-primary">
                                  </div>
                                </div>
                              </center>
                            </div>
                            <!-- <div class="col-sm-2"></div> -->
                        </div>                      
                    </div>
                </form>
                <div class="table-responsive">
                  <table class="table table-bordered requestTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Grid Type</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>S.No</th>
                        <th>Grid Type</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Date</th>
                      </tr>
                    </tfoot>
                    <tbody id="jsonDataResp">
                      <?php 
                      // $phpVar =  $_COOKIE['selectedID'];
                      // $sno = 1;
                      // $sandsql = "SELECT ts.*,tsgt.id grid_id, tsgt.paper_grid FROM ta_sanding ts join ta_sanding_grid_types tsgt on (tsgt.id = ts.grid_type) where ts.boardmanu_id = '".$phpVar."'";
                        // $sandresp = $conn->query($sandsql);  
                        // $sandrespnew = $conn->query($sandsql);
                        // while ($rows = mysqli_fetch_assoc($sandresp)) {
                        //   // print_r($rows);die;
                        //   if($rows['type'] == 'old') {
                      ?>
                      <!-- <tr>
                        <th><?php echo $sno++;?></th>
                        <th><?php echo $rows['paper_grid']; ?></th>
                        <th><?php echo $rows['brand']; ?></th>
                        <th><?php echo $rows['qty']?></th>
                        <th><?php echo $rows['end_grid_date']; ?></th>
                      </tr> -->
                    <?php //} }?>
                    </tbody>
                  </table>
                </div>
                <hr>
                <form class="user" action="sav_files/sav_sanding_new.php" method="post" id="new_grid" style="clear: both;">
                  <input type="hidden" class="form-control" name="type" value="new">
                  <input type="hidden" class="form-control board_id" name="board_id" value="">
                    <div class="col-lg-12">
                        <div class="form-group row">
                             <h5 class="text-center col-lg-12">New Grid Type</h5><br>
                            <br>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-11">
                              <table class="form-table" id="customFieldsNew">
                                    <tr valign="top" style="padding: 5px;">
                                      <th scope="row">
                                        <label>Grid Type :</label>
                                      </th>
                                      <td>
                                        <select class="form-control grid_type" name="grid_type[]">
                                            <option value="">Select Grid</option>
                                            <?php
                                              $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
                                              $result = $conn->query($sql);
                                              while($row = $result->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['paper_grid'];?></option>
                                          <?php } ?>
                                        </select>
                                      </td>

                                      <th scope="row">
                                        <label>Brand :</label>
                                      </th>
                                      <td>
                                        <input type="text" name="brand[]" class="form-control" id="brand" placeholder="Newton" id="brand">
                                      </td>

                                      <th scope="row">
                                        <label>Quantity :</label>
                                      </th>
                                      <td>
                                        <input type="text" name="rough_qty" placeholder="07" class="form-control">
                                      </td>
                                      <th scope="row">
                                        <label>Date :</label>
                                      </th>
                                      <td>
                                        <input type="date" name="new_grid_date[]" class="form-control">
                                      </td>
                                      <!-- <td>
                                        <a href="javascript:void(0);" class="addSanding2 btn btn-primary btn-sm">Add</a>
                                      </td> -->
                                    </tr>
                                    <tr valign="top" style="padding: 5px;">
                                      <th scope="row">
                                        <label>Grid Type :</label>
                                      </th>
                                      <td>
                                        <select class="form-control grid_type" name="grid_type[]">
                                            <option value="">Select Grid</option>
                                            <?php
                                              $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
                                              $result = $conn->query($sql);
                                              while($row = $result->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['paper_grid'];?></option>
                                          <?php } ?>
                                        </select>
                                      </td>

                                      <th scope="row">
                                        <label>Brand :</label>
                                      </th>
                                      <td>
                                        <input type="text" name="brand[]" class="form-control" id="brand" placeholder="Newton" id="brand">
                                      </td>

                                      <th scope="row">
                                        <label>Quantity :</label>
                                      </th>
                                      <td>
                                        <input type="text" name="final_qty" placeholder="07" class="form-control">
                                      </td>
                                      <!-- <th scope="row">
                                        <label>Date :</label>
                                      </th>
                                      <td>
                                        <input type="date" name="new_grid_date[]" class="form-control">
                                      </td> -->
                                      <!-- <td>
                                        <a href="javascript:void(0);" class="addSanding2 btn btn-primary btn-sm">Add</a>
                                      </td> -->
                                    </tr>
                                  </table>
                              <!-- <div id="textboxDiv2">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Grid Type :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control grid_type" name="grid_type[]">
                                            <option value="">Select Grid</option>
                                            <?php
                                              $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
                                              $result = $conn->query($sql);
                                              while($row = $result->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['paper_grid'];?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Brand :</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="brand[]" class="form-control" id="brand" placeholder="Newton" id="brand">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Quantity :</label>
                                    </div>
                                    <div class="col-sm-6">
                                      <input type="text" name="qty[]" placeholder="07" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Date :</label>
                                    </div>
                                    <div class="col-sm-6">
                                      <input type="date" name="new_grid_date[]" class="form-control">
                                    </div>
                                </div>
                              </div> -->
                                <!-- <div class="form-group row">
                                    <div class="offset-6 col-sm-3" style="float: right;margin-bottom: 15px;text-align: right;">
                                      <div class="small-box bg-green">
                                        <a class="small-box-footer" id="Add2" style="color: #4e73df; cursor: pointer;">Add More <i class="fas fa-fw fa-plus-circle"></i></a>
                                      </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                  <div class="offset-5">
                                    <input type="submit" name="submit" class="form-control btn btn-primary">
                                  </div>
                                </div>
                            </div>
                            <!-- <div class="col-sm-2"></div> -->
                        </div>                      
                    </div>
                </form>

                <div class="table-responsive">
                  <table class="table table-bordered requestTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Grid Type</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>S.No</th>
                        <th>Grid Type</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                      </tr>
                    </tfoot>
                    <tbody id="jsonDataRespNew">
                      <?php 
                      // $sno = 1;
                      //   while ($rows1 = mysqli_fetch_assoc($sandrespnew)) {
                      //     // print_r($rows);die;
                      //     if($rows1['type'] == 'new') {
                      ?>
                      <!-- <tr>
                        <th><?php echo $sno++;?></th>
                        <th><?php echo $rows1['paper_grid']; ?></th>
                        <th><?php echo $rows1['brand']; ?></th>
                        <th><?php echo $rows1['qty']?></th>
                      </tr> -->
                    <?php //} }?>
                    </tbody>
                  </table>
                </div>
              </div>
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

  <div class="modal fade" id="bmconsumedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update consumed quantity</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="sav_files/udatebmConsumed.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="bm_id" id="bm_id">
            <div class="form-group row">
              <div class="col-sm-6">
                <label>Consumed Quantity :</label>
              </div>
              <div class="col-sm-6">
                <input type="text" name="consumed_qty" placeholder="10" id="consumed_qty" class="form-control consumed_qty" required >
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
      $('.sanding_forms').hide();
        $("input[name=sandingRadio]:radio").change(function () {

            var id = this.value;
            // alert(id);
            $.ajax({
                  type: 'post',
                  dataType: 'JSON',
                  url: 'sav_files/getSandingFormData.php',
                  data: {id:id},
                  success: function (response) {
                      console.log(response);
                      console.log(response.data['new']);
                      // var parsetets = JSON.parse(response.data);
                      // console.log(parsetets);
                      if(response.data != '') {
                        $('#jsonDataResp').html(response.data['old']);
                      } else {
                        $('#jsonDataResp').html('');
                      }
                      if(response.data != '') {
                        $('#jsonDataRespNew').html(response.new['new']);
                      } else {
                        $('#jsonDataRespNew').html('');
                      }
                      // $("#board_manu")[0].reset();
                      // location.reload();
                      // window.location.reload();
                  }
              });
            $(".board_id").val(id);
            $('.sanding_forms').show();
        });
    });
    

    $('.consumedEdit').click(function(){
      var bm_id = $(this).data('bm_id');
      var consumed = $(this).data('bmconsumed');
      $('#consumed_qty').val(consumed);
      $('#bm_id').val(bm_id);
    });
    $(document).ready(function(){
      $(".addSanding").click(function(){
        $("#customFieldsASOld").append('<tr valign="top" style="padding: 5px;"><th scope="row"><label>Grid Type :</label></th><td><select class="form-control grid_type" name="grid_type[]"><option value="">Select Grid</option><?php
          $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['paper_grid'];?></option><?php } ?></select></td><th scope="row"><label>Brand :</label></th><td><input type="text" name="brand[]" class="form-control" id="brand" placeholder="Newton" id="brand"></td><th scope="row"><label>Quantity :</label></th><td><input type="text" name="qty[]" placeholder="07" class="form-control"></td><td>&nbsp; <a href="javascript:void(0);" class="remSanding btn btn-primary btn-sm">Remove</a></td></tr>');
      });
      $("#customFieldsASOld").on('click','.remSanding',function(){
          $(this).parent().parent().remove();
      });
    });

    $(document).ready(function(){
      $(".addSanding2").click(function(){
        $("#customFieldsNew").append('<tr valign="top" style="padding: 5px;"><th scope="row"><label>Grid Type :</label></th><td><select class="form-control grid_type" name="grid_type[]"><option value="">Select Grid</option><?php
              $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['id'];?>"><?php echo $row['paper_grid'];?></option><?php } ?>
        </select></td><th scope="row"><label>Brand :</label></th><td><input type="text" name="brand[]" class="form-control" id="brand" placeholder="Newton" id="brand"></td><th scope="row"><label>Quantity :</label></th><td><input type="text" name="qty[]" placeholder="07" class="form-control"></td><th scope="row"><label>Date :</label></th><td><input type="date" name="new_grid_date[]" class="form-control"></td><td>&nbsp; <a href="javascript:void(0);" class="remSanding2 btn btn-primary btn-sm">Remove</a></td></tr>');
      });
      $("#customFieldsNew").on('click','.remSanding2',function(){
          $(this).parent().parent().remove();
      });
    });

    function sqm_calc() {
        var board_width = document.getElementById('board_width').value;
        var board_length = document.getElementById('board_length').value;
        var pieces = document.getElementById('pieces').value;
        var result = parseFloat(board_width) * parseFloat(board_length) * parseFloat(pieces);
        var sqm = parseFloat(result) / 1000000;
        var sqft = parseFloat(sqm) * parseFloat(10.764);
        if (!isNaN(result)) {
            document.getElementById('sqm').value = sqm.toFixed(2);
            document.getElementById('sqft').value = sqft.toFixed(2);
        }
    }
    // $(function () {
    //         $('#old_grid').on('submit',function (e) {
    //             $.ajax({
    //                 type: 'post',
    //                 dataType: 'JSON',
    //                 url: 'sav_files/sav_sanding.php',
    //                 data: $('#old_grid').serialize(),
    //                 success: function (response) {
    //                     alert(response.message);
    //                     console.log(response);
    //                     // $("#board_manu")[0].reset();
    //                     // location.reload();
    //                     window.location.reload();
    //                 }
    //             });
    //             // e.preventDefault();
    //         });
    //     });


    // $(function () {
    //         $('#new_grid').on('submit',function (e) {
    //             $.ajax({
    //                 type: 'post',
    //                 dataType: 'JSON',
    //                 url: 'sav_files/sav_sanding.php',
    //                 data: $('#new_grid').serialize(),
    //                 success: function (response) {
    //                   console.log(response);
    //                     alert(response.message);
    //                     // $("#board_manu")[0].reset();
    //                     // location.reload();
    //                     window.location.reload();
    //                 }
    //             });
    //             // e.preventDefault();
    //         });
    //     });

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

    $(function() {
        $('#Add1').click(function(){
          var newDiv = $('<div class="form-group row"><div class="col-sm-3"><label>Grid Type :</label></div><div class="col-sm-6"><select class="form-control grid_type" name="grid_type[]"><option value="">Select Grid</option><?php
                                                $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
                                                $result = $conn->query($sql);
                                                while($row = $result->fetch_assoc()) {
                                              ?>
                                              <option value="<?php echo $row['id'];?>"><?php echo $row['paper_grid'];?></option><?php } ?></select></div></div><div class="form-group row"><div class="col-sm-3"><label>Brand :</label></div><div class="col-sm-6"><input type="text" name="brand[]" class="form-control" id="brand" placeholder="Newton" id="brand"></div></div><div class="form-group row"><div class="col-sm-3"><label>Quantity :</label></div><div class="col-sm-6"><input type="text" name="qty[]" placeholder="07" class="form-control"></div></div><br>');
          //newDiv.style.background = "#000";
          $('#textboxDiv1').append(newDiv);
        });
      });

    $(function() {
        $('#Add2').click(function(){
          var newDiv1 = $('<div class="form-group row"><div class="col-sm-3"><label>Grid Type :</label></div><div class="col-sm-6"><select class="form-control grid_type" name="grid_type[]"><option value="">Select Grid</option><?php
                                                $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
                                                $result = $conn->query($sql);
                                                while($row = $result->fetch_assoc()) {
                                              ?>
                                              <option value="<?php echo $row['id'];?>"><?php echo $row['paper_grid'];?></option><?php } ?></select></div></div><div class="form-group row"><div class="col-sm-3"><label>Brand :</label></div><div class="col-sm-6"><input type="text" name="brand[]" class="form-control" id="brand" placeholder="Newton" id="brand"></div></div><div class="form-group row"><div class="col-sm-3"><label>Quantity :</label></div><div class="col-sm-6"><input type="text" name="qty[]" placeholder="07" class="form-control"></div></div><div class="form-group row"><div class="col-sm-3"><label>Date :</label></div><div class="col-sm-6"><input type="date" name="new_grid_date[]" class="form-control"></div></div><br>');
          //newDiv.style.background = "#000";
          $('#textboxDiv2').append(newDiv1);
        });
      });
  </script>
</body>

</html>
<?php } ?>
