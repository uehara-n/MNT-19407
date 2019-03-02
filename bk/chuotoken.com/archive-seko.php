<?php get_header();
				$i = 0;
				$x = 0;
				$terms = get_terms( 'seko_cat', array( 'orderby' => 'term_order', 'order' => 'ASC' ) );
				$slug_list = array('test');
				foreach ( $terms as $term ) :
				if($term->slug!='pagetop'){
					array_push($slug_list, $term->slug);
				}
				endforeach;

$args = array(
	'post_type' => 'seko', /* 投稿タイプを指定 */
	'tax_query' => array(
	'relation' => 'AND',
		array(
			'taxonomy' => 'seko_cat',
			'terms' => array( 'sintiku' ),
			'field' => 'slug',
			'operator' => 'NOT IN',
		)
	),
	'paged' => $paged,		/* ページ番号を指定 */
	'posts_per_page' => 21,		/* 最大表示数 */
);
query_posts( $args );
?>




<div id="main">
	<div id="m_inner">
		<div id="contents">

				<ul id="pankuzu" class="clearfix">
					<?php the_pankuzu_keni( ' &gt; ' ); ?>
				</ul>
				<div id="seko_archive">
				<h3 class="main_tit">施工事例</h3>
				<p id="case_text01">弊社のリフォームの施工事例をご紹介します。<br />
					施工事例を元に、「こんな風にリフォームしたい」という具体的なご要望を持つことが、リフォームを成功させる秘訣です。<br />
					価格や工期、完成後の様子などを、参考としてご活用ください。</p>

				<!--customer_navi-->
				<div class="customer_navi clearfix">
						<div class="customer_navi_left">
								<p class="customer_red"><?php echo gr_get_posts_count(); ?>件</p>
						</div>

						<div class="customer_navi_right">
							<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
						</div>
				</div>
				<!--customer_navi-->
<p style="text-align:right; margin:-10px 0 20px;">※掲載許可をいただいたお客様のみ掲載しております。</p>


	<?php while (have_posts()) : the_post();
	/* ループ開始 */ ?>


<div class="box<?php if($seko_i%3==0){ echo " c_left";} ?>">
<div class="img_box">
<a href="<?php the_permalink(); ?>">
<!-- 画像 -->
		<?php
								printf(
									'%s',
									gr_get_image(
										'seko_after_image',
										array( 'height' => 200, 'alt' => esc_attr( post_custom( 'seko_comment' ) ) , 'class' =>'img_over boximg' )
									)
								);
								?>

<?php if(get_post_meta($post->ID,'seko_csv2',true)): ?>
<img src="<?php echo site_url(); ?>/wp-content/themes/gaiheki/page_image<?php echo post_custom('seko_csv2') ?>" width="240" />

<?php endif ?>
<!-- /画像 -->

		<?
	//施工中スタンプ
	if(post_custom('seko_sekomachi')=="施工待ち"){
		echo '<span class="icon1"><img src="/wp/wp-content/themes/gaiheki/page_image/top/seko/icon_machi.png" width="56" height="56" alt="施工待ち" /></span>';
	}
	if(post_custom('seko_sekomachi')=="施工中"){
		echo '<span class="icon1"><img src="/wp/wp-content/themes/gaiheki/page_image/top/seko/icon_chu.png" width="56" height="56" alt="施工中" /></span>';
	}
	$stamp	= post_custom('seko_newicon');
	if($stamp){
	echo '<span class="icon2">';
	if(strstr($stamp,"NEWアイコン")){
		echo '<img src="/wp/wp-content/themes/gaiheki/page_image/top/seko/icon_new.gif" width="35" height="17" alt="NEW" />';
	}
	if(strstr($stamp,"HPからのお問い合わせ")){
		echo '<img src="/wp/wp-content/themes/gaiheki/page_image/top/seko/icon_hp.gif" width="126" height="17" alt="HPからのお問い合わせ" />';
	}
	if(strstr($stamp,"お客さまからのご紹介")){
		echo '<img src="/wp/wp-content/themes/gaiheki/page_image/top/seko/icon_cust.png" width="109" height="17" alt="お客さまからのご紹介" />';
	}
	echo '</span>';
	}
		?>

</a>
</div>

<?php echo post_custom('seko_city');?>　<?php echo post_custom('seko_name');?>様邸<br />
<?php if(post_custom('seko_content')): ?>
<?php echo post_custom('seko_content');?><br />
<?php endif; ?>
<?php if(post_custom('seko_price')): ?>
<?php echo post_custom('seko_price');?><br />
<?php endif; ?>
<?php if(post_custom('seko_duration')): ?>
（工期：<?php echo post_custom('seko_duration');?>）
<?php endif; ?>
</div>



<?php
$seko_i++; //最後にループ回数を一つ進める
?>
<?php endwhile; ?>

				<br clear="all" />


				<!--customer_navi-->
				<div class="customer_navi clearfix">
						<div class="customer_navi_left">
								<p class="customer_red"><?php echo gr_get_posts_count(); ?>件</p>
						</div>

						<div class="customer_navi_right">
							<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
						</div>
				</div>
				<!--customer_navi-->
</div>

<?php gr_kaiyu2(); ?>
<?php gr_contact_banner_kaiyu(); ?>




		</div>
		<!-- / #contents -->
<?php get_sidebar(); ?>


	</div>
</div>
<!-- / #main -->
<?php gr_contact_banner(); ?>
<?php get_footer(); ?>