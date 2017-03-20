
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div id="breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url('admin/dashboard');?>"> Dashboard</a></li>
                        <li class="active">Form Pengguna</li>
                    </ul>
                </div>
                <div class="main-header-title clearfix">
                    <div class="pageicon">
                        <i class="fa fa-newspaper-o fa-5x"></i>
                    </div>
                    <div class="page-title">
                        <h3 class="no-margin">MANAJEMEN PENGGUNA</h3>
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
                                    <i class="fa fa-edit"></i>
                                    <h3 class="box-title"><?php echo $title; ?></h3>
                                    <!-- tools box -->
                                     <div class="pull-right box-tools">
                                        <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body pad">
                                    <form action="<?php echo site_url('admin/modif-user');?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_admin" id="id_admin" value="<?php echo @$detail[0]['id_admin']; ?>" />
                                        <input type="hidden" name="temp_foto" id="temp_foto" value="<?php echo @$detail[0]['foto']; ?>" />

                                        <div class="form-group">
                                            <label>Username :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" name="username" id="username" value="<?php echo @$detail[0]['username']; ?>" class="form-control news title" required />
                                            </div><!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>
                                                <input type="email" name="email" id="email" value="<?php echo @$detail[0]['email']; ?>" class="form-control news title" required />
                                            </div><!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                                <input type="password" name="password" id="password" value="<?php echo @$detail[0]['password']; ?>" class="form-control news title" required />
                                            </div><!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar Pengguna :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-upload"></i>
                                                </div>
                                                <?php echo form_upload(array('name'=>'userfile', 'id'=>'userfile', 'class'=>'btn btn-default btn-flat form-control')); ?>
                                            </div><!-- /.input group -->
                                        </div>
                                        <div class="box-footer">
                                            <input type="submit" name="submit" value="Save" class="btn btn-success" />
                                            <button type="submit" class="btn btn-default pull-right">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- jQuery 2.1.4 -->
            <script src="<?php echo base_url('asset/admin/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>

            <link rel="stylesheet" href="<?php echo base_url('asset/admin/bootstrap/css/endless.min.css'); ?>">
