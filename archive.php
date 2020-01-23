<?php get_header(); ?>
<div id="wrapper">
<?php custom_breadcrumb(); ?>	
<div id="content" class="blog-index">
<section>

<h2 class="title first"><span>WEBデザイナーと子供の生活<?php single_cat_title(); ?>の記事</span></h2>

<?php if (have_posts()) :?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="post blog-box">
			<div class="title_space">
	           <h2 class="title"><span><?php the_title(); ?></span></h2>
	            <p class="date"><?php the_time('Y.m.d')?> カテゴリ：<?php $cat = get_the_category(); ?><?php $cat = $cat[0]; ?><?php echo get_cat_name($cat->term_id); ?></p>
	        </div>
	        <div class="blog-box-inner">
	            <div class="over thumb" >
		            <?php if(has_post_thumbnail()) { echo the_post_thumbnail(); } ?>
	            </div>
	            <div class="text">
	            	<?php the_excerpt(); ?>
	            </div><!-- /text -->
	        </div><!-- /post-inner -->
			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"></a>
	    </div>
    
	<?php endwhile; endif; ?>

<!-- ページ送り --> 
<div class="navigation">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div>
<!-- /ページ送り -->


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
<?php  get_sidebar('blog'); ?>

<?php get_footer(); ?>