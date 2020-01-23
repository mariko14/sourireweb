<?php get_header(); ?>
<div id="wrapper">
<?php custom_breadcrumb(); ?>	
<div id="content">
<section>
	<?php while(have_posts()): the_post(); ?>
	<article id="post-<?php the_ID(); ?>" class="content">
		  <header> 	
	     	 <h2 class="title first"><span><?php the_title(); ?></span></h2>     
	      </header>
		  <div class="post">
				<?php the_content(); ?>
		   </div>
    <?php wp_link_pages('before=<p id="pageLinks">ページ:&after='); ?> 
  </article>
	<?php endwhile; ?>
</section>

<div class="contact-baner">
	<h3 class="web-font"><span>ホームページ制作・ネットショップ制作<br>ブログカスタマイズなどのお見積りは<br>お気軽にどうぞ！</span></h3>
	<a href="https://sourire-web-studio.com/contact/" class="toconatct over flex-area-center">
		<span class="button"><span>お問い合わせへ</span></span>
		<img src="<?php bloginfo('template_url'); ?>/images/clickchomo.png" width="118" height="90" class="clickchomo" alt="">
	</a>
	<img src="<?php bloginfo('template_url'); ?>/images/contact-baner-robo.png" width="110" height="92" class="contact-robo" alt="">
</div>
   
	</div><!-- / content -->
<!-- サイドバーを埋め込む -->
<?php
if(is_page('works') ) {get_sidebar('works');}
  elseif(in_category('27') ) {get_sidebar('works');}
  elseif(is_category('25') ) {get_sidebar('blog');}
  elseif(is_page('flowprice') ) {get_sidebar('price');}
  elseif(is_page('template') ) {get_sidebar('price');}
 elseif(is_page('template-sp') ) {get_sidebar('price');}
 elseif(is_page('card-plan') ) {get_sidebar('price');}
else {
  get_sidebar();
}
?>

<?php get_footer(); ?>