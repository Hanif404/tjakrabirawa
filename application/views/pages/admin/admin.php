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
                        <i class="fa fa-television fa-5x"></i>
                    </div>
                    <div class="page-title">
                        <h3 class="no-margin">DASHBOARD</h3>
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
                                    <h3 class="box-title">List Konten</h3>
                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-bordered table-condensed table-hover table-striped table-vertical-center">
                                        <thead>
                                            <tr>
                                                <th class="centeralign" width="5%">#</th>
                                                <th width="20%">Judul</th>
                                                <th width="10%">Kategori</th>
                                                <th width="50%">Isi Konten</th>
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
                                                    <td><?php echo $berita['kategori']; ?></td>
                                                    <td>
                                                        <?php
                                                            $content_post = $berita['isi_berita'];
                                                            $count = count(explode(" ", $berita['isi_berita']));
                                                            $splitnews = $count / 5 ;
                                                                
                                                            if ($count > 575 )
                                                            {
                                                                $newsMinus =  $splitnews - 200;
                                                            }
                                                            elseif ($count < 575 && $count > 300 )
                                                            {
                                                                $newsMinus =  $splitnews - 50;
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
                                                    <td align="center"><a href="<?php echo base_url('admin/edit-status-berita/'.$berita['id']);?>"><i class="fa fa-edit"></i></a></td>
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