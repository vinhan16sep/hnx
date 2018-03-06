<?php if ($this->ion_auth->logged_in()): ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo site_url('assets/admin/') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- <li class="treeview menu-open">
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
        <li class="<?php echo ($this->uri->segment(2) == 'about')? 'active' : ''; ?>">
            <a href="<?php echo base_url('admin/about'); ?>">
                <i class="fa fa-address-book"></i> <span>About</span>
            </a>
        </li>
        <li class="<?php echo ($this->uri->segment(2) == 'menu')? 'active' : ''; ?>">
            <a href="<?php echo base_url('admin/menu'); ?>">
                <i class="fa fa-book"></i> <span>Menu</span>
            </a>
        </li>
          <li class="<?php echo ($this->uri->segment(2) == 'category')? 'active' : ''; ?>">
              <a href="<?php echo base_url('admin/category'); ?>">
                  <i class="fa fa-filter"></i> <span>Category</span>
              </a>
          </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php endif; ?>



