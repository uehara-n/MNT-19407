<?php
get_header();

$args = array(
	'post_type' => 'colum', /* 投稿タイプを指定 */
	'paged' => $paged, /* ページ番号を指定 */
	'posts_per_page' => 10, /* 最大表示数 */
);
query_posts( $args );
?> <!-- ======================コンテンツここから======================= -->
<main id="page_content">
	<ul id="pankuzu" class="clearfix">
		<?php the_pankuzu_keni( ' &gt; ' ); ?>
	</ul>
	<section class="wrap_archive-colum">
		<h2 class="page_tit">colum</h2>
		<!--customer_navi-->
		<div class="customer_navi clearfix">
			<div class="customer_navi_left">
				<p class="customer_red">
					<?php echo gr_get_posts_count(); ?>件</p>
			</div>

			<div class="customer_navi_right">
				<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
			</div>
		</div>
		<!--customer_navi-->

		<div class="content">
			<?php while( have_posts() ) : the_post(); ?>
			<div class="box">

				<div class="archive-colum">

						<div class="photo">
								<img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
						</div>

						<div class="txt">
							<h3 class="h3type01 event_tit"><?php the_title(); ?></h3>
							<div class="contet">
								<?php
									if(mb_strlen(get_the_excerpt(), 'UTF-8')>50){
										$excerpt= mb_substr(get_the_excerpt(),0,200);
										echo $excerpt.'...';
								 }else{
									 echo get_the_excerpt();
								 }
								?>
							</div>
							<p class="btn-detail mt10 mb10 more"><a href="<?php the_permalink() ?>" class="more_btn1">詳しく見る</a></p>
						</div>

				</div>

			</div>
		<?php endwhile; ?>
		</div>
		<!--customer_navi-->
		<div class="customer_navi clearfix">
			<div class="customer_navi_left">
				<p class="customer_red">
					<?php echo gr_get_posts_count(); ?>件</p>
			</div>

			<div class="customer_navi_right">
				<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
			</div>
		</div>
		<!--customer_navi-->


</section>
<!-- ======================右コンテンツここまで======================= -->
</main>
<!-- ======================コンテンツここまで======================= -->

<?php gr_kaiyu_banner(); ?>
<?php get_footer(); ?>
