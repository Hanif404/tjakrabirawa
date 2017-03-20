            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <div id="breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url('admin/dashboard');?>"> Dashboard</a></li>
                        <li class="active">List Menu Website</li>	 
                    </ul>
                </div>
                <div class="main-header-title clearfix">
                    <div class="pageicon">
                        <i class="fa fa-globe fa-5x"></i>
                    </div>
                    <div class="page-title">
                        <h3 class="right">WEBSITE</h3>
                        <span>Welcome back <?php echo $this->session->userdata('USERNAME'); ?></span>
                    </div>
                    <ul class="page-stats">
                        <li>
                            <div class="value"></div>
                        </li>
                    </ul>
                </div>
                <div class="grey-container shortcut-wrapper">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <!-- Main content -->
                <section class="content">
                <!-- Your Page Content Here -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-header">
                                    <i class="fa fa-list"></i>
                                    <h3 class="box-title">List Menu Website</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <div class="box-tools pull-right"></div>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-bordered table-condensed table-hover table-striped table-vertical-center">
                                        <thead>
                                            <tr>
                                                <th class="centeralign" width="5%">#</th>
                                                <th width="20%">Title</th>
                                                <th width="50%">URL</th>
                                                <th width="5%">Option</th>
                                            </tr>
                                        </thead>
                                        <?php if($menu_website): ?>
                                        <?php $i = 1; foreach ($menu_website as $key => $menu_website): ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $menu_website['isi_menu']; ?> </td>
                                                    <td><?php echo $menu_website['menu']; ?></td>
                                                    <td align="center"><a href="<?php echo base_url('admin/edit-menu-website/'.$menu_website['id_menu'].'/'.slug($menu_website['isi_menu']));?>"><i class="fa fa-edit"></i></a>
													<a href="<?php echo base_url('admin/hapus-menu/'.$menu_website['id_menu']);?>">&nbsp;|&nbsp;<i class="fa fa-trash-o"></i>Hapus</a>
													</td>
                                                </tr>
                                            </tbody>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    </table>
                                </div>
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <?php echo $paging;?>
                                    </ul>
                                </div>
                            </div><!-- /.box -->
                            
                            
                        </div>
                    </div>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <link rel="stylesheet" href="<?php echo base_url('asset/admin/bootstrap/css/endless.min.css'); ?>">
            <link rel="stylesheet" href="<?php echo base_url('asset/admin/bootstrap/css/endless-skin.css'); ?>">
            <link rel="stylesheet" href="<?php echo base_url('asset/admin/bootstrap/js/endless/endless.js'); ?>">