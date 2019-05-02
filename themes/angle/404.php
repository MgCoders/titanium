<?php get_header(); ?>

<div class="page-header">

    <div class="inner-wrap">

        <h1 class="archive-title"><?php _e('Error 404', 'wpzoom'); ?></h1>

    </div>
</div>


<div class="inner-wrap">

    <main id="main" class="site-main" role="main">

        <section class="post-wrap">

            <?php get_template_part( 'content', 'none' ); ?>

        </section><!-- .recent-posts -->

    </main><!-- .site-main -->

</div>
<?php
get_footer();
