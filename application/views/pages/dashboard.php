<!DOCTYPE html>
<html lang="en">
<head>
  <title>Global</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="HTML5 website template">
  <meta name="keywords" content="global, template, html, sass, jquery">
  <meta name="author" content="Bucky Maler">
  <link href="<?php echo base_url('asset/css/main.css'); ?>" rel="stylesheet">
   <link href="<?php echo base_url('asset/css/style.css'); ?>" rel="stylesheet">
   <style>
    #click-place{
      height: 150px;
      width: 60px;
      cursor: pointer;
      top: 36%;
      right: 43%;
      position: absolute;
      z-index: 9999;
    }
   </style>
</head>
<body>

<!-- notification for small viewports and landscape oriented smartphones -->
<div class="device-notification">
  <a class="device-notification--logo" href="#0">
    <img src="<?php echo base_url('asset/img/Tjakrabirawa_logo.png');?>" alt="Global">
    <p>TJAKRABIRAWA</p>
  </a>
  <p class="device-notification--message">Global has so much to offer that we must request you orient your device to portrait or find a larger screen. You won't be disappointed.</p>
</div>

<div class="perspective effect-rotate-left">
  <div class="container"><div class="outer-nav--return"></div>
    <div id="viewport" class="l-viewport">
      <div class="l-wrapper">
        <header class="header">
          <a class="header--logo" href="#0">
            <img src="<?php echo base_url('asset/img/Tjakrabirawa_logo.png');?>" alt="Global" class="logo">
          </a>
          <div class="header--nav-toggle">
            <span></span>
          </div>
        </header>
        <nav class="l-side-nav">
          <ul class="side-nav">
            <li class="is-active"><span>Home</span></li>
            <li><span>About</span></li>
            <li><span>Service</span></li>
            <li><span>Training</span></li>
			      <li><span>Blog</span></li>
            <li><span>Contact</span></li>
          </ul>
        </nav>

        <ul class="l-main-content main-content">

          <!-- HOME -->
          <li class="l-section section section--is-active">
            <div class="intro">
              <div class="intro--banner intelligent" id="introbanner">
                <h1>INTELLIGENT</h1>
        				<h1 class="service_home">SERVICE</h1>
        				<p style="width:40%;">Tjakrabirawa acknowledge there are no business or IT Infrastructure are the same, so we tailor made all of our services to benefit you the most.</p>
                <img src="<?php echo base_url('asset/img/1_Intelegent-Service_icon.png');?>" alt="Welcome" class="welcome">
              </div>
              <div class="intro--banner growth" id="growthbanner">
                <h1>GROWTH</h1>
        				<h1 class="service_home">HACKER</h1>
        				<p style="width:40%;">Security is an investment to support your business growth, make it more trustworthy and ensure your business development. </p>
                <img src="<?php echo base_url('asset/img/2_Growth-Hacker_Icon.png');?>" alt="Welcome" class="welcome">
              </div>
              <div class="intro--banner respon" id="responbanner">
                <h1>RESPONSIVE</h1>
        				<h1 class="service_home">&amp; RESPONSIBLE  </h1>
        				<p style="width:40%;">Tjakrabirawa built by person who passionate in security, we are honored our skills and experience can benefit your organization. We are here to help.  </p>
                <img src="<?php echo base_url('asset/img/3_Responsive-&-Responsible_icon.png');?>" alt="Welcome" class="welcome">
              </div>
              <div class="intro--options">
                <a href="#0" id="intelligent">
                  <h3>INTELLIGENT SERVICE</h3>
                  <p>Tjakrabirawa acknowledge there are no business or IT Infrastructure are the same, so we tailor made all of our services to benefit you the most.</p>
                </a>
                <a href="#0" id="growth">
                  <h3>Growth Hacker</h3>
                  <p>Security is an investment to support your business growth, make it more trustworthy and ensure your business development.</p>
                </a>
                <a href="#0" id="respon">
                  <h3>Responsive &amp; responsible</h3>
                  <p>Tjakrabirawa built by person who passionate in security, we are honored our skills and experience can benefit your organization. We are here to help.</p>
                </a>
              </div>
            </div>
          </li>

          <!-- ABOUT -->
          <li class="l-section section">
            <div class="about">
              <div class="about--banner">
      			  <h4 style="color:#A0D13C; font-size:1.5em;">LITTLE MORE ABOUT US</h4>
                     Tjakrabirawa pay detailed attention to your security needs to make sure that your company always get the best out of our services, because there are no two organization are the same. We build long-term trusted partnerships to create a world where lives are enriched through the implementation of our insights. In order to set and achieve the highest performance standards among security consulting company, we provide all services based on International Standard. We are ready to present you a solution that are reliable, cost-effective and trustworthy.
                </div>

               <div class="intro--banner">
        				<img src="<?php echo base_url('asset/css/img/about/logo icon 13.png');?>" alt="About Us" style="top:-50em;left:13em;">
        				<img src="<?php echo base_url('asset/css/img/about/logo icon 9.png');?>" alt="About Us" style="top:-45em;left:38em;">
        				<img src="<?php echo base_url('asset/css/img/about/logo icon 11.png');?>" alt="About Us" style="top:-40em;left:50em;">
        				<img src="<?php echo base_url('asset/css/img/about/logo icon 6.png');?>" alt="About Us" style="top:-50em;left:65em;">
        				<img src="<?php echo base_url('asset/css/img/about/logo icon 13.png');?>" alt="About Us" style="top:-39em;left:63em;">
        				<img src="<?php echo base_url('asset/css/img/about/logo icon 4.png');?>" alt="About Us" style="top:-42em;left:72em;">
        				<img src="<?php echo base_url('asset/css/img/about/logo icon 14.png');?>" alt="About Us" style="top:-28em;left:42em;">
        				<img src="<?php echo base_url('asset/css/img/about/logo icon 7.png');?>" alt="About Us" style="top:-18em;left:25em;">
        				<img src="<?php echo base_url('asset/css/img/about/logo icon 7.png');?>" alt="About Us" style="top:-20em;left:53em;">
        			    <img src="<?php echo base_url('asset/css/img/about/logo icon 5.png');?>" alt="About Us" style="top:-13em;left:63em;">
        				<img src="<?php echo base_url('asset/css/img/about/logo icon 11.png');?>" alt="About Us" style="top:-30em;left:56em; position: absolute;">
        				<img src="<?php echo base_url('asset/css/img/about/logo icon 7.png');?>" alt="About Us" style="top:-28em;left:67em; position: absolute;">
      				<img src="<?php echo base_url('asset/img/about-visual.png');?>" alt="About Us" style="top:-55em;left:43em; position: relative;">
              </div>
            </div>
          </li>

          <!-- SERVICE -->
          <li class="l-section section">
            <div class="hire">
              <div id="serviceList">
                <h2>SERVICE</h2>
                <div class="work--lockup">
                  <ul class="slider">
                    <?php $i=1;$posService=""; foreach($service as $postService): ?>
                      <?php
                        if($i==1){
                          $posService="slider--item slider--item-left";
                        }elseif ($i==2) {
                          $posService="slider--item slider--item-center";
                        }elseif ($i==3) {
                          $posService="slider--item slider--item-right";
                        }
                      ?>

                      <li class="<?php echo $posService; ?>">
                        <a href="#0" onclick="openservice(<?php echo $i; ?>)">
                          <div class="slider--item-image">
                            <img src="<?php echo base_url().'asset/img/artikel/'. $postService['photo'];?>" alt="Victory">
                          </div>
                          <p class="slider--item-title"><?php echo $postService['title'];?></p>
                        </a>
                      </li>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                  </ul>
                  <div class="slider--prev">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                    <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                      <path d="M561,1169C525,1155,10,640,3,612c-3-13,1-36,8-52c8-15,134-145,281-289C527,41,562,10,590,10c22,0,41,9,61,29
                      c55,55,49,64-163,278L296,510h575c564,0,576,0,597,20c46,43,37,109-18,137c-19,10-159,13-590,13l-565,1l182,180
                      c101,99,187,188,193,199c16,30,12,57-12,84C631,1174,595,1183,561,1169z"/>
                    </g>
                    </svg>
                  </div>
                  <div class="slider--next">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                    <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                      <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                    </g>
                    </svg>
                  </div>
                </div>
              </div>
              <?php $i=1; foreach($service as $postService): ?>
              <div id="serviceDetail_0<?php echo $i; ?>">
                <div class="btn-place">
                  <div class="btn_prev" onclick="openservice()">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                    <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                      <path d="M561,1169C525,1155,10,640,3,612c-3-13,1-36,8-52c8-15,134-145,281-289C527,41,562,10,590,10c22,0,41,9,61,29
                      c55,55,49,64-163,278L296,510h575c564,0,576,0,597,20c46,43,37,109-18,137c-19,10-159,13-590,13l-565,1l182,180
                      c101,99,187,188,193,199c16,30,12,57-12,84C631,1174,595,1183,561,1169z"/>
                    </g>
                    </svg>
                  </div>
                </div>
                <div class="content-place">
                  <h2><?php echo $postService['title'];?></h2>
                  <div class="content-radius-img">
                    <img src="<?php echo base_url().'asset/img/artikel/'. $postService['photo'];?>" alt="Victory">
                  </div>
                  <?php echo $postService['isi_berita'];?>
                </div>
              </div>
              <?php $i++; ?>
            <?php endforeach; ?>
            </div>
          </li>

          <!-- TRAINING -->
          <li class="l-section section">
            <div class="hire">
              <h2>TRAINING</h2>
              <!-- checkout formspree.io for easy form setup -->
              <form class="work-request" name="trainingForm" id="trainingForm" action="<?php echo site_url('create-training');?>" method="POST">
                <div class="work-request--options" style="font-size:8pt">
                  <?php if(!empty($trainingData)): ?>
                    <?php $i = 0; $array = array();?>
                    <span class="options-a">
                      <?php foreach($trainingData as $postTraining): ?>
                      <?php if($i<=2): ?>
                          <input id="opt-<?php echo $i; ?>" type="checkbox" name="training[]" value="<?php echo $postTraining['title_layanan'];?>">
                          <label for="opt-<?php echo $i; ?>">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                            <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                              <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                            </g>
                            </svg>
                            <?php echo strtoupper($postTraining['title_layanan']);?>
                          </label>
                      <?php array_push($array, $postTraining['id_layanan']); $i++; endif;?>
                      <?php endforeach; ?>
                    </span>
                    <span class="options-b">
                        <?php foreach($trainingData as $postTraining):?>
                            <?php if(!in_array($postTraining['id_layanan'], $array)):?>
                              <input id="opt-<?php echo $i; ?>" type="checkbox" name="training[]" value="<?php echo $postTraining['title_layanan'];?>">
                              <label for="opt-<?php echo $i; ?>">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                                <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                  <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                </g>
                                </svg>
                                <?php echo strtoupper($postTraining['title_layanan']);?>
                              </label>
                              <?php $i++;?>
                            <?php endif;?>
                        <?php endforeach; ?>
                    </span>
                    <?php else: ?>
                    <p>Post(s) not available.</p>
                    <?php endif; ?>
                </div>
                <div class="work-request--information">
                  <div class="information-name">
                    <input id="name" name="name" type="text" spellcheck="false">
                    <label for="name">Name</label>
                  </div>
                  <div class="information-email">
                    <input id="email" name="email" type="email" spellcheck="false">
                    <label for="email">Email</label>
                  </div>
                </div>
                <input type="submit" value="Send Request" onclick="submitTraining()">
              </form>
            </div>
          </li>

		  <!-- BLOG -->
      <li class="l-section section">
	       <div class="hire">
           <div class="blog-space">
             <a href="<?php echo base_url('blog')?>">
               <img src="<?php echo base_url('asset/css/img/about/logo icon 5.png');?>" width="121px" height="111px">
               <h1>BLOG</h1>
             </a>
           </div>
        </div>
      </li>

          <!-- CONTACT -->
          <li class="l-section section">
            <div class="contact">
              <div id="click-place"></div>
              <div class="contact--lockup">
				<div class="address-contact">
          <h3>PT. TJAKRABIRAWA</h3>
  					Manhattan Tower 12th Floor,<br/>
  					TB Simatupang Street<br/>
  					South Jakarta<br/>
  					phone : 021-80641090<br/>
  					info : info@tjakrabirawa.com<br/>
				</div>
                <div class="modal">
                  <div class="modal--information">
                    <p>LEAVE A MESSAGE</p>
                  </div>
                  <form name="contactForm" id="contactForm" action="<?php echo site_url('create-message');?>" method="POST">
                  <ul class="modal--options">
                    <li><input type="text" name="subtitle" placeholder="Sub Title" class="sendcontact"></li>
                     <li><input type="text" name="email" placeholder="Your Email*" class="sendcontact"></li>
                    <li><input type="text" name="subject" placeholder="Subject*" class="sendcontact"></li>
		                 <li><textarea name="pesan" class="sendcontact"> Message</textarea></li>
                     <li><input type="submit" class="btn-send" value="SEND" onclick="submitContact()"/></li>
                  </ul>
                </form>
                </div>
              </div>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </div>
  <ul class="outer-nav">
    <li class="is-active">Home</li>
    <li><span>About</span></li>
    <li><span>Service</span></li>
	<li><span>Training</span></li>
	<li><span>Blog</span></li>
	<li><span>Contact</span></li>
  </ul>
