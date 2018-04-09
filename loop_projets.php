<div class="grid-2 has-gutter-xl">
	<?php
	//LOOP CPT & METABOX
		$projets = new WP_Query(array(
			'post_type' => 'projets',
			'posts_per_page' => -1 //show all posts
		));
		if($projets->have_posts()): 
		while($projets->have_posts()): $projets->the_post() ?>

		<div class="projet">
			<div class="projet-info">
				<div class="info-title"><a href="<?php the_permalink(); ?>"><h3 class=""><?php the_title(); ?></h3></a></div>
				<div class="info-background"></div>
			</div>

			<?php  the_post_thumbnail('full')  // a remplacer par screenshot ?>

		</div>

	<?php endwhile; endif; wp_reset_postdata(); wp_reset_query(); ?>

	<!-- color picker -->
</div>


