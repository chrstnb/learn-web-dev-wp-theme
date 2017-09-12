  <div id="side">
  <div class="stuff">
  <?php

    if (is_page() && $post->post_parent > 0) {
         $parento = wp_get_post_parent_id( $post_ID );
         $args = array(
            'post_type'      => 'page',
            'posts_per_page' => -1,
            'post_parent'    => $parento,
            'order'          => 'ASC',
            'orderby'        => 'menu_order'
         );
    } else {
        $args = array(
            'post_type'      => 'page',
            'posts_per_page' => -1,
            'post_parent'    => $post->ID,
            'order'          => 'ASC',
            'orderby'        => 'menu_order'
         );
    }
        $parent = new WP_Query( $args );

        if ( $parent->have_posts() ) : ?>

            <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

                <div id="parent-<?php the_ID(); ?>" class="parent-page">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                </div>

            <?php endwhile; ?>

        <?php endif; ?>
        </div>
        </div>
