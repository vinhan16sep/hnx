<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title><?php echo $page_title; ?></title>

        <!-- Bootstrap CSS -->    
        <link rel="shortcut icon" type="image/png" href="<?php echo site_url('assets/public/img/favicon.png'); ?>"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Color picker -->
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/'); ?>js/admin/lightbox/dist/css/lightbox.min.css">
  
  <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/'); ?>js/admin/colorbox/example1/colorbox.css">
  
  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  <!-- jQuery 3 -->
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Jquery validate -->
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/jquery/src/jquery.validate.js"></script>
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/jquery/src/additional-methods.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <!-- <script src="<?php echo site_url('assets/admin/'); ?>bower_components/raphael/raphael.min.js"></script>
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/morris.js/morris.min.js"></script> -->
  <script src="<?php echo site_url('assets/admin/'); ?>js/admin/index.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="<?php echo site_url('assets/admin/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo site_url('assets/admin/'); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/moment/min/moment.min.js"></script>
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Color picker -->
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo site_url('assets/admin/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo site_url('assets/admin/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo site_url('assets/admin/'); ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo site_url('assets/admin/'); ?>dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo site_url('assets/admin/'); ?>dist/js/demo.js"></script>

  <script src="<?php echo site_url('assets/admin/'); ?>js/admin/colorbox/jquery.colorbox-min.js"></script>

  <!-- chart js -->
  <script type="text/javascript" src="<?php echo site_url('assets/admin/'); ?>bower_components/chart.js/Chart.js"></script>

  <script type="text/javascript" src="<?php echo site_url('tinymce/tinymce.min.js'); ?>"></script>
  <style>
        @font-face{
            font-family: webFont_N;
            src: url("<?php echo site_url('assets/public/fonts/OpenSans-Regular.ttf'); ?>");
        }

        body, a{
            font-family: webFont_N;
        }

        .skin-blue .sidebar-menu>li>.treeview-menu{
            overflow: hidden;
        }
    </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        <?php
            if ($this->ion_auth->logged_in()) {
        ?>
            <!-- container section start -->
            <section id="container" class="">


                <header class="main-header">
                    <a href="<?php echo base_url('admin/dashboard') ?>" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b>MATO</b></span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>MATO CREATIVE</b> ADMIN</span>
                    </a>

                    <nav class="navbar navbar-static-top">
                    <!-- sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                            <span class="sr-only">toggle navigation</span>
                        </a>

                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?php echo site_url('assets/admin/'); ?>dist/img/user2-160x160.jpg" class="user-image" alt="user image">
                                        <span class="hidden-xs"><?php echo (isset($user_email))? $user_email : '' ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                      <!-- User image -->
                                      <li class="user-header">
                                        <img src="<?php echo site_url('assets/admin/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="user image">

                                            <p>Thời Gian Hiện Tại<small><?php echo date('d/m/Y') ?></small></p>
                                      </li>
                                      <!-- Menu Body -->
                                      <li class="user-body">
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
                                        </div>
                                        <!-- /.row -->
                                      </li>
                                      <!-- Menu Footer-->
                                      <li class="user-footer">
                                        <!-- <div class="pull-left">
                                            <a href="<?php echo site_url('admin/auth/create_user'); ?>" class="btn btn-default btn-flat">Register</a>
                                        </div> -->
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('admin/user/logout'); ?>" class="btn btn-default btn-flat">sign out</a>
                                        </div>
                                    </li>
                                    </ul>
                                  </li>
                                <li>
                                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
            <?php } ?>
            <!--header end-->