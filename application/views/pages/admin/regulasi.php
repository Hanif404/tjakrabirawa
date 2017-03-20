
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <!-- Content Header (Page header) -->
                <div id="breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url('admin/dashboard');?>"> Dashboard</a></li>
                        <li class="active">List Regulasi</li>	 
                    </ul>
                </div>
                <div class="main-header-title clearfix">
                    <div class="pageicon">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="page-title">
                        <h3 class="no-margin">LIST REGULASI</h3>
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
                                    <i class="fa fa-book"></i>
                                    <h3 class="box-title">List Regulasi</h3>
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
                                                <th width="20%">Nama Regulasi</th>
                                                <th width="50%">Deskripsi</th>
                                                <th width="5%">Cover</th>
                                                <th width="5%">Option</th>
                                            </tr>
                                        </thead>
                                        <?php if($regulasi): ?>
                                        <?php $i = 1; foreach ($regulasi as $key => $regulasi): ?>
                                            <tbody>
                                                <tr>
                                                    <td valign="top"><?php echo $i++; ?></td>
                                                    <td valign="top"><?php echo $regulasi['title_regulasi']; ?></td>
                                                    <td><?php echo substr($regulasi['deskripsi'],0,200); ?></td>
                                                    <td>
                                                        <?php if (file_exists('asset/img/regulasi/'.$regulasi['url_regulasi'].'-cover-'.$regulasi['photo'])):?>
                                                            <?php echo img(array('src'=>base_url('asset/img/regulasi/'.$regulasi['url_regulasi'].'-cover-'.$regulasi['photo']))); ?>
                                                        <?php else:?>
                                                            no-image
                                                        <?php endif;?>
                                                    </td>
                                                    <td align="center"><a href="<?php echo base_url('admin/edit-regulasi/'.$regulasi['id_regulasi']);?>"><i class="fa fa-edit"></i></a>
													<a href="<?php echo base_url('admin/hapus-regulasi/'.$regulasi['id_regulasi']);?>">&nbsp;|&nbsp;<i class="fa fa-trash-o"></i></a>
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
            <!-- AdminLTE for demo purposes -->
            <script src="<?php echo base_url('asset/admin/dist/js/demo.js'); ?>"></script>