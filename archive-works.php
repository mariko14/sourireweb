<?php get_header(); ?>
<div id="wrapper">
<?php custom_breadcrumb(); ?>	
  <div id="content" >
	<section>

	<h2 class="title first"><span>制作実績</span></h2>
<p style="padding-bottom:40px;">ここに掲載している以外の実績もございます。詳しくはメールフォームよりお問い合わせください</p>

       
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); 
	/* ループ開始 */ ?>
	 <div class="work-box">
          <?php the_content(); ?>
           <div class="work-more">
               <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="button">詳しく見る</a>
           </div>
        </div>  
       <hr class="clear">


      
	<?php endwhile; ?>       
<?php else : ?>
    <div class="post">          
    	<h2>記事がありません</h2>
    	<p>表示する記事はありませんでした</p>
    </div>
<?php endif; ?>
<!-- ページ送り --> 
<div class="navigation">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div>
<!-- /ページ送り --> 

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
<?php get_sidebar('works');?>

<?php get_footer(); ?>