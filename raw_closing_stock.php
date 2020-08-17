<?php 
  session_start();
  if(empty($_SESSION['loggedin_id']))
  {
    header("Location: index.php");
  } else {
    
  include("db_connection.php"); 
  // $sql = "SELECT trw.*,wt.id wood_id, wt.wood_type FROM ta_raw_wood trw join ta_wood_type wt on (wt.id = trw.wood_type) ";
  $sql = "SELECT COUNT(trw.wood_type) woodcount,SUM(trw.thickness) as thickness, SUM(trw.cft) as cft, SUM(trw.cbm) as cbm, SUM(trw.price) as price, (SUM(trw.cft) * sum(trw.price)) as pricevalue, ((SUM(trw.cft) * sum(trw.price)) * 18)/100 as gst ,wt.id wood_id, wt.wood_type,SUM(trw.other_charges) as other_charges,SUM(trw.transport_charges) as transport_charges FROM ta_raw_wood trw join ta_wood_type wt on (wt.id = trw.wood_type) GROUP BY trw.wood_type";
  $resp = $conn->query($sql);


  // $gluesql = "SELECT trg.*,tg.glue_type glue_type_name FROM ta_raw_glue trg join ta_glue tg on (tg.id = trg.glue_type)";
  $gluesql = "SELECT COUNT(trg.glue_type) as gluecount, SUM(trg.quantity) as quantity,sum(trg.uom) as uom, sum(trg.price) as price, (sum(trg.price) * sum(trg.quantity)) as pricevalue, (((sum(trg.price) * sum(trg.quantity)) * 18)) / 100 as gst,tg.glue_type glue_type_name,SUM(trg.other_charges) as other_charges,SUM(trg.transport_charges) as transport_charges FROM ta_raw_glue trg join ta_glue tg on (tg.id = trg.glue_type) GROUP BY tg.glue_type";
  $respglue = $conn->query($gluesql);


  // $sandsql = "SELECT tsp.*,tsgt.paper_grid FROM ta_sand_paper tsp join ta_sanding_grid_types tsgt on(tsgt.id = tsp.sand_paper_type)";
  $sandsql = "SELECT count(tsp.sand_paper_type) as sandcount, tsp.brand, SUM(tsp.quantity) as quantity, SUM(tsp.uom) as uom, sum(tsp.price) price, (SUM(tsp.price) * SUM(tsp.quantity)) as pricevalue, ((SUM(tsp.price) * SUM(tsp.quantity)) * 18) /100 as gst,tsgt.paper_grid, SUM(tsp.other_charges) as other_charges,SUM(tsp.transport_charges) as transport_charges FROM ta_sand_paper tsp join ta_sanding_grid_types tsgt on(tsgt.id = tsp.sand_paper_type) GROUP BY tsp.sand_paper_type";
  $sandresp  = $conn->query($sandsql);

  // $packsql = "SELECT tpm.*,tr.role_id,tr.material_type_id,tr.roles no_roels,tr.quantity no_qty, tr.uom no_uom,tpt.packing_type FROM ta_packing_material tpm join ta_roles tr on (tr.material_type_id = tpm.pm_id) left join ta_packing_type tpt on (tpt.id = tpm.packing_material_type)";
  $packsql = "SELECT count(tpm.packing_material_type) packingcount,tpm.brand,SUM(tpm.price) price, (sum(tpm.price) * SUM(tr.quantity)) pricevalue, (((sum(tpm.price) * SUM(tr.quantity)) * 18 ) /100 ) as gst,tr.role_id,tr.material_type_id,tr.roles no_roels,SUM(tr.quantity) no_qty, SUM(tr.uom) no_uom,tpt.packing_type, SUM(tpm.other_charges) as other_charges,SUM(tpm.transport_charges) as transport_charges FROM ta_packing_material tpm join ta_roles tr on (tr.material_type_id = tpm.pm_id) left join ta_packing_type tpt on (tpt.id = tpm.packing_material_type) GROUP BY tpm.packing_material_type";
  $packresp  = $conn->query($packsql);

  $woodtypesql = "SELECT * from ta_wood_type";
  $woodTyperesp  = $conn->query($woodtypesql);
  
  while ($woodTyperesprows = $woodTyperesp->fetch_array()) {
      $woodtypedata[] = $woodTyperesprows;
  }
  // print_r($woodtypedata);die;
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
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Raw Wood Closing Stock</h6>
              <!-- <div class="small-box bg-green" style="float: right;">
                  <a href="excel/raw_wood_typeexcel.php" class="small-box-footer btn btn-primary">Wood Type Excel <i class="fa fa-download"></i></a>
              </div> -->
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0">
                    <!-- <input type="date" class="form-control form-control-user text-center" name="board_date"> -->
                  </div>
            <div class="card-body">
              
              <div class="table-responsive">
              	<!-- Board Manufacturing Table starts  -->
        				<div class="table-responsive">
        					<table class="table table-bordered requestTable" id="rawWoodClosingTable" width="100%" cellspacing="0">
        						<thead>
        							<tr>
        								<th>S.No</th>
        								<th>Wood</th>
                        <th>Thickness</th>
                        <th>CFT</th>
        								<th>CBM</th>
        								<th>Avg. Price</th>
        								<th>Value</th>
        								<th>GST 18%</th>
                        <th>Other Charges</th>
                        <th>Transport Charges</th>
        							</tr>
        						</thead>
        						<tbody>
                      <?php 
                      $sno = 1;
                      $counter = $thickness = 0;
                      $data = array();
                        while ($rows = $resp->fetch_array()) {
                      ?>
        							<tr>
        								<th><?php echo $sno++;?></th>
        								<th><?php echo $rows['wood_type']; ?></th>
                        <th><?php $thick = $rows['thickness'] / $rows['woodcount']; echo number_format($thick, 2, '.', '');?></th>
                        <th><?php $cft = $rows['cft'] / $rows['woodcount']; echo number_format($cft, 2, '.', '');?></th>
        								<th><?php $cbm = $rows['cbm'] / $rows['woodcount']; echo number_format($cbm, 2, '.', '');?></th>
        								<th><?php $price = $rows['price'] / $rows['woodcount']; echo number_format($price, 2, '.', '');?></th>
        								<th><?php $pricevalue =  $rows['pricevalue'] / $rows['woodcount']; echo number_format($pricevalue, 2, '.', '');?></th>
        								<th><?php $gst = $rows['gst']/ $rows['woodcount']; echo number_format($gst, 2, '.', '');?></th> 
                        <th><?php echo $rows['other_charges'];?></th>
                        <th><?php echo $rows['transport_charges']; ?></th>
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
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Raw Glue Closing Stock</h6>
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0">
                    <!-- <input type="date" class="form-control form-control-user text-center" name="board_date"> -->
                  </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <!-- Board Manufacturing Table starts  -->
                <div class="table-responsive">
                  <table class="table table-bordered requestTable" id="rawGlueClosingTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Type</th>
                        <th>Quantity</th>
                        <th>UOM</th>
                        <th>Price</th>
                        <th>Value</th>
                        <th>GST 18%</th>
                        <th>Other Charges</th>
                        <th>Transport Charges</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $sno = 1;
                        while ($gluerows = $respglue->fetch_array()) {
                      ?>
                      <tr>
                        <th><?php echo $sno++;?></th>
                        <th><?php echo $gluerows['glue_type_name']; ?></th>
                        <th><?php echo $gluerows['quantity'] / $gluerows['gluecount']; ?></th>
                        <th><?php $var = $gluerows['uom'] / $gluerows['gluecount']; echo number_format($var, 2, '.', '');?></th>
                        <th><?php $price = $gluerows['price'] / $gluerows['gluecount']; echo number_format($price, 2, '.', '');?></th>
                        <th><?php echo $gluerows['pricevalue'] / $gluerows['gluecount'];?></th>
                        <th><?php echo $gluerows['gst'] / $gluerows['gluecount'];?></th>
                        <th><?php echo $gluerows['other_charges']; ?></th>
                        <th><?php echo $gluerows['transport_charges']; ?></th>
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
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Sand Paper Closing Stock</h6>
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0">
                    <!-- <input type="date" class="form-control form-control-user text-center" name="board_date"> -->
                  </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <div class="table-responsive">
                  <table class="table table-bordered requestTable" id="sandPaperClosingTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>UOM</th>
                        <th>Price</th>
                        <th>Value</th>
                        <th>GST 18%</th>
                        <th>Other Charges</th>
                        <th>Transport Charges</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $sno = 1;
                        while ($sandrows = $sandresp->fetch_array()) {
                      ?>
                      <tr>
                        <th><?php echo $sno++;?></th>
                        <th><?php echo $sandrows['paper_grid']; ?></th>
                        <th><?php echo $sandrows['brand']; ?></th>
                        <th><?php $qty = $sandrows['quantity'] / $sandrows['sandcount']; echo number_format($qty, 2, '.', ''); ?></th>
                        <th><?php $uom = $sandrows['uom'] / $sandrows['sandcount']; echo number_format($uom, 2, '.', '');?></th>
                        <th><?php $price = $sandrows['price'] / $sandrows['sandcount']; number_format($price, 2, '.', '');?></th>
                        <th><?php $pricevalue = $sandrows['pricevalue'] / $sandrows['sandcount']; echo number_format($pricevalue, 2, '.', '');?></th>
                        <th><?php $gst = $sandrows['gst'] / $sandrows['sandcount']; echo number_format($gst, 2, '.', '');?></th>
                        <th><?php echo $sandrows['other_charges']; ?></th>                   
                        <th><?php echo $sandrows['transport_charges']; ?></th>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              <hr>
                
              </div>
            </div>
          </div>
        </div>

        <div class="">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Packing Material</h6>
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0">
                    <!-- <input type="date" class="form-control form-control-user text-center" name="board_date"> -->
                  </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <!-- Board Manufacturing Table starts  -->
                <div class="table-responsive">
                  <table class="table table-bordered requestTable" id="packingMaterialTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Roles</th>
                        <th>Quantity</th>
                        <th>UOM</th>
                        <th>Price</th>
                        <th>Value</th>
                        <th>GST 18%</th>
                        <th>Other Charges</th>
                        <th>Transport Charges</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $sno = 1;
                        while ($packingrows = $packresp->fetch_array()) {
                          // echo "<pre>";print_r($packingrows);die;
                      ?>
                      <tr>
                        <th><?php echo $sno++;?></th>
                        <th><?php echo $packingrows['packing_type']; ?></th>
                        <th><?php echo $packingrows['brand']; ?></th>
                        <th><?php $roles = $packingrows['no_roels'] / $packingrows['packingcount']; echo number_format($roles, 2, '.', '');?></th>
                        <th><?php $qty = $packingrows['no_qty'] / $packingrows['packingcount']; echo number_format($qty, 2, '.', '');?></th>
                        <th><?php $uom = $packingrows['no_uom'] / $packingrows['packingcount']; echo number_format($uom, 2, '.', '');?></th>
                        <th><?php $price = $packingrows['price'] / $packingrows['packingcount']; echo number_format($price, 2, '.', '');?></th>
                        <th><?php $pricevalue = $packingrows['pricevalue']  / $packingrows['packingcount']; echo number_format($pricevalue, 2, '.', '');?></th>
                        <th><?php $gst = $packingrows['gst'] / $packingrows['packingcount']; echo number_format($gst, 2, '.', '');?></th> 
                        <th><?php echo $packingrows['other_charges']; ?></th>
                        <th><?php echo $packingrows['transport_charges']; ?></th>
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

  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>


  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php } ?>
