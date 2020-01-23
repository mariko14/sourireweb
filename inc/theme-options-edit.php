<?php 
function cTpl_rwd004_light_theme_options_render_page() { ?>
<div class="wrap" id="cTpl_rwd004_light_options">
  <?php screen_icon(); ?>
	<h2><?php printf( __( '%s Theme Options', '' ), wp_get_theme() ); ?></h2>
	<?php settings_errors(); ?>
	<form method="post" action="options.php">
	<?php
		settings_fields( 'cTpl_rwd004_light_options' );
		$options = cTpl_rwd004_light_get_theme_options();
		$default_options = cTpl_rwd004_light_get_default_theme_options();
	?>
  
<div class="section first">
<h3>テーマの特徴</h3>
<table>
<tr>
<th>メニュー</th>
<td>カスタムメニューに対応。子カテゴリー、子ページ共に、PC、スマートフォンでも表示されます。<br />メニューはメインとフッターに異なったメニューを表示できます。<br />*フッターのメニューではIE7では子カテゴリー、子ページは表示されません。</td>
</tr>
<tr>
<th>日付</th>
<td>投稿のみに表示され、固定ページには表示されません。</td>
</tr>
<tr>
<th>ページナビゲーション</th>
<td>投稿のみに表示され、固定ページには表示されません。</td>
</tr>
<tr>
<th>コメント機能</th>
<td>コメント機能はついていません。</td>
</tr>
</table>
</div>

<div class="section first">
<h3>各設定方法</h3>
<table>
<tr>
<th>ページの設定</th>
<td><a href="<?php echo site_url(); ?>/wp-admin/options-reading.php" target="_blank">管理画面の設定</a> → 表示設定 → フロントページの表示 → 固定ページ で、フロントページに表示させたいページを選択します。
</td>
</tr>
<tr>
<th>お知らせの設定（サイドバーに表示されます）</th>
<td>お知らせと言う名前のカテゴリーを作ります。スラッグは<strong>info</strong>にします。このカテゴリー内の投稿がフロントページに5件まで表示されます。
</td>
</tr>
<tr>
<th>お知らせの一覧へのリンクの設定</th>
<td><a href="<?php echo site_url(); ?>/wp-admin/options-permalink.php" target="_blank">パーマリンク設定</a>をカスタム構造にしてください。値は　<strong>/%category%/%postname%/</strong>　にしてください。
</td>
</tr>
<tr>
<th>最新記事の表示（フロントページに表示されます）</th>
<td>上記で設定した「お知らせ <strong>info</strong>」以外のカテゴリーの記事が3件表示されます。<br />アイキャッチ画像は195px*100pxで表示されます。
</td>
</tr>
</table>
</div>

<div class="section">
<h3>ロゴの設定 <span>-画像がない場合はサイト名が表示されます-</span></h3>
<table>
<tr>
<th><p><img src="<?php if(isset($options['logo'])):?><?php echo esc_attr( $options['logo'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/logo.png<?php endif;?>"></p>
ヘッダーロゴ画像 URL <br />[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">画像のアップロード</a> ] </th>
<td><input type="text" name="cTpl_rwd004_light_theme_options[logo]" id="logo" value="<?php if(isset($options['logo'])):?><?php echo esc_attr( $options['logo'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/logo.png<?php endif;?>" style="width:100%;" /><br /><span>例) http://c-tpl.com/uploads/2012/09/logo.png</span>
</td>
</tr>
<tr>
<th><p><img src="<?php if(isset($options['logo2'])):?><?php echo esc_attr( $options['logo2'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/logo_footer.png<?php endif;?>"></p>
フッターロゴ画像 URL <br />[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">画像のアップロード</a> ] </th>
<td><input type="text" name="cTpl_rwd004_light_theme_options[logo2]" id="logo2" value="<?php if(isset($options['logo2'])):?><?php echo esc_attr( $options['logo2'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/logo_footer.png<?php endif;?>" style="width:100%;" /><br /><span>例) http://c-tpl.com/uploads/2012/09/logo2.png</span>
</td>
</tr>
</table>
<?php submit_button(); ?>
</div>

<div class="section">
<h3>連絡先の設定 <span>-ヘッダー右上部に表示されます-</span></h3>
<table>
<tr><th>お問い合わせ電話番号</th>
<td>
<input type="text" name="cTpl_rwd004_light_theme_options[contactTel]" id="contactTel" value="<?php if(isset($options['logo'])):?><?php echo esc_attr( $options['contactTel'] ); ?><?php else:?>012-345-6789<?php endif;?>" /><br />
<span>例) 000-000-0000</span>
</td>
</tr>
<tr>
<th>電話受付時間</th>
<td>
<textarea cols="20" rows="2" name="cTpl_rwd004_light_theme_options[contactTime]" id="contactTime" value="" /><?php if(isset($options['contactTime'])):?><?php echo esc_attr( $options['contactTime'] ); ?><?php else:?>平日 AM10:00〜PM5:00<?php endif;?></textarea><br />
<span>例) 平日 AM10:00〜PM5:00 (複数行可能)</span>
</td>
</tr>
<tr>
<th>住所</th>
<td>
<textarea cols="20" rows="2" name="cTpl_rwd004_light_theme_options[contactAddress]" id="contactAddress" value="" /><?php if(isset($options['contactAddress'])):?><?php echo esc_attr( $options['contactAddress'] ); ?><?php else:?>見本県見本市サンプル1-2<?php endif;?></textarea><br /><span>例) 見本県見本市サンプル1-2 (複数行可能)</span>
</td>
</tr>
</table>
<?php submit_button(); ?>
</div>

