<?php
/*

@fonction.php

// @metabox
require_once TEMPLATEPATH . '/inc/metabox/pq_meta_video.php'; 

*/

//version 1, procedural

//si on est sur l'administration
// param1 : l'action sur laquelle on se greffe
// param2 : nom de la fonction qu'on appel
add_action('admin_init', 'pq_init_meta_video');

//liaison au système de sauvegarde
add_action('save_post', 'pq_save_meta_video');

function pq_init_meta_video(){
	// if pour vérifier si jamais vieille version de WP
	if(function_exists('add_meta_box')){
		add_meta_box('pq_meta_video', 'Vidéo', 'pq_render_meta_video', 'projets', 'normal', 'high');
	}
}

//rendu de la box //view HTML
function pq_render_meta_video(){
	//récupère l'objet post
	global $post;
	// recupère la valeur de la meta si déja renseignée pour le post ciblé 
	// true pour version single (pas d'espace)
	$value = get_post_meta($post->ID, 'pq_youtube', true);

	?>
    <div class="meta-box-item-title">Youtube</div>
    <div class="meta-box-item-content">
    	<input type="text" name="pq_youtube" id="pq_youtube" value="<?= $value ?>" style="">
    </div>
    <input type="hidden" name="youtube_nonce" value="<?= wp_create_nonce('youtube'); ?>">
	<?php
	//creation d'une clef de sécurité nonce
	// permission de modificiation que via le formulaire wp
	//pas de formulaire externe

}

//sauvegarde,suppression si vide,modification de la meta
function pq_save_meta_video($post_id){

	//factorisation de la meta
	$meta = 'pq_youtube';

	// valeur de la meta sur le post en question
	$value = $_POST[$meta];

	if (
			// autorise l'action la où est défini le contenu de la meta //pas sur autre page
			!isset($_POST[$meta]) ||
			//non autorisation de l'autosave, MAJ du contenu que via le bouton MAJ
			//On ne fait rien en save AJAX
			(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) ||
			(defined('DOING_AJAX') && DOING_AJAX)
		){
		return false;
	}

	//Vérifier permission de l'utilisateur
	if(!current_user_can('edit_post', $post_id)){
		return false;
	}

	// Vérification clef nonce
	if (!wp_verify_nonce($_POST['youtube_nonce'], 'youtube')) {
		return false;
	}


	if (get_post_meta($post_id, $meta)) {
		update_post_meta($post_id, $meta, $value);
	} else if ($value === '') {
		delete_post_meta($post_id, $meta);
	} else {
		add_post_meta($post_id, $meta, $value);
	}

}