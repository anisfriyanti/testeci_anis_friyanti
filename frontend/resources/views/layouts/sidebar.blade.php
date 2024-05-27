<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
        <li>
            <a href="{{ URL::to('star') }}">
              <i class="fa fa-th"></i> <span>Test 1</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
        </li>
        <li>
          <a href="{{ URL::to('currency') }}">
            <i class="fa fa-th"></i> <span>Test 2</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data Perusahaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ URL::to('karyawan') }}"><i class="fa fa-circle-o"></i> Data Karyawan</a></li>
            <li><a href="{{ URL::to('jabatan') }}"><i class="fa fa-circle-o"></i> Data Jabatan</a></li>
            <li><a href="{{ URL::to('level') }}"><i class="fa fa-circle-o"></i> Data level</a></li>
            <li><a href="{{ URL::to('department') }}"><i class="fa fa-circle-o"></i> Data Department</a></li>
          </ul>
        </li>
       

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>