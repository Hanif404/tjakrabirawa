
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div id="breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url('admin/dashboard');?>"> Dashboard</a></li>
                        <li class="active">Add Galleri</li>	 
                    </ul>
                </div>
                <div class="main-header-title clearfix">
                    <div class="pageicon">
                        <i class="fa fa-file-photo-o fa-5x"></i>
                    </div>
                    <div class="page-title">
                        <h3 class="no-margin">ADD GALLERI</h3>
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
                                    <h3 class="box-title">Add Galleri</h3>
                                    <!-- tools box -->
                                     <div class="pull-right box-tools">
                                        <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body pad">
                                    <form action="<?php echo site_url('admin/create-galleri');?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Album :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-file-photo-o"></i>
                                                </div>
                                                <select name="album_id" class="form-control">
                                                    <?php if ($album): ?>
                                                        <?php foreach ($album as $key => $album): ?>
                                                            <option value="<?php echo $album['id_album'];?>"><?php echo $album['judul_album'];?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div><!-- /.input group -->
                                        </div>
                                        <?php for ($i = 1; $i < 2; $i++): ?>
                                            <div class="form-group">
                                                <label>Judul Galleri :</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-tag"></i>
                                                    </div>
                                                    <?php echo form_input(array('name'=>'jdl_gallery_'.$i, 'id'=>'jdl_gallery', 'class'=>'form-control')); ?>
                                                </div><!-- /.input group -->
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>File Gambar :</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-upload"></i>
                                                    </div>
                                                    <?php echo form_upload(array('name'=>'userfile_'.$i, 'id'=>'userfile', 'class'=>'btn btn-default btn-flat form-control')); ?>
                                                </div><!-- /.input group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan :</label>
                                                <?php echo form_textarea(array('name'=>'keterangan_'.$i, 'id'=>'editor1', 'rows'=>'5', 'cols'=>'80')); ?>
                                                
                                            </div>
                                            <hr/>
                                        <?php endfor;?>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <button type="submit" class="btn btn-default pull-right">Cancel</button>
                                        </div>
                                    </form>
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
            <!-- FastClick -->
            <script src="<?php echo base_url('asset/admin/plugins/fastclick/fastclick.min.js'); ?>"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="<?php echo base_url('asset/admin/dist/js/demo.js'); ?>"></script>
            <!-- CK Editor -->
            <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="<?php echo base_url('asset/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
            <script>
              $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
              });
            </script>
            <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
