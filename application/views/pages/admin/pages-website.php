            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <div id="breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url('admin/dashboard');?>"> Dashboard</a></li>
                        <li class="active">List Pages Static</li>	 
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
                                    <h3 class="box-title">List Pages Static</h3>
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
                                                <th width="10%">Menu</th>
                                                <th width="15%">Menu URL</th>
                                                <th width="15%">Title Pages</th>
                                                <th width="35%">Isi Pages</th>
                                                <th width="5%">Active</th>
                                                <th width="5%">Option</th>
                                            </tr>
                                        </thead>
                                        <?php if($website): ?>
                                        <?php $i = 1; foreach ($website as $key => $website): ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $website['isi_menu']; ?> </td>
                                                    <td><?php echo $website['menu']; ?></td>
                                                    <td><?php echo $website['title_pages']; ?> </td>
                                                    <td><?php echo substr($website['isi_pages'],0,90); ?> </td>
                                                    <td><?php echo $website['active_page']; ?> </td>
                                                    <td align="center"><a href="<?php echo base_url('admin/edit-static-page/'.$website['id_pages'].'/'.slug($website['title_pages']));?>"><i class="fa fa-edit"></i></a>
													<a href="<?php echo base_url('admin/hapus-static-page/'.$website['id_pages']);?>">&nbsp;|&nbsp;<i class="fa fa-trash-o"></i>Hapus</a>
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