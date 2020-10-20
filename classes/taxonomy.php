<?php 

class Taxonomy {
	/**
     * Register post type
     */
	public function register() {
		$labels = array(
			'name'                  => $this->singular,
			'sungular'         		=> $this->singular,
			'search_items' 			=> 'Search '.$this->plural,
			'all_items' 			=> 'All '.$this->plural,
			'parent_item' 			=> 'Parent '.$this->singular,
			'parent_item_colon' 	=> 'Parent '.$this->singular.':',
			'edit_item' 			=> 'Edit '.$this->singular, 
			'update_item' 			=> 'Update '.$this->singular ,
			'add_new_item' 			=> 'Add New '.$this->singular ,
			'new_item_name' 		=> 'New '. $this->singular .' Name',
			'menu_name' 			=> $this->plural,
		);

		register_taxonomy(sanitize_title($this->singular) , $this->post_types, array(
			'hierarchical'		=> $this->hierarchical,
			'labels' 			=> $labels,
			'show_ui' 			=> true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'rewrite' 			=> array( 'slug' =>  sanitize_title($this->singular) ),
		));
    }

	/**
     * Event constructor.
     *
     * When class is instantiated
	 * 
	 * @param string	$singular 		Name of a single item in title case.
	 * @param string	$plural 		Name of the taxonomy in title case.
	 * @param array		$post_types	 	Set of post types that use this taxonomy.
	 * 
     */
	public function __construct($singular, $plural, $post_types, $hierarchical = false) {
		$this->singular 	= $singular;
		$this->plural 		= $plural;
		$this->post_types 	= $post_types;
		$this->hierarchical = $hierarchical;

		add_action('init', array($this, 'register'));
	}
}

