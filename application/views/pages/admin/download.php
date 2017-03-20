
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <!-- Content Header (Page header) -->
                <div id="breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url('admin/dashboard');?>"> Dashboard</a></li>
                        <li class="active">List Download</li>	 
                    </ul>
                </div>
                <div class="main-header-title clearfix">
                    <div class="pageicon">
                        <i class="fa fa-calendar fa-5x"></i>
                    </div>
                    <div class="page-title">
                        <h3 class="no-margin">LIST Download</h3>
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
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">List Download</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <div class="box-tools pull-right">
                                            <div class="has-feedback">
                                                <input type="text" class="form-control input-sm" placeholder="Search...">
                                                <span class="glyphicon glyphicon-search form-control-feedback text-muted"></span>
                                            </div>
                                        </div>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-bordered table-condensed table-hover table-striped table-vertical-center">
                                        <thead>
                                            <tr>
                                                <th class="centeralign" width="5%">#</th>
                                                <th width="10%">Nama File</th>
                                                <th width="10%">File</th>
                                                <th width="10%">Create</th>
                                            </tr>
                                        </thead>
                                        <?php if($download): ?>
                                        <?php $i = 1; foreach ($download as $key => $download): ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $download['nama_file']; ?></td>
                                                    <td><?php echo $download['file']; ?> </td>
                                                    <td><?php echo $download['create']; ?></td>
                                                    <td align="center">
													<a href="<?php echo base_url('admin/edit-agenda/'.$agenda['id_agenda']);?>"><i class="fa fa-edit"></i></a>
													<a href="<?php echo base_url('admin/hapus-download/'.$download['id_download']);?>">&nbsp;|&nbsp;<i class="fa fa-trash-o"></i></a>
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
            <!-- jQuery 2.1.4 -->
            <script src="<?php echo base_url('asset/admin/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
            <!-- Bootstrap 3.3.5 -->
            <script src="<?php echo base_url('asset/admin/bootstrap/js/bootstrap.min.js'); ?>"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="<?php echo base_url('asset/admin/dist/js/demo.js'); ?>"></script>