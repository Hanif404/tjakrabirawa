<?php $this->load->view('pages/blog/header');?>
<section id="intro" class="wrapper style1 fullscreen fade-up">
    <div class="inner">
      <div class="detail-place">
        <a href="<?php echo base_url('blog'); ?>" class="icon-arrow">Back</a>
        <?php if(!empty($detailBlog)): foreach($detailBlog as $postDetail): ?>
          <h2><?php echo $postDetail['title']?></h2>
          <p class="pic"><img src="<?php echo base_url('asset/img/artikel').'/'.$postDetail['photo'] ?>" /></p>
          <?php echo $postDetail['isi_berita']?>
        <?php endforeach; else: ?>
          <p>Post(s) not available.</p>
        <?php endif; ?>
        <div class="author-place">
          <div class="pic-place">
            <img src="<?php echo base_url('asset/img/user/'.$postDetail['foto']);?>"/>
          </div>
          <div class="writer-place">
            <h3><?php echo 'PUBLISHED '. date('F d Y', strtotime($postDetail['create'])); ?></h3>
            <?php echo $postDetail['username'] ?>
          </div>
        </div>
      </div>
    </div>
</section>
<?php $this->load->view('pages/blog/footer');?>
