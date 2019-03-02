<?php get_header(); ?>
<div class="main_v wideslider">
	<ul>
		<li class="slide"><img src="<?php echo get_template_directory_uri(); ?>/page_image/mainv/mainslide1.jpg" width="980" height="450" alt="ハッピーホームと作る理想のライフスタイル">
		</li>
		<li class="slide"><a href="http://www.happyhome-gaisou.jp/"><img src="<?php echo get_template_directory_uri(); ?>/page_image/mainv/mainslide2.jpg" width="980" height="450" alt="ハッピーホームのイベント情報"></a>
		</li>
		<li class="slide"><a href="/raiten"><img src="<?php echo get_template_directory_uri(); ?>/page_image/mainv/mainslide3.jpg" width="980" height="450" alt="リフォーム＆増改築相談会"></a>
		</li>
		<li class="slide"><a href="https://www.happy-reform.com/school"><img src="https://www.happy-reform.com/wp/wp-content/uploads/2018/07/mainslide04.jpg" width="980" height="450" alt="リフォーム相談会"></a>
		</li>
		<li class="slide"><a href="/renov_compare"><img src="<?php echo get_template_directory_uri(); ?>/page_image/mainv/mainslide5.jpg" width="980" height="450" alt="建替え VS リノベ"></a>
		</li>
		<li class="slide"><a href="/renovation/28486.html"><img src="<?php echo get_template_directory_uri(); ?>/page_image/mainv/slide_award_01.jpg" width="980" height="450" alt="CROSS　RODE　BLUES"></a>
		</li>
		<li class="slide"><a href="/seko/28592.html"><img src="<?php echo get_template_directory_uri(); ?>/page_image/mainv/slide_award_02.jpg" width="980" height="450" alt="尾道市で店舗　デザイン改修工事"></a>
		</li>
		<li class="slide"><a href="https://www.happyhome-base.jp/zr"><img src="<?php echo get_template_directory_uri(); ?>/page_image/mainv/slide_v3.jpg" width="980" height="450" alt="ZR実家リノベ"></a>
		</li>
	</ul>
</div>

<!--<div id="oshirase">
<strong>◆◇◆◇　夏季休暇のご案内　◆◇◆◇</strong>
誠に勝手ながら、2018年8月11日（土）～ 2018年8月15日（水）は休業させていただきます。<br />
通常営業は、8月16日（木）からとなります。<br />
休暇中にいただいたお問い合わせについては、通常営業日より順次対応させていただきますので、ご了承ください。<br />
今後も変わらぬご愛顧をどうぞよろしくお願いいたします。
</div>-->

<div id="omimai">
<strong>謹んで大雨による被害についてお見舞いを申し上げます</strong>
このたびの豪雨被害により、お亡くなりになられました方々のご冥福を心よりお祈りいたしますとともに、<br />
被害を受けられました地域の皆さまにお見舞いを申し上げます。<br /><br />
一日も早い復旧を心よりお祈りいたします。
</div>

<div class="kengaku_index_bnr">
<a href="/kengaku"><img src="<?php echo get_template_directory_uri(); ?>/page_image/kengaku/kengaku_bnr.jpg" width="980" height="180" alt="現場見学会" class="img_over" /></a>
</div>

<?php sp_contact_banner(); ?>
<?
$args = array(
	'post_type' => 'event', /* 投稿タイプを指定 */
	'paged' => $paged, /* ページ番号を指定 */
	'posts_per_page' => 1, /* 最大表示数 */
);
query_posts( $args );
?>
<div class="section2">
<section class="t_event">
	<h2 class="t_tit center"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/event/eventTitleImage.png" alt="イベント情報" width="455" height="50"></h2>
	<div class="inner_wrap">
		<?php if (have_posts()) : ?>
		<?php while( have_posts() ) : the_post(); ?>
		<article class="">
			<div>
				<div class="detail">
					<p class="place">
						<span>[開催場所]</span>
						<?php echo post_custom( 'event_place' ); ?>
					</p>
					<h3 class="event_tit">
						<?php echo mb_substr( $post->post_title, 0, 20) . '...'; ?>
					</h3>
					<p class="date">
						<span>[開催期間]</span>
						<span><?php echo post_custom( 'event_date' ); ?></span>
					</p>
					<p class="txt">
						<?php echo post_custom( 'event_details' ); ?>
					</p>
					<!--<a href="<?php the_permalink() ?>" class="more"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/event/detail_more.png" alt="詳細" width="65" height="27" class="img_over"></a>-->
				</div>
			</div>
			<div class="">
				<p class="pic">
					<?php
					$evImage = gr_get_image_src('event_img00');
					//var_dump($evImage)
					;?>
					<a href="<?php the_permalink(); ?>" style="background: url(<?php echo $evImage ;?>) no-repeat; background-position: center; background-size: cover;">
						<?php
						/*
						echo gr_get_image(
							'event_img00',
							array( 'width' => '195', 'class' => 'img_over', 'alt' => esc_attr( post_custom( 'event_img_alt01' ) ) )
						)*/
						?>
					</a>
				</p>
			</div>
		</article>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</div>
	<p class="event_more"><a href="/event" class="more_btn1">一覧を見る</a></p>
</section>

<aside class="blog box">
	<h2 class="t_tit center"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/social/staffBlogTitle.png" alt="スタッフブログ" width="44"></h2>

	<?php
	$args = array(
			'post_type' => 'blog', /* 投稿タイプ */
			'paged' => $paged,
			'posts_per_page' => 2 /* 件数表示 */
	);
	query_posts( $args );
	if (have_posts()) :?>



	<ul class="list">
		<? while (have_posts()) : the_post(); ?>
			<li><a href="<?php the_permalink(); ?>">
					<p class="pic"><span><img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" /></span></p>
					<p class="date"><?php the_time('Y.n.j'); ?></p>
					<p class="tit"><?php echo mb_substr( $post->post_title, 0, 17) . '...'; ?></p>
				</a>
			</li>
		<?php endwhile;
		endif;
		wp_reset_query(); ?>

	</ul>
	<p class="event_more"><a href="/blog" class="more_btn1">一覧を見る</a></p>
