<?php 
  session_start();
  if(empty($_SESSION['loggedin_id']))
  {
    header("Location: index.php");
  } else {
    
  include("db_connection.php");

  $sql = "SELECT tbm.*,wt.id wood_id,wt.wood_type, tg.gradation  FROM ta_board_manufacturing tbm join ta_gradation tg on (tg.id = tbm.gradiation) join ta_wood_type wt on (wt.id = tbm.type_of_wood)";
  $resp = $conn->query($sql);
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
          <div class="container-fluid d-sm-flex align-items-center justify-content-between mb-4 mt-2">
            <!--h2 class="h5 mb-0 text-gray-800 text-center" style="width: 100%;">Add Raw Material</h2-->	
            <a href="addMonthlyCost.php" class="btn btn-primary">Enter Monthly Cost</a>	
          </div>
        <div class="">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;">Production Costing Report</h6>
            </div>
            <div class="card-body">
              
              <div class="table-responsive">
              	<!-- Board Manufacturing Table starts  -->
        				<div class="table-responsive">
        					<table class="table table-bordered requestTable" id="rawWoodClosingTable" width="100%" cellspacing="0">
        						<thead>
        							<tr>
                        <th>S.No</th>
        								<th>Type</th>
                        <th>Gradiation</th>
                        <th>Width</th>
        								<th>Length</th>
                        <th>Width</th>
        								<th>Thickness</th>
        								<th>Qty Pcs</th>
                        <th>Qty Sqm</th>
                        <th>Qty Sq Ft</th>
                        <th>Avg Long length Consumed Pcs / CFT for Board Manufacturing </th>
                        <th>Avg cost per pcs </th>
                        <th>Avg Cost of Glue per board </th>
                        <th>No of Long Legth * Avg Cost per Pcs</th>
                        <th>Glue Cost </th>
                        <th>Total Cost </th>
                        <th>Cost Per Board</th>
                        <th>Labour</th>
                        <th>Power</th>
                        <th>Mis</th>
                        <th>Mis Cost total</th>
                        <th>Mis cost per Sq ft</th>
                        <th>Price Per Sq Ft Total Cost / Total Sq ft</th>
                        <th>Cost Price Per Sq ft</th>
        							</tr>
        						</thead>
        						<tbody>
                      <?php 
                      $sno = 1;
                      $counter = $thickness = 0;
                      $data = array();

                      $sqlMonthlyCost = "SELECT * FROM ta_monthly_cost";
                      $respMonthlyCost = $conn->query($sqlMonthlyCost);
                      $rowDetails = mysqli_fetch_array($respMonthlyCost,MYSQLI_ASSOC);
                      $labourCost = $rowDetails['labour_cost'];
                      $electricCost = $rowDetails['electric_cost'];
                      $misCost = $rowDetails['mis_cost'];
                      $totalMisCost = $rowDetails['total_cost'];

                        while ($rows = $resp->fetch_assoc()) {

                          // FETCH DATA FROM LL_MANU
                          $rowBatchNo = $rows['bm_batch_no'];
                          // echo $rowBatchNo;
                          $sqlFetchLL = "SELECT * FROM ta_ll_manufacturing WHERE batch_no = '$rowBatchNo'";
                          $resultFetchDetails = $conn->query($sqlFetchLL);
                          $rowDetails = mysqli_fetch_array($resultFetchDetails,MYSQLI_ASSOC);

                          $avgCostPerPieces = $rowDetails['avg_price_per_pieces'];

                          $totalPieces = 0;
                          $numberOfRows = mysqli_num_rows($resultFetchDetails);
                          while ($rowDetails = mysqli_fetch_array($resultFetchDetails,MYSQLI_ASSOC)) {
                            if ($rowDetails['pieces']) {
                              $totalPieces = $totalPieces+$rowDetails['pieces'];
                            }
                          }
                          $avgLL = $totalPieces/$numberOfRows;
                          // echo $llPiecec;

                          // echo "<pre>";print_r($rows);
                          $avgPrice = "select price from ta_raw_wood where wood_type = ".$rows['type_of_wood']." and status = 1";
                          $avgPriceresp = $conn->query($avgPrice);
                          $avgPriceRows = $avgPriceresp->fetch_array();

                          $avgGlue = "select trg.price from ta_raw_glue trg join ta_consumed_glue tcg on (trg.glue_type = tcg.glue_type) where tcg.wood_id = ".$rows['type_of_wood']." and trg.status = 1";
                          $avgGlueresp = $conn->query($avgGlue);
                          $avgGlueRows = $avgGlueresp->fetch_array();
                          $rowGradiation = $rows['gradiation'];
                          // echo $rowGradiation;
                          $gradiationSql = "SELECT * FROM ta_gradation where id = '$rowGradiation'";
                          $gradiationresp = $conn->query($gradiationSql);
                          $gradiationRows = mysqli_fetch_array($gradiationresp,MYSQLI_ASSOC);

                          $getGlue = "SELECT * FROM ta_consumed_glue WHERE board_batch_id = '$rowBatchNo' ";
                          $getGlueResp = $conn->query($getGlue);
                          
                          $rowGetGlue = mysqli_fetch_array($getGlueResp,MYSQLI_ASSOC);

                          $glueType = $rowGetGlue['glue_type'];
                          $qty = $rowGetGlue['qty'];
                          // echo $qty;

                          $avgGlue = "SELECT * FROM ta_raw_glue WHERE glue_type = '$glueType' ";
                          $avgGlueresp = $conn->query($avgGlue);
                          
                          $rowRawGlue = mysqli_fetch_array($avgGlueresp,MYSQLI_ASSOC);

                          $gluePrice = $rowRawGlue['price'];

                          $glueCost = $gluePrice*$rows['no_of_pieces'];
                          $totalCost = ($avgCostPerPieces*$gluePrice)+$glueCost;
                      ?>
        							<tr>
        								<th><?php echo $sno++;?></th>
        								<th><?php echo $rows['wood_type']; ?></th>
                        <th><?php echo $gradiationRows['gradation']; ?></th>
                        <th><?php echo $rows['width']; ?></th>
                        <th><?php echo $rows['length']; ?></th>
                        <th><?php echo $rows['widthg']; ?></th>
        								<th><?php echo $rows['thickness'];?></th>
        								<th><?php echo $rows['no_of_pieces'];?></th>
        								<th><?php echo $rows['sqm'];?></th> 
                        <th><?php echo $rows['sqft'];?></th>
                        <th><?php echo $avgLL; ?></th>
                        <th><?php echo $avgCostPerPieces;?></th>
                        <th><?php echo $gluePrice; ?></th>
                        <th><?php echo $avgCostPerPieces*$gluePrice;?></th>
                        <th><?php echo $glueCost; ?></th>
                        <th><?php echo $totalCost; ?></th>
                        <th><?php echo $totalCost/$rows['no_of_pieces']; ?></th>
                        <th><?php echo $labourCost;?></th>
                        <th><?php echo $electricCost;?></th>
                        <th><?php echo $misCost; ?></th>
                        <th><?php echo $totalMisCost;?></th>
                        <th><?php echo $totalMisCost/$rows['sqft']; ?></th>
                        <th><?php echo $totalCost/$rows['sqft']; ?></th>
                        <th><?php echo ($totalMisCost/$rows['sqft'])+($totalCost/$rows['sqft']); ?></th>
        							</tr>
                    <?php } ?>
        						</tbody>
        					</table>
        				</div>
            	<!-- Long length Table ends  -->
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
