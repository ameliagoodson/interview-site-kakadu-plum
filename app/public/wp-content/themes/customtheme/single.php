<?php
get_header()
    ?>
    <div class="row">
        <article class="article-recipe">
            <?php
            // The 'Loop' - iterates over WP posts to display then displays its content
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content', 'article');
                }
            }
            ?>
        </article>
        <?php
        get_footer()
            ?>