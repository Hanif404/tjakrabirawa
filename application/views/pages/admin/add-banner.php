
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div id="breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url('admin/dashboard');?>"> Dashboard</a></li>
                        <li class="active">Add Banner</li>	 
                    </ul>
                </div>
                <div class="main-header-title clearfix">
                    <div class="pageicon">
                        <i class="fa fa-image fa-5x"></i>
                    </div>
                    <div class="page-title">
                        <h3 class="no-margin">ADD BANNER</h3>
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
                                    <h3 class="box-title">Add Banner</h3>
                                    <!-- tools box -->
                                     <div class="pull-right box-tools">
                                        <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body pad">
                                    <form action="<?php echo site_url('admin/create-banner');?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Title :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-tag"></i>
                                                </div>
                                                <input type="text" name="title" class="form-control" required />
                                            </div><!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>URL :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-link"></i>
                                                </div>
                                                <input type="url" name="url" class="form-control" placeholder="http://example.com" required />
                                            </div><!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>File Gambar :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-upload"></i>
                                                </div>
                                                <?php echo form_upload(array('name'=>'userfile', 'id'=>'userfile', 'class'=>'btn btn-default btn-flat form-control')); ?>
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
            <!-- AdminLTE for demo purposes -->
            <script src="<?php echo base_url('asset/admin/dist/js/demo.js'); ?>"></script>
            
            <link rel="stylesheet" href="<?php echo base_url('asset/admin/bootstrap/css/endless.min.css'); ?>">
            <!-- CK Editor -->
            <script src="<?php echo base_url('asset/admin/plugins/filemanager/js/ckeditor/ckeditor.js'); ?>"></script>
            <script src="<script src="<?php echo base_url('asset/admin/plugins/filemanager/sample.js'); ?>" type="text/javascript"></script>
            <script type="text/javascript">
			//<![CDATA[

				// This call can be placed at any point after the
				// <textarea>, or inside a <head><script> in a
				// window.onload event handler.

				// Replace the <textarea id="editor"> with an CKEditor
				// instance, using default configurations.
				CKEDITOR.replace( 'editor1',
                {
                    filebrowserBrowseUrl :'<?php echo base_url('asset/admin/plugins/filemanager/js/ckeditor/filemanager/browser/default/browser.html');?>?Connector=<?php echo base_url('assets/admin/plugins/filemanager/js/ckeditor/filemanager/connectors/php/connector.php');?>',
                    filebrowserImageBrowseUrl : '<?php echo base_url('asset/admin/plugins/filemanager/js/ckeditor/filemanager/browser/default/browser.html');?>?Type=Image&Connector=<?php echo base_url('assets/admin/plugins/filemanager/js/ckeditor/filemanager/connectors/php/connector.php');?>',
                    filebrowserFlashBrowseUrl :'<?php echo base_url('asset/admin/plugins/filemanager/js/ckeditor/filemanager/browser/default/browser.html');?>?Type=Flash&Connector=<?php echo base_url('assets/admin/plugins/filemanager/js/ckeditor/filemanager/connectors/php/connector.php');?>',
					filebrowserUploadUrl  :'<?php echo base_url('asset/admin/plugins/filemanager/js/ckeditor/filemanager/connectors/php/upload.php');?>?Type=File',
					filebrowserImageUploadUrl : '<?php echo base_url('asset/admin/plugins/filemanager/js/ckeditor/filemanager/connectors/php/upload.php');?>?Type=Image',
					filebrowserFlashUploadUrl : '<?php echo base_url('asset/admin/plugins/filemanager/js/ckeditor/filemanager/connectors/php/upload.php');?>?Type=Flash'
				});

			//]]>
			</script>
            <style>
                .datepicker{z-index:999;}
            </style>
            <script>
                $(function(){
                    $("#start_date").datepicker({
                        format:'yyyy/mm/dd'
                    });
                });
                $(function(){
                    $("#end_date").datepicker({
                        format:'yyyy/mm/dd'
                    });
                });
            </script>
            <link rel="stylesheet" href="<?php echo base_url('asset/admin/bootstrap/css/datepicker.css');?>">
            <script src="<?php echo base_url('asset/admin/bootstrap/js/bootstrap-datepicker.js');?>"></script>
            <script src="<?php echo base_url('asset/admin/bootstrap/js/bootstrap-transition.js');?>"></script>
