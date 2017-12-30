<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo get_user_image_filename(); ?>" class="img-circle" alt="User Image"> 
      </div>

      <div class="pull-left info">
        <p><?php echo $this->session->userdata('name'); ?> </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <ul class="sidebar-menu">
    <!--   <li class="header">MAIN NAVIGATION</li> -->
      <li>
      <a href="<?=base_url()?>home_site">
        <i class="glyphicon glyphicon-home"></i> <span>Home Site</span>
      </a>
      </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>Master</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>

      <ul class="treeview-menu">
        
        <li><a href="<?= base_url()?>country"><i class="fa fa-circle-o"></i>Country</a></li>
        <li><a href="<?=base_url()?>company"><i class="fa fa-circle-o"></i> Company</a></li>
        <li><a href="<?=base_url()?>employee"><i class="fa fa-circle-o"></i> Employee</a></li>
        <li><a href="<?=base_url()?>item_category"><i class="fa fa-circle-o"></i> Item</a></li>
        <li><a href="<?=base_url()?>tax_rate"><i class="fa fa-circle-o"></i>Duties & Tax</a></li>
        <li><a href="<?=base_url()?>customer"><i class="fa fa-circle-o"></i> Customer</a></li>
        <li><a href="<?=base_url()?>supplier"><i class="fa fa-circle-o"></i>Supplier</a></li>
        <li><a href="<?=base_url()?>narration"><i class="fa fa-circle-o"></i>Narration</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="glyphicon glyphicon-tasks"></i>
        <span>Account</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?=base_url()?>account_format"><i class="fa fa-circle-o"></i> Account Format</a></li>
        <li><a href="<?=base_url()?>account_group"><i class="fa fa-circle-o"></i> Account Group</a></li>
        <li><a href="<?=base_url()?>general_ledger"><i class="fa fa-circle-o"></i>General Ledger</a></li>
        <li>
                      <a href="#"><i class="glyphicon glyphicon-list"></i> Voucher Types <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
             
                        <li><a href="<?=base_url()?>voucher_type/sale_get"><i class="fa fa-circle-o"></i>Sale Register</a></li>
                        <li><a href="<?=base_url()?>voucher_type/purchase_get"><i class="fa fa-circle-o"></i>Purchase Register</a></li>
                        <li><a href="<?=base_url()?>voucher_type/"><i class="fa fa-circle-o"></i>Other</a></li>
                      </ul>
                </li>
        
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="glyphicon glyphicon-list"></i>
        <span>Transaction</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      
      <!-- Transaction Begin -->
      <ul class="treeview-menu">

        <!-- Voucher Begin -->
        <li class="treeview">
          <a href="#">
          <i class="glyphicon glyphicon-cog"></i>
          <span>Voucher</span>
          <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>voucher/receipt"><i class="fa fa-circle-o"></i>Receipt </a></li>
            <li><a href="<?=base_url()?>voucher/payment"><i class="fa fa-circle-o"></i>Payment</a></li>
            <li><a href="<?=base_url()?>voucher/journal"><i class="fa fa-circle-o"></i>Journal</a></li>
            <li><a href="<?=base_url()?>voucher/contra"><i class="fa fa-circle-o"></i>Contra</a></li>
          </ul>
        </li>
        <!-- Voucher End -->

        <li><a href="<?=base_url()?>invoice"><i class="fa fa-circle-o"></i>Sales</a></li>
        <li><a href="<?=base_url()?>invoice"><i class="fa fa-circle-o"></i>Purchase</a></li>
        <li><a href="<?=base_url()?>invoice"><i class="fa fa-circle-o"></i>Quote</a></li>
        <li><a href="<?=base_url()?>attendence"><i class="fa fa-circle-o"></i>Attendence</a></li>
      </ul>
    </li>
    <!-- Transaction End -->

    <!-- Security Begin -->
     <li class="treeview">
              <a href="#">
              <i class="glyphicon glyphicon-lock"></i>
                <span>Security</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>user_group"><i class="fa fa-circle-o"></i> User Group</a></li>
                <li><a href="<?=base_url()?>user"><i class="fa fa-circle-o"></i> User</a></li>
               
                <li>
                      <a href="#"><i class="glyphicon glyphicon-list"></i> ACL <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
             
                        <li><a href="<?=base_url()?>acl"><i class="fa fa-circle-o"></i>Module</a></li>
                        <li><a href="<?=base_url()?>acl_group_permission"><i class="fa fa-circle-o"></i>Group Permission</a></li>
                        <li><a href="<?=base_url()?>acl_user_permission"><i class="fa fa-circle-o"></i>User Permission</a></li>
                      </ul>
                </li>
             
              </ul>
            </li>
    <!-- Security End -->

    <li class="treeview">
    <a href="#">
    <i class="glyphicon glyphicon-cog"></i>
    <span>Setting</span>
    <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="<?= base_url()?>column_property"><i class="glyphicon glyphicon-wrench"></i>Column Property</a></li>
    <li><a href="<?= base_url()?>form_setting"><i class="glyphicon glyphicon-wrench"></i>Form Setting</a></li>

    </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>Report</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>

      <ul class="treeview-menu">
        
        <li><a href="<?= base_url()?>report"><i class="fa fa-circle-o"></i>Sales/Purchase</a></li>
        <li><a href="<?=base_url()?>report"><i class="fa fa-circle-o"></i>Voucher</a></li>
        <li><a href="<?=base_url()?>report"><i class="fa fa-circle-o"></i> Employee</a></li>
        
      </ul>
    </li>
   
    </ul>


  </section>
</aside>

<div class="content-wrapper">
