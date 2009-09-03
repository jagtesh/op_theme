<?php get_header(); ?>

<div id="content" class="section">
<?php bf_above_content() ?>

<?php bf_above_index_news(); ?>

<?php wp_reset_query(); 
query_posts( 'cat=' . bf_get_option('news_cat') . '&paged=' . $paged );
if ( have_posts() ) : ?>

<div class="hfeed news-list clearfix">
<?php while (have_posts()) : the_post() ?>
	<div <?php bf_post_class() ?>>
        <?php bf_postheader() ?>
		
        <div class="entry-content clearfix">
		<?php bf_postmeta() ?>
		<?php the_content( __('<span>Read More &rarr;</span>', 'buffet') ); ?>
		<?php wp_link_pages(array('before' => __('<p class="entry-nav"><strong>Pages:</strong> ', 'buffet'), 
			'after' => '</p>', 'next_or_number' => 'number')); ?>
        </div><!-- .entry-content -->
        
		<!-- <?php trackback_rdf() ?> -->
		
		<!-- comments -->
		<?php global $id, $post; ?>
		<ul class="entry-links clearfix">
		    <li><a href="<?php echo get_comments_link(); ?>"><?php echo __('Comments', 'buffet') .' ['. get_comments_number() . ']'; ?></a></li>
		</ul>
    </div>
<?php endwhile; ?>
</div><!-- .hfeed -->

<?php endif; ?>

<?php bf_below_index_news(); ?>

<?php bf_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>