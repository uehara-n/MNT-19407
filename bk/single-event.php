<?php get_header(); the_post(); ?>
 <!-- ======================コンテンツここから======================= -->
<main id="page_content">
	<ul id="pankuzu" class="clearfix">
		<?php the_pankuzu_keni( ' &gt; ' ); ?>
	</ul>
	<section class="event_single">
		<h2 class="page_tit">イベント情報</h2>
		<!--customer_navi-->
		<div class="customer_navi clearfix">
			<div class="page_back_btn">
				<p class="page_back_text"><a href="<?php echo get_post_type_archive_link( 'event' ); ?>">&lt; イベント情報一覧に戻る</a>
				</p>
			</div>
		</div>

		<section class="box">
			<h3 class="event_tit"><?php the_title();?></h3>

			<dl class="gaiyo">
				<dt>
					<img src="<?php echo get_template_directory_uri(); ?>/page_image/event/calendar.svg" width="" height="22" class="gaiyo_icon">開催日
				</dt>
				<dd>
					<?php echo post_custom( 'event_date' ); ?>
				</dd>


				<dt>
					<img src="<?php echo get_template_directory_uri(); ?>/page_image/event/clock.svg" width="" height="22" class="gaiyo_icon">開催時間
				</dt>
				<dd>
					<?php echo post_custom( 'event_time' ); ?>
				</dd>


				<dt>
					<img src="<?php echo get_template_directory_uri(); ?>/page_image/event/pin.svg" width="" height="22" class="gaiyo_icon">開催場所
				</dt>
				<dd>
					<?php echo post_custom( 'event_place' ); ?>

					<?php if ( post_custom('event_map') ) : ?>
					<p class="map">
						<a href="<?php echo post_custom( 'event_map' ); ?>" target="_blank" class="more_btn1">地図を見る</a>
					</p>
					<?php endif ?>
				</dd>


				<dt>
					<img src="<?php echo get_template_directory_uri(); ?>/page_image/event/map.svg" width="" height="22" class="gaiyo_icon">開催場所住所
				</dt>
				<dd>
					<p>〒<?php echo post_custom( 'event_zip' ); ?></p>
					<p><?php echo post_custom( 'event_add' ); ?></p>
				</dd>

				<?php if(post_custom('event_place_2')): ?>
					<dt>
						<img src="<?php echo get_template_directory_uri(); ?>/page_image/event/pin.svg" width="" height="22" class="gaiyo_icon">開催場所
					</dt>
					<dd>
					<?php echo post_custom( 'event_place_2' ); ?>

					<?php if ( post_custom('event_map_2') ) : ?>
					<p class="map">
						<a href="<?php echo post_custom( 'event_map_2' ); ?>" target="_blank" class="more_btn1">地図を見る</a>
					</p>
					<?php endif ?>
					</dd>
			<?php endif; ?>

			<?php if ( post_custom('event_zip_2') ) : ?>
			<dt>
				<img src="<?php echo get_template_directory_uri(); ?>/page_image/event/map.svg" width="" height="22" class="gaiyo_icon">開催場所住所
			</dt>
			<dd>
				<p>〒<?php echo post_custom( 'event_zip_2' ); ?></p>
				<p><?php echo post_custom( 'event_add_2' ); ?></p>
			</dd>
		<?php endif ?>
			</dl>

			<ul class="icon">
				<?php
				$my_cat_name = array( "入場無料", "無料相談", "土地相談", "ローン相談", "設計士相談", "お値打商品有" );
				if ( $my_check_cat = post_custom( 'event_category01' ) ) {

					//配列に変換(splitはPHP5.3.0から非推奨)
					$my_check_cat = explode( ",", $my_check_cat );
					foreach ( $my_cat_name as $key => $val ) {
						if ( in_array( $val, $my_check_cat ) ) {
							$key = sprintf( "%02d", ( $key + 1 ) );
							echo '<li><img src="' . get_stylesheet_directory_uri() . '/page_image/event/event_icon' . $key . '.gif" alt="' . $val . '" width="66" height="66" /></li>';
						}
					}
				}
				?>

			</ul>
			<ul class="icon">
				<?php
				$my_cat_name = array( "キッチン", "洗面台", "給湯器", "トイレ", "お風呂", "玄関ドア" );
				if ( $my_check_cat = post_custom( 'event_category02' ) ) {

					//配列に変換(splitはPHP5.3.0から非推奨)
					$my_check_cat = explode( ",", $my_check_cat );
					foreach ( $my_cat_name as $key => $val ) {
						if ( in_array( $val, $my_check_cat ) ) {
							$key = sprintf( "%02d", ( $key + 7 ) );
							echo '<li><img src="' . get_stylesheet_directory_uri() . '/page_image/event/event_icon' . $key . '.gif" alt="' . $val . '" width="66" height="66" /></li>';
						}
					}
				}
				?>
			</ul>
			<div class="pic_area">
				<p class="pic">
					<?php
					printf(
						'<a href="%1$s" rel="lightbox[okyakus]">%2$s</a>',
						gr_get_image_src( 'event_img00' ),
						gr_get_image(
							'event_img00',
							array(
								'size' => full,
							)
						)
					);
					?>
				</p>
				<p class="alt">
					<?php echo post_custom('event_img_alt00') ?>
				</p>
				<?php if ( post_custom('event_img01') ) : ?>
				<p class="pic">
					<?php
					$imagefield = get_imagefield( 'event_img01' );
					$attachment = get_attachment_object( $imagefield[ 'id' ] );
					echo '<a href="' . $attachment[ 'url' ] . '" rel="lightbox[okyakus]"><image src="' . $attachment[ 'url' ] . '" alt="' . $attachment[ 'title' ] . '" title="' . $attachment[ 'content' ] . '" /></a>';
					?>
				</p>
				<p class="alt">
					<?php echo post_custom('event_img_alt01') ?>
				</p>
				<?php endif ?>
				<?php if ( post_custom('event_img02') ) : ?>
				<p class="pic">
					<?php
					$imagefield = get_imagefield( 'event_img02' );
					$attachment = get_attachment_object( $imagefield[ 'id' ] );
					echo '<a href="' . $attachment[ 'url' ] . '" rel="lightbox[okyakus]"><image src="' . $attachment[ 'url' ] . '" alt="' . $attachment[ 'title' ] . '" title="' . $attachment[ 'content' ] . '" /></a>';
					?>
				</p>
				<p class="alt">
					<?php echo post_custom('event_img_alt02') ?>
				</p>
				<?php endif ?>

				<?php if ( post_custom('event_img03') ) : ?>
				<p class="pic">
					<?php
					$imagefield = get_imagefield( 'event_img03' );
					$attachment = get_attachment_object( $imagefield[ 'id' ] );
					echo '<a href="' . $attachment[ 'url' ] . '" rel="lightbox[okyakus]"><image src="' . $attachment[ 'url' ] . '" alt="' . $attachment[ 'title' ] . '" title="' . $attachment[ 'content' ] . '" /></a>';
					?>
				</p>
				<p class="alt">
					<?php echo post_custom('event_img_alt03') ?>
				</p>
				<?php endif ?>


			</div>
			<?php if ( post_custom('event_summary') ) : ?>
			<section class="summary">
				<h4 class="summary_tit">イベント概要</h4>
				<p class="text">
					<?php echo nl2br(post_custom( 'event_summary' )); ?>
				</p>
			</section>
			<?php endif ?>
			<section class="contact">
				<h4 class="contact_tit"><img src="<?php echo get_template_directory_uri(); ?>/page_image/event/form_tit.png" width="406" height="40" alt="イベント申込はこちら"></h4>


<?php echo do_shortcode( '[contact-form-7 id="18930" title="イベント予約フォーム" html_id="formID"]' ); ?>

			</section>



		</section>
		<!--customer_navi-->
		<div class="customer_navi clearfix">
			<div class="page_back_btn">
				<p class="page_back_text"><a href="<?php echo get_post_type_archive_link( 'event' ); ?>">&lt; イベント情報一覧に戻る</a>
				</p>
			</div>
		</div>
		<!--customer_navi-->


	</section>
	<!-- ======================右コンテンツここまで======================= -->
</main>
<!-- ======================コンテンツここまで======================= -->

<?php gr_kaiyu_banner(); ?>
<?php get_footer(); ?>
