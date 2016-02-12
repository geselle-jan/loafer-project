<section class="gallery">
<?php
global $post;
$loop = new WP_Query( array(
    'post_type' => 'photos',
    'posts_per_page' => -1
) );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="photo">
        <?php the_post_thumbnail(); ?>
    </a>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</section>