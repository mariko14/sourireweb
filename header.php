<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0, minimum-scale=1.0">
<title><?php wp_title(); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
<link rel="canonical" href="https://sourire-web-studio.com/"/>
<?php wp_deregister_script('jquery'); ?>
<?php  wp_head(); ?>
</head>
<body <?php body_class();?> >
<?php if(is_page( 'contact' )): ?>
<script src='https://www.google.com/recaptcha/api.js?render=6LeveoUUAAAAABxc-PzhemzXnx5fMWXhUtrsiNjE'></script>
<?php endif; ?>	
<?php include_once("analyticstracking.php") ?>
<header id="header">
	<div class="inner">
		<h1 id="header-h1">女性デザイナーによる女性・子供向けかわいいホームページ制作(神戸・明石)Sourire web studio.</h1>
        <h2><a class="logo over" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="トップページへ" rel="home"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="女性・子供向けホームページ制作(神戸・明石)Sourire web studio"></a></h2>
    <?php cTpl_rwd004_light_print_contactInfo();?>
	</div>
</header>

  <nav id="mainNav">
    <div class="inner">
		  <a class="menu" id="menu" role="button" aria-controls="navigation" aria-expanded="false" aria-label="メニュー一覧を開く" tabindex="0">
		    <span>MENU</span>
		  </a>
		  <div class="panel" role="navigation" id="navigation" style="display: none;">
		    <ul class="nav-left">
		      <li class="home over nav_left menu-item">
		        <a href="https://sourire-web-studio.com" id="home">
			        <img src="<?php bloginfo('template_url'); ?>/images/home.png" width="98" height="40" alt="子供・女性向けかわいいホームページ制作Sourire web studioのトップページへ">
		          <span class="pc-no">トップページ</span>
		        </a>
		      </li>
		      <li class="about over nav_left menu-item">
		        <a href="https://sourire-web-studio.com/about/" id="about">
			        <img src="<?php bloginfo('template_url'); ?>/images/about.png" width="106" height="39" alt="子供・女性向けかわいいホームページ制作Sourire web studioの自己紹介">
		          <span class="pc-no">自己紹介</span>
		        </a>
		      </li>
		      <li class="works over nav_left menu-item">
		        <a href="https://sourire-web-studio.com/works" id="works">
			        <img src="<?php bloginfo('template_url'); ?>/images/works.png" width="110" height="38" alt="子供・女性向けかわいいホームページ制作Sourire web studioの制作実績">
		          <span class="pc-no">制作実績</span>
		        </a>
		      </li>
		      
		    </ul>
		    <ul class="nav-right">
		      <li class="flow over nav_right menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
		        <a href="https://sourire-web-studio.com/flowprice/" id="price">
			        <img src="<?php bloginfo('template_url'); ?>/images/flow.png" width="106" height="36" alt="子供・女性向けかわいいホームページ制作Sourire web studioの料金と制作の流れ">
		          <span class="pc-no">料金と制作の流れ</span>
		        </a>
		        <ul class="sub-menu">
		          <li class="menu-item menu-item-type-custom menu-item-object-custom">
		            <a href="https://sourire-web-studio.com/flowprice/card-plan/" id="price-card">
		              <span>期間限定！ショップカード付きプラン</span>
		            </a>
		          </li>
		          <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children ">
		            <a href="https://sourire-web-studio.com/flowprice/#templateplan" id="price-templateplan">
		              <span>テンプレートプラン</span>
		            </a>
		            <ul>
		              <li class="menu-item menu-item-type-post_type menu-item-object-page">
		                <a href="https://sourire-web-studio.com/flowprice/template-sp/" id="price-template_sp">
		                  <span>スマホ対応テンプレート一覧</span>
		                </a>
		              </li>
		            </ul>
		          </li>
		          <li class="menu-item menu-item-type-custom menu-item-object-custom">
		            <a href="https://sourire-web-studio.com/flowprice/#pack_price" id="price-pack">
		              <span>ホームページ制作パックプラン</span>
		            </a>
		          </li>
		          <li class="menu-item menu-item-type-custom menu-item-object-custom">
		            <a href="https://sourire-web-studio.com/flowprice/#flow-list" id="price-flow">
		              <span>制作の流れ</span>
		            </a>
		          </li>
		        </ul>
		      </li>
		      <li class="qa over nav_right menu-item">
		        <a href="https://sourire-web-studio.com/qa/" id="qa">
			        <img src="<?php bloginfo('template_url'); ?>/images/qa.png" width="84" height="38" alt="子供・女性向けかわいいホームページ制作Sourire web studioのよくある質問へ">
		          <span class="pc-no">よくある質問</span>
		        </a>
		      </li>
		      <li class="blog over nav_right menu-item">
		        <a href="https://sourire-web-studio.com/category/blog/" id="blog">
			        <span class="pc-no">ブログ</span>
		        </a>
		      </li>
		      <li class="contact over nav_right menu-item">
		        <a href="https://sourire-web-studio.com/contact/" id="contact">
			        <img src="<?php bloginfo('template_url'); ?>/images/contact.png" width="125" height="32" alt="子供・女性向けかわいいホームページ制作Sourire web studioのお問い合わせへ">
		          <span class="pc-no">お問い合わせ</span>
		        </a>
		      </li>
		    </ul>
		  </div>
    </div>
  </nav>