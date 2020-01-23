<?php 
function cTpl_rwd004_light_theme_options_init() {
	if ( false === cTpl_rwd004_light_get_theme_options() )
		add_option( 'cTpl_rwd004_light_theme_options', cTpl_rwd004_light_get_default_theme_options() );

	register_setting(
		'cTpl_rwd004_light_options',
		'cTpl_rwd004_light_theme_options',
		'cTpl_rwd004_light_theme_options_validate'
	);
}
add_action( 'admin_init', 'cTpl_rwd004_light_theme_options_init' );

function cTpl_rwd004_light_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_cTpl_rwd004_light_options', 'cTpl_rwd004_light_option_page_capability' );

function cTpl_rwd004_light_theme_options_add_page() {
	$theme_page = add_theme_page(
		'テーマ設定',
		'テーマ設定',
		'edit_theme_options',
		'theme_options',
		'cTpl_rwd004_light_theme_options_render_page'
	);

	if ( ! $theme_page )
		return;
}
add_action( 'admin_menu', 'cTpl_rwd004_light_theme_options_add_page' );


function cTpl_rwd004_light_get_default_theme_options() {
	$default_theme_options = array(
		'logo' => 'logo.png',
	);
}

function cTpl_rwd004_light_get_theme_options() {
	return get_option( 'cTpl_rwd004_light_theme_options', cTpl_rwd004_light_get_default_theme_options() );
}

get_template_part('inc/theme-options-edit');


/*	ヘッダー ロゴ
/*---------------------------------------------------------*/
function cTpl_rwd004_light_print_Logo() {
	$options = cTpl_rwd004_light_get_theme_options();
	$logo = $options['logo'];
	if ($logo) {
		print '<img src="'.$logo.'" alt="'.get_bloginfo('name').'">';
	} else {
		echo bloginfo('name');
	}
}

/*	フッター ロゴ
/*---------------------------------------------------------*/
function cTpl_rwd004_light_print_Logo2() {
	$options = cTpl_rwd004_light_get_theme_options();
	$logo2 = $options['logo2'];
	if ($logo2) {
		print '<p id="footerLogo"><img src="'.$logo2.'" alt="'.get_bloginfo('name').'"></p>';
	} else {
		echo '<p id="footerLogo">'.bloginfo('name').'</p>';
	}
}

	
/*	ヘッダー 電話番号・受付時間・住所
/*---------------------------------------------------------*/
function cTpl_rwd004_light_print_contactInfo() {
	$options = cTpl_rwd004_light_get_theme_options();
	$contactTel = $options['contactTel'];
	$contactTime = nl2br($options['contactTime']);
	$contactAddress = nl2br($options['contactAddress']);
	if ($contactTel) {
		print '<div id="headerInfo">'."\n";
		print '<p class="tel">'.$contactTel.'</p>'."\n";
		if ($contactTime) {
			print '<p class="openTime">'.$contactTime.'</p>'."\n";
		}
		if ($contactAddress) {
			print '<p class="address">'.$contactAddress.'</p>'."\n";
		}
	print	'</div>'."\n";
	}
}


/*	サイドバー 電話番号
/*---------------------------------------------------------*/
function cTpl_rwd004_light_contactBanner() {
	$options = cTpl_rwd004_light_get_theme_options();
	$contactTel = $options['contactTel'];
	if ($contactTel) {
		print '<div id="contactBanner">'."\n";
		print '<p class="tel">'.$contactTel.'</p>'."\n";
	print	'</div>'."\n";
	}
}



