<?php 
  session_start();
  if(empty($_SESSION['loggedin_id']))
  {
    header("Location: index.php");
  } else {
    
  include("db_connection.php"); 
  // $sql = "SELECT trw.*,trw.cft minraw_wood_cft,trw.cbm minraw_wood_cbm,llm.cft moraw_wood_cft,llm.cbm moraw_wood_cbm,wt.id wood_type_id, wt.wood_type wood_type_name,wop.cft opening_wood_cft,wop.cbm opening_wood_cbm FROM ta_raw_wood trw join ta_wood_opening_stock wop on (wop.id = trw.wood_type) inner join ta_ll_manufacturing llm on (llm.type_of_wood = trw.wood_type) join ta_wood_type wt on (wt.id = trw.wood_type)";
  $sql = "SELECT COUNT(trw.wood_type) woodcount,SUM(trw.thickness) thickness,SUM(trw.cft) minraw_wood_cft,SUM(trw.cbm) minraw_wood_cbm,SUM(llm.cft) moraw_wood_cft,SUM(llm.cbm) moraw_wood_cbm,wt.id wood_type_id, wt.wood_type wood_type_name,wop.cft opening_wood_cft,wop.cbm opening_wood_cbm FROM ta_raw_wood trw join ta_wood_opening_stock wop on (wop.id = trw.wood_type) inner join ta_ll_manufacturing llm on (llm.type_of_wood = trw.wood_type) join ta_wood_type wt on (wt.id = trw.wood_type) GROUP BY trw.wood_type";
  $resp = $conn->query($sql);


  // $gluesql = "SELECT trg.*,tg.glue_type glue_type_name,gos.qty opening_glue_stock FROM ta_raw_glue trg join ta_glue tg on (tg.id = trg.glue_type) left join ta_glue_opening_stock gos on (gos.glue_type = trg.glue_type)";
  $gluesql = "SELECT COUNT(trg.glue_type) gluecount,SUM(trg.quantity) quantity,tg.glue_type glue_type_name,SUM(gos.qty) opening_glue_stock FROM ta_raw_glue trg join ta_glue tg on (tg.id = trg.glue_type) left join ta_glue_opening_stock gos on (gos.glue_type = trg.glue_type) GROUP BY trg.glue_type";
  $respglue = $conn->query($gluesql);


  // $sandsql = "SELECT tsp.*,tsgt.paper_grid paper_grid_type,sos.qty sanding_opening_stock FROM ta_sand_paper tsp join ta_sanding_grid_types tsgt on (tsgt.id = tsp.sand_paper_type) left join ta_sand_opening_stock sos on (sos.sand_type = tsp.sand_paper_type)";
  $sandsql = "SELECT COUNT(tsp.sand_paper_type) sandcount,SUM(tsp.quantity) as quantity,tsp.brand,tsgt.paper_grid paper_grid_type,SUM(sos.qty) sanding_opening_stock FROM ta_sand_paper tsp join ta_sanding_grid_types tsgt on (tsgt.id = tsp.sand_paper_type) left join ta_sand_opening_stock sos on (sos.sand_type = tsp.sand_paper_type) GROUP BY tsp.sand_paper_type";
  $sandresp  = $conn->query($sandsql);

  $packsql = "SELECT tpm.*,tr.role_id,tr.material_type_id,tr.roles no_roels,tr.quantity no_qty, tr.uom no_uom,tpt.packing_type,tp.weight,tp.brand FROM ta_packing_material tpm join ta_roles tr on (tr.material_type_id = tpm.pm_id) left join ta_packing_type tpt on (tpt.id = tpm.packing_material_type) join ta_packing tp on (tp.packing_id = tpm.pm_id) ";
  $packresp  = $conn->query($packsql);
  
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
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Raw Wood Consmption Report</h6>
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
        								<th>S.No</th>
        								<th>Wood</th>
                        <th>Thickness</th>
                        <th colspan="2">Opening Stock</th>
                        <th colspan="2">Material In</th>
                        <th colspan="2">Material Out</th>
        								<th colspan="2">Closing Stock</th>
        							</tr>
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>CFT</th>
                        <th>CBM</th>
                        <th>CFT</th>
                        <th>CBM</th>
                        <th>CFT</th>
                        <th>CBM</th>
                        <th>CFT</th>
                        <th>CBM</th>
                      </tr>
        						</thead>
        						<tbody>
                      <?php 
                      $sno = 1;
                        while ($rows = $resp->fetch_array()) {
                          // print_r($rows);die;
                      ?>
        							<tr>
        								<th><?php echo $sno++;?></th>
        								<th><?php echo $rows['wood_type_name']; ?></th>
                        <th><?php $thickness = $rows['thickness'] / $rows['woodcount']; echo number_format($thickness, 2, '.', '');?></th>
                        <th><?php $opencft = $rows['opening_wood_cft'] / $rows['woodcount']; echo number_format($opencft, 2, '.', '');?></th>
        								<th><?php $openwood = $rows['opening_wood_cbm'] / $rows['woodcount']; echo number_format($openwood, 2, '.', '');?></th>
                        <th><?php $rawwoodcft = $rows['minraw_wood_cft'] / $rows['woodcount']; echo number_format($rawwoodcft, 2, '.', '');?></th>
                        <th><?php $rawwoodcbm = $rows['minraw_wood_cbm'] / $rows['woodcount']; echo number_format($rawwoodcbm, 2, '.', '');?></th>
                        <th><?php $rawmocft = $rows['moraw_wood_cft'] / $rows['woodcount']; echo number_format($rawmocft, 2, '.', '');?></th>
                        <th><?php $rawmocbm = $rows['moraw_wood_cbm'] / $rows['woodcount']; echo number_format($rawmocbm, 2, '.', '');?></th>
        								<th><?php ?></th>
        								<th><?php ?></th>
        							</tr>
                    <?php } ?>
        						</tbody>
        					</table>
        				</div>
            	<!-- Board Manufacturing Table ends  -->
            	<hr>
                
              </div>
            </div>
          </div>
        </div>

        <div class="">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Raw Glue Consumtion Report</h6>
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
                        <th>S.No</th>
                        <th>Type</th>
                        <!-- <th>Brand</th> -->
                        <th>Opening Stock</th>
                        <th>Meterial In</th>
                        <th>Meterial Out</th>
                        <th>Closing Stock</th>
                      </tr>
                    </thead>  
                    <tbody>
                      <?php 
                      $sno = 1;
                        while ($gluerows = $respglue->fetch_array()) {
                          // echo "<pre>";print_r($gluerows);die;
                      ?>
                      <tr>
                        <th><?php echo $sno++;?></th>
                        <th><?php echo $gluerows['glue_type_name']; ?></th>
                        <th><?php $stock = $gluerows['opening_glue_stock']; echo number_format($stock, 2, '.', '');?></th>
                        <th><?php $qty = $gluerows['quantity']; echo number_format($qty, 2, '.', '');?></th>
                        <th><?php //echo $gluerows['price'];?></th>
                        <th><?php //echo $gluerows['price'] * $gluerows['quantity'];?></th>
                        <th><?php ?></th>                      
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              <!-- Board Manufacturing Table ends  -->
              <hr>
                
              </div>
            </div>
          </div>
        </div>

        <div class="">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Sand Paper Consumtion Report</h6>
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
                        <th>S.No</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Opening Stock</th>
                        <th>Meterial In</th>
                        <th>Meterial Out</th>
                        <th>Closing Stock</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $sno = 1;
                        while ($sandrows = $sandresp->fetch_array()) {
                          // echo "<pre>";print_r($sandrows);die;
                      ?>
                      <tr>
                        <th><?php echo $sno++;?></th>
                        <th><?php echo $sandrows['paper_grid_type']; ?></th>
                        <th><?php echo $sandrows['brand']; ?></th>
                        <th><?php $stock = $sandrows['sanding_opening_stock'] / $sandrows['sandcount']; echo number_format($stock, 2, '.', '');?></th>
                        <th><?php $qty =  $sandrows['quantity'] / $sandrows['sandcount']; echo number_format($qty, 2, '.', '');?></th>
                        <th><?php //echo $sandrows['price'];?></th>
                        <th><?php ?></th>
                                             
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              <!-- Board Manufacturing Table ends  -->
              <hr>
                
              </div>
            </div>
          </div>
        </div>

        <div class="">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Packing Material Consumtion Report </h6>
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
                        <th>S.No</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th colspan="2">Opening Stock</th>
                        <th colspan="2">Material In</th>
                        <th colspan="2">Material Out</th>
                        <th colspan="2">Closing Stock</th>
                      </tr>
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Role</th>
                        <th>Weight</th>
                        <th>Role</th>
                        <th>Weight</th>
                        <th>Role</th>
                        <th>Weight</th>
                        <th>Role</th>
                        <th>Weight</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $sno = 1;
                        while ($packingrows = $packresp->fetch_array()) {
                          // echo "<pre>";print_r($packingrows);
                      ?>
                      <tr>
                        <th><?php echo $sno++;?></th>
                        <th><?php echo $packingrows['packing_type']; ?></th>
                        <th><?php echo $packingrows['brand']; ?></th>
                        <th><?php echo $packingrows['no_roels']; ?></th>
                        <th><?php echo $packingrows['weight'];?></th>
                        <th><?php ?></th>
                        <th><?php ?></th>
                        <th><?php ?></th>
                        <th><?php ?></th>
                        <th><?php ?></th> 
                        <th><?php ?></th>                    
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              <!-- Board Manufacturing Table ends  -->
              <hr>
                
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

</body>

</html>
<?php } ?>
