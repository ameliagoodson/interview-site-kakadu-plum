<div class="container container-article">
    <header class="content-header">
        <div class="meta mb-3">
            <h3>
                <?php the_title() ?>
            </h3>
            <span class="date"><?php the_date() ?></span>
            tag</span>
            <?php the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>') ?>

            <span class="comment"><a href="#comments"><i class='fa fa-comment'></i>
                    <?php comments_number(); ?>
                </a></span>
        </div>
    </header>
    <?php
    the_content()
        ?>
    <?php
    comments_template();
    ?>
</div>