            </div>
            <div class="jumbotron bottom1">
                <div class="row">
                    <div class="col-md-4" style="margin-top: 30px;">
                        <center>
                        
                        <h4>DIRJEN PETERNAKAN DAN <br />
                          KESEHATAN HEWAN <br />
                          KEMENTRIAN PERTANIAN</h4>
			
                        <p>Jl. Harsono RM No.3 Gedung C, Ragunan - <br />
                          Pasar Minggu Jakarta Selatan 12550<br>
                          Telp : (021) 021 7815580 - 83, 7847319<br>
                          FAX : (021) 7815583<br>
                          Email : ditjennak@pertanian.go.id </p>
			
                        <p>
                            <a target="_blank" href="">
                                <img src="<?php echo base_url('asset/img/icon-rss.png'); ?>" width="24" height="24">
                            </a>
                            <a target="_blank" href="http://www.facebook.com/setjenkementan">
                                <img class="social-icon" src="<?php echo base_url('asset/img/social-icon-facebook.png'); ?>" width="24" height="24">
                            </a>
                            <a target="_blank" href="http://www.twitter.com/kementan">
                                <img class="social-icon" src="<?php echo base_url('asset/img/social-icon-twitter.png'); ?>" width="24" height="24">
                            </a>
                        </p>
			</center>
                    </div>
                    
                    <div class="col-md-3" style="margin-top: 30px;">
                        <div class="listsidebar">
			    <center>
				<h2 style="text-align: center;">HUBUNGI KAMI</h2>
			    </center>
			    <br/>
                 <center>
                         <a target="_blank" href="http://www.twitter.com/kementan">
                                <img class="social-icon" src="<?php echo base_url('asset/img/contact1.png'); ?>" width="150" height="150">
                            </a>  
                            </center>  
                        </div>
                        
                    </div>
                    
                    <div class="col-md-3" style="margin-top: 30px;">
                        <div id="stats" style="height: 210px;">
			    <div id="stats_Isi">
				<?php
				    function num_toimage($tot,$jumlah)
				    {
					$pattern='';
					for($j=0;$j<$jumlah;$j++){
						$pattern .= '0';
					}
					$len     = strlen($tot);
					$length  = strlen($pattern)-$len;
					$start   = substr($pattern,0,$length).substr($tot,0,$len-1);
					$last    = substr($tot,$len-1,1);
					$last_rpc= '<img src="'.base_url().'/asset/img/counter/animasi/'.$last.'.gif" align="absmiddle" />'; 
					$inc     = str_replace($last,$last_rpc,$last);
					for($i=0;$i<=9;$i++){
						$rpc ='<img src="'.base_url().'/asset/img/counter/'.$i.'.gif" align="absmiddle"/>';
						$start=str_replace($i,$rpc,$start);
					}
					$num = $start.$inc;
						
					return $num;
				    }
				    $ip =  $this->input->ip_address();
				    if(!isset($_SESSION['MemberOnline']))
				    {
					    $cek = mysql_query("SELECT Tanggal,ipAddress FROM sys_traffic WHERE Tanggal='".date("Y-m-d")."'");
					    if(mysql_num_rows($cek)==0){
						    $up	 			= mysql_query("INSERT  INTO sys_traffic (Tanggal,ipAddress,Jumlah) VALUES ('".date("Y-m-d")."','".$ip."','1')");
						    $_SESSION['MemberOnline']	= date('Y-m-d H:i:s');
					    }
					    else{
						    $res 			= mysql_fetch_array($cek);
						    $ipaddr 			= $res['ipAddress'].$ip;
						    $up 			= mysql_query("UPDATE sys_traffic SET Jumlah=Jumlah + 1,ipAddress='".$ip."' WHERE Tanggal='".date("Y-m-d")."'");
						    $_SESSION['MemberOnline']	= date('Y-m-d H:i:s');
					    }
				    }
				    
				    $yesterday 		= date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
				    $today 		= mysql_fetch_array(mysql_query('SELECT Jumlah AS Visitor FROM sys_traffic WHERE Tanggal="'.date("Y-m-d").'" LIMIT 1'));
				    $yesterday		= mysql_fetch_array(mysql_query('SELECT Jumlah AS Visitor FROM sys_traffic WHERE Tanggal="'.$yesterday.'" LIMIT 1'));
				    $total 		= mysql_fetch_array(mysql_query('SELECT SUM(Jumlah) as Total FROM sys_traffic'));
				?>
				<center>
				    <h2 align="center">HIT PENGUNJUNG</h2>
				    <br/><br/>
				    <table class="table-responsive">
					<tbody>
					    <tr>
						<td class="news-title"><img src="<?php echo base_url('asset/img/hariini.png');?>"><font-family: 'arial';="" font-size:="" '5px'=""> Pengunjung hari ini </font-family:></td>
						<td class="news-title"> : <?php echo num_toimage($today['Visitor'],10); ?> </td>
					    </tr>
					    <tr>
						<td class="news-title"><img src="<?php echo base_url('asset/img/total.png');?>"> Total pengunjung </td>
						<td class="news-title"> : <?php echo num_toimage($total['Total'],10); ?> </td>
					    </tr>
					</tbody>
				    </table>
				</center>
                            </div>
			</div>
                    </div>
                </div>
            </div>
        </div>
    </header>