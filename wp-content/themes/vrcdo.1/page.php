<?php get_header(); ?>
<div id="sitecontent">
        <div id="content">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="entry">
                        <!-- the table container forces the entry height to be at least as high as images require -->
                        <table class="entry_wrapper"><tr><td style="border: none">
                        <?php the_content(__('<p>Read more &raquo;</p>')); ?>
                        </td></tr></table>
                        <div class="entry_meta">
                            <?php $arc_year = get_the_time('Y'); $arc_month = get_the_time('m'); $arc_day = get_the_time('d'); ?>
                            <a href="<?php echo get_day_link("$arc_year", "$arc_month", "$arc_day"); ?>"><?php the_time('F jS, Y') ?></a>
                            <?php if ( comments_open() ) : ?>
                                | <a href="<?php comments_link(); ?>"><?php comments_number('No Comments','One Comment','% Comments'); ?></a>
                            <?php endif; ?>
                            <?php edit_post_link('Edit', '<span class="editlink"> | ', '</span>'); ?>
                            <?php wp_link_pages(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php if ( comments_open() ) : ?>
                <div class="comments">
                    <?php comments_template(); ?>
                </div>
                <?php endif; ?>
                <div id="more_entries">
                    <div class="alignleft"><?php next_posts_link('&laquo; Previous Posts') ?></div>
                    <div class="alignright"><?php previous_posts_link('Next Posts &raquo;') ?></div>
                </div>
            <?php else : ?>
                <div id="entry_search">    
                    <h2>Page Not Found</h2>
                    <p>
                        Sorry, but you are looking for something that isn't here. Try searching for
                        a particular post below, or press the <i>Home</i> button above to go back to the
                        main page.
                    </p>
                    <?php include (TEMPLATEPATH . "/searchform.php"); ?>
                </div>
            <?php endif; ?>
        </div>
</div>
<?php get_footer(); ?>
