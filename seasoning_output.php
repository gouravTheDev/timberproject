<?php 
  session_start();
  if(empty($_SESSION['loggedin_id']))
  {
    header("Location: index.php");
  } else {
    
  include("db_connection.php");
  // $sql = "SELECT * FROM ta_board_manufacturing";
  $sql = "SELECT tsi.*,twt.wood_type,twt.id wood_id,tsbn.batch_no,tsbn.batch_id FROM ta_seasoning_input tsi join ta_wood_type twt on (twt.id = tsi.type_of_wood) join ta_season_batch_nos tsbn on (tsbn.batch_id = tsi.seasonin_batch and tsbn.status = 1) where tsi.status = 1";
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
            <div class="container">
              <div class="table-responsive">
                <!-- Board Manufacturing Table starts  -->
                <div class="table-responsive">
                  <table class="table table-bordered requestTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Wood</th>
                        <th>Batch No</th>
                        <th>Input Date</th>
                        <th>Trolly 1</th>
                        <th>Trolly 2</th>
                        <th>Moisture Level</th>
                        <th>Thickness </th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>S.No</th>
                        <th>Wood</th>
                        <th>Batch No</th>
                        <th>Input Date</th>
                        <th>Trolly 1</th>
                        <th>Trolly 2</th>
                        <th>Moisture Level</th>
                        <th>Thickness </th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php 
                      $sno = 1;
                        while ($rows = mysqli_fetch_assoc($resp)) {
                      ?>
                      <tr>
                        <th><?php echo $sno++;?></th>
                        <th><?php echo $rows['wood_type']; ?></th>
                        <th><?php echo $rows['batch_no']?></th>
                        <th><?php echo $rows['input_date'];?></th>
                        <th><?php echo $rows['trolly1_weight'].' kgs';?></th>
                        <th><?php echo $rows['trolly2_weight'].' kgs';?></th>
                        <th><?php echo $rows['moisture_level'].' %'?></th>
                        <th><?php echo $rows['thickness']?></th>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
              <!-- Board Manufacturing Table ends  -->
 

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Add New Season Output</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- <form class="user" method="post" action="sav_files/sav_seasoning_input.php" style="clear: both;"> -->
      <div class="col-lg-12">
            <div class="">
             
                <div class="form-group row">
                    <!-- <h3 class="text-center col-lg-12">Customer Details</h3> -->
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <form class="user" method="post" id="seasnoingout_chamber1_form" name="seasnoingout_chamber1_form" style="clear: both;">
                        <!-- Chamber 1 -->
                        <?php 
                          // $sql = "Select tsbn.batch_no,tsbn.batch_id,tsi.seasonin_batch from ta_season_batch_nos tsbn join ta_seasoning_input tsi on (tsi.seasonin_batch = tsbn.batch_id) where tsbn.status = 1 and tsbn.chamber = 'chamber1' order by tsbn.batch_id ASC limit 1";
                        $sql = "Select tsbn.batch_no,tsbn.batch_id,tsi.seasonin_batch from ta_season_batch_nos tsbn join ta_seasoning_input tsi on (tsi.seasonin_batch = tsbn.batch_id) where  tsbn.chamber = 'chamber1' order by tsbn.batch_id DESC limit 1";
                          $resp = $conn->query($sql);

                          if($resp->num_rows >= 1) {
                            $batch_no_row=mysqli_fetch_row($resp);
                            $batch_no = $batch_no_row[0];
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
                          </div>
                        </div>
                        <input type="hidden" name="chamber" id = "chamber1" value="<?php echo 'chamber1'; ?>">
                      <h3 class="text-center col-lg-12">Chamber 1</h3>
                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Type of Wood :</label>
                        </div>
                        <div class="col-sm-6">
                          <?php 
                            $sqlWood = "Select tsi.type_of_wood,twt.wood_type,twt.id wood_id,tsbn.batch_no,tsbn.batch_id,tsi.seasonin_id FROM ta_seasoning_input tsi join ta_wood_type twt on (twt.id = tsi.type_of_wood) join ta_season_batch_nos tsbn on (tsbn.batch_id = tsi.seasonin_batch and tsbn.status = 1) where tsi.status = 1 and tsbn.status = 1 and tsbn.chamber = 'chamber1' order by tsbn.batch_id ASC limit 1";
                            $respTyeofWood = $conn->query($sqlWood);
                            // echo "<pre>";pritn_r($respTyeofWood);die;
                            if($respTyeofWood->num_rows >= 1) {
                              $seasonin_typeofWood1 = mysqli_fetch_row($respTyeofWood);
                              // echo "<pre>";print_r($seasonin_typeofWood1);die;
                              $type_of_wood_name1 = $seasonin_typeofWood1[1];
                              $type_of_wood_id1 = $seasonin_typeofWood1[0];
                              $batch_name1 = $seasonin_typeofWood1[3];
                              $batch_id1 = $seasonin_typeofWood1[4];
                              $seasonin_id1 = $seasonin_typeofWood1[5];
                            } else {
                              $type_of_wood_name1 = '';                              
                              $type_of_wood_id1 = '';
                              $batch_name1 = '';
                              $batch_id1 = '';
                              $seasonin_id1 = '';
                            }
                        ?>
                        <input type="hidden" name="seasonin_id" value="<?php echo $seasonin_id1; ?>">
                          <input type="text" class="form-control type_of_wood" name="type_of_wood_value" value="<?php echo $type_of_wood_name1; ?>" readonly>
                          <input type="hidden" name="type_of_wood" value="<?php echo $type_of_wood_id1; ?>">
                          <!-- <select type="text" class="form-control type_of_wood" name="type_of_wood">
                            <option value="">Select Wood Type</option> -->
                            <?php
                                // $sql = "SELECT * FROM ta_wood_type where status = 1";
                                // $result = $conn->query($sql);
                                // while($row = $result->fetch_assoc()) {
                              ?>
                              <!-- <option value="<?php echo $row['id'];?>"><?php echo $row['wood_type'];?></option> -->
                            <?php //} ?>
                          <!-- </select> -->
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Batch No:</label>
                        </div>
                        <div class="col-sm-6">
                          <!-- <input type="text" name="seasonout_batch" placeholder="SIBTN1" id="seasonout_batch" class="form-control" readonly> -->

                          <input type="text" name="seasonout_batch_no" placeholder="SIBTN1" id="seasonout_batch1" class="form-control seasonout_batch1" readonly value="<?php echo $batch_name1; ?>">
                          <input type="hidden" name="seasonout_batch" placeholder="SIBTN1" id="seasonout_batch3" class="form-control seasonout_batch1" readonly value="<?php echo $batch_id1; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Output Date :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="date" class="form-control form-control-user" name="output_date">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Output Time :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="time" class="form-control form-control-user" name="output_time">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Trolly 1 (Kgs):</label>
                        </div>
                        <div class="col-sm-6">

                        <?php 
                          $sql = "Select tsi.trolly1,sbn.batch_no,sbn.batch_id from ta_season_batch_nos sbn join ta_seasoning_input tsi on (tsi.seasonin_batch = sbn.batch_id and sbn.status = 1) where sbn.status = 1 and sbn.chamber = 'chamber1' and tsi.seasonin_id = '$seasonin_id1'";
                          $resp = $conn->query($sql);

                          if($resp->num_rows >= 1) {
                            $seasonin_trolly1=mysqli_fetch_row($resp);
                            $trolly1 = $seasonin_trolly1[0];
                          } else {
                            $trolly1 = '';
                          }
                        ?>
                          <input type="text" class="form-control form-control-user" id="trolly1_weight" name="trolly1_weight" placeholder="1000 kgs" onkeyup="totalWeight_calc1()">
                        </div>                        
                        <div class="col-sm-3">
                          <input type="text" class="form-control form-control-user" name="trolly1" placeholder="1000 kgs" value="<?php echo $trolly1; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Trolly 2 (Kgs):</label>
                        </div>
                        <div class="col-sm-6">
                        <?php 
                          $sql_trolly2 = "Select tsi.trolly2,sbn.batch_no,sbn.batch_id from ta_season_batch_nos sbn join ta_seasoning_input tsi on (tsi.seasonin_batch = sbn.batch_id and sbn.status = 1) where sbn.status = 1 and sbn.chamber = 'chamber1' and tsi.seasonin_id = '$seasonin_id1'";
                          $resp_trolly2 = $conn->query($sql_trolly2);

                          if($resp_trolly2->num_rows >= 1) {
                            $seasonin_trolly2 = mysqli_fetch_row($resp_trolly2);
                            $trolly2 = $seasonin_trolly2[0];
                          } else {
                            $trolly2 = '';
                          }
                        ?>
                          <input type="text" class="form-control form-control-user" id="trolly2_weight" name="trolly2_weight" placeholder="1000 kgs" onkeyup="totalWeight_calc1()">
                        </div>                        
                        <div class="col-sm-3">
                          <input type="text" class="form-control form-control-user" name="trolly2" placeholder="1000 kgs" value="<?php echo $trolly2; ?>" readonly>
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
                                <label>Total Weight (Kgs):</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="season_total_weight1" name="total_weight" placeholder="1900 kgs">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Weight (Kgs):</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" id="seasonout_weight1" class="form-control form-control-user" name="weight" placeholder="70 kgs" onkeyup="per_cft_weight_calc1();">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>CFT (cft):</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" id="seasonout_cft1" class="form-control form-control-user" name="cft" placeholder="1.05cft" onkeyup="per_cft_weight_calc1();">
                            </div>
                            
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Per CFT weight (Kgs):</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="per_cft_weight1" name="per_cft_weight" placeholder="70.07 kgs" readonly>
                            </div>
                            <div class="col-sm-3">Divide weight by CFT</div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Total CFT (Kgs):</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="seasonout_total_cft1" name="total_cft" placeholder="70.07 kgs" readonly>
                            </div>
                            <div class="col-sm-3">Divide total weight by per CFT weight</div>
                        </div>

                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Thickness :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user" name="thickness">
                        </div>

                      </div>

                      <div class="form-group row">                        
                        <div class="col-sm-3">
                          <label>Price for seasoning per cft :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user" name="price_seasoning_per_cft">
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
                        <form class="user" method="post" id="seasnoingout_chamber2_form" name="seasnoingout_chamber2_form" style="clear: both;">
                        <!-- Chamber 2 -->
                        <?php 
                          // $sql = "Select batch_no,batch_id from ta_season_batch_nos where status = 1 and chamber = 'chamber2' order by batch_id ASC limit 1";
                        $sql = "Select tsbn.batch_no,tsbn.batch_id,tsi.seasonin_batch from ta_season_batch_nos tsbn join ta_seasoning_input tsi on (tsi.seasonin_batch = tsbn.batch_id) where  tsbn.chamber = 'chamber2' order by tsbn.batch_id DESC limit 1";
                          $resp = $conn->query($sql);

                          if($resp->num_rows >= 1) {
                            $batch_no_row=mysqli_fetch_row($resp);
                            $batch_no = $batch_no_row[0];
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
                          </div>
                        </div>
                        <input type="hidden" name="chamber"  id = "chamber2" value="<?php echo 'chamber2'; ?>">
                      <h3 class="text-center col-lg-12">Chamber 2</h3>
                        <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Type of Wood :</label>
                        </div>
                        <div class="col-sm-6">
                          <?php 
                            $sqlWood2 = "Select tsi.type_of_wood,twt.wood_type,twt.id wood_id,tsbn.batch_no,tsbn.batch_id,tsi.seasonin_id FROM ta_seasoning_input tsi join ta_wood_type twt on (twt.id = tsi.type_of_wood) join ta_season_batch_nos tsbn on (tsbn.batch_id = tsi.seasonin_batch and tsbn.status = 1) where tsi.status = 1 and tsbn.status = 1 and tsbn.chamber = 'chamber2' order by tsbn.batch_id ASC limit 1";
                            $respTyeofWood2 = $conn->query($sqlWood2);
                            // echo "<pre>";pritn_r($respTyeofWood);die;
                            if($respTyeofWood->num_rows >= 1) {
                              $seasonin_typeofWood2 = mysqli_fetch_row($respTyeofWood2);
                              // echo "<pre>";print_r($seasonin_typeofWood1);die;
                              $type_of_wood_name2 = $seasonin_typeofWood2[1];
                              $type_of_wood_id2 = $seasonin_typeofWood2[0];
                              $batch_name2 = $seasonin_typeofWood2[3];
                              $batch_id2 = $seasonin_typeofWood2[4];
                              $seasonin_id2 = $seasonin_typeofWood2[5];
                            } else {
                              $type_of_wood_name2 = '';                              
                              $type_of_wood_id2 = '';
                              $batch_name2 = '';
                              $batch_id2 = '';
                              $seasonin_id2 = '';
                            }
                        ?>
                        <input type="hidden" name="seasonin_id" value="<?php echo $seasonin_id2; ?>">
                        <input type="text" class="form-control type_of_wood" name="type_of_wood_value" value="<?php echo $type_of_wood_name2; ?>" readonly>
                          <input type="hidden" name="type_of_wood" value="<?php echo $type_of_wood_id2; ?>">
                          <!-- <select type="text" class="form-control type_of_wood1" name="type_of_wood">
                            <option value="">Select Wood Type</option> -->
                            <?php
                                // $sql = "SELECT * FROM ta_wood_type where status = 1";
                                // $result = $conn->query($sql);
                                // while($row = $result->fetch_assoc()) {
                              ?>
                              <!-- <option value="<?php echo $row['id'];?>"><?php echo $row['wood_type'];?></option> -->
                            <?php //} ?>
                          <!-- </select> -->
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Batch No:</label>
                        </div>
                        <div class="col-sm-6">
                          <!-- <input type="text" name="seasonout_batch" placeholder="SIBTN1" id="seasonout_batch1" class="form-control" readonly> -->
                          <input type="text" name="seasonout_batch_no" placeholder="SIBTN1" id="seasonout_batch2" class="form-control seasonout_batch2" readonly value="<?php echo $batch_name2; ?>">
                          <input type="hidden" name="seasonout_batch" placeholder="SIBTN1" id="seasonout_batch4" class="form-control seasonout_batch2" readonly value="<?php echo $batch_id2; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Output Date :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="date" class="form-control form-control-user" name="output_date">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Output Time :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="time" class="form-control form-control-user" name="output_time">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Trolly 1 (kgs):</label>
                        </div>
                        <div class="col-sm-6">
                          <?php 
                          $sql_c2trolly2 = "Select tsi.trolly1,sbn.batch_no,sbn.batch_id from ta_season_batch_nos sbn join ta_seasoning_input tsi on (tsi.seasonin_batch = sbn.batch_id) where sbn.status = 1 and sbn.chamber = 'chamber2' and tsi.seasonin_id = '$seasonin_id2'";
                          $resp_c2trolly2 = $conn->query($sql_c2trolly2);

                          if($resp_c2trolly2->num_rows >= 1) {
                            $seasonin_trollyc2 = mysqli_fetch_row($resp_c2trolly2);
                            $trollyc2 = $seasonin_trollyc2[0];
                          } else {
                            $trollyc2 = '';
                          }
                        ?>
                          <input type="text" class="form-control form-control-user" id="trolly1_weightc2" name="trolly1_weight" placeholder="1000 kgs" onkeyup="totalWeight_calc2()">
                        </div>                        
                        <div class="col-sm-3">
                          <input type="text" class="form-control form-control-user" name="trolly1" placeholder="1000 kgs" value="<?php echo $trollyc2; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Trolly 2 (Kgs):</label>
                        </div>
                        <div class="col-sm-6">

                          <?php 
                          $sql_c2trolly2 = "Select tsi.trolly2,sbn.batch_no,sbn.batch_id from ta_season_batch_nos sbn join ta_seasoning_input tsi on (tsi.seasonin_batch = sbn.batch_id) where sbn.status = 1 and sbn.chamber = 'chamber2' and tsi.seasonin_id = '$seasonin_id2'";
                          $resp_c2trolly2 = $conn->query($sql_c2trolly2);

                          if($resp_c2trolly2->num_rows >= 1) {
                            $seasonin_trollyc2 = mysqli_fetch_row($resp_c2trolly2);
                            $trollyc2 = $seasonin_trollyc2[0];
                          } else {
                            $trollyc2 = '';
                          }
                        ?>
                          <input type="text" class="form-control form-control-user" id="trolly2_weightc2" name="trolly2_weight" placeholder="1000 kgs" onkeyup="totalWeight_calc2()">
                        </div>  
                        <div class="col-sm-3">
                          <input type="text" class="form-control form-control-user" name="trolly2" placeholder="1000 kgs" value="<?php echo $trollyc2; ?>" readonly onkeyup="totalWeight_calc2()">
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
                                <label>Total Weight (Kgs):</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" id="season_total_weight2" class="form-control form-control-user" name="total_weight" placeholder="1900 kgs">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Weight (Kgs):</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="seasonout_weight2" name="weight" placeholder="70 kgs" onkeyup="per_cft_weight_calc2();">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>CFT (cft):</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="seasonout_cft2"  name="cft" placeholder="1.05cft" onkeyup="per_cft_weight_calc2();">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Per CFT weight (Kgs):</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="per_cft_weight2"  name="per_cft_weight" placeholder="70.07 kgs" readonly>
                            </div>
                            <div class="col-sm-3">Divide weight by CFT</div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Total CFT (Kgs):</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" id="seasonout_total_cft2" class="form-control form-control-user" name="total_cft" placeholder="70.07 kgs" readonly>
                            </div>
                            <div class="col-sm-3">Divide total weight by per CFT weight</div>
                        </div>

                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label>Thickness :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user" name="thickness">
                        </div>
                      </div>

                      <div class="form-group row">                        
                        <div class="col-sm-3">
                          <label>Price for seasoning per cft :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user" name="price_seasoning_per_cft">
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
    $(function () {
      $('#seasnoingout_chamber1_form').on('submit',function (e) {
        $.ajax({
          type: 'post',
            dataType: 'JSON',
          url: 'sav_files/save_season_output.php',
          data: $('#seasnoingout_chamber1_form').serialize(),
          success: function (response) {
            // console.log(response);
              alert(response.message);
           $("#seasnoingout_chamber1_form")[0].reset();
          }
        });
        e.preventDefault();
      });
    });

    $(function () {
      $('#seasnoingout_chamber2_form').on('submit',function (e) {
        $.ajax({
          type: 'post',
          dataType: 'JSON',
          url: 'sav_files/save_season_output.php',
          data: $('#seasnoingout_chamber2_form').serialize(),
          success: function (response) {
//                console.log(response);
              alert(response.message);
           $("#seasnoingout_chamber2_form")[0].reset();
          }
        });
        e.preventDefault();
      });
    });
      
    function per_cft_weight_calc1() {
        var seasonout_weight1 = document.getElementById('seasonout_weight1').value;
        var seasonout_cft1 = document.getElementById('seasonout_cft1').value;
        var season_total_weight1 = document.getElementById('season_total_weight1').value;
        var result = parseFloat(seasonout_weight1) / parseFloat(seasonout_cft1);
        var seasonout_total_cft1 = parseFloat(season_total_weight1) / parseFloat(result);
        if (!isNaN(result)) {
            document.getElementById('per_cft_weight1').value = result.toFixed(2); 
            document.getElementById('seasonout_total_cft1').value = seasonout_total_cft1.toFixed(2);
        }
    }
      
    function per_cft_weight_calc2() {
        var seasonout_weight2 = document.getElementById('seasonout_weight2').value;
        var seasonout_cft2 = document.getElementById('seasonout_cft2').value;
        var season_total_weight2 = document.getElementById('season_total_weight2').value;
        var result = parseFloat(seasonout_weight2) / parseFloat(seasonout_cft2);
        var seasonout_total_cft2 = parseFloat(season_total_weight2) / parseFloat(result);
        if (!isNaN(result)) {
            document.getElementById('per_cft_weight2').value = result.toFixed(2);
            document.getElementById('seasonout_total_cft2').value = seasonout_total_cft2.toFixed(2);
        }
    }

    $(".type_of_wood").change(function(){
          // alert(this.value);
          var type_of_wood = this.value;
          var chamber = $('#chamber1').val();
          $.ajax({
            type: 'post',
            dataType: 'JSON',
            data: {type_of_wood:type_of_wood,chamber: chamber},
            url: 'sav_files/get_seasonout_batchNo.php',
            success: function(response) {
              console.log(response);
              $('#seasonout_batch').val(response.data);
            }
          });
        });

        $(".type_of_wood1").change(function(){
          // alert(this.value);
          var type_of_wood = this.value;
          var chamber = $('#chamber2').val();
          $.ajax({
            type: 'post',
            dataType: 'JSON',
            data: {type_of_wood:type_of_wood,chamber: chamber},
            url: 'sav_files/get_seasonout_batchNo.php',
            success: function(response) {
              console.log(response);
              $('.seasonout_batch1').val(response.data);
            }
          });
        });

        function totalWeight_calc1() {
            var trolly1_weight = document.getElementById('trolly1_weight').value;                
            var trolly2_weight = document.getElementById('trolly2_weight').value;
            var total_weightresult = (parseFloat(trolly1_weight)) + parseFloat(trolly2_weight);
            if (!isNaN(total_weightresult)) {
                document.getElementById('season_total_weight1').value = total_weightresult.toFixed(3);
            }
        }

        function totalWeight_calc2() {
            var trolly1_weightc2 = document.getElementById('trolly1_weightc2').value;                
            var trolly2_weightc2 = document.getElementById('trolly2_weightc2').value;
            var total_weightresult2 = (parseFloat(trolly1_weightc2)) + parseFloat(trolly2_weightc2);
            if (!isNaN(total_weightresult2)) {
                document.getElementById('season_total_weight2').value = total_weightresult2.toFixed(3);
            }
        }
  </script>
</body>

</html>
<?php } ?>