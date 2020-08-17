<?php 
  session_start();
  if(empty($_SESSION['loggedin_id']))
  {
    header("Location: index.php");
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
        <style type="text/css">
            .nav-tabs li a {
                height: 54px;
            }
            
            .nav-tabs li {
                margin: 0 1px;
                width: 25%;
                padding: 0px !important;
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
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

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
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h2 class="h5 mb-0 text-gray-800 text-center" style="width: 100%;">Add Raw Material</h2>

                            </div>
                            <div class="container">

                                <ul class="nav nav-tabs">
                                    <li class=" py-3 "><a data-toggle="tab" href="#home" class="active">Add Raw Wood Stock</a></li>
                                    <li class="py-3 "><a data-toggle="tab" href="#menu1">Add Raw Glue Stock</a></li>
                                    <li class="py-3 "><a data-toggle="tab" href="#menu2">Add Sand Paper Stock</a></li>
                                    <li class="py-3 " style="width: 24%;"><a data-toggle="tab" href="#menu3">Add Packing Material Stock</a></li>
                                    <!-- <li class="py-3"><a data-toggle="tab" href="#menu4">Add Products</a></li> -->
                                </ul>

                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade show in active">
                                        <!--h3 class="text-center">Add Raw Wood Stock</h3-->

                                        <div class="col-lg-12">
                                            <div class="col-lg-4 col-xs-6" style="float: left;margin-bottom: 15px;text-align: left;">
                                                <!-- small box -->
                                                <div class="small-box bg-green">
                                                    <a href="excel/raw_wood_type.xlsx" class="small-box-footer btn btn-primary">Wood Type Excel <i class="fa fa-download"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xs-6" style="float: right;margin-bottom: 15px;text-align: right;">
                                                <!-- small box -->
                                                <div class="small-box bg-green">
                                                    <a href="total_raw_wood_added.php" class="small-box-footer">View Total Raw Wood Stock <i class="fa fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <form class="user" method="post" action="sav_files/sav_raw_wood_stock.php" style="clear: both;">
                                            <div class="col-lg-12">
                                                <div class="">

                                                    <div class="form-group row">
                                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                                            <input type="date" class="form-control form-control-user" name="recieved_date" placeholder="Date">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control form-control-user" name="name" placeholder="Name">
                                                        </div>
                                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="vehicle_number" placeholder="Vehicle Number">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control form-control-user" name="reference" placeholder="Reference">
                                                        </div>
                                                    </div>
                                                    
                                                    <hr>
                                                    <div class="form-group row">
                                                        <h3 class="text-center col-lg-12">Material Details</h3>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <select type="text" class="form-control" name="wood_type">
                                                                <option value="default" selected="selected">Wood type</option>
                                                                <?php
                                                                    $sql = "SELECT * FROM ta_wood_type where status = 1";
                                                                    $result = $conn->query($sql);
                                                                    while($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $row['id'];?>"><?php echo $row['wood_type'];?></option>
                                                            <?php } ?>
                                                                <!-- <option value="rose">Rose</option>
                                                                <option value="beech">Beech</option> -->
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" id="length" name="length" placeholder="Length in Ft">
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" id="width" name="width" placeholder="Width in Inches">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" id="thickness" name="thickness" placeholder="Thickness in Inches">
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" id="pieces" name="pieces" placeholder="Pieces">
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" id="weight" name="weight" placeholder="Weight in Kgs">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-user" id="cft" name="cft" placeholder="CFT"  onkeyup="addMaterialcbm_calc()">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-user" id="cbm" name="cbm" placeholder="CBM" onkeyup="addMaterialcft_calc()">                
                                                    </div>
                                                    

                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-user" name="price" id="material_price" placeholder="Price" onkeyup="addMaterialcbm_calc()">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-user" name="value" id="material_value" placeholder="Value">
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" name="gst" placeholder="GST 18%">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" name="transport_charges" placeholder="Transport Charges">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-user" name="other_charges" placeholder="Other Charges">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group row col-sm-12">
                                                <div class="col-sm-4" style="float:right">
                                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="add_rws" value="Add Raw Wood Stock">

                                                </div>
                                            </div>

                                        </form>

                                    </div>

                                    <div id="menu1" class="tab-pane fade  show ">
                                        <!--h3 class="text-center">Raw Glue Stock</h3-->

                                        <div class="col-lg-12">
                                            <div class="col-lg-4 col-xs-6" style="float: left;margin-bottom: 15px;text-align: left;">
                                                <div class="small-box bg-green">
                                                    <a href="excel/raw_glue.xlsx" class="small-box-footer btn btn-primary"> Raw Glue Excel <i class="fa fa-download"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xs-6" style="float: right;margin-bottom: 15px;text-align: right;">
                                                <!-- small box -->
                                                <div class="small-box bg-green">
                                                    <a href="total_raw_glue_added.php" class="small-box-footer">View Total Raw Glue Stock <i class="fa fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <form class="user" method="post" action="sav_files/sav_raw_glue_stock.php" style="clear: both;">
                                            <div class="col-lg-12">
                                                <div class="">

                                                    <div class="form-group row">
                                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                                            <input type="date" class="form-control form-control-user" name="recieved_date" placeholder="Date">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control form-control-user" name="name" placeholder="Name">
                                                        </div>
                                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="vehicle_number" placeholder="Vehicle Number">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control form-control-user" name="reference" placeholder="Reference">
                                                        </div>
                                                    </div>
                                                    
                                                    <hr>
                                                    <div class="form-group row">
                                                        <h3 class="text-center col-lg-12">Material Details</h3>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <select type="text" class="form-control" name="glue_type">
                                                                <option value="default" selected="selected">Glue type</option>
                                                                <?php
                                                                    $sql = "SELECT * FROM ta_glue where status = 1";
                                                                    $result = $conn->query($sql);
                                                                    while($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['glue_type']; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="quantity" placeholder="Quantity">
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="uom" placeholder="UOM (in kgs)">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="price" placeholder="Price">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="no_of_boxes" placeholder="No.of Boxes">
                                                        </div>

                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="gst" placeholder="GST 18%">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="transport_charges" placeholder="Transport Charges">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="other_charges" placeholder="Other Charges">
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="form-group row col-sm-12">
                                                <div class="col-sm-4" style="float:right">
                                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="add_rgs" value="Add Raw Glue Stock">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div id="menu2" class="tab-pane fade show ">
                                        <!--h3 class="text-center">Sand Paper Stock</h3-->

                                        <div class="col-lg-12">
                                            <div class="col-lg-4 col-xs-6" style="float: left;margin-bottom: 15px;text-align: left;">
                                                <div class="small-box bg-green">
                                                    <a href="excel/sand_paper.xlsx" class="small-box-footer btn btn-primary"> Sand Paper Excel <i class="fa fa-download"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xs-6" style="float: right;margin-bottom: 15px;text-align: right;">
                                                <!-- small box -->
                                                <div class="small-box bg-green">
                                                    <a href="total_sand_paper_added.php" class="small-box-footer">View Total Sand Paper Stock <i class="fa fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <form class="user" method="post" action="sav_files/sav_sand_paper_stock.php" style="clear: both;">
                                            <div class="col-lg-12">
                                                <div class="">

                                                    <div class="form-group row">
                                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                                            <input type="date" class="form-control form-control-user" name="recieved_date" placeholder="Date">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control form-control-user" name="name" placeholder="Name">
                                                        </div>
                                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="vehicle_number" placeholder="Vehicle Number">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control form-control-user" name="reference" placeholder="Reference">
                                                        </div>
                                                    </div>
                                                    
                                                    <hr>
                                                    <div class="form-group row">
                                                        <h3 class="text-center col-lg-12">Material Details</h3>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <select type="text" class="form-control" name="sand_paper_type">
                                                                <option value="default" selected="selected">Sand Paper type</option>
                                                                <?php
                                                                    $sql = "SELECT * FROM ta_sanding_grid_types where status = 1";
                                                                    $result = $conn->query($sql);
                                                                    while($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['paper_grid'];?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="quantity" placeholder="Quantity">
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="uom" placeholder="UOM (in kgs)">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="brand" placeholder="Brand">
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="price" placeholder="Price">
                                                        </div>

                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="gst" placeholder="GST 18%">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="transport_charges" placeholder="Transport Charges">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="other_charges" placeholder="Other Charges">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row col-sm-12">
                                                <div class="col-sm-4" style="float:right">
                                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="add_sps" value="Add Sand Paper Stock">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div id="menu3" class="tab-pane fade show ">
                                        <div class="col-lg-12">
                                            <div class="col-lg-4 col-xs-6" style="float: left;margin-bottom: 15px;text-align: left;">
                                                <div class="small-box bg-green">
                                                    <a href="excel/packing_material.xlsx" class="small-box-footer btn btn-primary"> Packing Material Excel <i class="fa fa-download"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xs-6" style="float: right;margin-bottom: 15px;text-align: right;">
                                                <!-- small box -->
                                                <div class="small-box bg-green">
                                                    <a href="total_packing_material_added.php" class="small-box-footer">View Total Packing Material Stock <i class="fa fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <form class="user" method="post" action="sav_files/sav_packing_material_stock.php" style="clear:both;">
                                            <div class="col-lg-12">
                                                <div class="">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                                            <input type="date" class="form-control form-control-user" name="recieved_date" placeholder="Date">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control form-control-user" name="name" placeholder="Name">
                                                        </div>
                                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="vehicle_number" placeholder="Vehicle Number">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control form-control-user" name="reference" placeholder="Reference">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <h3 class="text-center col-lg-12">Material Details</h3>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <select type="text" class="form-control" name="packing_material_type">
                                                                <option value="default" selected="selected">Select Packing Material</option>
                                                                <?php
                                                                    $sql = "SELECT * FROM ta_packing_type where status = 1";
                                                                    $result = $conn->query($sql);
                                                                    while($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['packing_type'];?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="brand" placeholder="Brand">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="price" placeholder="Price">
                                                        </div>

                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="gst" placeholder="GST 18%">
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="transport_charges" placeholder="Transport Charges">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="other_charges" placeholder="Other Charges">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="textboxDiv1">
                                                        <table class="form-table" id="customFields1">
                                                            <tr valign="top" style="padding: 5px;">
                                                                <td>
                                                                    <input type="text" class="form-control form-control-user" name="roles[]" placeholder="Roles">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control form-control-user" name="quantity[]" placeholder="Quantity">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control form-control-user" name="uom[]" placeholder="UOM (in kgs)">
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0);" class="addCF btn btn-primary btn-sm">Add</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <!-- <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="roles[]" placeholder="Roles">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="quantity[]" placeholder="Quantity">
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" name="uom[]" placeholder="UOM (in kgs)">
                                                        </div> -->

                                                    </div>
                                                    <!-- <div class="col-lg-12">
                                                        <div class="col-lg-4 col-xs-6" style="float: right;margin-bottom: 15px;text-align: right;">
                                                           
                                                            <div class="small-box bg-green">
                                                                <a class="small-box-footer" id="Add" style="color: #4e73df; cursor: pointer;">Add More <i class="fas fa-fw fa-plus-circle"></i></a>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    
                                                </div>
                                                <div class="form-group row"></div>
                                            </div>

                                            <div class="form-group row col-sm-12">
                                                <div class="col-sm-4" style="float:right">
                                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="add_pms" value="Add Packing Material Stock">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div id="menu4" class="tab-pane fade show ">
                                        <div class="col-lg-12">
                                            <div class="col-lg-4 col-xs-6" style="float: right;margin-bottom: 15px;text-align: right;">
                                                <div class="small-box bg-green">
                                                    <a href="total_products.php" class="small-box-footer">View Products <i class="fa fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <form class="user" method="post" action="sav_files/sav_product.php" style="clear: both;">
                                            <div class="col-lg-12">
                                                <div class="">

                                                    <!-- <div class="form-group row">
                                                      <div class="col-sm-3 mb-3 mb-sm-0">
                                                        <input type="date" class="form-control form-control-user" name="recieved_date" placeholder="Date">
                                                      </div>
                                                      <div class="col-sm-3">
                                                        <input type="text" class="form-control form-control-user" name="name" placeholder="Name">
                                                      </div>
                                                      <div class="col-sm-3 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" name="vehicle_number" placeholder="Vehicle Number">
                                                      </div>
                                                      <div class="col-sm-3">
                                                        <input type="text" class="form-control form-control-user" name="reference" placeholder="Reference">
                                                      </div>
                                                    </div>
                                                    <hr> -->
                                                    <div class="form-group row">
                                                        <h3 class="text-center col-lg-12">Add New Product</h3>

                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-user" name="product_name" placeholder="Enter Product Name">
                                                        </div>
                                                        <!-- <div class="col-sm-4 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="uom" placeholder="UOM (in kgs)">
              </div> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row"></div>

                                            </div>

                                            <div class="form-group row col-sm-12">
                                                <div class="col-sm-4" style="float:right">
                                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="add_pms" value="Add Product">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <!--script src="vendor/jquery/jquery.min.js"></script-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
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

        $(document).ready(function(){
            $(".addCF").click(function(){
                $("#customFields1").append('<tr valign="top" style="padding: 5px;"><td><input type="text" class="form-control form-control-user" name="roles[]" placeholder="Roles"></td><td><input type="text" class="form-control form-control-user" name="quantity[]" placeholder="Quantity"></td><td><input type="text" class="form-control form-control-user" name="uom[]" placeholder="UOM (in kgs)"></td><td>&nbsp; <a href="javascript:void(0);" class="remCF btn btn-primary btn-sm">Remove</a></td></tr>');
            });
            $("#customFields1").on('click','.remCF',function(){
                $(this).parent().parent().remove();
            });
        });

            function cft_weight_calc() {
                var weight = document.getElementById('weight').value;
                var cft = document.getElementById('cft').value;
                var result = parseFloat(weight) / parseFloat(cft);
                // var seasonout_total_cft1 = parseFloat(season_total_weight1) / parseFloat(result);
                if (!isNaN(result)) {
                    document.getElementById('cft').value = result.toFixed(6);
                    //document.getElementById('seasonout_total_cft1').value = seasonout_total_cft1.toFixed(6);  
                }
            }

            function addMaterialcbm_calc() {
                var cft = document.getElementById('cft').value;                
                var price = document.getElementById('material_price').value;
                var cbm_auto = 35.315;
                var result = (parseFloat(cft)) / parseFloat(cbm_auto);
                var value_auto_result = parseFloat(document.getElementById('cft').value) * parseFloat(price);
                if (!isNaN(result)) {
                    document.getElementById('cbm').value = result.toFixed(3);                    
                }
                if (!isNaN(value_auto_result)) {
                    document.getElementById('material_value').value = value_auto_result.toFixed(3);
                }
            }

            function addMaterialcft_calc() {
                var cbm = document.getElementById('cbm').value;                
                var price = document.getElementById('material_price').value;
                var cft_auto = 35.315;
                var result = (parseFloat(cbm)) * parseFloat(cft_auto);
                // var value_auto_result = parseFloat(document.getElementById('cbm').value) * parseFloat(price);
                if (!isNaN(result)) {
                    document.getElementById('cft').value = result.toFixed(3);                    
                }
                // if (!isNaN(value_auto_result)) {
                //     document.getElementById('material_value').value = value_auto_result.toFixed(3);
                // }
            }
        </script>

        <script type="text/javascript">
            $(function() {
                $('#Add').click(function() {
                    var newDiv = $('<div class="col-sm-4"><input type="text" class="form-control form-control-user" name="roles[]" placeholder="Roles"></div><div class="col-sm-4"><input type="text" class="form-control form-control-user" name="quantity[]" placeholder="Quantity"></div>              <div class="col-sm-4 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user" name="uom[]" placeholder="UOM (in kgs)"></div></br>');
                    //newDiv.style.background = "#000";
                    $('#textboxDiv').append(newDiv);
                });
            });
        </script>

    </body>

    </html>
    <?php } ?>