</aside>
</div>


<!-- ========================================================ハッピーホームの大型施工事例	-->
<?php
$args = array(
	'post_type' => 'renovation', /* 投稿タイプ */
	'paged' => $paged,
	'posts_per_page' => 3 /* 件数表示 */
);
query_posts( $args );
?>
<section class="t_special">
	<h2 class="t_tit center"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/special/conExTitle.png" alt="ハッピーホームの大型施工事例" width="455" height="50"></h2>
	<div>
		<?php if (have_posts()) : ?>
		<div>
			<ul class="detail inner_wrap">
				<?php while (have_posts()) : the_post();
			/* ループ開始 */ ?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php if(post_custom('ichiran_image')){echo gr_get_image( 'ichiran_image', array( 'width' => 213 ,'class' => 'img_over' ) );}
else if(post_custom('renovation_after_image')){echo gr_get_image( 'renovation_after_image', array( 'width' => 213 ,'class' => 'img_over' ) );}
?>
					</a>
					<p class="tit">
						<a href="<?php the_permalink(); ?>">
							<?php echo mb_substr( $post->post_title, 0, 25) . '...'; ?>
						</a>
					</p>
					<p class="conPlace">
						<?php echo post_custom( 'renovation_city' ); ?>
					</p>
				</li>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</ul>
		</div>
		<p class="more"><a href="<?php bloginfo('url'); ?>/renovation" class="more_btn1">施工事例をもっと見る</a></p>
	</div>

		<?php else : ?>
		<p class="more"><a href="<?php bloginfo('url'); ?>/big_reform" class="more_btn1">2017年6月までの大型事例　＞</a>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		</p>
</section>

	<!-- ========================================================最新施工事例	-->
	<?php
	$args = array(
			'post_type' => 'seko', /* 投稿タイプ */
			'paged' => $paged,
			'posts_per_page' => 4 /* 件数表示 */
	);
	?>
	<section class="t_seko">
		<div>
		<h2 class="t_tit center"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/newConExTitle.png" alt="ハッピーホームの最新施工事例" width="454" height="50"></h2>
		<?php query_posts( $args ); ?>
		<?php if (have_posts()) : ?>
			<div class="listBx">
				<ul class="detail">
					<?php while (have_posts()) : the_post();
						/* ループ開始 */ ?>
						<li>
							<p class="pic">
								<a href="<?php the_permalink() ?>">
									<?php


									if ( post_custom( 'seko_ichiran_image' ) ) {
										printf(
												'%s',
												gr_get_image(
														'seko_ichiran_image',
														array( 'width' => 210, 'alt' => esc_attr( get_the_title() ), 'class' => 'img_over', 'title' => esc_attr( get_the_title() ) )
												)
										);
									} else if ( post_custom( 'seko_after_image' ) ) {
										printf(
												'%s',
												gr_get_image(
														'seko_after_image',
														array( 'width' => 210, 'alt' => esc_attr( get_the_title() ), 'class' => 'img_over', 'title' => esc_attr( get_the_title() ) )
												)
										);
									} else if ( post_custom( 'seko_img2' ) ) {
										printf(
												'%s',
												gr_get_image(
														'seko_img2',
														array( 'width' => 210, 'alt' => esc_attr( get_the_title() ), 'class' => 'img_over', 'title' => esc_attr( get_the_title() ) )
												)
										);
									} else if ( $img = post_custom( 'seko_csv2' ) ) {
										echo '<img src="/wp/wp-content/themes/reform/images/sekou/' . $img . '" width="210" alt="" class="img_over" />';
									}
									?>
								</a>
							</p>
							<h3 class="tit">
								<? the_title(); ?>
							</h3>
							<p class="meta"> 費用:
								<?php echo post_custom( 'seko_price' ); ?><br> 工期：
								<?php echo post_custom( 'seko_duration' ); ?> </p>
						</li>
					<?php endwhile; ?>


				</ul>
			</div>
		<?php else : ?>
			<p class="no_data">現在登録されておりません。</p>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

		<p class="more"><a href="<?php bloginfo('url'); ?>/seko" class="more_btn1">施工事例をもっと見る</a></p>
		</div>
		<?php gr_seko_kaiyu(); ?>
	</section>

	<section class="t_special">
		<div class="bnrWrap">
		<ul class="bnr slick-box">
			<li><a href="<?php bloginfo('url'); ?>/renov"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/special/fourMerit.png" alt="中古住宅×リノベーション" class="sp-img img_over"></a>
			</li>

           	<li><a href="<?php bloginfo('url'); ?>/homeinspection"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/special/housingDiagnosis.png" alt="ホームインスペクションで不安解決！" class="sp-img img_over"></a>
			</li>
			<!--
           	<li><a href="<?php bloginfo('url'); ?>/renov_compare"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/special/bnr_renov_compare.png" alt="建替え VS リノベ" width="460" height="135" class="sp-img img_over"></a>
			</li>
			-->
			<li><a href="<?php bloginfo('url'); ?>/other/renovation_recommend"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/special/eandR.png" alt="増改築のすすめ" class="sp-img img_over"></a>
			</li>
			<li><a href="<?php bloginfo('url'); ?>/other/anshin"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/special/fourRelief.png" alt="ハッピーホーム4つの安心" class="sp-img img_over"></a>
			</li>
			<li><a href="<?php bloginfo('url'); ?>/renov_compare"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/renovationBanner.png" alt="建替え VS リノベ" class="sp-img img_over"></a>
			</li>
			<li><a href="<?php bloginfo('url'); ?>/other/step"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/renoFlowBanner.png" alt="リフォームの流れ" class="sp-img img_over"></a>
			</li>
			<li><a href="<?php bloginfo('url'); ?>/menu/kaigo"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/careRenovBanner.png" alt="介護リフォーム" class="sp-img img_over"></a>
			</li>
			<li><a href="<?php bloginfo('url'); ?>/menu/toilet"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/toiletBanner.png" alt="トイレコーナー" class="sp-img img_over"></a>
			</li>
			<li><a href="<?php bloginfo('url'); ?>/menu/kitchen"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/kitchinBanner.png" alt="キッチンコーナー" class="sp-img img_over"></a>
			</li>
			<li><a href="https://www.happyhome-base.jp/zr"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/zrBanner.jpg" alt="ZR実家リノベ" class="sp-img img_over"></a>
			</li>
		</ul>
		</div>
