<!--========================= Header + Navbar ==============================-->
<?php if ($this->session->userdata('LEVEL') == 'admin'){ ?>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <ul class="nav">
                <li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?>">
                    <a href="<?php echo site_url('dashboard')?>"><i class="icon-home"></i> Dashboard</a>
                </li>
                <li class="<?php if(isset($active_backup)){echo $active_backup ;}?>">
                    <a href="<?php echo site_url('dashboard/backup')?>"><i class="icon-barcode"></i> Backup</a>
                </li>
                <li class="<?php if(isset($active_restore)){echo $active_restore ;}?>">
                    <a href="<?php echo site_url('dashboard/restore')?>"><i class="icon-barcode"></i> Restore</a>
                </li>
                <li><a href="<?php echo site_url('login/logout')?>"><i class="icon-remove-sign"></i>  Logout</a></li>
                
            </ul>
        </div>
    </div>
</div>
<br>
<?php } else { ?>

    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav">
                    <li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?>">
                        <a href="<?php echo site_url('dashboard')?>"><i class="icon-home"></i> Dashboard</a>
                    </li>
                    <li><a href="<?php echo site_url('login/logout')?>"><i class="icon-remove-sign"></i>  Logout</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
    <br>

<?php } ?>