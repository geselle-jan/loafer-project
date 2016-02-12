<section class="gallery">
<?php
global $post;
$loop = new WP_Query( array(
    'post_type' => 'photos',
    'posts_per_page' => -1
) );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <div class="photo">
        <h2><?php the_title(); ?></h2>
        <p><?php the_post_thumbnail(); ?></p>
        <p><?php the_content(); ?></p>
    </div>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</section>