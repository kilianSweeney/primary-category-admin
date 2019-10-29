<?php

class PCA_Meta_Box {
    
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'pca_meta_box' ) );     
        add_action( 'save_post', array( $this, 'pca_field_data' ) );
    }
    
    public function pca_meta_box() {
        
      $post_types = get_post_types();
    
    	foreach ( $post_types as $post_type ) {
    
    		if ( $post_type == 'page' ) {
    			continue;
    		}
    
    		add_meta_box (
    			'primary_category',
    			'Primary Category',
    			array( $this, 'pca_meta_box_content' ),
    			$post_type,
    			'side',
    			'high'
    		);
    
    	}
    	
    }
    
    public function pca_meta_box_content() {
        
      global $post;

    	$primary_category = '';
    
    	$current_selected = get_post_meta( $post->ID, 'primary_category', true );
    
    	if ( $current_selected != '' ) {
    		$primary_category = $current_selected;
    	}
    
    	$post_categories = get_the_category();
    
    	$html = '<select name="primary_category" id="primary_category">';
    
    	foreach( $post_categories as $category ) {
    		$html .= '<option value="' . $category->name . '" ' . selected( $primary_category, $category->name, false ) . '>' . $category->name . '</option>';
    	}
    
    	$html .= '</select>';
    
    	echo $html;
        
    }
    
    public function pca_field_data() {
        
        global $post;

    	if ( isset( $_POST[ 'primary_category' ] ) ) {
    
    		$primary_category = sanitize_text_field( $_POST[ 'primary_category' ] );
    
    		update_post_meta( $post->ID, 'primary_category', $primary_category );
    
    	}
        
    }
}