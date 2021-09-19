<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <?php get_header(); ?>

  <body <?php body_class(); ?>>
      <?php wp_body_open(); ?>

    <div id="pickup" class="wrapper">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <article>
                <?php if(has_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_the_title(); ?>">
                        <?php else: ?>
                            <img src="http://localhost:10003/wp-content/themes/mioblog/assets/img/home-bg.jpg" alt="">
                        <?php endif; ?></a>
                <h2 class="article-title"><?php the_title(); ?></h2>
                <div class="readmore"><a href="#">READ MORE</a></div>
            </article>
            <?php endwhile;?>
        <?php endif; ?>

    </div>

    <div id="container" class="wrapper">
      <main>
      <div id="content" role="main">

        <p>アーカイブ：
            <?php if(is_month()): /* 月別アーカイブ */?>
                <span><?php echo get_query_var('year'); ?>年</span>
                <span><?php echo get_query_var('monthnum'); ?>月</span>
            <?php elseif(is_year()): /* 年別アーカイブ */ ?>
                <span><?php echo get_query_var('year'); ?>年</span>
            <?php endif; ?>
            の一覧ページです。
        </p>

        <?php
            $args = array(
                'post_type' => 'post', /* 投稿タイプ */
                'paged' => $paged
            );
        ?>
        <?php query_posts( $args ); ?>
            <ul>
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article>
                            <h2 class="article-title"><a href="#"><?php the_title(); ?></a></h2>
                            <ul class="meta">
                                <li><a href="#"><?php echo get_the_category() ?></a></li>
                            </ul>
                            <a href="<?php the_permalink(); ?>">
                                <?php if(has_post_thumbnail()): ?>
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_the_title(); ?>">
                                <?php else: ?>
                                    <img src="http://localhost:10003/wp-content/themes/mioblog/assets/img/home-bg.jpg" alt="">
                            <?php endif; ?></a>
                            <p class="text">
                                <?php the_excerpt(); ?>
                            </p>
                            <div class="readmore"><a href="<?php the_permalink(); ?>">READ MORE</a></div>
                        </article>
                    <?php endwhile;?>
                <?php endif; ?>
            </ul>

        </main>
    <?php get_sidebar(); ?>
    </div>

    <footer id="footer">
      <?php get_footer(); ?>
    </footer>
  </body>
</html>
