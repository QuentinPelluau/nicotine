<?php get_header(); ?>
<div class="main">
	<div class="grid-2">
		<div class="post">
		<?php if(have_posts()): ?>
			<section class="main">
			<?php while(have_posts()): the_post() ?>
				<article>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>	
			</section>
		<?php else: ?>
			<p class="nofound">Aucun article pour l'instant</p>
		<?php endif; ?>
		</div><!-- post -->
		<div class="sidebar">
		<?php get_sidebar(); ?>
		</div>
	</div><!-- grid-2 -->
</div><!-- main -->
<?php get_footer(); ?>