</div><!-- /.row -->
</div><!-- /.container -->

<footer class="blog-footer">
    <h1 class="footer-heading">Kakadu Plum</h1>
    <p><a href="#">Back to top</a></p>
    <?php wp_tag_cloud(
        array(
            // size of least used tag
            'smallest' => 14,
            // size of most used tag
            'largest' => 24,
            // unit for sizing the tags
            'unit' => 'px',
            // displays at most 45 tags
            'number' => 45,
            // order tags alphabetically
            'orderby' => 'name',
            // order tags by ascending order
            'order' => 'ASC',
            'taxonomy' => 'post_tag'
        )
    ); ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>