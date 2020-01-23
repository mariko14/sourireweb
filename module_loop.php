<?php if ( is_category('blog')) 
        query_posts("cat=3&showposts=5&paged=$paged");
?>



<?php if ( is_category('news'))  :?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); 
	/* ループ開始 */ ?>
	<div class="post">
    		<div class="title_space">
                   <h2 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><span><?php the_title(); ?></span></a></h2>
                   <p class="date"><?php the_time('Y.m.d')?> </p>
    
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
    	<h2>記事がありません</h2>
    	<p>表示する記事はありませんでした</p>
    </div>
<?php endif; ?>
<!-- ページ送り --> 
<div class="navigation">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div>
<!-- /ページ送り --> 

<?php endif ;?>