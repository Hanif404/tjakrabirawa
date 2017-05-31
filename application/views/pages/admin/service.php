            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <div id="breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url('admin/dashboard');?>"> Dashboard</a></li>
                        <li class="active"></li>
                    </ul>
                </div>
                <div class="main-header-title clearfix">
                    <div class="pageicon">
                        <i class="fa fa-briefcase fa-5x"></i>
                    </div>
                    <div class="page-title">
                        <h3 class="no-margin">SERVICE</h3>
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
                                    <h3 class="box-title">List Service</h3>

                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-bordered table-condensed table-hover table-striped table-vertical-center">
                                        <thead>
                                            <tr>
                                                <th class="centeralign" width="5%">#</th>
                                                <th width="20%">Judul</th>
					                                      <th width="10%">option</th>
                                            </tr>
                                        </thead>
                                        <?php if($service): ?>
                                        <?php $i = 1; foreach ($service as $key => $service): ?>
                                            <tbody>
                                                <tr>
                                                    <td valign="top"><?php echo $i++; ?></td>
                                                    <td valign="top"><?php echo $service['title']; ?></td>
                                                    <td style="text-align:center"><a href="<?php echo base_url('admin/edit-service/'.$service['id']);?>"><i class="fa fa-edit"></i></a>
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
