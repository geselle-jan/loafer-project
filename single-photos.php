<?php the_post(); ?>
<article <?php post_class(); ?>>
    <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
        <p><a target="_blank" href="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0]; ?>"><?php the_post_thumbnail( 'photo' ); ?></a></p>
        <?php the_content(); ?>
    </div>
</article>