</section>
<!--
<section class="t_reform">
	<h2 class="t_tit center"> <img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/tit.png" alt="リフォームメニュー" width="454" height="50"> </h2>
	<ul class="bnr inner_wrap">
		<li> <a href="<?php bloginfo('url'); ?>/menu/toilet"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/bnr1.png" alt="トイレコーナー" width="289" height="127" class="img_over"></a> </li>
		<li> <a href="<?php bloginfo('url'); ?>/menu/kitchen"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/bnr2.png" alt="キッチンコーナー" width="289" height="127" class="img_over"></a> </li>
		<<li> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/bnr3.png" alt="お風呂コーナー" width="289" height="127" class="img_over"></a> </li>
		<li> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/bnr4.png" alt="洗面所コーナー" width="289" height="127" class="img_over"></a> </li>
		<li> <a href="<?php bloginfo('url'); ?>/menu/kaigo"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/bnr5.png" alt="介護リフォーム" width="289" height="127" class="img_over"></a> </li>
		<li> <a href="<?php bloginfo('url'); ?>/other/step"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/reform/bnr6.png" alt="リフォームの流れ" width="289" height="127" class="img_over"></a> </li>
	</ul>
</section>
-->
<!-- =======================================================現場日記	-->
<section class="t_genba">
	<h2 class="t_tit center"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/genba/todayPlcTitle.png" alt="ハッピーホームの今日の現場" width="454" height="50"></h2>
	<div>
		<div class="inner inner_wrap">

			<!-- 福山北部 -->
			<article class="box">
				<h3 class="box_tit">福山北部エリア</h3>
				<?php
				$args = array(
					'post_type' => 'genba_hukuyamahokubu', /* 投稿タイプ */
					'paged' => $paged,
					'posts_per_page' => 1 /* 件数表示 */
				);
				query_posts( $args );
					if (have_posts()) :
					while (have_posts()) : the_post(); ?>

				<p class="pic">
					<? if ( $img = post_custom( 'genba_importimg' ) ) {
							echo '<a href="/wp/wp-content/themes/reform/images/genba/' . $img . '" data-featherlight="#genba_modal_box1"><img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="210" alt="" class="img_over" /></a>';
							} else{
					$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
					if ( !empty( $files ) ) {
						$keys = array_keys( $files );
						$num = $keys[ 0 ];
						$thumb = wp_get_attachment_image_src( $num, 'large' );
						$thumbm = wp_get_attachment_image_src( $num, 'large' );

						print '<a href="' . $thumb[ 0 ] . '" title="' .
						the_title_attribute( 'echo=0' ) . '" data-featherlight="#genba_modal_box1"><img src="' . clean_url( $thumbm[ 0 ] ) .
						'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
					}}
					?>
				</p>
				<p class="text">
					<?php echo the_time('Y年n月j日'); ?><br>
					<span><?php the_title();?></span>
				</p>
				<!--<a href="<?php bloginfo('url'); ?>/genba_hukuyamahokubu" class="more">more＞</a>-->

				<?php endwhile;
					else :
					endif;
					wp_reset_query(); ?>
                <a href="https://www.happy-reform.com/genba_hukuyamahokubu">
                    <div class="detail_more">
                        <img src="https://www.happy-reform.com/wp/wp-content/themes/reform/page_image/top/genba/detail_more.png" alt="一覧はこちら" width="173" height="34" class="img_over">
                    </div>
                </a>
			</article>
			<!-- /福山北部 -->

			<!-- 福山中心部エリア -->
				<?php
				$args = array(
					'post_type' => 'genba_hukuyamachu', /* 投稿タイプ */
					'paged' => $paged,
					'posts_per_page' => 1 /* 件数表示 */
				);
				query_posts( $args );
					if (have_posts()) :?>
			<article class="box">
				<h3 class="box_tit">福山中心部エリア</h3>
					<? while (have_posts()) : the_post(); ?>

				<p class="pic">
					<? if ( $img = post_custom( 'genba_importimg' ) ) {
							echo '<a href="/wp/wp-content/themes/reform/images/genba/' . $img . '" data-featherlight="#genba_modal_box2"><img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="210" alt="" class="img_over" /></a>';
							} else{
					$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
					if ( !empty( $files ) ) {
						$keys = array_keys( $files );
						$num = $keys[ 0 ];
						$thumb = wp_get_attachment_image_src( $num, 'large' );
						$thumbm = wp_get_attachment_image_src( $num, 'large' );

						print '<a href="' . $thumb[ 0 ] . '" title="' .
						the_title_attribute( 'echo=0' ) . '" data-featherlight="#genba_modal_box2"><img src="' . clean_url( $thumbm[ 0 ] ) .
						'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
					}}
					?>
				</p>
				<p class="text">
					<?php echo the_time('Y年n月j日'); ?><br>
					<span><?php the_title();?></span>
				</p>
				<!--<a href="<?php bloginfo('url'); ?>/genba_hukuyamachu" class="more">more＞</a>-->

				<?php endwhile;
					else :
					endif;
					wp_reset_query(); ?>

                <a href="https://www.happy-reform.com/genba_hukuyamachu">
                    <div class="detail_more">
                        <img src="https://www.happy-reform.com/wp/wp-content/themes/reform/page_image/top/genba/detail_more.png" alt="一覧はこちら" width="173" height="34" class="img_over">
                    </div>
                </a>
			</article>
			<!-- /福山中心部エリア -->

			<!-- 福山東部  -->
			<article class="box">
				<h3 class="box_tit">福山東部エリア</h3>
				<?php
				$args = array(
					'post_type' => 'genba_hukuyamatoubu', /* 投稿タイプ */
					'paged' => $paged,
					'posts_per_page' => 1 /* 件数表示 */
				);
				query_posts( $args );
					if (have_posts()) :
					while (have_posts()) : the_post(); ?>

				<p class="pic">
					<? if ( $img = post_custom( 'genba_importimg' ) ) {
							echo '<a href="/wp/wp-content/themes/reform/images/genba/' . $img . '" data-featherlight="#genba_modal_box3"><img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="210" alt="" class="img_over" /></a>';
							} else{
					$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
					if ( !empty( $files ) ) {
						$keys = array_keys( $files );
						$num = $keys[ 0 ];
						$thumb = wp_get_attachment_image_src( $num, 'large' );
						$thumbm = wp_get_attachment_image_src( $num, 'large' );

						print '<a href="' . $thumb[ 0 ] . '" title="' .
						the_title_attribute( 'echo=0' ) . '" data-featherlight="#genba_modal_box3"><img src="' . clean_url( $thumbm[ 0 ] ) .
						'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
					}}
					?>
				</p>
				<p class="text">
					<?php echo the_time('Y年n月j日'); ?><br>
					<span><?php the_title();?></span>
				</p>
				<!--<a href="<?php bloginfo('url'); ?>/genba_hukuyamatoubu" class="more">more＞</a>-->

				<?php endwhile;
					else :
					endif;
					wp_reset_query(); ?>

                <a href="https://www.happy-reform.com/genba_hukuyamatoubu">
                    <div class="detail_more">
                        <img src="https://www.happy-reform.com/wp/wp-content/themes/reform/page_image/top/genba/detail_more.png" alt="一覧はこちら" width="173" height="34" class="img_over">
                    </div>
                </a>
			</article>
			<!-- /福山東部  -->

			<!-- 福山西部エリア -->
				<?php
				$args = array(
					'post_type' => 'genba_hukuyamaseibu', /* 投稿タイプ */
					'paged' => $paged,
					'posts_per_page' => 1 /* 件数表示 */
				);
				query_posts( $args );
					if (have_posts()) :?>
			<article class="box">
				<h3 class="box_tit">福山西部エリア</h3>
					<? while (have_posts()) : the_post(); ?>

				<p class="pic">
					<? if ( $img = post_custom( 'genba_importimg' ) ) {
							echo '<a href="/wp/wp-content/themes/reform/images/genba/' . $img . '" data-featherlight="#genba_modal_box4"><img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="210" alt="" class="img_over" /></a>';
							} else{
					$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
					if ( !empty( $files ) ) {
						$keys = array_keys( $files );
						$num = $keys[ 0 ];
						$thumb = wp_get_attachment_image_src( $num, 'large' );
						$thumbm = wp_get_attachment_image_src( $num, 'large' );

						print '<a href="' . $thumb[ 0 ] . '" title="' .
						the_title_attribute( 'echo=0' ) . '" data-featherlight="#genba_modal_box4"><img src="' . clean_url( $thumbm[ 0 ] ) .
						'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
					}}
					?>
				</p>
				<p class="text">
					<?php echo the_time('Y年n月j日'); ?><br>
					<span><?php the_title();?></span>
				</p>
				<!--<a href="<?php bloginfo('url'); ?>/genba_hukuyamaseibu" class="more">more＞</a>-->

				<?php endwhile;
					else :
					endif;
					wp_reset_query(); ?>

                <a href="https://www.happy-reform.com/genba_hukuyamaseibu">
                    <div class="detail_more">
                        <img src="https://www.happy-reform.com/wp/wp-content/themes/reform/page_image/top/genba/detail_more.png" alt="一覧はこちら" width="173" height="34" class="img_over">
                    </div>
                </a>
    		</article>
			<!-- /福山西部エリア -->

			<!-- 福山南部エリア  -->
			<article class="box">
				<h3 class="box_tit">福山南部エリア</h3>
				<?php
				$args = array(
					'post_type' => 'genba_hukuyamananbu', /* 投稿タイプ */
					'paged' => $paged,
					'posts_per_page' => 1 /* 件数表示 */
				);
				query_posts( $args );
					if (have_posts()) :
					while (have_posts()) : the_post(); ?>

				<p class="pic">
					<? if ( $img = post_custom( 'genba_importimg' ) ) {
							echo '<a href="/wp/wp-content/themes/reform/images/genba/' . $img . '" data-featherlight="#genba_modal_box5"><img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="210" alt="" class="img_over" /></a>';
							} else{
					$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
					if ( !empty( $files ) ) {
						$keys = array_keys( $files );
						$num = $keys[ 0 ];
						$thumb = wp_get_attachment_image_src( $num, 'large' );
						$thumbm = wp_get_attachment_image_src( $num, 'large' );

						print '<a href="' . $thumb[ 0 ] . '" title="' .
						the_title_attribute( 'echo=0' ) . '" data-featherlight="#genba_modal_box5"><img src="' . clean_url( $thumbm[ 0 ] ) .
						'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
					}}
					?>
				</p>
				<p class="text">
					<?php echo the_time('Y年n月j日'); ?><br>
					<span><?php the_title();?></span>
				</p>
				<!--<a href="<?php bloginfo('url'); ?>/genba_hukuyamananbu" class="more">more＞</a>-->

				<?php endwhile;
					else :
					endif;
					wp_reset_query(); ?>

                <a href="https://www.happy-reform.com/genba_hukuyamananbu">
                    <div class="detail_more">
                        <img src="https://www.happy-reform.com/wp/wp-content/themes/reform/page_image/top/genba/detail_more.png" alt="一覧はこちら" width="173" height="34" class="img_over">
                    </div>
                </a>
			</article>
			<!-- /福山南部  -->

			<!-- 府中エリア -->
			<article class="box">
				<h3 class="box_tit">府中エリア</h3>
				<?php
				$args = array(
					'post_type' => 'genba_huchu', /* 投稿タイプ */
					'paged' => $paged,
					'posts_per_page' => 1 /* 件数表示 */
				);
				query_posts( $args );
					if (have_posts()) :
					while (have_posts()) : the_post(); ?>

				<p class="pic">
					<? if ( $img = post_custom( 'genba_importimg' ) ) {
							echo '<a href="/wp/wp-content/themes/reform/images/genba/' . $img . '" data-featherlight="#genba_modal_box6"><img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="210" alt="" class="img_over" /></a>';
							} else{
					$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
					if ( !empty( $files ) ) {
						$keys = array_keys( $files );
						$num = $keys[ 0 ];
						$thumb = wp_get_attachment_image_src( $num, 'large' );
						$thumbm = wp_get_attachment_image_src( $num, 'large' );

						print '<a href="' . $thumb[ 0 ] . '" title="' .
						the_title_attribute( 'echo=0' ) . '" data-featherlight="#genba_modal_box6"><img src="' . clean_url( $thumbm[ 0 ] ) .
						'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
					}}
					?>
				</p>
				<p class="text">
					<?php echo the_time('Y年n月j日'); ?><br>
					<span><?php the_title();?></span>
				</p>
				<!--<a href="<?php bloginfo('url'); ?>/genba_huchu" class="more">more＞</a>-->

				<?php endwhile;
					else :
					endif;
					wp_reset_query(); ?>

                <a href="https://www.happy-reform.com/genba_huchu">
                    <div class="detail_more">
                        <img src="https://www.happy-reform.com/wp/wp-content/themes/reform/page_image/top/genba/detail_more.png" alt="一覧はこちら" width="173" height="34" class="img_over">
                    </div>
                </a>
			</article>
			<!-- /府中エリア -->

			<!-- 尾道エリア -->
			<article class="box">
				<h3 class="box_tit">尾道エリア</h3>
				<?php
				$args = array(
					'post_type' => 'genba_onomichi', /* 投稿タイプ */
					'paged' => $paged,
					'posts_per_page' => 1 /* 件数表示 */
				);
				query_posts( $args );
					if (have_posts()) :
					while (have_posts()) : the_post(); ?>

				<p class="pic">
					<? if ( $img = post_custom( 'genba_importimg' ) ) {
							echo '<a href="/wp/wp-content/themes/reform/images/genba/' . $img . '" data-featherlight="#genba_modal_box7"><img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="210" alt="" class="img_over" /></a>';
							} else{
					$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
					if ( !empty( $files ) ) {
						$keys = array_keys( $files );
						$num = $keys[ 0 ];
						$thumb = wp_get_attachment_image_src( $num, 'large' );
						$thumbm = wp_get_attachment_image_src( $num, 'large' );

						print '<a href="' . $thumb[ 0 ] . '" title="' .
						the_title_attribute( 'echo=0' ) . '" data-featherlight="#genba_modal_box7"><img src="' . clean_url( $thumbm[ 0 ] ) .
						'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
					}}
					?>
				</p>
				<p class="text">
					<?php echo the_time('Y年n月j日'); ?><br>
					<span><?php the_title();?></span>
				</p>
				<!--<a href="<?php bloginfo('url'); ?>/genba_onomichi" class="more">more＞</a>-->

				<?php endwhile;
					else :
					endif;
					wp_reset_query(); ?>

                <a href="https://www.happy-reform.com/genba_onomichi">
                    <div class="detail_more">
                        <img src="https://www.happy-reform.com/wp/wp-content/themes/reform/page_image/top/genba/detail_more.png" alt="一覧はこちら" width="173" height="34" class="img_over">
                    </div>
                </a>
			</article>
			<!-- /尾道エリア -->

			<!-- その他 -->
			<article class="box">
				<h3 class="box_tit">その他のエリア</h3>
				<?php
				$args = array(
					'post_type' => 'genba_other', /* 投稿タイプ */
					'paged' => $paged,
					'posts_per_page' => 1 /* 件数表示 */
				);
				query_posts( $args );
					if (have_posts()) :
					while (have_posts()) : the_post(); ?>

				<p class="pic">
					<? if ( $img = post_custom( 'genba_importimg' ) ) {
							echo '<a href="/wp/wp-content/themes/reform/images/genba/' . $img . '" data-featherlight="#genba_modal_box8"><img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="210" alt="" class="img_over" /></a>';
							} else{
					$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
					if ( !empty( $files ) ) {
						$keys = array_keys( $files );
						$num = $keys[ 0 ];
						$thumb = wp_get_attachment_image_src( $num, 'large' );
						$thumbm = wp_get_attachment_image_src( $num, 'large' );

						print '<a href="' . $thumb[ 0 ] . '" title="' .
						the_title_attribute( 'echo=0' ) . '" data-featherlight="#genba_modal_box8"><img src="' . clean_url( $thumbm[ 0 ] ) .
						'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
					}}
					?>
				</p>
				<p class="text">
					<?php echo the_time('Y年n月j日'); ?><br>
					<span><?php the_title();?></span>
				</p>
				<!--<a href="<?php bloginfo('url'); ?>/genba_other" class="more">more＞</a>-->
				<?php endwhile;
					else :
					endif;
					wp_reset_query(); ?>

                <a href="https://www.happy-reform.com/genba_other">
                    <div class="detail_more">
                        <img src="https://www.happy-reform.com/wp/wp-content/themes/reform/page_image/top/genba/detail_more.png" alt="一覧はこちら" width="173" height="34" class="img_over">
                    </div>
                </a>
			</article>
			<!-- /その他 -->

			<!-- 0
			<article class="box">
				<h3 class="box_tit">0</h3>
				<?php
				$args = array(
					'post_type' => 'genba', /* 投稿タイプ */
					'paged' => $paged,
					'posts_per_page' => 1 /* 件数表示 */
				);
				query_posts( $args );
					if (have_posts()) :
					while (have_posts()) : the_post(); ?>

				<p class="pic">
					<? if ( $img = post_custom( 'genba_importimg' ) ) {
							echo '<img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="210" alt="" class="img_over" />';
							} else{
					$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
					if ( !empty( $files ) ) {
						$keys = array_keys( $files );
						$num = $keys[ 0 ];
						$thumb = wp_get_attachment_image_src( $num, 'large' );
						$thumbm = wp_get_attachment_image_src( $num, 'large' );

						print '<a href="' . $thumb[ 0 ] . '" title="' .
						the_title_attribute( 'echo=0' ) . '" rel="lightbox[genba]"><img src="' . clean_url( $thumbm[ 0 ] ) .
						'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
					}}
					?>
				</p>
				<p class="text">
					<?php echo the_time('Y年n月j日'); ?><br>
					<span><?php the_title();?></span>
				</p>
				<a href="<?php bloginfo('url'); ?>/genba" class="more">more＞</a>

				<?php endwhile;
					else :
					endif;
					wp_reset_query(); ?>

			</article>
			 /0 -->


		</div>
	</div>
