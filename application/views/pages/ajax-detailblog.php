<?php if(!empty($detailBlog)): foreach($detailBlog as $postDetail): ?>
  <h2><?php echo $postDetail['title']?></h2>
  <?php echo $postDetail['isi_berita']?>
  <?php echo $postDetail['username']?>
  <div class="close-place">
      <img src="<?php echo base_url('asset/img/close.png');?>" alt="close" onclick="aksiClose()"/>
  </div>
<?php endforeach; else: ?>
<p>Post(s) not available.</p>
<?php endif; ?>
