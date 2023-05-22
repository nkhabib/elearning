<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $judul; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">



</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('login/home') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>A</b>LT</span> -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E - </b>Learning</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"><?php echo $this->session->ses_nama; ?></span>
            </a>
            <ul class="dropdown-menu">
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('admin/c_admin/profile') ?>">
                    <button class="btn btn-success">Profile</button>
                  </a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('login/keluar'); ?>">
                    <button class="btn btn-danger">Keluar</button>
                  </a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('dist/img/img.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->ses_nama; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li>
          <a href="<?php echo base_url('login/home'); ?>">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
        </li>

            <?php if ($this->session->userdata('masuk')=='admin'):?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          <?php endif; ?>
          </a>
          <ul class="treeview-menu">
            <?php $masuk = $this->session->userdata('masuk');
            if ($masuk=='admin'):?>
              <li><a href="<?php echo base_url('admin/c_admin/tambah'); ?>"><i class="fa fa-circle-o"></i>Tambah User</a></li>
            <li><a href="<?php echo base_url('murid/c_murid/tambah'); ?>"><i class="fa fa-circle-o"></i>Tambah Murid</a></li>
            <li><a href="<?php echo base_url('guru/c_guru/tambah'); ?>"><i class="fa fa-circle-o"></i>Tambah Guru</a></li>
            <li><a href="<?php echo base_url('kelas/c_kelas/tambah'); ?>"><i class="fa fa-circle-o"></i>Tambah Kelas</a></li>
            <li><a href="<?php echo base_url('mapel/c_mapel/tambah'); ?>"><i class="fa fa-circle-o"></i>Tambah MAPEL</a></li>
            <?php endif; ?>
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
            <?php if ($this->session->userdata('masuk')=='murid'): ?>
            <li><a href="<?php echo base_url('guru/c_guru/get_guru'); ?>"><i class="fa fa-circle-o"></i>Tabel Guru</a></li>
            <li><a href="<?php echo base_url('murid/c_murid/get_murid'); ?>"><i class="fa fa-circle-o"></i>Tabel Murid</a></li>
            <li><a href="<?php echo base_url('mapel/c_mapel/get_mapel'); ?>"><i class="fa fa-circle-o"></i>Tabel MAPEL</a></li>
            <?php else: ?>
            <li><a href="<?php echo base_url('admin/c_admin/get_admin'); ?>"><i class="fa fa-circle-o"></i>Tabel User</a></li>
            <li><a href="<?php echo base_url('guru/c_guru/get_guru'); ?>"><i class="fa fa-circle-o"></i>Tabel Guru</a></li>
            <li><a href="<?php echo base_url('murid/c_murid/get_murid'); ?>"><i class="fa fa-circle-o"></i>Tabel Murid</a></li>
            <li><a href="<?php echo base_url('mapel/c_mapel/get_mapel'); ?>"><i class="fa fa-circle-o"></i>Tabel MAPEL</a></li>
            <?php endif; ?>
            <?php if ($this->session->userdata('masuk')=='admin'):?>
              <li><a href="<?php echo base_url('mapel/c_mapel/get_noguru'); ?>"><i class="fa fa-circle-o"></i>MAPEL Belum Ada Guru</a></li>
            <?php endif; ?>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Tugas dan Materi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <?php if ($masuk=='murid'):?>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('download/c_download/murid'); ?>"><i class="fa fa-eye"></i>Lihat Tugas / Materi</a></li>
                <li><a href="<?php echo base_url('download/c_download/tugas_murid') ?>"><i class="fa fa-eye"></i>Tugas Dikerjakan</a></li>
              </ul>
            <?php else: ?>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('upload/c_upload/tambah'); ?>"><i class="fa fa-upload"></i>Uplaod Tugas / Materi</a></li>
                <li><a href="<?php echo base_url('download/c_download/unduh'); ?>"><i class="fa fa-download"></i>Download Tugas / Materi</a></li>
              </ul>
          <?php endif; ?>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Ujian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
              <ul class="treeview-menu">
                <?php if ($masuk=='murid'):?>
                  <li><a href="<?php echo base_url('ujian/c_ujian/lihat') ?>"><i class="fa fa-eye" ></i>Lihat Ujian</a></li>
                  <li><a href="<?php echo base_url('ujian/c_ujian/hasil') ?>"><i class="fa fa-eye" ></i>Hasil Semua Ujian</a></li>
                  <?php else: ?>
                <li><a href="<?php echo base_url('ujian/c_ujian/tambah'); ?>"><i class="fa fa-circle-o"></i>Tambah Ujian</a></li>
                <li><a href="<?php echo base_url('ujian/c_ujian/lihat') ?>"><i class="fa fa-eye" ></i>Lihat Ujian</a></li>
              <?php endif; ?>
              </ul>
        </li>

        <li>
          <a href="<?php echo base_url('kelas/c_kelas/get_kelas'); ?>">
            <i class="fa fa-table"></i> <span>Kelas</span>
          </a>
        </li>

        <?php if ($masuk=='murid'):?>
          <?php else: ?>
            <li>
              <a href="<?php echo base_url('murid/c_murid/murid_anda'); ?>">
                <i class="fa fa-table"></i> <span>Murid Anda</span>
              </a>
            </li>
        <?php endif; ?>

        <li>
          <a href="<?php echo base_url('chat/c_chat/chat'); ?>">
            <i class="fa fa-wechat"></i> <span>Percakapan Kelas</span>
          </a>
        </li>
        
        <!-- <li class="treeview active">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li> -->
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">