</section>


<div class="section2">
	<aside class="colom box">
		<h2 class="t_tit center"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/columTitleImage.png" alt="コラム" width="auto"></h2>

		<?php
		$args = array(
				'post_type' => 'colum', /* 投稿タイプ */
				'paged' => $paged,
				'posts_per_page' => 3 /* 件数表示 */
		);
		query_posts( $args );
		if (have_posts()) :?>

		<ul class="list">
			<? while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink(); ?>">
						<p class="pic"><span><img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" /></span></p>
						<p class="date"><?php the_time('Y.n.j'); ?></p>

						<p class="wrap_icon">
							<?php
								$stamp	= post_custom('colum_icon');
								if($stamp){
								echo '<span class="inner-icon">';
								if(strstr($stamp,"キッチン")){
									echo '<span class="icon01 icon-v01">キッチン</span>';
								}
								if(strstr($stamp,"お風呂")){
									echo '<span class="icon01 icon-v02">お風呂</span>';
								}
								if(strstr($stamp,"トイレ")){
									echo '<span class="icon01 icon-v03">トイレ</span>';
								}
								if(strstr($stamp,"洗面")){
									echo '<span class="icon01 icon-v04">洗面</span>';
								}
								if(strstr($stamp,"リノベ")){
									echo '<span class="icon01 icon-v05">リノベ</span>';
								}
								echo '</span>';
								}
							?>
						</p>

						<p class="tit"><?php echo mb_substr( $post->post_title, 0, 30) . '...'; ?></p>
					</a>
					<p class="more"><a href="<?php the_permalink(); ?>">続きを見る＞＞</a></p>
				</li>
			<?php endwhile;
			endif;
			wp_reset_query(); ?>

		</ul>
		<p class="colum_more"><a href="/colum" class="more_btn1">お役立ちコラムもっとを見る</a></p>
	</aside>
