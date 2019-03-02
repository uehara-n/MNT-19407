<?php
// ウィジェットエリア
// サイドバーのウィジェット
register_sidebar( array(
     'name' => __( 'Side Widget' ),
     'id' => 'side-widget',
     'before_widget' => '<li class="widget-container">',
     'after_widget' => '</li>',
     'before_title' => '<h3>',
     'after_title' => '</h3>',
) );

// フッターエリアのウィジェット
register_sidebar( array(
     'name' => __( 'Footer Widget' ),
     'id' => 'footer-widget',
     'before_widget' => '<div class="widget-area"><ul><li class="widget-container">',
     'after_widget' => '</li></ul></div>',
     'before_title' => '<h3>',
     'after_title' => '</h3>',
) );

// アイキャッチ画像
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(220, 165, true ); // 幅 220px、高さ 165px、切り抜きモード

// カスタムナビゲーションメニュー
add_theme_support('menus');

// editor 非表示
add_action( 'admin_print_styles-post.php', 'bc_post_page_style' );
add_action( 'admin_print_styles-post-new.php', 'bc_post_page_style' );
function bc_post_page_style() {
	if ( in_array( $GLOBALS['current_screen']->post_type, array( 'event','staff','whatsnew','seko','special','voice','renovation','media' ) ) ) : // ’ほにゃらら’,’ほにゃらら’で区切る
?>
<style type="text/css">
#postdivrich{display:none;}
#<?php global $current_screen; var_dump( $current_screen) ?>{}
</style>
<?php
	endif;
}

//WP-Pagenaviで使用している関数
function gr_get_posts_count() {
	global $wp_query;
	return get_query_var( 'posts_per_page' ) ? $wp_query->found_posts : $wp_query->post_count;
}

// カスタムフィールド&カスタム投稿タイプの追加
function gr_register_terms( $terms, $taxonomy ) {
	foreach ( $terms as $key => $label ) {
		$keys = explode( '/', $key );
		if ( 1 < count( $keys ) ) {
			$key = $keys[1];
			$parent_id = get_term_by( 'slug', $keys[0], $taxonomy )->term_id;
		} else {
			$parent_id = 0;
		}
		if ( ! term_exists( $key, $taxonomy ) ) {
			wp_insert_term( $label, $taxonomy, array( 'slug' => $key, 'parent' => $parent_id ) );
		}
	}
}

