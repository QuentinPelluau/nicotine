<?php
/*

@fonction.php

// @metabox
require_once TEMPLATEPATH . '/inc/metabox/pq_meta_video.php'; 

*/

//version 2, class pour objet

class pq_metabox {

	// Définiton de la visibilités des propriétés de la class
	private $id;
	private $title;
	private $post_type;
	private $fields = [];

	public static function enqueue_scripts_meta()
	{
		add_action('admin_enqueue_scripts', function ()
		{
			wp_register_script('uploaderjs', get_template_directory_uri() . '/assets/scripts/uploader.js');
			wp_enqueue_script('uploaderjs');
		});
	}

	/**
	 * pq_metabox constructor.
	 * @param $id        => ID de la box
	 * @param $title     => Titre de la box
	 * @param $post_type => Post type ciblé pour cette box
	 */

	public function __construct($id, $title, $post_type)
	{
		//si on est sur l'administration
		// param1 : l'action sur laquelle on se greffe
		// param2 : nom de la fonction qu'on appel
		add_action('admin_init', array(&$this, 'create'));

		//liaison au système de sauvegarde
		add_action('save_post', array(&$this, 'save'));

		//propriétés privées
		$this-> $id;
		$this->title = $title;
		$this->post_type = $post_type;

	}


	public function create()
	{
		// if pour vérifier si jamais vieille version de WP
		if(function_exists('add_meta_box')){
			add_meta_box(
				/*	id        		*/	$this->id, 
				/*	title     		*/	$this->title, 
				/*	callback  		*/	array(&$this, 'render'), 
				/*	screen  		*/  $this->post_type, 
				/*	context  		*/  'normal', 
				/*	priority  		*/  'high'
				/*	callback_args	*/
			);
		}
	}	


	public function save($post_id)
	{ //sauvegarde,suppression si vide,modification de la meta
		if (
				//non autorisation de l'autosave, MAJ du contenu que via le bouton MAJ
				//On ne fait rien en save AJAX
				(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) ||
				(defined('DOING_AJAX') && DOING_AJAX)
		) {
			return false;
		}

		//Vérifier permission de l'utilisateur
		if(!current_user_can('edit_post', $post_id)){
			return false;
		}

		// Vérification clef nonce
		if (!wp_verify_nonce($_POST[$this->id . '_nonce'], $this->id)) {
			return false;
		}

		// Pour chaque champs 
		foreach ($this->fields as $field) {
			$meta = $field['id'];

			// autorise l'action la où est défini le contenu de la meta //pas sur autre page
			if(isset($_POST[$meta])) {
				$value = $_POST[$meta];
				if (get_post_meta($post_id, $meta)) {
					update_post_meta($post_id, $meta, $value);
				} else {
					if ($value === '') {
					delete_post_meta($post_id, $meta);
					} else {
					add_post_meta($post_id, $meta, $value);
					}
				}
			}
		}
	}

	public function render()
	{ //rendu de la box //view HTML

		//récupère l'objet post
		global $post;

		//rendu pour chaque champs
		foreach($this->fields as $field){
			extract($field);
			// recupère la valeur de la meta si déja renseignée pour le post ciblé 
			// true pour version single (pas d'espace)
			$value = get_post_meta($post->ID, $id, true);
			if($value == '') {
				$value = $default;
			}
			require __DIR__ . '/' . $field['type'] . '.php';
		}
		//utilisation d'un echo, les paramètres ne doivent pas être entourés de parenthèses
		echo '<input type="hidden" name="' . $this->id . '_nonce" value="' . wp_create_nonce($this->id) . '">';
		//creation d'une clef de sécurité nonce
		// permission de modificiation que via le formulaire wp et non via formulaire externe
	}

	
	public function add($id, $label, $type = 'text', $default = '')
	{ // entrées supplémentaires dans la box, type text par defaut
		$this->fields[] = [
			'id'      => $id,
			'name'    => $label,
			'type'    => $type,
			'default' => $default
		];
		return $this;

	}
}

pq_metabox::enqueue_scripts_meta();
//Acces à la surcharge de la class en dehors de celle-ci via l'opérateur de résolution de portée ::

//utilisation de la class pour création de l'objet box sans champs
$box_informations = new pq_metabox ('informations', 'Informations', 'projets');
//ajout des champs de la box
$box_informations->add('pq_description','Description du projet', 'textarea', 'Un texte court mamen.')
		      ->add('pq_image', 'Screenshot', 'uploader')


;
//Le point virgule

//https://codex.wordpress.org/Post_Formats
//https://codex.wordpress.org/Function_Reference/wp_nonce_field﻿
//https://codex.wordpress.org/Function_Reference/wp_editor
//https://www.grafikart.fr/tutoriels/wordpress/champs-meta-box-787