</div>




<div class="t_social">




<div class="inner inner_wrap">
	<aside class="facebook box">
		<h2 class="social_tit"><i class="fa fa-facebook" aria-hidden="true"></i>ハッピーホーム　フェイスブック</h2>
		<div id="pageplugin">
			<div class="fb-page" data-href="https://www.facebook.com/happyhome.base/" data-tabs="timeline" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
				<blockquote cite="https://www.facebook.com/happyhome.base/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/happyhome.base/">株式会社ハッピーホーム　広島の不動産、新築住宅、住宅・店舗・増改築&amp;住宅リフォーム、リノベーション</a>
				</blockquote>
			</div>
		</div>
	</aside>
	<!-- =======================================================ハッピーアルバム	-->
	<div class="top_happy_album">
		<h3><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/social/happyIcon.png" alt="ハッピーアルバム" width="46">ハッピーアルバム</h3>

		<?php if (wp_is_mobile()) :?>
		<?php
		$args = array(
				'post_type' => 'album', /* 投稿タイプ */
				'paged' => $paged,
				'posts_per_page' => 3 /* 件数表示 */
		);
		query_posts( $args );
		if (have_posts()) :?>

		<ul class="list">
			<? while (have_posts()) : the_post(); ?>

				<li>

					<a class="btn btn-default" href="#" data-featherlight="#<?php the_ID(); ?>"><?php echo gr_get_image('album_img') ?>
					</a>
					<div class="featherbox" id="<?php the_ID(); ?>">
						<?php echo gr_get_image('album_img') ?>
					</div>


				</li>
			<?php endwhile; endif; wp_reset_query(); ?>

		</ul>

		<a href="/album" class="more">もっと見る <img src="<?php echo get_template_directory_uri(); ?>/page_image/top/social/albumMoreArrow.png"></a>
	</div>
	<br clear="all">
	<?php else: ?>
	<?php
	$args = array(
			'post_type' => 'album', /* 投稿タイプ */
			'paged' => $paged,
			'posts_per_page' => 3 /* 件数表示 */
	);
	query_posts( $args );
	if (have_posts()) :?>

	<ul class="list">
		<? while (have_posts()) : the_post(); ?>

			<li>

				<a class="btn btn-default" href="#" data-featherlight="#<?php the_ID(); ?>"><?php echo gr_get_image('album_img') ?>
				</a>
				<div class="featherbox" id="<?php the_ID(); ?>">
					<?php echo gr_get_image('album_img') ?>
				</div>


			</li>
		<?php endwhile; endif; wp_reset_query(); ?>

	</ul>

	<a href="/album" class="more">もっと見る <img src="<?php echo get_template_directory_uri(); ?>/page_image/top/social/albumMoreArrow.png"></a>
