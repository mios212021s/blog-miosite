<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <?php get_header(); ?>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div id="pickup" class="wrapper">
  </div>
  <div id="container" class="wrapper">
      <main>
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <article>
            <h2 class="article-title"><a href="#"><?php the_title(); ?></a></h2>
            <ul class="meta">
                <li><?php the_date(); ?></li>
                <?php the_category(); ?>
            </ul>
            <a href="#">
                <?php if(has_post_thumbnail()): ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_the_title(); ?>">
                <?php else: ?>
                    <img src="http://localhost:10003/wp-content/themes/mioblog/assets/img/home-bg.jpg" alt="">
                <?php endif; ?></a>
            <p class="text">
              <?php the_content(); ?>
            </p>
            <div class="readmore">
            <?php previous_post_link('<< %link', '前の記事へ'); ?>
            <?php next_post_link('%link >>', '次の記事へ'); ?>
            </div>
            </article>
            <?php endwhile;?>
        <?php endif; ?>

      </main>
        <?php get_sidebar(); ?>
    </div>

    <footer id="footer">
      <?php get_footer(); ?>
    </footer>
  </body>
</html>
