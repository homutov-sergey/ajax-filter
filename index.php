<div class="center" style="text-align: center">
    <?php $cats = get_terms( array('taxonomy' => 'category') ); ?>

    <form action="" method="POST" id="filtercat">
        <select name="categoryfilter" id="categoryfilter">
            <option value="all">Вибери категорию</option>
            <?php foreach ( $cats as $cat ) : ?>
                <option value="<?php echo $cat->term_id ?>"><?php echo $cat->name ?></option>
            <?php endforeach ?>
        </select>
<!--        <button>Фильтровать</button>-->
        <input type="hidden" name="action" value="myfilter">
    </form>

</div>

<div id="filterresult">
<?php

    $args = array(
        'post_status' => 'publish'
    );

query_posts( $args );

if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
	}

	// Previous/next page navigation.
	twenty_twenty_one_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );

}

?></div><?php