</div>
	<br clear="all">
	<?php endif; ?>
</div>
</div>
<?php sp_contact_banner(); ?>

<?php gr_kaiyu_banner(); ?>


<!-- 現場日記のモーダルウィンドウ -->
		<!-- 福山北部 -->
		<div id="genba_modal_box1" class="genba_modal_box">
			<?php
			$args = array(
				'post_type' => 'genba_hukuyamahokubu', /* 投稿タイプ */
				'paged' => $paged,
				'posts_per_page' => 1 /* 件数表示 */
			);
			query_posts( $args );
				if (have_posts()) :
				while (have_posts()) : the_post(); ?>

			<p class="pic">
				<? if ( $img = post_custom( 'genba_importimg' ) ) {
						echo '<img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="640" alt="" class="img_over" />';
						} else{
				$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
				if ( !empty( $files ) ) {
					$keys = array_keys( $files );
					$num = $keys[ 0 ];
					$thumb = wp_get_attachment_image_src( $num, 'large' );
					$thumbm = wp_get_attachment_image_src( $num, 'large' );

					print '<a href="' . $thumb[ 0 ] . '" title="' .
					the_title_attribute( 'echo=0' ) . '" rel="lightbox[genba]"><img src="' . clean_url( $thumbm[ 0 ] ) .
					'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
				}}
				?>
			</p>
				<p class="date"><?php echo the_time('Y年n月j日'); ?></p>
				<p class="tit"><?php the_title();?></p>
				<p class="text"><?php the_excerpt(); ?></p>


			<?php endwhile;
				else :
				endif;
				wp_reset_query(); ?>

		</div>
		<!-- /福山北部 -->
		<!-- 福山中心部エリア -->
			<?php
			$args = array(
				'post_type' => 'genba_hukuyamachu', /* 投稿タイプ */
				'paged' => $paged,
				'posts_per_page' => 1 /* 件数表示 */
			);
			query_posts( $args );
				if (have_posts()) :?>
		<div id="genba_modal_box2" class="genba_modal_box">
