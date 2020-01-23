<aside id="sidebar">
<div class="side-list">

<h3><img src="<?php bloginfo('template_url'); ?>/images/side-blog.png" width="265" height="74" alt="ブログカテゴリー" /></h3>
<ul>
<?php $cat_info = get_categories('child_of=2');
    foreach ($cat_info as $category) { if($category->count != 0) : ?>
    <li><a href="/category/blog/<?php echo $category->category_nicename; ?>/"><span><?php echo $category->cat_name; ?></span></a></li>
<?php endif; };?>
</ul>

</div>
<div class="side-list">
<h3><img src="<?php bloginfo('template_url'); ?>/images/side-article.png" width="265" height="74" alt="ブログ　最新記事" /></h3>
<?php $date = query_posts('category_name=blog&showposts=5');
foreach($date as $post):?>
<ul>
<li><a href="<?php echo get_permalink($id->ID); ?>" ><span><?php echo $post->post_title; ?></span></a></li>
</ul>
<?php endforeach; ?>
</div>

<div class="side-list side-viewed">
<h3><img src="<?php bloginfo('template_url'); ?>/images/side-post.png" width="265" height="74" alt="ブログ　人気の記事" /></h3>
	<div class="widget">
		<ul>
			<li class="ranking-3">
	            <a href="https://sourire-web-studio.com/blog/freelance/いきなりwebデザイナー、しかもフリーランスって/">
	                <div class="cms-nav-img">
	                    <img src="/wp-content/uploads/2013/06/ae46b1f460ee46f789c27b264a6cb421.png" width="500" height="375" alt="いきなりWEBデザイナー、しかもフリーランスって無茶苦茶ですよね？" class="object-fit-img">
	                </div>
	                <div class="cms-nav-txt">
	                    <div class="cms-nav-tit">いきなりWEBデザイナー、しかもフリーランスって無茶苦茶ですよね？</div>
	                    <div class="cms-nav-date">2013/06/25</div>
	                </div>
	            </a>
	        </li>
					        <li class="ranking-1">
	            <a href="https://sourire-web-studio.com/blog/shifter/">
	                <div class="cms-nav-img">
	                    <img src="/wp-content/uploads/2019/07/20190726_1.jpg" width="500" height="335" alt="WordPressからShifterにお引っ越しした話" class="object-fit-img">
	                </div>
	                <div class="cms-nav-txt">
	                    <div class="cms-nav-tit">WordPressからShifterにお引っ越しした話</div>
	                    <div class="cms-nav-date">2019/07/26</div>
	                </div>
	            </a>
	        </li>
			        <li class="ranking-4">
	            <a href="https://sourire-web-studio.com/blog/webdesign/webdedign-school/">
	                <div class="cms-nav-img">
	                    <img src="/wp-content/uploads/2014/03/adobesoft.jpg" width="500" height="327" alt="WEBデザイナーになるには、スクールに行かないといけないの？" class="object-fit-img">
	                </div>
	                <div class="cms-nav-txt">
	                    <div class="cms-nav-tit">WEBデザイナーになるには、スクールに行かないといけないの？</div>
	                    <div class="cms-nav-date">2014/03/28 </div>
	                </div>
	            </a>
		</ul>
	</div>
</div>



	<a class="over banner" href="https://sourire-web-studio.com/flowprice/">
		  <img src="<?php bloginfo('template_url'); ?>/images/banner-template.jpg" alt="大人気の素早く手軽な格安ホームページ制作テンプレートプラン" width="265" height="180">
	</a>
	<a class="over banner" href="https://sourire-web-studio.com/category/blog/">
		  <img src="<?php bloginfo('template_url'); ?>/images/baner_blog.jpg" alt="女性デザイナーのつれづれブログへ" width="265" height="106">
	</a>
    <a class="over banner" href="https://sourire-web-studio.com/contact/">
	    <img src="<?php bloginfo('template_url'); ?>/images/baner_mitumori.jpg" alt="お見積もり" width="265" height="105">
	</a>
	<a class="over banner" href="http://chomo-photoisland.com/">
	   <img src="<?php bloginfo('template_url'); ?>/images/baner-album.jpg" alt="アルバムサイトへ" width="265" height="100">
	</a>
	 <section id="text-2" class="widget widget_text">
		 <h3><span>業務内容</span></h3>
		 <div class="textwidget">
			 <h2>ホームページ制作に関わる<br>業務全般</h2>
			 <p>Webサイト デザイン／制作／企画／運営/スマートフォンサイト制作／ネットショップ制作／バナー 制作など<br>その他、ご相談ください！</p>
		</div>
	</section>
	<section id="text-3" class="widget widget_text">
		<h3><span>対応地域</span></h3>
		<div class="textwidget">
			<p>明石市・神戸市・西宮市・尼崎市、芦屋市・加古川市・姫路市等兵庫県南部や大阪府などは直接お会いして打ち合わせが可能です。<br>遠方の方からのご依頼も承っております！電話・メールで対応が可能です。 お気軽にご相談下さい。</p>
	</div>
	</section>
</aside>