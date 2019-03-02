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

     <?php
       //Pagenation
       if (function_exists("pagination")) {
       pagination($additional_loop->max_num_pages);
       }
     ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
    <div class="blog-post">

      <div class="colum-top archive-colum">
          <div class="photo">
              <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
          </div>
          <div class="txt clearfix">
            <h3 class="h3type01"><?php echo the_title(); ?></h3>
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
            <p class="btn-detail mt10 mb10"><a href="<?php the_permalink() ?>">詳しくはこちら</a></p>
          </div>
      </div>
    </div>
<?php endwhile; ?>
<?php endif; ?>
    <?php
      //Pagenation
      if (function_exists("pagination")) {
      pagination($additional_loop->max_num_pages);
      }
    ?>
 	</main>
 </div>
<?php get_footer(); ?>
