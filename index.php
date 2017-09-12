<?php

  get_header();?>
<?php get_sidebar();?>
<div id="main" class='stuff2'>
  <div id="single-post-container"></div>
  <?php if (have_posts()): ?>

  <ol id="posts"><?php

    while (have_posts()) : the_post(); ?>

    <li class="postWrapper" id="post-<?php the_ID(); ?>">

      <h4 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>

      <div class="post"><?php the_content(__('(more...)')); ?></div>
    </li>
    <?php endwhile; ?>

  </ol>

<?php else: ?>

  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php

  endif;
  ?>

  
  </div>
  <?php
  get_footer();
?>