/*	トップページ お勧め商品
/*-------------------------------------------*/
function cTpl_rwd004_light_topProduct()	{
	$options = cTpl_rwd004_light_get_theme_options();
	
	$productHeading = $options['productHeading'];
	$product1Img = $options['product1Img'];
	$product2Img = $options['product2Img'];
	$product3Img = $options['product3Img'];
	$product1Name = $options['product1Name'];
	$product2Name = $options['product2Name'];
	$product3Name = $options['product3Name'];
	$product1Link = $options['product1Link'];
	$product2Link = $options['product2Link'];
	$product3Link = $options['product3Link'];

	if ($product1Img || $product2Img || $product3Img) {
?>
	<!-- お勧め商品 -->
  <?php if ($productHeading):?>
  <h2 class="title first"><span><?php echo $productHeading; ?></span></h2>
  <?php endif; ?>
	<div class="thumbWrap">

	<ul class="thumb">
  	<li>
    	<?php if ($product1Link):?>
      <a href="<?php echo $product1Link; ?>"><img src="<?php echo $product1Img; ?>" alt="<?php echo $product1Name; ?>" width="195" /></a>
			<?php else: ?>
      <img src="<?php echo $product1Img; ?>" alt="<?php echo $product1Name; ?>" width="195" />
      <?php endif;?>
		</li>
    
  	<li>
    	<?php if ($product2Link):?>
      <a href="<?php echo $product2Link; ?>"><img src="<?php echo $product2Img; ?>" alt="<?php echo $product2Name; ?>" width="195" /></a>
			<?php else: ?>
      <img src="<?php echo $product2Img; ?>" alt="<?php echo $product2Name; ?>" width="195" />
      <?php endif;?>
		</li>
	
  	<li>
    	<?php if ($product3Link):?>
      <a href="<?php echo $product3Link; ?>"><img src="<?php echo $product3Img; ?>" alt="<?php echo $product3Name; ?>" width="195" /></a>
			<?php else: ?>
      <img src="<?php echo $product3Img; ?>" alt="<?php echo $product3Name; ?>" width="195" />
      <?php endif;?>
		</li>
    
  </ul>
  
	</div>
	<!-- // お勧め商品 -->
<?php
	}
}

/*	サイドバー バナー
/*-------------------------------------------*/
function cTpl_rwd004_light_sidebarBanner()	{
	$options = cTpl_rwd004_light_get_theme_options();
	
	$banner1Img = $options['banner1Img'];
	$banner2Img = $options['banner2Img'];
	$banner3Img = $options['banner3Img'];
	$banner1Name = $options['banner1Name'];
	$banner2Name = $options['banner2Name'];
	$banner3Name = $options['banner3Name'];
	$banner1Link = $options['banner1Link'];
	$banner2Link = $options['banner2Link'];
	$banner3Link = $options['banner3Link'];

	if ($banner1Img || $banner2Img || $banner3Img) {?>
  <div id="banners">
  <?php }
	if ($banner1Img) {?>
  <p class="banner">
	<?php if ($banner1Link):?>
  <a  class="over" href="<?php echo $banner1Link; ?>"><img src="<?php echo $banner1Img; ?>" alt="<?php echo $banner1Name; ?>" /></a>
	<?php else: ?>
  <img src="<?php echo $banner1Img; ?>" alt="<?php echo $banner1Name; ?>" />
  <?php endif;?>
	</p>
<?php }

	if ($banner2Img) {?>
  <p class="banner">
	<?php if ($banner2Link):?>
  <a class="over" href="<?php echo $banner2Link; ?>"><img src="<?php echo $banner2Img; ?>" alt="<?php echo $banner2Name; ?>" /></a>
	<?php else: ?>
  <img src="<?php echo $banner2Img; ?>" alt="<?php echo $banner2Name; ?>" />
  <?php endif;?>
	</p>
<?php }

	if ($banner3Img) {?>
  <p class="banner">
	<?php if ($banner3Link):?>
  <a class="over" href="<?php echo $banner3Link; ?>"><img src="<?php echo $banner3Img; ?>" alt="<?php echo $banner3Name; ?>" /></a>
	<?php else: ?>
  <img src="<?php echo $banner3Img; ?>" alt="<?php echo $banner3Name; ?>" />
  <?php endif;?>
	</p>
<?php }

	if ($banner1Img || $banner2Img || $banner3Img) {?>
  </div>
  <?php }

}


