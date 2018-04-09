<h2>loop2</h2>
<!-- Loop pour post de base -> articles -->
 <?php if(have_posts()): ?>
	<section class="">	
	<?php while(have_posts()): the_post() ?>
	<?php $class[]='post'; ($f = get_post_format($post->ID))? $class[]=$f : null; (is_sticky())? $class[]='sticky' : null; ?>
	<article <?php echo 'class="'.implode(' ', $class).'"' ; $class=[]; ?> >
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php if (has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('thumbnail-column', ['class' => 'post__img-thumbnail post__pull-left',]); ?>
        </a>
    	<?php endif; ?>
		<?php the_excerpt(); ?>
		<p>auteur: <?php the_author_posts_link(); ?></p>
		<?php the_category(); ?>
	</article>
	<?php endwhile; ?>	
	</section>
	<?php else: ?>
	<p class="nofound">Aucun article pour l'instant</p>
<?php endif; ?>