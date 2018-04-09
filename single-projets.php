<?php get_header(); ?>

<?php if (have_posts()): ?>
<section class="main">
<?php while (have_posts()): the_post() ?>
<article>
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<?php the_excerpt(); ?>
<?php
//appel meta
$meta = get_post_meta($post->ID, '_al_meta_conf', true);
echo (!empty($meta['title'])) ? "<h2>salle {$meta['title']}</h2>": '';
echo (!empty($meta['lat']) && !empty($meta['lng']))? "<p> lat:{$meta['lat']}, lng: {$meta['lng']} </p>" : '' ; ?>
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