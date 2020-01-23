<?php get_header(); ?>
<div id="wrapper">
<?php custom_breadcrumb(); ?>	
	
<div id="content" class="blog-index">
<section>


<?php if ( is_category('blog')) 
        query_posts("cat=2&showposts=5&paged=$paged");
        ?>
<h2 class="title first"><span><?php single_tag_title( ); ?></span></h2>
<?php
$post_cats = get_the_category();
if ( $post_cats[0]->cat_ID == 2 || $post_cats[0]->category_parent == 2 || cat_is_ancestor_of( 2, (int)$post_cats[0]->category_parent ) ) { ?>
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
    	<h2>記事がありません</h2>
    	<p>表示する記事はありませんでした</p>
    </div>
<?php endif; ?>
<!-- ページ送り --> 
<div class="navigation">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div>
<!-- /ページ送り -->
<?php } ?>

<?php if ( is_category('news'))  :?>
<?php
query_posts($query_string);//他のquery_postsが継承されてしまう為、カテゴリ指定をデフォルトに戻す
query_posts('cat=7&paged='.$paged);//表示したいカテゴリIDを列挙
?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); 
	/* ループ開始 */ ?>
	<div class="post">
    		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    		<p class="date"><?php the_time("Y年m月j日") ?>　カテゴリ：<?php the_category(', ') ?></p>
    	<?php the_excerpt(); ?>
       
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
<?php
//最後に「query_posts」をリセット
wp_reset_query();
?>
<?php endif ;?>


</section>

  
	</div><!-- / content -->
<!-- サイドバーを埋め込む -->
<?php  get_sidebar('blog'); ?>

<?php get_footer(); ?>