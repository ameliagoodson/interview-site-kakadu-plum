<div class="container-archive">
    <div class="post">
        <div class="media">
            <img class="img-fluid post-thumb d-md-flex" src="<?php the_post_thumbnail_url('thumbnail') ?>" alt="image">
            <div class="media-body">
                <h3 class="title-archive">
                    <a href="<?php the_permalink() ?>">
                        <?php the_title() ?>
                    </a></h3>
                <div class="meta mb-1"><span class="date">
                        <?php the_date() ?>
                    </span><span class="time">
                        <?php echo do_shortcode('[rt_reading_time label="Reading Time:" postfix="minutes" postfix_singular="minute"]');?>
                    </span><span class="comment"><a href="#">
                            <?php comments_number() ?>
                        </a></span></div>
                <div class="intro"> <?php the_excerpt() ?></div>
                <a class="more-link" href="<?php the_permalink() ?>">Read more &rarr;</a>
            </div>
        </div>
    </div>
</div>