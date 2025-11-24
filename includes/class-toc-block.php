<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TOC_Master_Block {

	public function __construct() {
		add_action( 'init', array( $this, 'register_block' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
	}

	public function register_block() {
		register_block_type( 'toc-master/toc', array(
			'render_callback' => array( $this, 'render_block' ),
			'attributes'      => array(
				'headings' => array(
					'type'    => 'array',
					'default' => array( 'h2', 'h3' ),
				),
			),
		) );
	}

	public function enqueue_editor_assets() {
		wp_enqueue_script(
			'toc-master-block',
			TOC_MASTER_URL . 'assets/js/block.js',
			array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-data' ),
			TOC_MASTER_VERSION,
			true
		);
        
        wp_enqueue_style(
            'toc-master-style',
            TOC_MASTER_URL . 'assets/css/style.css',
            array(),
            TOC_MASTER_VERSION
        );
	}

	public function render_block( $attributes, $content ) {


        
        global $post;
        if ( ! $post ) {
            return '';
        }
        

        
        $generator = new TOC_Master_Generator();

        
        $content_to_parse = $post->post_content;
        

        

        
        $instance = TOC_Auto_Generator_Ultra::get_instance();

        

        return '[toc]';
	}
}