<div class="section">
<h3>お勧め商品の設定 <span>-フロントページに表示されます-</span></h3>
<table style="margin-bottom:20px">
<tr>
<th>見出し名</th>
<td>
<input type="text" name="cTpl_rwd004_light_theme_options[productHeading]" id="productHeading" value="<?php echo esc_attr( $options['productHeading'] ); ?>" /><br />
<span>例) お勧め商品 (記入をしていない場合は見出しなしで表示されます。)</span>
</td>
</tr>
</table>
<table>
<tr>
<th>お勧め商品1</th>
<th>お勧め商品2</th>
<th>お勧め商品3</th>
</tr>
<tr>
<td>
<p class="img"><img src="<?php if(isset($options['product1Img'])):?><?php echo esc_attr( $options['product1Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_m1.jpg<?php endif;?>"></p>
<dl>
<dt>画像URL　[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">画像のアップロード</a> ] </dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[product1Img]" id="product1Img" value="<?php if(isset($options['product1Img'])):?><?php echo esc_attr( $options['product1Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_m1.jpg<?php endif;?>" /><br />
<span>横幅195px以上の場合は自動縮小されます。</span></dd>
<dt>画像の説明　(alt属性)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[product1Name]" id="product1Name" value="<?php echo esc_attr( $options['product1Name'] ); ?>" /></dd>
<dt>リンク先のURL　(リンク先は空でも問題ありません)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[product1Link]" id="product1Link" value="<?php echo esc_attr( $options['product1Link'] ); ?>" /><br />
<span>例) http://c-tpl.com/</span></dd>
</dl>
</td>
<td>
<p class="img"><img src="<?php if(isset($options['product2Img'])):?><?php echo esc_attr( $options['product2Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_m2.jpg<?php endif;?>"></p>
<dl>
<dt>画像URL　[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">画像のアップロード</a> ] </dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[product2Img]" id="product2Img" value="<?php if(isset($options['product2Img'])):?><?php echo esc_attr( $options['product2Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_m2.jpg<?php endif;?>" /><br />
<span>横幅195px以上の場合は自動縮小されます。</span></dd>
<dt>画像の説明　(alt属性)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[product2Name]" id="product2Name" value="<?php echo esc_attr( $options['product2Name'] ); ?>" /></dd>
<dt>リンク先のURL　(リンク先は空でも問題ありません)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[product2Link]" id="product2Link" value="<?php echo esc_attr( $options['product2Link'] ); ?>" /><br />
<span>例) http://c-tpl.com/</span></dd>
</dl>
</td>
<td>
<p class="img"><img src="<?php if(isset($options['product3Img'])):?><?php echo esc_attr( $options['product3Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_m3.jpg<?php endif;?>"></p>
<dl>
<dt>画像URL　[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">画像のアップロード</a> ] </dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[product3Img]" id="product3Img" value="<?php if(isset($options['product3Img'])):?><?php echo esc_attr( $options['product3Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_m3.jpg<?php endif;?>" /><br />
<span>横幅195px以上の場合は自動縮小されます。</span></dd>
<dt>画像の説明　(alt属性)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[product3Name]" id="product3Name" value="<?php echo esc_attr( $options['product3Name'] ); ?>" /></dd>
<dt>リンク先のURL　(リンク先は空でも問題ありません)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[product3Link]" id="product3Link" value="<?php echo esc_attr( $options['product3Link'] ); ?>" /><br />
<span>例) http://c-tpl.com/</span></dd>
</dl>
</td>
</tr>
</table>
<?php submit_button(); ?>
</div>


