<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>


  <div class="main-container wrap container" role="document">
    <div class="content row">
      <main class="main wrapper clearfix" role="main">
        <article>
        <?php include roots_template_path(); ?>
        </article>
        <?php if (!is_page()) : ?>
          <aside class="sidebar" role="complementary">
            <?php dynamic_sidebar('sidebar-primary'); ?>
            <?php if (current_user_can('manage_options')) : ?>
              <section>
                <h3>Admin</h3>
                <ul>
                  <li><a href="/wp-admin/">Dashboard</a></li>
                  <li><a href="/wp-admin/edit.php">Posts</a></li>
                  <li><a href="/wp-admin/edit.php?post_type=page">Pages</a></li>
                  <li><a href="/wp-admin/upload.php">Media</a></li>
                  <li><a href="/wp-admin/options-general.php">Settings</a></li>
                </ul>
              </section>
            <?php endif; ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </main><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>

</body>
</html>