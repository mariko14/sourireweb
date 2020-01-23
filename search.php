<?php get_header(); ?>
<div id="wrapper">
<div class="pan">
<?php if(function_exists('bcn_display'))
{
bcn_display();
}?>
</div>
<div id="content" class="archive">
<section>

<?php if (have_posts()) :   ?>
<?php while (have_posts()) : the_post(); 
	/* ループ開始 */ ?>
	<div class="post">
    		<div class="title_space">
                   <h2 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><span><?php the_title(); ?></span></a></h2>
                   <p class="date"><?php the_time('Y.m.d')?> カテゴリ：<?php the_category(', ') ?></p>
    
                </div>

              <div class="post-inner clear">
                　 <a class="over thumb" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php if(has_post_thumbnail()) { echo the_post_thumbnail(); } ?></a>
   
                       <div class="text">
                           <?php the_excerpt(); ?>


                       </div><!-- /text -->
              </div><!-- /post-inner -->
    </div>
	<?php endwhile; ?>       
<?php else : ?>
    <div class="post">   
            <div class="title_space">
                <h2 class="title"><span>記事がありません</span></h2>
            </div>
            <div class="post-inner clear">
               <p style="margin-bottom:20px;padding-top:20px;">すみません。お探しのページが見つかりませんでした。<br>もう一度検索をお試しください。</p>
               <?php get_search_form(); ?>       
            </div>      
      </div>
<?php endif; ?>

　　　　<!-- ページ送り --> 
<div class="navigation">
　　   <?php if(function_exists('wp_pagenavi')) {
    wp_pagenavi();
} ?>
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