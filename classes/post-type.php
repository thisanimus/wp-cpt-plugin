<?php 

class PostType {

	/**
     * Register post type
     */
	public function register() {
		
		$labels = array(
			'name'                  => $this->singular,
			'singular'         		=> $this->singular,
			'add_new'               => 'Add New',
			'add_new_item'          => 'Add New '   . $this->singular,
			'edit_item'             => 'Edit '      . $this->singular,
			'new_item'              => 'New '       . $this->singular,
			'all_items'             => 'All '       . $this->plural,
			'view_item'             => 'View '      . $this->plural,
			'search_items'          => 'Search '    . $this->plural,
			'not_found'             => 'No '        . strtolower($this->plural) . ' found',
			'not_found_in_trash'    => 'No '        . strtolower($this->plural) . ' found in Trash',
			'parent_item_colon'     => '',
			'menu_name'             => $this->plural
        );

		$args = array(
			'labels'                => $labels,
			'public'                => $this->public,
			'publicly_queryable'    => $this->public,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'query_var'             => true,
			'rewrite'               => array( 'slug' => sanitize_title($this->singular) ),
			'capability_type'       => 'post',
			'has_archive'           => true,
			'with_front'			=> true,
            'show_in_rest'          => $this->public,
			'hierarchical'          => false,
			'menu_position'         => 8,
			'menu_icon'				=> $this->icon,
			'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail'),
			'yarpp_support'         => true,
        );

		register_post_type( sanitize_title($this->singular), $args );
    }

	/**
     * @param $columns
     * @return mixed
     *
     * Choose the columns you want in
     * the admin table for this post
     */
	public function set_columns($columns) {
	// Set/unset post type table columns here
		//unset();
		//$new_columns = [];
		
		//return array_merge($new_columns, $columns);
		return $columns;
    }

	/**
     * @param $column
     * @param $post_id
     *
     * Edit the contents of each column in
     * the admin table for this post
     */
	public function edit_columns($column, $post_id) {
	// Post type table column content code here
		switch ( $column ) {
			case 'featured_thumb':
				echo '<a href="' . get_edit_post_link( $post_id, true ) . '" title="' . esc_attr( __( 'Edit this item' ) ) . '">' . get_the_post_thumbnail( $post_id, array(80, 80) ) . '</a>';
            break;
        }
	}




	/**
     * Event constructor.
     *
     * When class is instantiated
	 * 
	 * @param string	$singular 		Name of a single post in title case.
	 * @param string	$plural 		Name of a set of posts in title case.
	 * @param string	$icon		 	Inline svg of an icon.
	 * 
     */
	public function __construct($singular, $plural, $icon, $public = true) {
		$this->singular = $singular;
		$this->plural 	= $plural;
		$this->public 	= $public;

		if(strpos($icon, "<svg") === 0){
			$this->icon = 'data:image/svg+xml;base64,' . base64_encode($icon);
		}else{
			$this->icon = $icon;
		}
		
		// Register the post type
		add_action('init', array($this, 'register'));
		// Admin set post columns
		add_filter( 'manage_edit-'.sanitize_title($this->singular).'_columns',        array($this, 'set_columns'), 10, 1) ;
		// Admin edit post columns
		add_action( 'manage_'.sanitize_title($this->singular).'_posts_custom_column', array($this, 'edit_columns'), 10, 2 );



	}
}

