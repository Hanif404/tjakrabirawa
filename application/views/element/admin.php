<!DOCTYPE html>
<!-- saved from url=(0030)http://setjen.pertanian.go.id/ -->
<html lang="en" style="height: 100%;">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:url" content="http://www.setjen.pertanian.go.id/admin" />
        <meta name="keywords" content="Administrator">
        <meta name="description" content="Administrator Pages">
        <meta name="author" content="Administrator">
        <?php
            header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
        ?>
        <meta name="description" content="Sekretariat Jenderal Perkebunan - Kementerian Pertanian">
        <meta name="author" content="Sekretariat Jenderal Perkebunan">
        <meta name="author" content="pertanian.go.id" />
        <meta http-equiv="content-language" content="id, en">
        <meta name="robots" content="all" />
        <meta name="spiders" content="all" />
        <title><?php echo $title;?></title>

        <link rel="shortcut icon" href="<?php echo base_url('asset/img/favicon.ico'); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('asset/img/favicon.ico'); ?>" type="image/x-icon">

        <link rel="stylesheet" href="<?php echo base_url('asset/admin/bootstrap/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('asset/admin/dist/css/AdminLTE.min.css'); ?>">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url('asset/admin/dist/css/skins/skin-blue.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/admin/dist/css/skins/_all-skins.min.css'); ?>">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="<?php echo base_url('asset/admin/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url('asset/admin/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('asset/admin/dist/js/app.min.js'); ?>"></script>
    </head>
    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b></span>
                </a>

                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <?php
                                        if (file_exists('asset/img/admin/'.$admin['id_admin'].'/'.$admin['username'].'-'.$admin['foto']))
                                        {
                                            echo img(array('src'=>base_url('asset/img/admin/'.$admin['id_admin'].'/'.$admin['username'].'-'.$admin['foto']),'class'=>'user-image'));

                                        }
                                        else{
                                            echo img(array('src'=>base_url('asset/img/default.png'),'style'=>'width:25px; height:25px','class'=>'img-circle'));
                                        }

                                    ?>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?php echo $admin['username'];?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <?php
                                            if (file_exists('asset/img/admin/'.$admin['id_admin'].'/'.$admin['username'].'-'.$admin['foto']))
                                            {
                                                echo img(array('src'=>base_url('asset/img/admin/'.$admin['id_admin'].'/'.$admin['username'].'-'.$admin['foto']),'class'=>'img-circle'));

                                            }
                                            else{
                                                echo img(array('src'=>base_url('asset/img/default.png'),'class'=>'img-circle'));
                                            }
                                        ?>
                                        <p><?php echo $admin['username'];?><small><?php echo $admin['last_login'];?></small></p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('admin/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <div class="size-toggle">
			<a class="btn btn-sm pull-right logoutConfirm_open" href="<?php echo site_url('admin/logout');?>" data-popup-ordinal="1" id="open_20766832">
			    <i class="fa fa-power-off"></i>
			</a>
		    </div>
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php
                                if (file_exists('asset/img/admin/'.$admin['id_admin'].'/'.$admin['username'].'-'.$admin['foto']))
                                {
                                    echo img(array('src'=>base_url('asset/img/admin/'.$admin['id_admin'].'/'.$admin['username'].'-'.$admin['foto']),'class'=>'img-circle'));
                                }
                                else{
                                     echo img(array('src'=>base_url('asset/img/default.png'),'style'=>'width:35px; height:35px','class'=>'img-circle'));
                                }
                            ?>
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $admin['username'];?></p>
                            <!-- Status -->
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- search form (Optional) -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">HEADER</li>
                        <!-- Optionally, you can add icons to the links -->
                        <?php if ($this->session->userdata('LEVEL') == 'admin'){ ?>
                        <li class="<?php if(isset($dashboard_active)){echo $dashboard_active;}?>">
                            <a href="<?php echo site_url('admin/dashboard');?>">
                                <i class="fa fa-television"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="<?php if(isset($contact_menu)){echo $contact_menu;}?>">
                            <a href="<?php echo site_url('admin/message');?>">
                                <i class="fa fa-envelope-o"></i>
                                <span>Daftar Pesan</span>
                            </a>
                        </li>

                        <li class="treeview <?php if(isset($berita_active_treeview)){echo $berita_active_treeview ;}?>">
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i>
                                <span>Konten</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if(isset($berita_active_list)){echo $berita_active_list ;}?>">
                                    <a href="<?php echo site_url('admin/list-berita');?>">Daftar Konten</a>
                                </li>
                                <li class="<?php if(isset($berita_active_add)){echo $berita_active_add ;}?>">
                                    <a href="<?php echo site_url('admin/add-berita');?>">Tambah Konten</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview <?php if(isset($work_active_treeview)){echo $work_active_treeview ;}?>">
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i>
                                <span>Work</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if(isset($work_active_list)){echo $work_active_list ;}?>">
                                    <a href="<?php echo site_url('admin/list-work');?>">Daftar Konten</a>
                                </li>
                                <li class="<?php if(isset($work_active_add)){echo $work_active_add ;}?>">
                                    <a href="<?php echo site_url('admin/add-work');?>">Tambah Konten</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview <?php if(isset($layanan_active_treeview)){echo $layanan_active_treeview ;}?>">
                            <a href="#">
                                <i class="fa fa-cubes"></i>
                                <span>Layanan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if(isset($layanan_active_list)){echo $layanan_active_list ;}?>">
                                    <a href="<?php echo site_url('admin/list-layanan');?>">Daftar Layanan</a>
                                </li>
                                <li class="<?php if(isset($layanan_active_add)){echo $layanan_active_add ;}?>">
                                    <a href="<?php echo site_url('admin/add-layanan');?>">Tambah Layanan</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview <?php if(isset($user_active_treeview)){echo $user_active_treeview ;}?>">
                            <a href="#">
                                <i class="fa fa-child"></i>
                                <span>Pengguna</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if(isset($user_active_list)){echo $user_active_list ;}?>">
                                    <a href="<?php echo site_url('admin/list-user');?>">List Pengguna</a>
                                </li>
                                <li class="<?php if(isset($user_active_add)){echo $user_active_add ;}?>">
                                    <a href="<?php echo site_url('admin/add-user');?>">Add Pengguna</a>
                                </li>
                            </ul>
                        </li>

                        <!-- User Access -->
                        <?php } else { ?>
                        <li class="treeview <?php if(isset($berita_active_treeview)){echo $berita_active_treeview ;}?>">
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i>
                                <span>Konten</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if(isset($berita_active_list)){echo $berita_active_list ;}?>">
                                    <a href="<?php echo site_url('admin/list-berita');?>">Daftar Konten</a>
                                </li>
                                <li class="<?php if(isset($berita_active_add)){echo $berita_active_add ;}?>">
                                    <a href="<?php echo site_url('admin/add-berita');?>">Tambah Konten</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <!-- End User Access -->

                        <?php /**?>
                        <li class="<?php if(isset($file_dokument_active)){echo $file_dokument_active;}?>">
                            <a href="#">
                                <i class="fa fa-file-word-o"></i>
                                <span>File Dokument</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-edit"></i>
                                <span>Kategori Berita</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-file-pdf-o"></i>
                                <span>Media Upload</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Newsticker</span>
                            </a>
                        </li>
                        <li class="treeview <?php if(isset($pengumuman_active_treeview)){echo $pengumuman_active_treeview ;}?>">
                            <a href="#">
                                <i class="fa fa-bullhorn"></i>
                                <span>Pengumuman</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if(isset($pengumuman_active_list)){echo $pengumuman_active_list ;}?>">
                                    <a href="">List Pengumuman</a>
                                </li>
                                <li class="<?php if(isset($pengumuman_active_add)){echo $pengumuman_active_add ;}?>">
                                    <a href="">Add Pengumuman</a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-share-square-o"></i>
                                <span>Publikasi</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-link"></i>
                                <span>Web Link</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>User Management</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-gears"></i>
                                <span>Pengaturan</span>
                            </a>
                        </li>
                        <?php */?>
                    </ul><!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
