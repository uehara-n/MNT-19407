<?php get_header(); ?>
 <!-- ======================コンテンツここから======================= -->
<main id="page_content">
	<ul id="pankuzu" class="clearfix">
		<?php the_pankuzu_keni( ' &gt; ' ); ?>
	</ul>
	<section class="colum_single">
		<h2 class="page_tit">コラム情報</h2>
		<!--customer_navi-->
		<div class="customer_navi clearfix">
			<div class="page_back_btn">
				<p class="page_back_text"><a href="https://www.happy-reform.com/colum">&lt; コラム一覧に戻る</a>
				</p>
			</div>
		</div>

		<section class="box">

			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
					<div class="blog-post">
						<h3 class="heading1 colum_tit"><?php the_title(); ?></h3>
						<p class="right"><?php the_time('Y年n月j日(D)'); ?></p>
						<div class="contet">
							<?php the_content(); ?>
						</div>
					</div>
			<?php endwhile; ?>
			<?php endif; ?>

		</section>
		<!--customer_navi-->
		<div class="customer_navi clearfix">
			<div class="page_back_btn">
				<p class="page_back_text"><a href="<?php echo get_post_type_archive_link( 'colum' ); ?>">&lt;コラム一覧に戻る</a>
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
