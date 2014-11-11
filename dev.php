<?php

add_action( 'init', function() {

	/**
	 * Register your shorcode as you would normally.
	 * This is a simple example for a blockquote with a citation.
	 */
	add_shortcode( 'pullquote', function( $attr, $content = '' ) {

		$attr = wp_parse_args( $attr, array(
			'source' => ''
		) );

		?>

		<section class="pullquote">
			<?php echo esc_html( $content ); ?><br/>
			<cite><em><?php echo esc_html( $attr['source'] ); ?></em></cite>
		</section>

		<?php
	} );

	/**
	 * Register a UI for the Shortcode.
	 * Pass the shortcode tag (string)
	 * and an array or args.
	 */
	shortcode_ui_register_for_shortcode(
		'pullquote',
		array(

			// Display label. String. Required.
			'label' => 'Pullquote',

			// Icon/image for shortcode. Optional. src or dashicons-$icon. Defaults to carrot.
			'listItemImage' => 'dashicons-editor-quote',

			// Available shortcode attributes and default values. Required. Array.
			// Attribute model expects 'attr', 'type' and 'label'
			// Supported field types: 'text', 'url', 'textarea', 'select'
			'attrs' => array(

				array(
					'label' => 'Quote',
					'attr'  => 'content',
					'type'  => 'Fieldmanager_TextArea',
				),

				array(
					'label' => 'Image',
					'attr'  => 'image',
					'type'  => 'Fieldmanager_Media',
					'fieldView' => 'editAttributeFieldMedia',
				),

				array(
					'label' => 'Cite',
					'attr'  => 'source',
					'type'  => 'Fieldmanager_Textfield',
				),

			),
		)
	);

} );