<? while (have_posts()) : the_post(); ?>

			<p class="pic">
				<? if ( $img = post_custom( 'genba_importimg' ) ) {
						echo '<img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="640" alt="" class="img_over" />';
						} else{
				$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
				if ( !empty( $files ) ) {
					$keys = array_keys( $files );
					$num = $keys[ 0 ];
					$thumb = wp_get_attachment_image_src( $num, 'large' );
					$thumbm = wp_get_attachment_image_src( $num, 'large' );

					print '<a href="' . $thumb[ 0 ] . '" title="' .
					the_title_attribute( 'echo=0' ) . '" rel="lightbox[genba]"><img src="' . clean_url( $thumbm[ 0 ] ) .
					'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
				}}
				?>
			</p>
				<p class="date"><?php echo the_time('Y年n月j日'); ?></p>
				<p class="tit"><?php the_title();?></p>
				<p class="text"><?php the_excerpt(); ?></p>


		</div>

			<?php endwhile;
				else :
				endif;
				wp_reset_query(); ?>

		<!-- /福山中心部エリア -->
		<!-- 福山東部  -->
		<div id="genba_modal_box3" class="genba_modal_box">
<?php
			$args = array(
				'post_type' => 'genba_hukuyamatoubu', /* 投稿タイプ */
				'paged' => $paged,
				'posts_per_page' => 1 /* 件数表示 */
			);
			query_posts( $args );
				if (have_posts()) :
				while (have_posts()) : the_post(); ?>

			<p class="pic">
				<? if ( $img = post_custom( 'genba_importimg' ) ) {
						echo '<img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="640" alt="" class="img_over" />';
						} else{
				$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
				if ( !empty( $files ) ) {
					$keys = array_keys( $files );
					$num = $keys[ 0 ];
					$thumb = wp_get_attachment_image_src( $num, 'large' );
					$thumbm = wp_get_attachment_image_src( $num, 'large' );

					print '<a href="' . $thumb[ 0 ] . '" title="' .
					the_title_attribute( 'echo=0' ) . '" rel="lightbox[genba]"><img src="' . clean_url( $thumbm[ 0 ] ) .
					'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
				}}
				?>
			</p>
				<p class="date"><?php echo the_time('Y年n月j日'); ?></p>
				<p class="tit"><?php the_title();?></p>
				<p class="text"><?php the_excerpt(); ?></p>


			<?php endwhile;
				else :
				endif;
				wp_reset_query(); ?>

		</div>
		<!-- /福山東部  -->
		<!-- 福山西部エリア -->
			<?php
			$args = array(
				'post_type' => 'genba_hukuyamaseibu', /* 投稿タイプ */
				'paged' => $paged,
				'posts_per_page' => 1 /* 件数表示 */
			);
			query_posts( $args );
				if (have_posts()) :?>
		<div id="genba_modal_box4" class="genba_modal_box">
<? while (have_posts()) : the_post(); ?>

			<p class="pic">
				<? if ( $img = post_custom( 'genba_importimg' ) ) {
						echo '<img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="640" alt="" class="img_over" />';
						} else{
				$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
				if ( !empty( $files ) ) {
					$keys = array_keys( $files );
					$num = $keys[ 0 ];
					$thumb = wp_get_attachment_image_src( $num, 'large' );
					$thumbm = wp_get_attachment_image_src( $num, 'large' );

					print '<a href="' . $thumb[ 0 ] . '" title="' .
					the_title_attribute( 'echo=0' ) . '" rel="lightbox[genba]"><img src="' . clean_url( $thumbm[ 0 ] ) .
					'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
				}}
				?>
			</p>
				<p class="date"><?php echo the_time('Y年n月j日'); ?></p>
				<p class="tit"><?php the_title();?></p>
				<p class="text"><?php the_excerpt(); ?></p>


		</div>

			<?php endwhile;
				else :
				endif;
				wp_reset_query(); ?>

		<!-- /福山西部エリア -->
		<!-- 福山南部エリア  -->
		<div id="genba_modal_box5" class="genba_modal_box">
