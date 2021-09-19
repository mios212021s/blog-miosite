<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <meta name="description" content="テキストテキストテキストテキストテキストテキストテキストテキス">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost:10003/wp-content/themes/mioblog/css/styles.css">
    <link rel="stylesheet" href="http://localhost:10003/wp-content/themes/mioblog/css/custom.css">
</head>
<header id="header">
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <small><?php bloginfo( 'description' ); ?></small>
      <nav id="navi">
        <ul class="wrapper">
            <li>
                
                <?php wp_nav_menu( array(
                    'theme_location'=>'mainmenu', 
                    'container'     =>'', 
                    'menu_class'    =>'',
                    'items_wrap'    =>'<ul id="main-nav">%3$s</ul>'));
                ?>
            </li>
        </ul>
      </nav>
</header>

<?php wp_head(); ?>