<div class="section">
<h3>バナーの設定 <span>-サイドバーに表示されます-</span></h3>
<table>
<tr>
<th>バナー1</th>
<th>バナー2</th>
<th>バナー3</th>
</tr>
<tr>
<td>
<p class="img"><img src="<?php if(isset($options['banner1Img'])):?><?php echo esc_attr( $options['banner1Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_s1.jpg<?php endif;?>"></p>
<dl>
<dt>画像URL　[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">画像のアップロード</a> ] </dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[banner1Img]" id="banner1Img" value="<?php if(isset($options['banner1Img'])):?><?php echo esc_attr( $options['banner1Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_s1.jpg<?php endif;?>" /><br />
<span>横幅195px以上の場合は自動縮小されます。</span></dd>
<dt>画像の説明　(alt属性)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[banner1Name]" id="banner1Name" value="<?php echo esc_attr( $options['banner1Name'] ); ?>" /></dd>
<dt>リンク先のURL　(リンク先は空でも問題ありません)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[banner1Link]" id="banner1Link" value="<?php echo esc_attr( $options['banner1Link'] ); ?>" /><br />
<span>例) http://c-tpl.com/</span></dd>
</dl>
</td>
<td>
<p class="img"><img src="<?php if(isset($options['banner2Img'])):?><?php echo esc_attr( $options['banner2Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_s2.jpg<?php endif;?>"></p>
<dl>
<dt>画像URL　[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">画像のアップロード</a> ] </dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[banner2Img]" id="banner2Img" value="<?php if(isset($options['banner2Img'])):?><?php echo esc_attr( $options['banner2Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_s2.jpg<?php endif;?>" /><br />
<span>横幅195px以上の場合は自動縮小されます。</span></dd>
<dt>画像の説明　(alt属性)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[banner2Name]" id="banner2Name" value="<?php echo esc_attr( $options['banner2Name'] ); ?>" /></dd>
<dt>リンク先のURL　(リンク先は空でも問題ありません)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[banner2Link]" id="banner2Link" value="<?php echo esc_attr( $options['banner2Link'] ); ?>" /><br />
<span>例) http://c-tpl.com/</span></dd>
</dl>
</td>
<td>
<p class="img"><img src="<?php if(isset($options['banner3Img'])):?><?php echo esc_attr( $options['banner3Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_s3.jpg<?php endif;?>"></p>
<dl>
<dt>画像URL　[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">画像のアップロード</a> ] </dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[banner3Img]" id="banner3Img" value="<?php if(isset($options['banner3Img'])):?><?php echo esc_attr( $options['banner3Img'] ); ?><?php else:?><?php echo site_url(); ?>/wp-content/themes/<?php printf( __( '%s', '' ), wp_get_theme() ); ?>/images/banners/banner_s3.jpg<?php endif;?>" /><br />
<span>横幅195px以上の場合は自動縮小されます。</span></dd>
<dt>画像の説明　(alt属性)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[banner3Name]" id="banner3Name" value="<?php echo esc_attr( $options['banner3Name'] ); ?>" /></dd>
<dt>リンク先のURL　(リンク先は空でも問題ありません)</dt>
<dd><input type="text" name="cTpl_rwd004_light_theme_options[banner3Link]" id="banner3Link" value="<?php echo esc_attr( $options['banner3Link'] ); ?>" /><br />
<span>例) http://c-tpl.com/</span></dd>
</dl>
</td>
</tr>
</table>
<?php submit_button(); ?>
</div>
</form>
</div>
<?php
}

function cTpl_rwd004_light_theme_options_validate( $input ) {
	$output = $defaults = cTpl_rwd004_light_get_default_theme_options();
	
	$output['logo'] = $input['logo'];
	$output['logo2'] = $input['logo2'];
	
	$output['contactAddress'] = $input['contactAddress'];
	$output['contactTel'] = $input['contactTel'];
	$output['contactTime'] = $input['contactTime'];
	
	$output['productHeading'] = $input['productHeading'];
	
	for ( $i = 1; $i <= 3 ;){
		$output['product'.$i.'Img'] = $input['product'.$i.'Img'];
		$output['product'.$i.'Name'] = $input['product'.$i.'Name'];
		$output['product'.$i.'Link'] = $input['product'.$i.'Link'];
	$i++;
	}
	
  for ( $i = 1; $i <= 3 ;){
		$output['banner'.$i.'Img'] = $input['banner'.$i.'Img'];
		$output['banner'.$i.'Name'] = $input['banner'.$i.'Name'];
		$output['banner'.$i.'Link'] = $input['banner'.$i.'Link'];
	$i++;
	}
	return apply_filters( 'cTpl_rwd004_light_theme_options_validate', $output, $input, $defaults );
}

?>