<?php
			$args = array(
				'post_type' => 'genba_hukuyamananbu', /* 投稿タイプ */
				'paged' => $paged,
				'posts_per_page' => 1 /* 件数表示 */
			);
			query_posts( $args );
				if (have_posts()) :
				while (have_posts()) : the_post(); ?>

			<p class="pic">
				<? if ( $img = post_custom( 'genba_importimg' ) ) {
						echo '<img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="640" alt="" class="img_over" />';
						} else{
				$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
				if ( !empty( $files ) ) {
					$keys = array_keys( $files );
					$num = $keys[ 0 ];
					$thumb = wp_get_attachment_image_src( $num, 'large' );
					$thumbm = wp_get_attachment_image_src( $num, 'large' );

					print '<a href="' . $thumb[ 0 ] . '" title="' .
					the_title_attribute( 'echo=0' ) . '" rel="lightbox[genba]"><img src="' . clean_url( $thumbm[ 0 ] ) .
					'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
				}}
				?>
			</p>
				<p class="date"><?php echo the_time('Y年n月j日'); ?></p>
				<p class="tit"><?php the_title();?></p>
				<p class="text"><?php the_excerpt(); ?></p>


			<?php endwhile;
				else :
				endif;
				wp_reset_query(); ?>

		</div>
		<!-- /福山南部  -->

		<!-- 府中エリア -->
		<div id="genba_modal_box6" class="genba_modal_box">
<?php
			$args = array(
				'post_type' => 'genba_huchu', /* 投稿タイプ */
				'paged' => $paged,
				'posts_per_page' => 1 /* 件数表示 */
			);
			query_posts( $args );
				if (have_posts()) :
				while (have_posts()) : the_post(); ?>

			<p class="pic">
				<? if ( $img = post_custom( 'genba_importimg' ) ) {
						echo '<img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="640" alt="" class="img_over" />';
						} else{
				$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
				if ( !empty( $files ) ) {
					$keys = array_keys( $files );
					$num = $keys[ 0 ];
					$thumb = wp_get_attachment_image_src( $num, 'large' );
					$thumbm = wp_get_attachment_image_src( $num, 'large' );

					print '<a href="' . $thumb[ 0 ] . '" title="' .
					the_title_attribute( 'echo=0' ) . '" rel="lightbox[genba]"><img src="' . clean_url( $thumbm[ 0 ] ) .
					'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
				}}
				?>
			</p>
				<p class="date"><?php echo the_time('Y年n月j日'); ?></p>
				<p class="tit"><?php the_title();?></p>
				<p class="text"><?php the_excerpt(); ?></p>


			<?php endwhile;
				else :
				endif;
				wp_reset_query(); ?>

		</div>
		<!-- /府中エリア -->
		<!-- 尾道エリア -->
		<div id="genba_modal_box7" class="genba_modal_box">
<?php
			$args = array(
				'post_type' => 'genba_onomichi', /* 投稿タイプ */
				'paged' => $paged,
				'posts_per_page' => 1 /* 件数表示 */
			);
			query_posts( $args );
				if (have_posts()) :
				while (have_posts()) : the_post(); ?>

			<p class="pic">
				<? if ( $img = post_custom( 'genba_importimg' ) ) {
						echo '<img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="640" alt="" class="img_over" />';
						} else{
				$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
				if ( !empty( $files ) ) {
					$keys = array_keys( $files );
					$num = $keys[ 0 ];
					$thumb = wp_get_attachment_image_src( $num, 'large' );
					$thumbm = wp_get_attachment_image_src( $num, 'large' );

					print '<a href="' . $thumb[ 0 ] . '" title="' .
					the_title_attribute( 'echo=0' ) . '" rel="lightbox[genba]"><img src="' . clean_url( $thumbm[ 0 ] ) .
					'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
				}}
				?>
			</p>
				<p class="date"><?php echo the_time('Y年n月j日'); ?></p>
				<p class="tit"><?php the_title();?></p>
				<p class="text"><?php the_excerpt(); ?></p>


			<?php endwhile;
				else :
				endif;
				wp_reset_query(); ?>

		</div>
		<!-- /尾道エリア -->

		<!-- その他 -->
		<div id="genba_modal_box8" class="genba_modal_box">
<?php
			$args = array(
				'post_type' => 'genba_other', /* 投稿タイプ */
				'paged' => $paged,
				'posts_per_page' => 1 /* 件数表示 */
			);
			query_posts( $args );
				if (have_posts()) :
				while (have_posts()) : the_post(); ?>

			<p class="pic">
				<? if ( $img = post_custom( 'genba_importimg' ) ) {
						echo '<img src="/wp/wp-content/themes/reform/images/genba/' . $img . '" width="640" alt="" class="img_over" />';
						} else{
				$files = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image" );
				if ( !empty( $files ) ) {
					$keys = array_keys( $files );
					$num = $keys[ 0 ];
					$thumb = wp_get_attachment_image_src( $num, 'large' );
					$thumbm = wp_get_attachment_image_src( $num, 'large' );

					print '<a href="' . $thumb[ 0 ] . '" title="' .
					the_title_attribute( 'echo=0' ) . '" rel="lightbox[genba]"><img src="' . clean_url( $thumbm[ 0 ] ) .
					'" width="223" alt="' . the_title_attribute( 'echo=0' ) . '" class="img img_over" /></a>' . "\n";
				}}
				?>
			</p>
				<p class="date"><?php echo the_time('Y年n月j日'); ?></p>
				<p class="tit"><?php the_title();?></p>
				<p class="text"><?php the_excerpt(); ?></p>

			<?php endwhile;
				else :
				endif;
				wp_reset_query(); ?>

		</div>
<!-- /現場日記のモーダルウィンドウ -->
<?php get_footer(); ?>