</div>
<script src="<?php echo base_url('asset/js/vendor/jquery-2.2.4.min.js');?>"></script>
<script src="<?php echo base_url('asset/js/vendor/hammer-2.0.8.js');?>"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url('asset/js/jQuery-2.1.4.min.js');?>"><\/script>')</script>
<script src="<?php echo base_url('asset/js/functions.js');?>"></script>
<script>
    $(document).ready(function(){
        $('#growthbanner').hide();
        $('#responbanner').hide();
        $("#blogDetail").hide();

        $("#serviceDetail_01").hide();
        $("#serviceDetail_02").hide();
        $("#serviceDetail_03").hide();

        $('#intelligent').addClass('active-intro-option');

        $("#intelligent").click(function () {
            $("#introbanner").fadeIn( 300, function() {
              $('#introbanner').show();
            });
            $('#intelligent').addClass('active-intro-option');

            $('#growthbanner').hide();
            $('#growth').removeClass('active-intro-option');

            $('#responbanner').hide();
            $('#respon').removeClass('active-intro-option');
        });
        $("#growth").click(function () {
            $("#growthbanner").fadeIn( 300, function() {
              $('#growthbanner').show();
            });
            $('#growth').addClass('active-intro-option');

            $('#introbanner').hide();
            $('#intelligent').removeClass('active-intro-option');

            $('#responbanner').hide();
            $('#respon').removeClass('active-intro-option');
        });
        $("#respon").click(function () {
            $("#responbanner").fadeIn( 300, function() {
              $('#responbanner').show();
            });
            $('#respon').addClass('active-intro-option');

            $('#growthbanner').hide();
            $('#growth').removeClass('active-intro-option');

            $('#introbanner').hide();
            $('#intelligent').removeClass('active-intro-option');
        });
        $("#click-place").click(function () {
          window.open("https://www.google.co.id/maps/place/The+Manhattan+Square/@-6.2908153,106.8084867,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69f1f952354da7:0x85bd11e37a3b67b4!8m2!3d-6.2908206!4d106.8106754?hl=en", "_blank");
        });
    });
    function submitContact(){
      $("#contactForm").submit(function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");

        $.ajax(
        {
            url : formURL,
            type: "POST",
            data : postData,
            async: false,
            success:function(data, textStatus, jqXHR)
            {
                //data: return data from server
                if(data == "1"){
                  $("#contactForm").find("input[type=text]").val("");
                  $("#contactForm").find("textarea").val("Message");
                  alert("Terima Kasih. Pesan Anda Berhasil Diterima.");
                }else{
                  alert("Mohon maaf sistem terdapat kesalahan.");
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                //if fails
                alert(errorThrown);
            }
        });
        e.preventDefault(); //STOP default action
      });
    }
    function submitTraining(){
        $("#trainingForm").submit(function(e) {
          var postData = $(this).serializeArray();
          var formURL = $(this).attr("action");

          $.ajax(
          {
              url : formURL,
              type: "POST",
              data : postData,
              async: false,
              success:function(data, textStatus, jqXHR)
              {
                  //data: return data from server
                  if(data == "1"){
                    $("#trainingForm").find("input[type=text], input[type=email]").val("");
                    $("#trainingForm").find("input[type='checkbox']").prop('checked', false);
                    alert("Terima Kasih. Pesan Anda Berhasil Diterima.");
                  }else{
                    alert("Mohon maaf sistem terdapat kesalahan.");
                  }
              },
              error: function(jqXHR, textStatus, errorThrown)
              {
                  //if fails
                  alert(errorThrown);
              }
          });
          e.preventDefault(); //STOP default action
        });
      }
      function aksiClose(){
        $("#blogList").fadeIn( 300, function() {
          $('#blogList').show();
        });
        $("#blogDetail").hide();
      }

      function readMoreBlog(id){
        var formURL = "<?php echo base_url()?>dashboard/detailberita/"+ id;

        $.ajax(
        {
            url : formURL,
            type: "POST",
            data : {artikelid:id},
            success:function(data, textStatus, jqXHR)
            {
                //data: return data from server
                $("#blogList").hide();
                $("#blogDetail").show();
                $("#blogDetail").html(data);
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                //if fails
                alert(errorThrown);
            }
        });
      }

      function openservice(v){
        if(v == 1){
          $("#serviceList").hide();

          $("#serviceDetail_01").show();
          $("#serviceDetail_02").hide();
          $("#serviceDetail_03").hide();
        }else if(v == 2){
          $("#serviceList").hide();

          $("#serviceDetail_01").hide();
          $("#serviceDetail_02").show();
          $("#serviceDetail_03").hide();
        }else if(v == 3){
          $("#serviceList").hide();

          $("#serviceDetail_01").hide();
          $("#serviceDetail_02").hide();
          $("#serviceDetail_03").show();
        }else{
          $("#serviceList").show();

          $("#serviceDetail_01").hide();
          $("#serviceDetail_02").hide();
          $("#serviceDetail_03").hide();
        }
      }
</script>

</body>
</html>
