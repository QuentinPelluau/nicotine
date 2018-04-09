<?php get_header(); ?>
<div class="main">
	<div class="grid-2">
		<div class="post">
		<?php get_template_part('loop'); ?>
		</div><!-- post -->
		<div class="sidebar">
		<?php get_sidebar(); ?>
		</div>
	</div><!-- grid-2 -->
</div><!-- main -->
<?php get_footer(); ?>