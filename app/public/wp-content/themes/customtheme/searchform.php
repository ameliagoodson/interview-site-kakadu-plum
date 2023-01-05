<?php
?>
<!-- name="s" is the search query that is passed -->
<div class="form-div">
    <form role="search" method="get" class="form-inline search-form my-2 my-lg-0"
        action="<?php echo esc_url(home_url('/')); ?>">
        <span class="screen-reader-text">
            <?php echo _x('Search for:', 'label'); ?>
        </span>
        <input type="search" class="form-control mr-sm-2" value="<?php the_search_query(); ?>" aria-label="Search"
            placeholder="<?php echo esc_attr_x('Search', 'placeholder'); ?>" name="s" />
        <button type="submit" class="btn-search">
            <?php echo esc_attr_x('Search', 'submit button'); ?>
        </button>
    </form>
</div>