add_action( 'init', 'bc_create_customs', 0 );
function bc_create_customs() {

	// 施工事例
	register_post_type( 'seko', array(
        'labels' => array(
            'name' => __( '施工事例' ),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 2,
        'supports' => array( 'title', 'editor','author' ),
	) );

	register_taxonomy( 'seko_cat', 'seko', array(
         'label' => '施工事例カテゴリー',
         'hierarchical' => true,
	) );
	register_taxonomy( 'seko_staff', 'seko', array(
         'label' => 'スタッフカテゴリー',
         'hierarchical' => true,
	) );


	// イベント
	register_post_type( 'event', array(
			'labels' => array(
		'name' => __( 'イベント' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 3,
	'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'event_cat', 'event', array(
			 'label' => 'イベントカテゴリー',
		     'hierarchical' => true,
	) );


	// よくあるご質問
	register_post_type( 'faq', array(
			'labels' => array(
		'name' => __( 'よくあるご質問' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 4,
	'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'faq_cat', 'faq', array(
			 'label' => 'よくあるご質問カテゴリー',
		     'hierarchical' => true,
	) );


	// スタッフ
	register_post_type( 'staff', array(
			'labels' => array(
		'name' => __( 'スタッフ' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
	'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'staff_cat', 'staff', array(
			 'label' => 'スタッフカテゴリー',
		     'hierarchical' => true,
	) );


	// 新着情報
	register_post_type( 'whatsnew', array(
			'labels' => array(
		'name' => __( '新着情報' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 7,
	'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'whatsnew_cat', 'whatsnew', array(
			 'label' => '新着情報カテゴリー',
		     'hierarchical' => true,
	) );
	// 大型事例
	register_post_type( 'renovation', array(
			'labels' => array(
		'name' => __( '大規模リフォーム' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 8,
	'supports' => array( 'title', 'editor' ),
	) );
	register_taxonomy( 'renovation_cat', 'renovation', array(
			'label' => 'スタッフカテゴリー',
			'hierarchical' => true,
		 	'update_count_callback' => '_update_post_term_count',
		 	'singular_label' => 'スタッフカテゴリー',
		 	'public' => true,
		 	'show_ui' => true	) );


	// 今日の現場
	register_post_type( 'genba', array(
			'labels' => array(
		'name' => __( '今日の現場' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 9,
	'supports' => array( 'title', 'editor' ),
	) );
	register_taxonomy( 'genba_cat', 'genba', array(
			 'label' => '今日の現場カテゴリー',
				     'hierarchical' => false,
	) );


	// 今日の現場その他
	register_post_type( 'genba_other', array(
			'labels' => array(
		'name' => __( '今日の現場その他' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 10,
	'supports' => array( 'title', 'editor' ),
	) );

	// 今日の現場尾道エリア
	register_post_type( 'genba_onomichi', array(
			'labels' => array(
		'name' => __( '今日の現場尾道エリア' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 11,
	'supports' => array( 'title', 'editor' ),
	) );

	// 今日の現場府中エリア
	register_post_type( 'genba_huchu', array(
			'labels' => array(
		'name' => __( '今日の現場府中エリア' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 12,
	'supports' => array( 'title', 'editor' ),
	) );

	// 今日の現場福山南部
	register_post_type( 'genba_hukuyamananbu', array(
			'labels' => array(
		'name' => __( '今日の現場福山南部' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 13,
	'supports' => array( 'title', 'editor' ),
	) );

	// 今日の現場福山中心部
//	register_post_type( 'genba_hukuyamachushin', array(
//			'labels' => array(
//		'name' => __( '今日の現場福山中心部' ),
//			),
//			'public' => true,
//			'has_archive' => true,
//			'menu_position' => 15,
//	'supports' => array( 'title', 'editor' ),
//	) );

	// 今日の現場福山西部
	register_post_type( 'genba_hukuyamaseibu', array(
			'labels' => array(
		'name' => __( '今日の現場福山西部' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 14,
	'supports' => array( 'title', 'editor' ),
	) );

	// 今日の現場福山北部
	register_post_type( 'genba_hukuyamahokubu', array(
			'labels' => array(
		'name' => __( '今日の現場福山北部' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 15,
	'supports' => array( 'title', 'editor' ),
	) );

	// 今日の現場福山東部
	register_post_type( 'genba_hukuyamatoubu', array(
			'labels' => array(
		'name' => __( '今日の現場福山東部' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 16,
	'supports' => array( 'title', 'editor' ),
	) );


	// 今日の現場福山中心部
	register_post_type( 'genba_hukuyamachu', array(
			'labels' => array(
		'name' => __( '今日の現場福山中心部' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 17,
	'supports' => array( 'title', 'editor' ),
	) );


	// ハッピーアルバム
	register_post_type( 'album', array(
			'labels' => array(
		'name' => __( 'ハッピーアルバム' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 21,
	'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'album_cat', 'album', array(
			 'label' => 'イベントカテゴリー',
		     'hierarchical' => true,
	) );


	// スタッフブログ
	register_post_type( 'blog', array(
			'labels' => array(
		'name' => __( 'スタッフブログ' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 22,
	'supports' => array( 'title', 'editor' ),
	) );
	register_taxonomy( 'blog_cat', 'blog', array(
			 'label' => 'ブログカテゴリー',
				     'hierarchical' => true,
	) );
	// メディア掲載実績
	register_post_type( 'media', array(
			'labels' => array(
		'name' => __( 'メディア掲載実績' ),
		'singular_name' => __( 'メディア掲載実績')
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 23,
	'supports' => array( 'title', 'editor' ),
	) );

	// お客様の声
	register_post_type( 'voice', array(
			'labels' => array(
		'name' => __( 'お客様の声' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 24,
	'supports' => array( 'title', 'editor' ),
	) );

  	// コラム
  	register_post_type( 'colum', array(
  			'labels' => array(
          'name' => __( 'コラム' ),
    			),
    			'public' => true,
    			'has_archive' => true,
    			'menu_position' => 25,
    	'supports' => array( 'title', 'editor','author' ),
  	) );

}

//---------------------------------------------------------------------------
//パンくず
//---------------------------------------------------------------------------

function the_pankuzu_keni( $separator = '　→　', $multiple_separator = '　|　' )
{
	global $wp_query;

	echo("<li><a href=\""); bloginfo('url'); echo("\">HOME</a>$separator</li>" );

	$queried_object = $wp_query->get_queried_object();

	if( is_page() )
	{
		//ページ
		if( $queried_object->post_parent )
		{
			echo( get_page_parents_keni( $queried_object->post_parent, $separator ) );
		}
		echo '<li>'; the_title(); echo '</li>';
	}
	else if( is_archive() )
	{
		if( is_post_type_archive() )
		{
			echo '<li>'; post_type_archive_title(); echo '</li>';
		}
		else if( is_category() )
		{
			//カテゴリアーカイブ
			if( $queried_object->category_parent )
			{
				echo get_category_parents( $queried_object->category_parent, 1, $separator );
			}
			echo '<li>'; single_cat_title(); echo '</li>';
		}
		else if( is_day() )
		{
			echo '<li>'; printf( __('Archive List for %s','keni'), get_the_time(__('F j, Y','keni'))); echo '</li>';
		}
		else if( is_month() )
		{
			echo '<li>'; printf( __('Archive List for %s','keni'), get_the_time(__('F Y','keni'))); echo '</li>';
		}
		else if( is_year() )
		{
			echo '<li>'; printf( __('Archive List for %s','keni'), get_the_time(__('Y','keni'))); echo '</li>';
		}
		else if( is_author() )
		{
			echo '<li>'; _e('Archive List for authors','keni'); echo '</li>';
		}
		else if(isset($_GET['paged']) && !empty($_GET['paged']))
		{
			echo '<li>'; _e('Archive List for blog','keni'); echo '</li>';
		}
		else if( is_tag() )
		{
			//タグ
			echo '<li>'; printf( __('Tag List for %s','keni'), single_tag_title('',0)); echo '</li>';
		}
	}
	else if( is_single() )
	{
		$obj = get_post_type_object( $queried_object->post_type );
		if ( $obj->has_archive ) {
			printf(
				'<li><a href="%1$s">%2$s</a>%3$s</li>',
				get_post_type_archive_link( $obj->name ),
				apply_filters( 'post_type_archive_title', $obj->labels->name ),
				$separator
			);
		} else {
			//シングル
			echo '<li>'; the_category_keni( $separator, 'multiple', false, $multiple_separator ); echo '</li>';
			echo( $separator );
		}
		echo '<li>'; the_title(); echo '</li>';
	}
	else if( is_search() )
	{
		//検索
		echo '<li>'; printf( __('Search Result for %s','keni'), strip_tags(get_query_var('s'))); echo '</li>';
	}
	else
	{
		$request_value = "";
		foreach( $_REQUEST as $request_key => $request_value ){
			if( $request_key == 'sitemap' ){ $request_value = $request_key; break; }
		}

		if( $request_value == 'sitemap' )
		{
			echo '<li>'; _e('Sitemap','keni'); echo '</li>';
		}
		else
		{
			echo '<li>'; the_title(); echo '</li>';
		}
	}
}

function get_page_parents_keni( $page, $separator )
{
	$pankuzu = "";

	$post = get_post( $page );

	$pankuzu = '<li><a href="'. get_permalink( $post ) .'">' . $post->post_title . '</a>' . $separator . '</li>';

	if( $post->post_parent )
	{
		$pankuzu = get_page_parents_keni( $post->post_parent, $separator ) . $pankuzu;
	}

	return $pankuzu;
}

function the_category_keni($separator = '', $parents='', $post_id = false, $multiple_separator = '/') {
	echo get_the_category_list_keni($separator, $parents, $post_id, $multiple_separator);
}

function get_the_category_list_keni($separator = '', $parents='', $post_id = false, $multiple_separator = '/')
{
	global $wp_rewrite;
	$categories = get_the_category($post_id);
	if (empty($categories))
		return apply_filters('the_category', __('Uncategorized', 'keni'), $separator, $parents);

	$rel = ( is_object($wp_rewrite) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';

	$thelist = '';
	if ( '' == $separator ) {
		$thelist .= '<ul class="post-categories">';
		foreach ( $categories as $category ) {
			$thelist .= "\n\t<li>";
			switch ( strtolower($parents) ) {
				case 'multiple':
					if ($category->parent)
						$thelist .= get_category_parents($category->parent, TRUE, $separator);
					$thelist .= '<a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__('View all posts in %s', 'keni'), $category->name) . '" ' . $rel . '>' . $category->name.'</a></li>';
					break;
				case 'single':
					$thelist .= '<a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__('View all posts in %s', 'keni'), $category->name) . '" ' . $rel . '>';
					if ($category->parent)
						$thelist .= get_category_parents($category->parent, FALSE);
					$thelist .= $category->name.'</a></li>';
					break;
				case '':
				default:
					$thelist .= '<a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__('View all posts in %s', 'keni'), $category->name) . '" ' . $rel . '>' . $category->cat_name.'</a></li>';
			}
		}
		$thelist .= '</ul>';
	} else {
		$i = 0;
		foreach ( $categories as $category ) {
			if ( 0 < $i )
				$thelist .= $multiple_separator . ' ';
			switch ( strtolower($parents) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents($category->parent, TRUE, $separator);
					$thelist .= '<a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__('View all posts in %s', 'keni'), $category->name) . '" ' . $rel . '>' . $category->cat_name.'</a>';
					break;
				case 'single':
					$thelist .= '<a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__('View all posts in %s', 'keni'), $category->name) . '" ' . $rel . '>';
					if ( $category->parent )
						$thelist .= get_category_parents($category->parent, FALSE);
					$thelist .= "$category->cat_name</a>";
					break;
				case '':
				default:
					$thelist .= '<a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__('View all posts in %s', 'keni'), $category->name) . '" ' . $rel . '>' . $category->name.'</a>';
			}
			++$i;
		}
	}
	return apply_filters('the_category', $thelist, $separator, $parents);
}
//---------------------------------------------------------------------------
//end パンくず
//---------------------------------------------------------------------------


//---------------------------------------------------------------------------
//インポート画像の読み込み
//---------------------------------------------------------------------------
define( 'GR_IMAGES', get_stylesheet_directory_uri() . '/images/' );
function gr_img( $file, $echo = true ) {
	$img = esc_attr( GR_IMAGES . $file );

	if ( $echo )
		echo $img;
	else
		return $img;
}

function gr_get_post( $post_name ) {
	global $wpdb;
	$null = $_post = null;

	if ( ! $_post = wp_cache_get( $post_name, 'posts' ) ) {
		$_post = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_name = %s LIMIT 1", $post_name ) );
		if ( ! $_post )
			return $null;
		_get_post_ancestors($_post);
		$_post = sanitize_post( $_post, 'raw' );
		wp_cache_add( $post_name, $_post, 'posts' );
	}

	return $_post;
}

function gr_get_permalink( $name, $taxonomy = '' ) {
	$link = false;

	if ( false && term_exists( $name, $taxnomy ) ) {
		$link = get_term_link( $name );
	} else if ( post_type_exists( $name ) ) {
		$link = get_post_type_archive_link( $name );
	} else {
		$_post = gr_get_post( $name );
		if ( $_post )
			$link = get_permalink( $_post );
	}

	return $link;
}

function gr_image_id( $key ) {
    $imagefield = post_custom( $key );
    return  preg_replace('/(\[)([0-9]+)(\])(http.+)?/', '$2', $imagefield );
}

function gr_get_image( $key, $att = '' ) {
	$id = gr_image_id( $key );

	if ( is_numeric( $id ) ) {
		if ( isset( $att['size'] ) ) {
			$size = $att['size'];
			unset( $att['size'] );
		}
		if ( isset( $att['width'] ) ) {
			$size = array( $att['width'], 99999 );
			unset( $att['width'] );
		}
		return wp_get_attachment_image( $id, $size, false, $att );
	}

	if ( $id ) {
		/* ファイル存在チェック
		 * $id = /images/seko/289-2-t.jpg のようなパスでここに渡ってくるので
		 * get_stylesheet_directory_uri()のようなhttpで絶対パスを指定せず
		 * dirname(__FILE__)でチェック
		 */
		if( file_exists( dirname(__FILE__) . "$id" ) ) {
			return sprintf(
				'<img src="%1$s%2$s"%3$s%4$s%5$s />',
				get_stylesheet_directory_uri(),
				$id,
				( $att['width' ] ? ' width="' .$att['width' ].'"' : '' ),
				( $att['height'] ? ' height="'.$att['height'].'"' : '' ),
				( $att['alt'   ] ? ' alt="'   .$att['alt'   ].'"' : '' )
			);
		}
	}

	return '';
}
function gr_get_image_src( $key ) {
	$id = gr_image_id( $key );
	$src = '';

	if ( is_numeric( $id ) ) {
		@list( $src, $width, $height ) = wp_get_attachment_image_src( $id, $size, false );
	} else if ( $id ) {
		$src = get_stylesheet_directory_uri() . $id;
	}
	return $src;
}
//---------------------------------------------------------------------------
//end インポート画像の読み込み
//---------------------------------------------------------------------------


//---------------------------------------------------------------------------
//共通部分テンプレ
//---------------------------------------------------------------------------

// PC版問い合わせバナー
function pc_contact_banner() {
?>

<section>
<div id="contact_bnr" class="clearfix">
<h2>お問い合わせ</h2>
<div class="inner">
<div class="left">
<p class="read">
資料のご請求・お問い合わせなど、<br />
まずは下記よりお気軽にご連絡ください。
</p>
<img src="<?php bloginfo('template_directory'); ?>/img/common/pc_contact_tel.png" width="302" height="46" />
<p class="opentime">受付時間 : 9:00～18:00 | 定休日 : 水曜・日曜・祝日</p>
</div>
<div class="right">
<a href="<?php echo site_url(); ?>/book"><img src="<?php bloginfo('template_directory'); ?>/img/common/pc_contact_btn_book_out.png" alt="資料請求" width="100" height="100" /></a>
<a href="<?php echo site_url(); ?>/contact"><img src="<?php bloginfo('template_directory'); ?>/img/common/pc_contact_btn_contact_out.png" alt="お問い合わせ" width="131" height="222" /></a>
</div>
</div>
</div>
</section>

<?php
}
// SP版問い合わせバナー
function sp_contact_banner() {
?>

	<p class="common_tel_bnr sp_only">
		<a href="tel:0120309171"><img src="<?php echo get_template_directory_uri(); ?>/images/common/tel.gif" alt="ここをタップで電話をかけれます" width="520" height="141"></a>
	</p>
<?php
}

// 回遊バナー
function gr_kaiyu_banner() {
?>
<article class="common_about">
	<div>
		<h3 class="t_tit center"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/about/tit.png" alt="ハッピーホームについて" width="454" height="50"></h3>
	<p class="top_com_pic inner_wrap" style="margin-bottom: 30px"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/about/pic_pc.jpg" class="sp-img">
	</p>
		<ul class="bnr inner_wrap">
			<li><a href="<?php bloginfo('url'); ?>/company">会社概要</a></li>
			<li><a href="<?php bloginfo('url'); ?>/media">メディア掲載実績</a></li>
			<li><a href="<?php bloginfo('url'); ?>/event">イベント情報</a></li>
			<li><a href="<?php bloginfo('url'); ?>/fukuyamaminami">体験型ショールーム　<span>福山南店</span></a></li>
			<li><a href="<?php bloginfo('url'); ?>/voice">お客様の声</a></li>
			<li><a href="<?php bloginfo('url'); ?>/recruit/syokunin">自社職人募集</a></li>
		</ul>
	</div>
</article>

<?php
}

// 回遊バナー
function gr_seko_kaiyu() {
?>

		<section class="t_seko_cate">
			<div>
			<h3 class="cate_tit"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catConTitle.png" alt="カテゴリ別に事例を見る" width="454" height="50"></h3>
			<div class="catBox">
				<ul class="inner_wrap">
					<li><a href="<?php bloginfo('url'); ?>/seko_cat/kitchen"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catKitchin.png" alt="キッチン" width="96" height="124" class="img_over" ></a></li>
					<li><a href="<?php bloginfo('url'); ?>/seko_cat/ohuro"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catBath.png" alt="お風呂" width="85" height="123" class="img_over"></a></li>
					<li><a href="<?php bloginfo('url'); ?>/seko_cat/toilet"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catToilet.png" alt="トイレ" width="85" height="124" class="img_over"></a></li>
					<li><a href="<?php bloginfo('url'); ?>/seko_cat/senmen"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catWash.png" alt="洗面" width="85" height="123" class="img_over"></a></li>
					<li><a href="<?php bloginfo('url'); ?>/seko_cat/exterior"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catStructure.png" alt="外構・エクステリア" width="206" height="124" class="img_over"></a></li>
					<li><a href="<?php bloginfo('url'); ?>/seko_cat/gaiheki"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catOutWall.png" alt="外壁・屋根" width="119" height="123" class="img_over"></a></li>
					<li><a href="<?php bloginfo('url'); ?>/seko_cat/genkan"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catEntrance.png" alt="玄関" width="85" height="124" class="img_over"></a></li>
					<li><a href="<?php bloginfo('url'); ?>/seko_cat/living"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catliving.png" alt="リビング・内装" width="158" height="123" class="img_over"></a></li>
					<li><a href="<?php bloginfo('url'); ?>/seko_cat/taishin"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catResistance.png" alt="耐震" width="85" height="125" class="img_over"></a></li>
					<li><a href="<?php bloginfo('url'); ?>/seko_cat/other"><img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catOther.png" alt="その他" width="85" height="123" class="img_over"></a></li>
				</ul>

				<ul>
					<li>
						<a href="<?php bloginfo('url'); ?>/renovation">
							<img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catBigconEx.png" alt="大型施工事例">
						</a>
					</li>
					<li>
						<a href="<?php bloginfo('url'); ?>/seko">
							<img src="<?php echo get_template_directory_uri(); ?>/page_image/top/seko/catNewConEx.png" alt="最新施工事例">
						</a>
					</li>
				</ul>
			</div>

<?php if ( is_home() || is_front_page() ) : ?>
<!--<p class="more"><a href="<?php bloginfo('url'); ?>/seko" class="more_btn1">施工事例をもっと見る</a></p>-->
<?php endif; ?>
			</div>
		</section>

<?php
}

// 商品ラインナップ

function lineup_banner() {
?>

<section>
<div id="line_up" class="clearfix">
<h2 class="icon_home"><img src="<?php bloginfo('template_directory'); ?>/img/common/icon_home.png">商品ラインナップ<span><?php if(!wp_is_mobile()): ?>―<?php endif; ?>弊社がご提案する「安心・安全」×「デザイン性」を<?php if(wp_is_mobile()): ?><br /><?php endif; ?>実現する商品</span></h2>

<div class="box">
<a href="<?php echo site_url(); ?>/lineup/jupiter"><img src="<?php bloginfo('template_directory'); ?>/img/common/lineup_01.jpg" width="202" height="224" alt="ジュピターキューブ" /></a>
<p>ジュピターキューブ機能と<br />デザインが融合する美しい住まい</p>
</div>

<div class="box">
<a href="<?php echo site_url(); ?>/lineup/symphony"><img src="<?php bloginfo('template_directory'); ?>/img/common/lineup_02.jpg" width="202" height="224" alt="シンフォニー" /></a>
<p>今、寄棟が新しい！</p>
</div>

<div class="box">
<a href="<?php echo site_url(); ?>/lineup/just"><img src="<?php bloginfo('template_directory'); ?>/img/common/lineup_03.jpg" width="202" height="224" alt="ジャスト" /></a>
<p>コーディネートで可能になる<br />あなただけのJUST</p>
</div>
<br clear="all">
<div class="box">
<a href="<?php echo site_url(); ?>/lineup/fc003"><img src="<?php bloginfo('template_directory'); ?>/img/common/lineup_04.jpg" width="202" height="224" alt="FC003" /></a>
<p>光と風を感じる快適な住まい</p>
</div>

<div class="box">
<a href="<?php echo site_url(); ?>/lineup/hiraya"><img src="<?php bloginfo('template_directory'); ?>/img/common/lineup_05.jpg" width="202" height="224" alt="HIRAYA" /></a>
<p>上質ワンフロアに住む</p>
</div>



<?php if(!wp_is_mobile()): ?><hr class="kugiri" /><?php endif; ?>

</div>
</section>

<?php
}


// バナーその1

function banner_one() {
?>

<section>
<div id="bnr_list_one" class="clearfix">
<div class="inner">
<a href="<?php echo site_url(); ?>/concept" class="concept"><img src="<?php bloginfo('template_directory'); ?>/img/common/bnr_concept.jpg" width="560" height="127" alt="家づくりのコンセプト" /></a>
<a href="<?php echo site_url(); ?>/nagare" class="nagare"><img src="<?php bloginfo('template_directory'); ?>/img/common/bnr_nagare.jpg" width="560" height="127" alt="家づくりの流れ" /></a>
</div>
</div>
</section>

<?php
}

//---------------------------------------------------------------------------
//end 共通部分テンプレ
//---------------------------------------------------------------------------


//来店予約
function my_form_tag_filter($tag) {
    if (!is_array($tag))
    return $tag;

    //今日の日付を取得
    $today_y = date('Y');
    $today_m = date('n');
    $today_d = date('j');
     //今年をdefaultの数字に置き換え
     $default = $today_y - 2016;

    //取得した今日の日付をデフォルト値としてセット
    $name = $tag['name'];
    if ($name == 'custom_m1') {
        $tag['options'][0] = 'default:'.$today_m;
    }
    if ($name == 'custom_m2') {
        $tag['options'][0] = 'default:'.$today_m;
    }
    if ($name == 'custom_m3') {
        $tag['options'][0] = 'default:'.$today_m;
    }
    if ($name == 'custom_d1') {
        $tag['options'][0] = 'default:'.$today_d;
    }
    if ($name == 'custom_d2') {
        $tag['options'][0] = 'default:'.$today_d;
    }
    if ($name == 'custom_d3') {
        $tag['options'][0] = 'default:'.$today_d;
    }
     if ($name == 'custom_y1') {
        $tag['options'][0] = 'default:'.$default;
    }
     if ($name == 'custom_y2') {
        $tag['options'][0] = 'default:'.$default;
    }
     if ($name == 'custom_y3') {
        $tag['options'][0] = 'default:'.$default;
    }
   return $tag;
}
add_filter('wpcf7_form_tag', 'my_form_tag_filter', 11);




//contactform7プラグインに記事のカスタムフィールドの値を挿入
add_filter('wpcf7_special_mail_tags', 'my_special_mail_tags',10,2);
function my_special_mail_tags($output, $name)
{
    if ( ! isset( $_POST['_wpcf7_unit_tag'] ) || empty( $_POST['_wpcf7_unit_tag'] ) )
        return $output;
    if ( ! preg_match( '/^wpcf7-f(\d+)-p(\d+)-o(\d+)$/', $_POST['_wpcf7_unit_tag'], $matches ) )
        return $output;

    $post_id = (int) $matches[2];//開催日
    if ( ! $post = get_post( $post_id ) )
        return $output;
    $name = preg_replace( '/^wpcf7\./', '_', $name );
    if ( 'event_date_check' == $name )
        $output = get_post_meta($post->ID,'event_date',true);

    $post_id = (int) $matches[2];//開催時間
    if ( ! $post = get_post( $post_id ) )
        return $output;
    $name = preg_replace( '/^wpcf7\./', '_', $name );
    if ( 'event_time_check' == $name )
        $output = get_post_meta($post->ID,'event_time',true);

    $post_id = (int) $matches[2];//開催場所
    if ( ! $post = get_post( $post_id ) )
        return $output;
    $name = preg_replace( '/^wpcf7\./', '_', $name );
    if ( 'event_place_check' == $name )
        $output = get_post_meta($post->ID,'event_place',true);

    $post_id = (int) $matches[2];//開催場所郵便番号
    if ( ! $post = get_post( $post_id ) )
        return $output;
    $name = preg_replace( '/^wpcf7\./', '_', $name );
    if ( 'event_zip_check' == $name )
        $output = get_post_meta($post->ID,'event_zip',true);

    $post_id = (int) $matches[2];//開催場所住所
    if ( ! $post = get_post( $post_id ) )
        return $output;
    $name = preg_replace( '/^wpcf7\./', '_', $name );
    if ( 'event_add_check' == $name )
        $output = get_post_meta($post->ID,'event_add',true);

    return $output;

    if ( ! isset( $_POST['_wpcf7_unit_tag'] ) || empty( $_POST['_wpcf7_unit_tag'] ) )
        return $output;
    if ( ! preg_match( '/^wpcf7-f(\d+)-p(\d+)-o(\d+)$/', $_POST['_wpcf7_unit_tag'], $matches ) )
        return $output;

}


//記事内の最初の画像を取得する
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png))[\"'][^>]+>/i", $post->post_content, $matches);
    $first_img = $matches [1] [0];

if(empty($first_img)){ //Defines a default image
        $first_img = "/wp/wp-content/themes/reform/images/common/noimage.gif";
    }
    return $first_img;
}

//ビジュアルエディタの余計な機能を無効化
function override_mce_options( $init_array ) {
    global $allowedposttags;

    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';
    $init_array['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
    $init_array['indent']                  = true;
    $init_array['wpautop']                 = false;
    $init_array['force_p_newlines']        = false;

    return $init_array;
}

add_filter( 'tiny_mce_before_init', 'override_mce_options' );


//写真リサイズ
add_image_size( 'w200', 200, 999, false );//width200　トリミング無し
add_image_size( 'w320', 320, 999, false );//width320　トリミング無し
add_image_size( 'w500', 500, 999, false );//width500　トリミング無し
add_image_size( 'w800', 800, 999, false );//width800　トリミング無し


//カレンダー
function widget_customCalendar($args) {
	extract($args);
	echo $before_widget;
	echo get_calendar_custom(カスタム投稿名);
	echo $after_widget;
}


function get_calendar_custom($posttype,$initial = true) {
	global $wpdb, $m, $monthnum, $year, $wp_locale, $posts;

	$key = md5( $m . $monthnum . $year );
	if ( $cache = wp_cache_get( 'get_calendar_custom', 'calendar_custom' ) ) {
		if ( isset( $cache[ $key ] ) ) {
			echo $cache[ $key ];
			return;
		}
	}

	ob_start();
	// Quick check. If we have no posts at all, abort!
	if ( !$posts ) {
		$gotsome = $wpdb->get_var("SELECT ID from $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT 1");
		if ( !$gotsome )
			return;
	}

	if ( isset($_GET['w']) )
		$w = ''.intval($_GET['w']);

	// week_begins = 0 stands for Sunday
	$week_begins = intval(get_option('start_of_week'));

	// Let's figure out when we are
	if ( !empty($monthnum) && !empty($year) ) {
		$thismonth = ''.zeroise(intval($monthnum), 2);
		$thisyear = ''.intval($year);
	} elseif ( !empty($w) ) {
		// We need to get the month from MySQL
		$thisyear = ''.intval(substr($m, 0, 4));
		$d = (($w - 1) * 7) + 6; //it seems MySQL's weeks disagree with PHP's
		$thismonth = $wpdb->get_var("SELECT DATE_FORMAT((DATE_ADD('${thisyear}0101', INTERVAL $d DAY) ), '%m')");
	} elseif ( !empty($m) ) {
		$thisyear = ''.intval(substr($m, 0, 4));
		if ( strlen($m) < 6 )
				$thismonth = '01';
		else
				$thismonth = ''.zeroise(intval(substr($m, 4, 2)), 2);
	} else {
		$thisyear = gmdate('Y', current_time('timestamp'));
		$thismonth = gmdate('m', current_time('timestamp'));
	}

	$unixmonth = mktime(0, 0 , 0, $thismonth, 1, $thisyear);

	// Get the next and previous month and year with at least one post
	$previous = $wpdb->get_row("SELECT DISTINCT MONTH(post_date) AS month, YEAR(post_date) AS year
		FROM $wpdb->posts
		LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
		LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)

		WHERE post_date < '$thisyear-$thismonth-01'

		AND post_type = '$posttype' AND post_status = 'publish'
			ORDER BY post_date DESC
			LIMIT 1");

	$next = $wpdb->get_row("SELECT	DISTINCT MONTH(post_date) AS month, YEAR(post_date) AS year
		FROM $wpdb->posts
		LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
		LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)

		WHERE post_date >	'$thisyear-$thismonth-01'

		AND MONTH( post_date ) != MONTH( '$thisyear-$thismonth-01' )
		AND post_type = '$posttype' AND post_status = 'publish'
			ORDER	BY post_date ASC
			LIMIT 1");

	echo '<div id="calendar_wrap">
	<table id="wp-calendar" summary="' . __('Calendar') . '">
	<caption>' . date('Y年n月', $unixmonth) . '</caption>
	<thead>
	<tr>';

	$myweek = array();

	for ( $wdcount=0; $wdcount<=6; $wdcount++ ) {
		$myweek[] = $wp_locale->get_weekday(($wdcount+$week_begins)%7);
	}

	foreach ( $myweek as $wd ) {
		$day_name = (true == $initial) ? $wp_locale->get_weekday_initial($wd) : $wp_locale->get_weekday_abbrev($wd);
		echo "\n\t\t<th abbr=\"$wd\" scope=\"col\" title=\"$wd\">$day_name</th>";
	}

	echo '
	</tr>
	</thead>

	<tfoot>
	<tr>';

	echo '
	</tr>
	</tfoot>
	<tbody>
	<tr>';

	// Get days with posts
	$dyp_sql = "SELECT DISTINCT DAYOFMONTH(post_date)
		FROM $wpdb->posts

		LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
		LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)

		WHERE MONTH(post_date) = '$thismonth'

		AND YEAR(post_date) = '$thisyear'
		AND post_type = '$posttype' AND post_status = 'publish'
		AND post_date < '" . current_time('mysql') . "'";

	$dayswithposts = $wpdb->get_results($dyp_sql, ARRAY_N);

	if ( $dayswithposts ) {
		foreach ( (array) $dayswithposts as $daywith ) {
			$daywithpost[] = $daywith[0];
		}
	} else {
		$daywithpost = array();
	}

	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false || strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'camino') !== false || strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'safari') !== false)
		$ak_title_separator = "\n";
	else
		$ak_title_separator = ', ';

	$ak_titles_for_day = array();
	$ak_post_titles = $wpdb->get_results("SELECT post_title, DAYOFMONTH(post_date) as dom "
		."FROM $wpdb->posts "

		."LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id) "
		."LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id) "

		."WHERE YEAR(post_date) = '$thisyear' "

		."AND MONTH(post_date) = '$thismonth' "
		."AND post_date < '".current_time('mysql')."' "
		."AND post_type = '$posttype' AND post_status = 'publish'"
	);
	if ( $ak_post_titles ) {
		foreach ( (array) $ak_post_titles as $ak_post_title ) {

				$post_title = apply_filters( "the_title", $ak_post_title->post_title );
				$post_title = str_replace('"', '&quot;', wptexturize( $post_title ));

				if ( empty($ak_titles_for_day['day_'.$ak_post_title->dom]) )
					$ak_titles_for_day['day_'.$ak_post_title->dom] = '';
				if ( empty($ak_titles_for_day["$ak_post_title->dom"]) ) // first one
					$ak_titles_for_day["$ak_post_title->dom"] = $post_title;
				else
					$ak_titles_for_day["$ak_post_title->dom"] .= $ak_title_separator . $post_title;
		}
	}

	// See how much we should pad in the beginning
	$pad = calendar_week_mod(date('w', $unixmonth)-$week_begins);
	if ( 0 != $pad )
		echo "\n\t\t".'<td colspan="'.$pad.'" class="pad">&nbsp;</td>';

	$daysinmonth = intval(date('t', $unixmonth));
	for ( $day = 1; $day <= $daysinmonth; ++$day ) {
		if ( isset($newrow) && $newrow )
			echo "\n\t</tr>\n\t<tr>\n\t\t";
		$newrow = false;

		if ( $day == gmdate('j', (time() + (get_option('gmt_offset') * 3600))) && $thismonth == gmdate('m', time()+(get_option('gmt_offset') * 3600)) && $thisyear == gmdate('Y', time()+(get_option('gmt_offset') * 3600)) )
			echo '<td id="today">';
		else
			echo '<td>';

		if ( in_array($day, $daywithpost) ) // any posts today?
				echo '<a href="' .  $home_url . '/' . $posttype .  '/date/' . $thisyear . '/' . $thismonth . '/' . $day . "\">$day</a>";
		else
			echo $day;
		echo '</td>';

		if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins) )
			$newrow = true;
	}

	$pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins);
	if ( $pad != 0 && $pad != 7 )
		echo "\n\t\t".'<td class="pad" colspan="'.$pad.'">&nbsp;</td>';

	echo "\n\t</tr>\n\t</tbody>\n\t</table></div>";

	echo "\n\t<div class=\"calender_navi\"><table cellspacing=\"0\" cellpadding=\"0\"><tr>";

	if ( $previous ) {
		echo "\n\t\t".'<td abbr="' . $wp_locale->get_month($previous->month) . '" colspan="3" id="prev"><a href="' .  $home_url . '/' . $posttype .  '/date/' . $previous->year . '/' . $previous->month . '" title="' . sprintf(__('View posts for %1$s %2$s'), $wp_locale->get_month($previous->month),			date('Y', mktime(0, 0 , 0, $previous->month, 1, $previous->year))) . '">&laquo; ' . $wp_locale->get_month_abbrev($wp_locale->get_month($previous->month)) . '</a></td>';
	} else {
		echo "\n\t\t".'<td colspan="3" id="prev" class="pad">&nbsp;</td>';
	}

	echo "\n\t\t".'<td class="pad">&nbsp;</td>';

	if ( $next ) {
		echo "\n\t\t".'<td abbr="' . $wp_locale->get_month($next->month) . '" colspan="3" id="next_month"><a href="' .  $home_url . '/' . $posttype .  '/date/' . $next->year . '/' . $next->month . '" title="' . sprintf(__('View posts for %1$s %2$s'), $wp_locale->get_month($next->month),			date('Y', mktime(0, 0 , 0, $next->month, 1, $next->year))) . '">' . $wp_locale->get_month_abbrev($wp_locale->get_month($next->month)) . ' &raquo;</a></td>';
	} else {
		echo "\n\t\t".'<td colspan="3" id="next" class="pad">&nbsp;</td>';
	}
	echo "\n\t</tr></table></div>";

	$output = ob_get_contents();
	ob_end_clean();
	echo $output;
	$cache[ $key ] = $output;
	wp_cache_set( 'get_calendar_custom', $cache, 'calendar_custom' );
}
//カレンダー
function get_post_number( $post_type = 'post', $op = '<=' ) {
    global $wpdb, $post;
    $post_type = is_array($post_type) ? implode("','", $post_type) : $post_type;
    $number = $wpdb->get_var("
        SELECT COUNT( * )
        FROM $wpdb->posts
        WHERE post_date {$op} '{$post->post_date}'
        AND post_status = 'publish'
        AND post_type = ('{$post_type}')
    ");
    return $number;
}
?>
