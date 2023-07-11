add_action('wp_ajax_myfilter', 'homutov_filter');
add_action('wp_ajax_nopriv_myfilter', 'homutov_filter');

function homutov_filter(){


    $args[ 'tax_query' ] = array(
        array(
            //'taxonomy' => 'category',
            'post_status' => 'publish'
        )
    );

    if ( $_POST[ 'categoryfilter' ] != 'all' ) {
        $args[ 'tax_query' ] = array(
            'post_status' => 'publish',
            array(
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $_POST[ 'categoryfilter' ],
            )
        );
    }

    query_posts( $args );

    if ( have_posts() ) {
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
        endwhile;
    } else {
        echo 'Ничего не найдено';
    }

    die();
}
