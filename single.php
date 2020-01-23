<?php get_header(); ?>
<div id="wrapper">

<?php custom_breadcrumb(); ?>	
	
<div id="content">
<section>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" class="content">
	  <header>  	
      <h2 class="title first"><span><?php the_title(); ?></span></h2>   
     <p class="date"><?php the_time('Y.m.d')?> カテゴリ：<?php the_category(', ') ?></p>
    
    </header>
    <div class="post post-single">
		<?php the_content(); ?>
    </div>
    <?php wp_link_pages('before=<p id="pageLinks">ページ:&after=</p>'); ?> 
  </article>
	<?php endwhile;?>
 
  <?php endif; ?>

 


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
<?php  get_sidebar('blog'); ?>
<?php get_footer(); ?>