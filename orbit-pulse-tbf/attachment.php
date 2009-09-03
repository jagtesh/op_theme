<?php get_header(); ?>

<div id="content" class="section">
<?php bf_above_content() ?>

<?php if (have_posts()) : the_post(); ?>
	<?php bf_above_post() ?>
	<div <?php bf_post_class() ?>>
    
            <?php bf_postheader() ?>
			
            <div class="entry-content">
			<?php bf_postmeta() ?>
			
			<div class="attachment"><?php the_attachment_link($post->post_ID, false) ?></div>
			<?php the_content( __('<p>Read the rest of this entry &raquo;</p>', 'buffet') ); ?>
		
            <?php wp_link_pages(array('before' => __('<p><strong>Pages:</strong> ', 'buffet'), 
				'after' => '</p>', 'next_or_number' => 'number')); ?>
				
			</div><!-- .entry-content -->
            
			<?php bf_postfooter() ?>
    </div>
    
	<?php bf_below_post() ?>
	<a name="comments"></a>
    <?php comments_template('', true); ?>
	<?php bf_below_comments() ?>
    
<?php else: ?>

<?php bf_post_notfound() ?>

<?php endif; ?>

<?php bf_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>