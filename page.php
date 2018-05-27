<?php get_header(); ?>
		<?php if(have_posts()): ?>
			<?php while(have_posts()): the_post() ?>
					<?php the_content(); ?>
			<?php endwhile; ?>	
		<?php else: ?>
			<p class="nofound">Aucun article pour l'instant</p>
		<?php endif; ?>
<?php get_footer(); ?>