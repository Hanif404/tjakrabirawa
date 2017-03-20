<!DOCTYPE html>
<!-- saved from url=(0030)http://setjen.pertanian.go.id/ -->
<html lang="en" style="height: 100%;">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:url" content="http://www.setjen.pertanian.go.id/admin" />
        <meta name="keywords" content="Administrator">
        <meta name="description" content="Administrator Pages">
        <meta name="author" content="Administrator">
        <?php
            header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
        ?>
        <meta name="description" content="Sekretariat Jenderal Perkebunan - Kementerian Pertanian">
        <meta name="author" content="Sekretariat Jenderal Perkebunan">
        <meta name="author" content="pertanian.go.id" />
        <meta http-equiv="content-language" content="id, en">
        <meta name="robots" content="all" />
        <meta name="spiders" content="all" />
        <title><?php echo $title;?></title>
        
        <link rel="shortcut icon" href="<?php echo base_url('asset/img/favicon.ico'); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('asset/img/favicon.ico'); ?>" type="image/x-icon">
        
        <link rel="stylesheet" href="<?php echo base_url('asset/admin/bootstrap/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('asset/admin/dist/css/AdminLTE.min.css'); ?>">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url('asset/admin/dist/css/skins/skin-blue.min.css'); ?>">
    
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="<?php echo base_url('asset/admin/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url('asset/admin/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('asset/admin/dist/js/app.min.js'); ?>"></script>
        <!-- jQuery 2.1.4 -->
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/iCheck/square/blue.css'); ?>">
        <script src="<?php echo base_url('asset/admin/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url('asset/admin/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('asset/admin/plugins/iCheck/icheck.min.js'); ?>"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo base_url('admin/login-page');?>"><b>Administrator</b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="<?php echo base_url('admin/cek-login');?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
    </body>
</html>
