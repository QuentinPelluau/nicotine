	<article id="post-<?php the_ID(); ?>" <?php post_class( "bloc article_item hasvideo" ); ?>>
		<!-- <article <?php echo 'class="'.implode(' ', $class).'"' ; $class=[]; ?> > -->
			<div class="frontadmin-blog-article-wrapper">

				<!-- Post thumbnail -->
				<div class="post-thumbnail">
					<?php if (has_post_thumbnail()): ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('thumbnail-column', ['class' => 'post__img-thumbnail post__pull-left',]); ?>
						</a>
					<?php endif; ?>
				</div>

				<header class="entry-header">
					<div class="frontadmin-blog-article-wrapper">
						<?php
						if ( is_single() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( sprintf( '<h2 class="entry-title bloc_title"><a class="plink" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
						endif;
						?>
					</div>
				</header><!-- .entry-header -->



				<!-- skyblog bordel -->
				<div class="post clearfix">
					
					<div class="text-image-container" itemprop="articleBody">
						<div class="article_image_center">

					<!-- Post content -->
					<div class="entry-content">
						<?php
						/* translators: %s: Name of current post */
						the_content( sprintf(
							__( 'Continue reading %s'),
							the_title( '<span class="screen-reader-text">', '</span>', false )
						) );

						// pagination 
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page') . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
						?>
					</div><!-- .entry-content -->

						</div>
						<p class="article_break">&nbsp;</p>
					
					</div>
					
					
				</div>
				
				
				<div class="article_bottom">
					<div class="commentaires clearfix">
						<div class="floatleft">
							<span id="kiff-action-3303644738" class="kiff_action">
								<a onclick="loginAndKiff(3303644738); return false;" title="Je kiffe" class="like_off" rel="nofollow" href="#">​</a>
							</span>
							<span id="kiff-3303644738" class="kiff_value"><meta itemprop="interactionCount" content="UserLikes:0">0</span>
							<span id="comment_counter_3303644738" class="hide">| <meta itemprop="interactionCount" content="UserComments:0"><a class="commentview" rel="nofollow" href="http://clubnicotine.skyrock.com/3303644738-Chateau-Sonic.html?action=SHOW_COMMENTS" itemprop="discussionUrl" id="nb_comment_3303644738">0</a></span>
							| <span class="remix_action"><form id="form_remix" class="inline-block" action="http://www.skyrock.com/m/blog/article_remix.php" method="post" target="_blank"><input type="hidden" name="token_remix" value="ebf11ef74e48549bebfac60256905eff"><input type="hidden" name="id_to_remix" value="3303644738"><input type="hidden" name="id_author" value="101910818"><a class="remix" href="#" title="Remixer cet article" rel="nofollow" onclick="this.parentNode.submit(); return false;">​</a></form></span><span class="remix_value">0</span>
							| <span class="social_exporter" id="social_share_3303644738">
								<a class="announceblog" href="#" data-p-ajaxify="1" data-p-href="/common/r/social/popin/share?item_type=2&amp;id_article=3303644738&amp;id_skynaute=101910818">Partager</a>
							</span>
						</div>
						
						<div class="floatright">
							<a class="commentadd" rel="nofollow" href="" onclick="showCommentForm(3303644738,'Erreur lors du traitement du commentaire !');return false;">Commenter</a>
						</div>
					</div>
					
					
			

						<div class="date">
							<p class="created_on"><a href="" title="" itemprop="url">#</a>
								<span><time itemprop="dateCreated" datetime="">Posté le <?php the_date('l j F Y'); ?> à <?php the_time('G:i'); ?></time></span></p>
						</div>
					</div><!-- / skyblog bordel -->





					<?php
			// Author bio.
					if ( is_single() && get_the_author_meta( 'description' ) ) :
						get_template_part( 'author-bio' );
					endif;
					?>
					<footer class="entry-footer">
						<?php //twentyfifteen_entry_meta(); ?>
						<?php edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</div>
	</article><!-- #post-## -->