<?php get_header(); ?>
<div id="wrapper">
<div class="pan">
<?php if(function_exists('bcn_display'))
{
bcn_display();
}?>
</div>
<div id="content" class="page404">
<section>
	
	  <header> 	
      <p class="read-404"><span>すみません、ページが見つかりませんでした</span></p> 
      		<img class="left main" src="<?php bloginfo('template_url'); ?>/images/sorry.png" width="360" height="286" alt="女性デザイナーによる女性・子供向けホームページ制作(神戸・明石)Sourire web studio" />
　　　　　　 
		  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button"><span>TOPへ戻る</span></a>

         </header>
   
</section>


  
	</div><!-- / content -->
<!-- サイドバーを埋め込む -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>