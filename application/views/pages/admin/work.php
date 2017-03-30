
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <!-- Content Header (Page header) -->
                <div id="breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url('admin/dashboard');?>"> Dashboard</a></li>
                        <li class="active">Daftar Work</li>
                    </ul>
                </div>
                <div class="main-header-title clearfix">
                    <div class="pageicon">
                        <i class="fa fa-suitcase fa-5x"></i>
                    </div>
                    <div class="page-title">
                        <h3 class="no-margin">DAFTAR WORK</h3>
                        <span>Selamat datang <?php echo $this->session->userdata('USERNAME'); ?></span>
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
                                    <h3 class="box-title">Daftar Work</h3>
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
                                                <th width="20%">Judul</th>
                                                <th width="50%">Deskripsi</th>
                                                <th width="10%">Tanggal</th>
                                                <th width="5%">Option</th>
                                            </tr>
                                        </thead>
                                        <?php if($berita): ?>
                                        <?php $i = 1; foreach ($berita as $key => $berita): ?>
                                            <tbody>
                                                <tr>
                                                    <td valign="top"><?php echo $i++; ?></td>
                                                    <td valign="top"><?php echo $berita['title']; ?></td>
                                                    <td>
                                                        <?php
                                                            $content_post = $berita['isi_berita'];
                                                            $count = count(explode(" ", $content_post));
                                                            $splitnews = $count / 5 ;

                                                            if ($count > 575 )
                                                            {
                                                                $newsMinus =  $splitnews - 100;
                                                            }
                                                            elseif ($count < 575 && $count > 300 )
                                                            {
                                                                $newsMinus =  $splitnews - 20;
                                                            }
                                                            elseif ($count < 300 && $count > 50)
                                                            {
                                                                $newsMinus =  $splitnews - 25;
                                                            }
                                                            elseif ($count < 50 )
                                                            {
                                                                $newsMinus =  $splitnews - 10;
                                                            }

                                                            $newsFirst = explode(" ", $content_post);
                                                            $NewsFirstProses = implode(" ", array_splice($newsFirst,0,$newsMinus ));
                                                            $showNewsFirst = $NewsFirstProses;
                                                            echo preg_replace("/<[\/]*div[^>]*>/i", "", stripslashes(html_entity_decode($showNewsFirst)));
                                                        ?>
                                                    </td>
                                                    <td><?php echo $berita['create']; ?></td>
                                                    <td align="center"><a href="<?php echo base_url('admin/edit-work/'.$berita['id']);?>"><i class="fa fa-edit"></i></a>
													<a href="<?php echo base_url('admin/hapus-work/'.$berita['id']);?>">&nbsp;|&nbsp;<i class="fa fa-trash-o"></i></a>
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
