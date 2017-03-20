<section id="footer" class="no-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 text-center">
        <div class="kbr-box">
          <div class="col-lg-4 col-md-4">
		  <img src="<?php echo base_url('asset/images/logo.png');?>" />
          </div>
          <div class="col-lg-8 col-md-8">
            <div  class="tittle">
              <h3>PEREKONOMIAN SUKABUMI</h3>
            </div>
            <p class="text-red">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's </p>
            <br>
            <p>Jalan Syamsudin SH, Cikole,</p>
            <p>Kecamatan Sukabumi, Kota</p>
            <p>Sukabumi, Jawa Barat 43113,</p>
            <p>Indonesia</p>
            <p>Phone: +62 266 221125</p>

            <div class="sosmedimage">
			<img src="<?php echo base_url('asset/images/fblogo.png');?>"/>
			<img src="<?php echo base_url('asset/images/twitterlogo.png');?>"/>
			<img src="<?php echo base_url('asset/images/googlelogo.png');?>"/>
            </div>

          </div>

        </div>
      </div>

    </div>

  </div>
  <div class="endfooter">
    <p style="text-align:center;">Copyright 2016 @ PEREKONOMIAN KOTA SUKABUMI</p>
  </div>
</section>

<script>
$(document).ready(function(){
	$('a[href^="#"].page-scroll').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 1500, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});
</script>

</body>


</html>