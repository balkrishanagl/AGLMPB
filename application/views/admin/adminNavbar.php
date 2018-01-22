<header class="main-header">

<style>
/* .main-header .logo {
    -webkit-transition: width .3s ease-in-out;
    -o-transition: width .3s ease-in-out;
    transition: width .3s ease-in-out;
    display: block;
    float: left;
    height: 55px;
    font-size: 20px;
    line-height: 50px;
    text-align: center;
    width: 220px !important; 
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    padding: 0 0px;
    font-weight: 300;
    overflow: hidden;
}

.skin-blue .main-header .navbar {
    background-color: #0f4577;
}

.skin-blue .sidebar-menu>li.header {
    color: #051d35;
    background: #ffffff;
}

.skin-blue .main-sidebar, .skin-blue .left-side {
    background-color: #051d35;
}

.skin-blue .main-header .navbar {
    background-color: #051d35;
}

.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
    background-color: #051d35;
} */
</style>

  <!-- Logo -->
  <a href="" class="logo" style="padding:0;" >
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <!-- <span class="logo-mini"><b>A</b>LT</span> -->
    <!-- logo for regular state and mobile devices -->
    <!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
    <span class="logo-lg"><img src="<?php echo base_url() ?>assets/admin/img/logo.png"></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less deleted-->

        <!-- Notifications: style can be found in dropdown.less deleted -->

        <!-- Tasks: style can be found in dropdown.less  deleted-->

        <!-- User Account: style can be found in dropdown.less deleted -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION['uName'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

              <p>
                <?php echo $_SESSION['uName'] ?>
                <small><?php echo $_SESSION['uEmail'] ?></small>
              </p>
            </li>
            <!-- Menu Body -->
            <!-- <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div> -->
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo base_url() ?>index.php/adminDashboard/adminLogout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <!-- <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li> -->
      </ul>
    </div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?=$_SESSION['uName']?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
     <!--  <li class="header">MAIN NAVIGATION</li> -->
      <li><a href="<?php echo base_url() ?>index.php/adminDashboard/home"><i class="fa fa-book"></i> <span>Developers</span></a></li>
      <!-- <li><a href="<?php echo base_url() ?>index.php/adminDashboard/home"><i class="fa fa-users"></i> <span>Project Managers</span></a></li> -->
      <!-- <li><a href="<?php echo base_url() ?>index.php/adminDashboard/home"><i class="fa fa-envelope"></i> <span>Ad Requests</span></a></li> -->
      <?php
      if($_SESSION['uType'] == 'admin')
      { ?>
        <li><a href="<?php echo base_url() ?>index.php/adminDashboard/adminLocationList"><i class="fa fa-map"></i> <span>Locations</span></a></li>
        <li><a href="<?php echo base_url() ?>index.php/adminDashboard/listSearchAds"><i class="fa fa-star-o"></i> <span>Search Ads</span></a></li>
        <!-- <li><a href="<?php echo base_url() ?>index.php/adminDashboard/adminProjectShowcase"><i class="fa fa-star-o"></i> <span>Project Showcase</span></a></li>
        <li><a href="<?php echo base_url() ?>index.php/adminDashboard/adminQuickLinks"><i class="fa fa-star-o"></i> <span>Quick Links</span></a></li>
        <li><a href="<?php echo base_url() ?>index.php/adminDashboard/askExpertList"><i class="fa fa-star-o"></i> <span>Ask Experts</span></a></li> -->
        <li><a href="<?php echo base_url() ?>index.php/adminDashboard/projectListView"><i class="fa fa-star-o"></i> <span>All Projects</span></a></li>
        <li><a href="<?php echo base_url() ?>index.php/adminDashboard/nearbyLocationList"><i class="fa fa-star-o"></i> <span>Nearby Locations</span></a></li>
        <!-- <li><a href="<?php echo base_url() ?>index.php/adminDashboard/featuredPagesList"><i class="fa fa-star-o"></i> <span>Featured Pages</span></a></li> -->
        <li><a href="<?php echo base_url() ?>index.php/adminDashboard/facilitiesList"><i class="fa fa-star-o"></i> <span>Facilities</span></a></li>
        <li><a href="<?php echo base_url() ?>index.php/adminDashboard/addslider"><i class="fa fa-star-o"></i> <span>Add Pay Slider</span></a></li>
        <li><a href="#"><i class="fa fa-star-o"></i> <span>Project Site Visit</span></a></li>
        <li><a href="#"><i class="fa fa-star-o"></i> <span>Boutiques</span></a></li>
        <li><a href="#"><i class="fa fa-star-o"></i> <span>Recommendations Slider</span></a></li>
        <li><a href="#"><i class="fa fa-star-o"></i> <span>Post Properties</span></a></li>
        <li><a href="#"><i class="fa fa-star-o"></i> <span>Contract Details</span></a></li>
      <?php } ?>
      <li><a href="<?php echo base_url() ?>index.php/adminDashboard/contactBuilderList"><i class="fa fa-star-o"></i> <span>Contact Builder</span></a></li>

      <!-- <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li> -->
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Layout Options</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">4</span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
          <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
          <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
        </ul>
      </li> -->
      <!-- <li>
        <a href="pages/widgets.html">
          <i class="fa fa-th"></i> <span>Widgets</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span>
        </a>
      </li> -->
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Charts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
          <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
          <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
        </ul>
      </li> -->
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>UI Elements</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
          <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
          <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
          <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
          <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
          <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
        </ul>
      </li> -->
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Forms</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
          <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
          <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Tables</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
          <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
        </ul>
      </li>
      <li>
        <a href="pages/calendar.html">
          <i class="fa fa-calendar"></i> <span>Calendar</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">3</small>
            <small class="label pull-right bg-blue">17</small>
          </span>
        </a>
      </li>
      <li>
        <a href="pages/mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-yellow">12</small>
            <small class="label pull-right bg-green">16</small>
            <small class="label pull-right bg-red">5</small>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Examples</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
          <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
          <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
          <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
          <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
          <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
          <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
          <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
          <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Multilevel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Level One
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li>
      <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul> -->
  </section>
  <!-- /.sidebar -->
</aside>
