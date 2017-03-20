<?php if(!empty($blogData)): foreach($blogData as $post): ?>
  <div class="blog-box">
    <div class="article-box">
      <div class="article-place">
        <h3><?php echo $post['title']?></h3>
        <?php
          $content_post = $post['isi_berita'];
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
        <a href="#" onclick="readMoreBlog('<?php echo $post['id']; ?>')"><span class="read-more"> (read...)</span></a>
      </div>
      <div class="pic-place">
        <img src="<?php echo base_url('asset/img/user/'.$post['foto']);?>"/>
      </div>
    </div>
    <div class="clean-box"></div>
    <div class="writer-box">
      <div class="writer-name"><?php echo $post['username'] ?></div>
      <div class="writer-time"><img src="<?php echo base_url('asset/img/Shape.png');?>" />
        <?php
          if($post['hour_post'] == "00"){
            echo $post['min_post'] ." Minutes";
          }else{
            echo $post['hour_post'] ." Hour";
          }
        ?>
    </div>
    </div>
    <div class="blog-line"></div>
  </div>
<?php endforeach; else: ?>
<p>Post(s) not available.</p>
<?php endif; ?>
<?php echo $this->ajax_pagination->create_links(); ?>
