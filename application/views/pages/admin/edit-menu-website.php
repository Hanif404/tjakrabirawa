
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div id="breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url('admin/dashboard');?>"> Dashboard</a></li>
                        <li class="active">Edit Menu Website</li>	 
                    </ul>
                </div>
                <div class="main-header-title clearfix">
                    <div class="pageicon">
                        <i class="fa fa-globe fa-5x"></i>
                    </div>
                    <div class="page-title">
                        <h3 class="no-margin">WEBSITE</h3>
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
                                    <h3 class="box-title">Edit Menu Website</h3>
                                    <!-- tools box -->
                                     <div class="pull-right box-tools">
                                        <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body pad">
                                    <form action="<?php echo site_url('admin/update-menu-website/'.$menu['id_menu'].'/'.slug($menu['isi_menu']));?>" method="post">
                                        
                                        <div class="form-group">
                                            <label>Title :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-tag"></i>
                                                </div>
                                                <input type="text" name="isi_menu" value="<?php echo $menu['isi_menu'];?>" class="form-control" required />
                                            </div><!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>URL :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-link"></i>
                                                </div>
                                                <input type="text" name="menu" value="<?php echo $menu['menu'];?>" class="form-control" required />
                                            </div><!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>Parent :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-list"></i>
                                                </div>
                                                <select name="parent_id" class="form-control">
                                                    <option value="0">Main Navigation</option>
                                                    <?php if ($class): ?>
                                                        <?php foreach ($class as $key => $class): ?>
                                                            <option value="<?php echo $class['id_menu'];?>"><?php echo $class['isi_menu'];?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div><!-- /.input group -->
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success">Save</button>
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
            <script src="<?php echo base_url('asset/admin/plugins/iCheck/icheck.min.js'); ?>"></script>
            <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/iCheck/all.css'); ?>">
            <script type="text/javascript>
      
                $(function () {
                    //iCheck for checkbox and radio inputs
                    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                        checkboxClass: 'icheckbox_minimal-blue',
                        radioClass: 'iradio_minimal-blue'
                    });
                    //Red color scheme for iCheck
                    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                        checkboxClass: 'icheckbox_minimal-red',
                        radioClass: 'iradio_minimal-red'
                    });
                    //Flat red color scheme for iCheck
                    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                        checkboxClass: 'icheckbox_flat-green',
                        radioClass: 'iradio_flat-green'
                    });
            
                    //Colorpicker
                    $(".my-colorpicker1").colorpicker();
                    //color picker with addon
                    $(".my-colorpicker2").colorpicker();
            
                    //Timepicker
                    $(".timepicker").timepicker({
                        showInputs: false
                    });
                });
            </script>
