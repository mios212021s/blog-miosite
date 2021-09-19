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

            <?php /*--- カテゴリーが階層化している場合に対応させる --- */ ?>
            <?php $postcat = get_the_category(); ?>
            <?php $catid = $postcat[0]->cat_ID; ?>
            <?php $allcats = array($catid); ?>
            <?php
            while(!$catid==0) {    /* すべてのカテゴリーIDを取得し配列にセットするループ */
                $mycat = get_category($catid);     /* カテゴリーIDをセット */
                $catid = $mycat->parent;     /* 上で取得したカテゴリーIDの親カテゴリーをセット */
                array_push($allcats, $catid);
            }
            array_pop($allcats);
            $allcats = array_reverse($allcats);
            ?>
            <?php /*--- 親カテゴリーがある場合は表示させる --- */ ?>
            <?php foreach($allcats as $catid): ?>
                <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a href="<?php echo get_category_link($catid); ?>" itemprop="url">
                        <span itemprop="title"><?php echo get_cat_name($catid); ?></span>
                    </a> ›
                </div>
            <?php endforeach; ?>
            <?php if(have_posts()): while(have_posts()):the_post(); ?>
            <article>
                <h2 class="article-title"><a href="#"><?php the_title(); ?></a></h2>
                <ul class="meta">
                    <li><a href="#"><?php echo get_the_date(); ?></a></li>
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
            <?php endwhile; endif; ?>
        </div>
    </main>
    <?php get_sidebar(); ?>
    </div>

    <footer id="footer">
      <?php get_footer(); ?>
    </footer>
  </body>
</html>
