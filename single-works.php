<?php
/*
Single Post Template: work
Description: 
*/
?>

<?php get_header(); ?>
<div id="wrapper">
<div class="pan">
<?php if(function_exists('bcn_display'))
{
bcn_display();
}?>
</div>
<div id="content">
<section>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" class="content">
	  <header>  	
      <h2 class="title first"><span><?php the_title(); ?></span></h2>   
    
    </header>
    <div class="post">
		<?php the_content(); ?>
                


    </div>
    <?php wp_link_pages('before=<p id="pageLinks">ページ:&after=</p>'); ?> 
  </article>
	<?php endwhile;?>
 
  <?php endif; ?>
<div id="link-price">
	<p class="toprice-p">気になる制作料金はこちら</p>
	<a href="https://sourire-web-studio.com/flowprice/" class="button flex-area-center">
		<img src="/wp-content/uploads/2019/11/icon-yen.png" alt="" width="35" height="33" class="icon-yen">
		<span>制作料金と流れ</span>
		<img src="/wp-content/uploads/2019/11/icon-leaf.png" alt="" width="27" height="17" class="icon-leaf">
	</a>
</div>
<div class="contact-baner">
	<h3 class="web-font"><span>ホームページ制作・ネットショップ制作<br>ブログカスタマイズなどのお見積りは<br>お気軽にどうぞ！</span></h3>
	<a href="https://sourire-web-studio.com/contact/" class="toconatct over flex-area-center">
		<span class="button"><span>お問い合わせへ</span></span>
		<img src="<?php bloginfo('template_url'); ?>/images/clickchomo.png" width="118" height="90" class="clickchomo" alt="">
	</a>
	<img src="<?php bloginfo('template_url'); ?>/images/contact-baner-robo.png" width="110" height="92" class="contact-robo" alt="">
</div>

</section>


  
	</div><!-- / content -->
<!-- サイドバーを埋め込む -->
<?php  get_sidebar('works'); ?>



<?php get_footer(); ?>