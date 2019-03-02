<?php
/**
 * Template Name:コラム一覧ページ
 *
 * @package Wordpress
 * @subpackage ing
 * @since 1.0.0
 */
get_header(); ?>


 <div id="top" class="container">
   <?php get_sidebar(); ?>
   <main class="main" role="main">
     <?php breadcrumb(); ?>
     <div class="page-title-area">
       <h2 class="page-title">コラム</h2>
     </div>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
    <div class="blog-post">
      <h3 class="heading1"><?php the_title(); ?></h3>
      <p class="right"><?php the_time('Y年n月j日(D)'); ?></p>
      <div class="contet">
        <?php the_content(); ?>
      </div>
    </div>
<?php endwhile; ?>
<?php endif; ?>
    <?php get_template_part('parts/page-navi'); ?>
 	</main>
 </div>
<?php get_footer(); ?>
