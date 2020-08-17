<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.html">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">Timber ERP system<sup>*</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!--div class="sidebar-heading">
        Interface
      </div-->

      <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="material_add.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Add Material</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed material" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
          <i class="fas fa-fw fa-plus"></i>
          <span>Add Products</span>
        </a>
        <div id="collapseProducts" class="collapse material_drop" aria-labelledby="collapseProducts" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--h6 class="collapse-header">Custom Utilities:</h6-->
            <a class="collapse-item" href="total_wood_types.php">Wood Type </a>
            <a class="collapse-item" href="total_gradations.php">Gradation </a>
            <a class="collapse-item" href="total_glue.php">Add Glue Type </a>
            <a class="collapse-item" href="total_paper_grids.php">Add Sanding Paper Grid </a>
            <a class="collapse-item" href="total_packing_types.php">Add Packing Type</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="opening_stock.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Opening Stock</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed material" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Material</span>
        </a>
        <div id="collapseUtilities" class="collapse material_drop" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--h6 class="collapse-header">Custom Utilities:</h6-->
            <a class="collapse-item" href="total_raw_wood_added.php">View Total Raw Wood Stock </a>
            <a class="collapse-item" href="total_raw_glue_added.php">View Total Raw Glue Stock </a>
            <a class="collapse-item" href="total_sand_paper_added.php">View Total Sand Paper Stock </a>
            <a class="collapse-item" href="total_packing_material_added.php">View Total Packing Material Stock </a>
          </div>
        </div>
      </li>
      
       <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Material</span>
        </a>
       <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li> -->
	  
	  <li class="nav-item">
        <a class="nav-link collapsed material" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="false" aria-controls="collapseOrder">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Order</span>
        </a>
        <div id="collapseOrder" class="collapse material_drop" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--h6 class="collapse-header">Custom Utilities:</h6-->
            <a class="collapse-item" href="orders.php">Orders</a>
            <a class="collapse-item" href="order_add.php">Add Order</a>
          </div>
        </div>
      </li>
      
	  
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Production Schedule</span>
        </a>
        <div id="collapseTwo" class="collapse material_drop" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-3 collapse-inner rounded">
            <!--h6 class="collapse-header">Custom Utilities:</h6-->
            <a class="collapse-item" href="production_schedule.php">Production Schedule</a>
          </div>
        </div>
      </li>
	  
    <li class="nav-item">
        <a class="nav-link collapsed material" href="#" data-toggle="collapse" data-target="#collapseProductionProcess" aria-expanded="false" aria-controls="collapseProductionProcess">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Production Process</span>
        </a>
        <div id="collapseProductionProcess" class="collapse material_drop" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-3 collapse-inner rounded">
            <!--h6 class="collapse-header">Custom Utilities:</h6-->
            <a class="collapse-item" href="seasoning_input.php">Seasoning Input</a>
            <a class="collapse-item" href="seasoning_output.php">Seasoning Output</a>
            <a class="collapse-item" href="long_length_manufacturing.php">Long Length Manufacturing</a>
            <a class="collapse-item" href="board_manufacturing.php">Board Manufacturing</a>
            <a class="collapse-item" href="sanding.php">Sanding</a>
            <a class="collapse-item" href="packing.php">Packing</a>
          </div>
        </div>
      </li>

	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
          <i class="fas fa-fw fa-cog"></i>
          <span>Reports</span>
        </a>
        <div id="collapseReports" class="collapse material_drop" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-3 collapse-inner rounded">
            <a class="collapse-item" href="raw_closing_stock.php">Raw Closing Stock</a>
            <a class="collapse-item" href="raw_consumtion_stock.php">Raw Consumtion Stock</a>
            <a class="collapse-item" href="production_stock.php">Production Stock</a>
            <!-- <a class="collapse-item" href="finish_product_stock.php">Finish Product Stock</a> -->
            <a class="collapse-item" href="long_length_costing_report.php">Long Length costing Report</a>
            <a class="collapse-item" href="production_costing_report.php">Production costing Report</a>
          </div>
        </div>
      </li>

      

      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
     <!--  <div class="sidebar-heading">
        Addons
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
     <!--  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Charts -->
     <!--  <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->

      <!-- Nav Item - Tables -->
     <!--  <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>