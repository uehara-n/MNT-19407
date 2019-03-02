<?php
/**
* Template Name:フロントページ
*
* @package Wordpress
* @subpackage reform2
* @since 1.0.0
*/
get_header(); ?>

  <div class="wideslider-container">
    <div class="wideslider">
      <ul>
        <li><a href="<?php echo home_url(); ?>/renov/30811.html"><img src="<?php echo get_template_directory_uri(); ?>/img/top/carousel/main1_sp.jpg" class="switch" alt="中古マンションを購入して、自分好みにフルリノベーション！">
        </a></li>
        <li><a href="<?php echo home_url(); ?>/renov/30841.html"><img src="<?php echo get_template_directory_uri(); ?>/img/top/carousel/main2_sp.jpg" class="switch" alt="和モダンな雰囲気で、身も心も癒されるリラクゼーションサロン">
        </a></li>
        <li><a href="<?php echo home_url(); ?>/renov/30809.html"><img src="<?php echo get_template_directory_uri(); ?>/img/top/carousel/main3_sp.jpg" class="switch" alt="中古を購入して、お気に入りのテイストにフルリノベーション！">
        </a></li>
        <li><a href="<?php echo home_url(); ?>/renov/30843.html"><img src="<?php echo get_template_directory_uri(); ?>/img/top/carousel/main4_sp.jpg" class="switch" alt="3世代が仲良く暮らす、明るく理想的な住まいへ">
        </a></li>
        <li><a href="<?php echo home_url(); ?>/renov/30810.html"><img src="<?php echo get_template_directory_uri(); ?>/img/top/carousel/main5_sp.jpg" class="switch" alt="デザイナーズマンション　リノベーション">
        </a></li>
      </ul>
    </div>
  </div>

  <!-- 2.イベント情報・最新情報 -->
  <section class="ptb90 pt20">
    <div class="centering info-bg">
      <div class="info-row">

        <!-- 最新情報 -->
        <div class="info-col">
          <h2 class="section-title mt_10">最新情報</h2>
          <p class="section-subtitle cha">News</p>
          <dl class="news">
            <?php $args = array(
              'post_type' => 'news',
              'posts_per_page' => 1,
            ); ?>
            <?php $my_query = new WP_Query( $args ); ?>
            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
            <!--ループ-->
            <dt><?php the_time('Y年m月d日'); ?></dt>
            <dd><h3><?php the_title(); ?></a></h3></dd>
            <a href="<?php the_permalink() ?>"></a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </dl>
          <dl class="news">
            <?php $args = array(
              'post_type' => 'staffblog',
              'posts_per_page' => 1,
            ); ?>
            <?php $my_query = new WP_Query( $args ); ?>
            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
            <!--ループ-->
            <dt><?php the_time('Y年m月d日'); ?></dt>
            <dd><h3><?php the_title(); ?></h3></dd>
            <a href="<?php the_permalink() ?>"></a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            </dl>
            <dl class="news">
            <?php $args = array(
              'post_type' => 'event',
              'posts_per_page' => 1,
            ); ?>
            <?php $my_query = new WP_Query( $args ); ?>
            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
            <!--ループ-->
            <dt><?php the_time('Y年m月d日'); ?></dt>
            <dd><h3><?php the_title(); ?></h3></dd>
            <a href="<?php the_permalink() ?>"></a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </dl>
        </div>

        <!-- イベント情報 -->
        <div class="info-col">
          <h2 class="section-title mt_10">スタッフブログ</h2>
          <p class="section-subtitle">Staff Blog</p>

          <?php $args = array(
            'post_type' => 'staffblog',
            'posts_per_page' => 2,
            'order' => 'DESC',
          ); ?>

          <?php $my_query = new WP_Query( $args ); ?>
                <ul class="staffblog-content">
                  <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                  <li class="staffblog-item">
                    <div class="renov-image-scale">
                      <?php if (post_content_first_image()) : ?>
                                <img src="<?php echo post_content_first_image(); ?>" class="renov-object-fit" alt="<?php the_title(); ?>">
                      <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/top/noimage.png" class="renov-object-fit" alt="<?php the_title(); ?>">
                      <?php endif; ?>
                    </div>
                    <p><?php the_time('Y年m月d日'); ?></p>
                    <h3 class="renov-title"><?php echo mb_substr( $post->post_title, 0, 30) . '...'; ?></h3>
                    <p class="right"><a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/top/renov/detail.png" alt="詳しく事例を見る"></a></p>
                  </li>
                <?php endwhile; ?>
                  </ul>
                <?php wp_reset_postdata(); ?>

              </a>


          <!-- 一覧を見る -->
          <p class="center">
            <a href="https://www.enlarge.tokyo/staffblog/"><img src="https://www.enlarge.tokyo/wp/wp-content/themes/reform2/img/top/staffblog/more.png" alt="もっとスタッフブログを見る"></a>
          </p>
        </div>

      </div>
    </div>
  </section>



  <!-- 3.リノベーション事例 -->
  <section class="ptb90 pt20">
    <div class="renov-heading">
      <h2>リノベーション事例</h2>
      <p>Renovation Works</p>
    </div>
    <div class="centering">
      <p class="center mt20 mb30"><img src="<?php echo get_template_directory_uri(); ?>/img/top/renov/fuki.png" alt="リノベーションで新しいライフスタイル"></p>
    <?php $args = array(
      'post_type' => 'renov',
      'posts_per_page' => 3,
      'order' => 'DESC',
    ); ?>
    <?php $my_query = new WP_Query( $args ); ?>
          <ul class="renov-content">
    <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
            <li class="renov-item">
              <a href="<?php the_permalink() ?>">
    <?php
      $rows = get_field('image_gallery' );
      $first_row = $rows[0];
      $first_row_image = $first_row['main_image' ];
      $image = wp_get_attachment_image_src( $first_row_image, 'full' );
    ?>
                <div class="renov-image-scale">
    <?php if(have_rows('image_gallery')): ?>
                <img src="<?php echo $image[0]; ?>" class="renov-object-fit" alt="<?php the_title(); ?>">
    <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/top/noimage.png" class="renov-object-fit" alt="<?php the_title(); ?>">
    <?php endif; ?>
          </div>
          <p class="renov-icon">
          <?php if( get_field('icon') ): ?>
            <?php if( in_array( 'hojyokin', get_field('icon') ) ) {
                echo '<span class="hojyokin">補助金</span>';
            } ?>
            <?php if( in_array( 'mansion', get_field('icon') ) ) {
                echo '<span class="mansion">マンション</span>';
            } ?>
            <?php if( in_array( 'used', get_field('icon') ) ) {
                echo '<span class="used">中古リノベ</span>';
            } ?>
            <?php endif; ?>
          </p>
          <h3 class="renov-title"><?php echo mb_substr( $post->post_title, 0, 30) . '...'; ?></h3>
          <p class="renov-data"><?php the_field('address'); ?> <?php the_field('name'); ?>様 費用：<?php the_field('cost'); ?></p>
          <p>
          <?php
            $text = mb_substr(get_field('after-comment'),0,30,'utf-8');
            echo $text.'...';
          ?>
                    </p>
                    <p class="right"><img src="<?php echo get_template_directory_uri(); ?>/img/top/renov/detail.png" alt="詳しく事例を見る"></p>
                    </a>
                  </li>
          <?php endwhile; ?>
                </ul>
          <?php wp_reset_postdata(); ?>
          <?php $args = array(
            'post_type' => 'renov',
            'posts_per_page' => 3,
            'offset' => 3,
            'order' => 'DESC',
          ); ?>
          <?php $my_query = new WP_Query( $args ); ?>
                <ul class="renov-content1">
          <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                  <li class="renov-item">
                    <a href="<?php the_permalink() ?>">
          <?php
            $rows = get_field('image_gallery' );
            $first_row = $rows[0];
            $first_row_image = $first_row['main_image' ];
            $image = wp_get_attachment_image_src( $first_row_image, 'full' );
          ?>
          <div class="renov-image-scale">
          <?php if(have_rows('image_gallery')): ?>
                      <img src="<?php echo $image[0]; ?>" class="renov-object-fit" alt="<?php the_title(); ?>">
            <?php else: ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/img/top/noimage.png" class="renov-object-fit" alt="<?php the_title(); ?>">
          <?php endif; ?>
          </div>

          <p class="renov-icon">
          <?php if( get_field('icon') ): ?>
            <?php if( in_array( 'hojyokin', get_field('icon') ) ) {
                echo '<span class="hojyokin">補助金</span>';
            } ?>
            <?php if( in_array( 'mansion', get_field('icon') ) ) {
                echo '<span class="mansion">マンション</span>';
            } ?>
            <?php if( in_array( 'used', get_field('icon') ) ) {
                echo '<span class="used">中古リノベ</span>';
            } ?>
            <?php endif; ?>
          </p>
          <h3 class="renov-title"><?php echo mb_substr( $post->post_title, 0, 30) . '...'; ?></h3>
          <p class="renov-data"><?php the_field('address'); ?> <?php the_field('name'); ?>様 費用：<?php the_field('cost'); ?></p>
          <p>
          <?php
            $text = mb_substr(get_field('after_comment'),0,30,'utf-8');
            echo $text.'...';
          ?>
          </p>
          <p class="right"><img src="<?php echo get_template_directory_uri(); ?>/img/top/renov/detail.png" alt="詳しく事例を見る"></p>
        </a>
        </li>
      <?php endwhile; ?>
      </ul>
      <?php wp_reset_postdata(); ?>
      <p class="center">
        <a href="<?php echo home_url(); ?>/renov/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/renov/more.png" class="hover" alt="リノベーション事例一覧を見る"></a>
      </p>
    </div>
  </section>

  <!-- 1.イントロダクション -->
  <section class="intro-bg">
    <div class="intro-text">
      <p class="catch">“お客様にとって、価値のあるリフォーム”</p>
      <p class="mb20">
        私達エンラージは、単なる建築リフォーム業者ではありません。<br>お客様にとって『価値のあるリフォーム』をご提供する会社です。
      </p>
      <p class="mb20">
        リフォームは、壊れたものを直す“修繕”ではありません。 <br>住まいをより良く作り直し、より良い生活を実現させるための手段です。
      </p>
      <p class="mb20">
        私達エンラージスタッフは『お客様を幸せにする事』を使命とし、全力を尽くします。 <br>そのための努力は一切惜しみません。
      </p>
      <p class="mb20">
        エンラージのサービスは、最初のお打ち合わせから始まります。
      </p>
      <p class="mb20">
        お客様の思い描くご希望やライフスタイルを丁寧にお伺いし、<br>プロとしてのエッセンスを少しだけ加えて、ご提案させて頂きます。
      </p>
      <p class="mb20">
        その際に、店内でご提供するお飲み物にも徹底的にこだわり<br>「美味しい！」と言っていただけるまで、何度でもお出し致します。
      </p>
      <p class="mb20">
        「リフォームはサービス業である。」という精神は、現場にも浸透しています。<br>挨拶や養生といった基本はもちろんの事、他では出来ない事を実現する“技術力”も<br>エンラージならではのサービスです。
      </p>
      <p class="mb20">
        “お客様にとって、価値のあるリフォーム” <br>私達エンラージスタッフと一緒に、ご家族の夢や希望を叶えてみませんか？
      </p>
    </div>
  </section>

  <!-- 4.店舗案内 -->
  <section class="showroom-bg">
    <div class="centering">
      <h2 class="section-title center">店舗案内</h2>
      <p class="section-subtitle center">Show Room</p>
      <div class="text-wrap">
        <p class="catch">エンラージは<br>八王子・日野エリアに<br>３店舗+カフェで地域に密着</p>
        <p class="border"></p>
        <p class="mb20">
          エンラージ八王子社は、八王子市・日野市・昭島市・立川市・多摩市を中心に、リノベーションリフォーム・スケルトンリフォーム・自然素材リフォームを行っております。自然素材リフォームのショールームは、八王子本店・北野支店・日野支店の3店舗+カフェで、多摩地区のお客様のご来店をお待ちしております。 女性プランナーと一級建築士がチームを組んで、クオリティーの高いリフォームをご提供致しますので、大規模リフォームやリノベーションは、エンラージ八王子社にお任せ下さい。
        </p>
      </div>
      <div class="tenpo-wrap">
        <div class="tenpo-grid">
          <p class="tenpo-item"><a href="<?php echo home_url(); ?>/company/hachioji"><img src="<?php echo get_template_directory_uri(); ?>/img/top/showroom/honten.png" class="fit" alt="八王子本店"></a></p>
          <p class="tenpo-item"><a href="<?php echo home_url(); ?>/company/kitano"><img src="<?php echo get_template_directory_uri(); ?>/img/top/showroom/kitano.png" class="fit" alt="北野支店"></a></p>
          <p class="tenpo-item"><a href="<?php echo home_url(); ?>/company/hino"><img src="<?php echo get_template_directory_uri(); ?>/img/top/showroom/hino.png" class="fit" alt="日野支店"></a></p>
          <p class="tenpo-item"><a href="<?php echo home_url(); ?>/cafe-enlarge"><img src="<?php echo get_template_directory_uri(); ?>/img/top/showroom/cafe.png" class="fit" alt="カフェエンラージ"></a>
          <span class="cafe-holiday">店舗改装工事のため<br>7/25〜9/20休業</span></p>
        </div>
      </div>
    </div>
  </section>
  <div class="centering">
    <p class="center sp-none mt40 mb40">
      <a href="<?php echo home_url(); ?>/raiten/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top1.png" alt="絶対お得！来店予約の３つのメリット"></a>
    </p>
    <p class="center pc-none mt20 mb20">
      <a href="<?php echo home_url(); ?>/raiten/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top1-sp.png" class="fit" alt="絶対お得！来店予約の３つのメリット"></a>
    </p>
  </div>

  <!-- 5.スタッフ紹介 -->
  <section class="section staff-bg">
    <div class="centering">
      <p class="staff-sub">エンラージ自慢の</p>
      <h2 class="staff-title"><span class="big">女性</span>プランナーと<span class="big">建</span>築士が<span class="br"></span>あなたの夢をリノベーションで<span class="br"></span>叶えます。</h2>
      <div class="staff-content-wrap">
        <?php $args = array(
          'post_type' => 'staff',
          'posts_per_page' => 8,
          'order' => 'DESC',
        ); ?>
        <?php $my_query = new WP_Query( $args ); ?>
        <div class="staff-content">
        <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
          <div><!--スタッフ-->
            <?php if( get_field('top-image') ): ?>
              <p><img src="<?php the_field('top-image'); ?>" class="fit" alt="<?php the_title(); ?>"></p>
            <?php endif; ?>
            <p>
        </div>
      <?php endwhile; ?>
        </div>
      <?php wp_reset_postdata(); ?>
      <p class="center">
        <a href="<?php echo home_url(); ?>/staff/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/staff/more.png" alt="スタッフ紹介を見る"></a>
      </p>
    </div>
  </section>

  <!-- 6.リノベーションにまつわるお役立ち情報 -->
  <section class="ptb90">
    <h2 class="section-title1 center">リノベーションに<span class="br"></span>まつわるお役立ち情報</h2>
    <p class="center mt20 mb30"><img src="<?php echo get_template_directory_uri(); ?>/img/top/oyakudachi/fuki.png" alt="タメになる情報満載"></p>
    <div class="centering mb30">
      <p class="center sp-none"><a href="<?php echo home_url(); ?>/renovation/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top2.png" alt="中古住宅×リノベーション"></a></p>
      <p class="center pc-none"><a href="<?php echo home_url(); ?>/renovation/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top2-sp.png" class="fit" alt="中古住宅×リノベーション"></a></p>
    </div>
    <!-- スライダー -->
    <div class="width">
      <div class="slider carousel">
        <div class="slide-item">
          <a href="<?php echo home_url(); ?>/kaigo/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/carousel/slide1.png" alt="補助金でリフォームとは?"></a>
        </div>
        <div class="slide-item">
          <a href="<?php echo home_url(); ?>/shinkochiku/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/carousel/slide2.png" alt="新しい住まいのスタイルをご提案"></a>
        </div>
        <div class="slide-item">
          <a href="<?php echo home_url(); ?>/chukobukken/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/carousel/slide3.png" alt="物件情報も発信"></a>
        </div>
        <div class="slide-item">
          <a href="<?php echo home_url(); ?>/school/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/carousel/slide4.png" alt="エンラージの店舗をレンタル"></a>
        </div>
        <div class="slide-item">
          <a href="<?php echo home_url(); ?>/renovation/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/carousel/slide5.png" alt="中古住宅リノベーション"></a>
        </div>
        <div class="slide-item">
          <a href="<?php echo home_url(); ?>/homepro/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/carousel/slide6.png" alt="ホームプロ"></a>
        </div>
      </div>
      <div class="arrow">
        <!-- <div class="slick-next"></div>
        <div class="slick-prev"></div> -->
      </div>
    </div>
  </section>


  <!-- イベント情報 -->
  <div class="event_box centering">
    <h2 class="section-title mt_10 center">イベント情報</h2>
    <p class="center mt20 mb30r"><img src="<?php echo get_template_directory_uri(); ?>/img/top/event/fuki.png" alt="エンラージの最新イベント"></p>
    <p class="section-subtitle center">Event</p>
    <div class="event_wrap">
      <?php
        $args = array(
        'post_type' => 'event',
        'posts_per_page' => 2,
        );
        $domestic_post = get_posts($args);
        if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post );
       ?>
      <!--ループ-->

        <div class="event">
          <a href="<?php the_permalink() ?>" class="block-link"></a>
          <div class="event-top">
            <div class="image">
              <p>
                <?php
                echo gr_get_image(
                  'event_img00',
                  array( 'size' => 'thumbnail', 'alt' => esc_attr( post_custom( 'event_img_alt01' ) ) )
                )
                ?>
              </p>
            </div>
            <div class="data">
              <h3><?php the_title(); ?></h3>
              <p><?php
                  $strlen = post_custom( 'event_summary' );
                  $text = mb_substr(post_custom( 'event_summary' ),0,20,'utf-8');
                  if(mb_strlen(post_custom( 'event_summary' ))>20) {
                  echo $text.'...';
                } else {
                echo post_custom( 'event_summary' );
                }
                ?></p>
                </div>
              </div>
              <p class="event-date"><span>開催期間</span> | <?php echo post_custom( 'event_date' ); ?></p>
            </div>

        </a>
      <?php endforeach; endif; ?>
      <?php wp_reset_postdata(); ?>
      </div>
    <!-- 一覧を見る -->
    <p class="center">
      <a href="<?php echo home_url(); ?>/event/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/event/more.png" class="hover" alt="イベント一覧を見る"></a>
    </p>
  </div>

    <!-- 8.ギャラリー・instagram -->
    <section class="ptb90">
      <div class="centering">
        <div class="gallery-row">
          <!-- ギャラリー -->
          <div class="gallery-col">
            <p class="gallery-more"><a href="<?php echo home_url(); ?>/album/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/gallery/more.png" alt="more"></a></p>
            <h2 class="section-title">エンラージギャラリー</h2>
            <p class="section-subtitle mb20">Gallery</p>
            <?php $args = array(
              'post_type' => 'album',
              'posts_per_page' => 16,
              'order' => 'DESC',
            ); ?>
            <?php $my_query = new WP_Query( $args ); ?>
            <ul class="album-content">
              <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                <li class="album-item">
                  <?php $image = get_field('main-image'); if( !empty($image) ): ?>
                  <a href="<?php the_permalink() ?>">
                    <img src="<?php $image = get_field('main-image'); echo $image['sizes']['thumbnail']; ?>" class="album-object-fit" alt="<?php the_title(); ?>">
                  </a>
                  <?php endif; ?>
                </li>
              <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata(); ?>
          </div>
          <!-- instagram -->
          <div class="gallery-col">
            <p class="gallery-more"><a href="https://www.instagram.com/enlarge.reform/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/top/instagram/follow.png" alt="follow"></a></p>
            <h2 class="section-title"><span class="instagram"><img src="<?php echo get_template_directory_uri(); ?>/img/top/instagram/instagram.png" alt="instagram"></span>instagram</h2>
            <div class="mt15"><?php echo do_shortcode('[instagram-feed]'); ?></div>
          </div>
        </div>
      </div>
    </section>
    <!-- 9.ご相談・お問い合わせ -->
    <section class="ptb90 sp-none">
      <h2 class="section-title center">ご相談・お問い合わせ</h2>
      <p class="section-subtitle center mb30">Contact</p>
      <div class="center mb80">
        <div class="contact-banner"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top4.png" alt="ご相談・お問い合わせ">
          <div class="contact-btn">
            <a href="<?php echo home_url(); ?>/contact/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/contact.png" alt="お問い合わせ"></a>
            <a href="<?php echo home_url(); ?>/raiten/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/raiten.png" alt="来店予約"></a>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
