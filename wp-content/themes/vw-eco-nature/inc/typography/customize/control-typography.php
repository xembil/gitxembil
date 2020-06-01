<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Eco_Nature_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-eco-nature' ),
				'family'      => esc_html__( 'Font Family', 'vw-eco-nature' ),
				'size'        => esc_html__( 'Font Size',   'vw-eco-nature' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-eco-nature' ),
				'style'       => esc_html__( 'Font Style',  'vw-eco-nature' ),
				'line_height' => esc_html__( 'Line Height', 'vw-eco-nature' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-eco-nature' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-eco-nature-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-eco-nature-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-eco-nature' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-eco-nature' ),
        'Acme' => __( 'Acme', 'vw-eco-nature' ),
        'Anton' => __( 'Anton', 'vw-eco-nature' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-eco-nature' ),
        'Arimo' => __( 'Arimo', 'vw-eco-nature' ),
        'Arsenal' => __( 'Arsenal', 'vw-eco-nature' ),
        'Arvo' => __( 'Arvo', 'vw-eco-nature' ),
        'Alegreya' => __( 'Alegreya', 'vw-eco-nature' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-eco-nature' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-eco-nature' ),
        'Bangers' => __( 'Bangers', 'vw-eco-nature' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-eco-nature' ),
        'Bad Script' => __( 'Bad Script', 'vw-eco-nature' ),
        'Bitter' => __( 'Bitter', 'vw-eco-nature' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-eco-nature' ),
        'BenchNine' => __( 'BenchNine', 'vw-eco-nature' ),
        'Cabin' => __( 'Cabin', 'vw-eco-nature' ),
        'Cardo' => __( 'Cardo', 'vw-eco-nature' ),
        'Courgette' => __( 'Courgette', 'vw-eco-nature' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-eco-nature' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-eco-nature' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-eco-nature' ),
        'Cuprum' => __( 'Cuprum', 'vw-eco-nature' ),
        'Cookie' => __( 'Cookie', 'vw-eco-nature' ),
        'Chewy' => __( 'Chewy', 'vw-eco-nature' ),
        'Days One' => __( 'Days One', 'vw-eco-nature' ),
        'Dosis' => __( 'Dosis', 'vw-eco-nature' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-eco-nature' ),
        'Economica' => __( 'Economica', 'vw-eco-nature' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-eco-nature' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-eco-nature' ),
        'Francois One' => __( 'Francois One', 'vw-eco-nature' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-eco-nature' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-eco-nature' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-eco-nature' ),
        'Handlee' => __( 'Handlee', 'vw-eco-nature' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-eco-nature' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-eco-nature' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-eco-nature' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-eco-nature' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-eco-nature' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-eco-nature' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-eco-nature' ),
        'Kanit' => __( 'Kanit', 'vw-eco-nature' ),
        'Lobster' => __( 'Lobster', 'vw-eco-nature' ),
        'Lato' => __( 'Lato', 'vw-eco-nature' ),
        'Lora' => __( 'Lora', 'vw-eco-nature' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-eco-nature' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-eco-nature' ),
        'Merriweather' => __( 'Merriweather', 'vw-eco-nature' ),
        'Monda' => __( 'Monda', 'vw-eco-nature' ),
        'Montserrat' => __( 'Montserrat', 'vw-eco-nature' ),
        'Muli' => __( 'Muli', 'vw-eco-nature' ),
        'Marck Script' => __( 'Marck Script', 'vw-eco-nature' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-eco-nature' ),
        'Open Sans' => __( 'Open Sans', 'vw-eco-nature' ),
        'Overpass' => __( 'Overpass', 'vw-eco-nature' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-eco-nature' ),
        'Oxygen' => __( 'Oxygen', 'vw-eco-nature' ),
        'Orbitron' => __( 'Orbitron', 'vw-eco-nature' ),
        'Patua One' => __( 'Patua One', 'vw-eco-nature' ),
        'Pacifico' => __( 'Pacifico', 'vw-eco-nature' ),
        'Padauk' => __( 'Padauk', 'vw-eco-nature' ),
        'Playball' => __( 'Playball', 'vw-eco-nature' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-eco-nature' ),
        'PT Sans' => __( 'PT Sans', 'vw-eco-nature' ),
        'Philosopher' => __( 'Philosopher', 'vw-eco-nature' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-eco-nature' ),
        'Poiret One' => __( 'Poiret One', 'vw-eco-nature' ),
        'Quicksand' => __( 'Quicksand', 'vw-eco-nature' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-eco-nature' ),
        'Raleway' => __( 'Raleway', 'vw-eco-nature' ),
        'Rubik' => __( 'Rubik', 'vw-eco-nature' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-eco-nature' ),
        'Russo One' => __( 'Russo One', 'vw-eco-nature' ),
        'Righteous' => __( 'Righteous', 'vw-eco-nature' ),
        'Slabo' => __( 'Slabo', 'vw-eco-nature' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-eco-nature' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-eco-nature'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-eco-nature' ),
        'Sacramento' => __( 'Sacramento', 'vw-eco-nature' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-eco-nature' ),
        'Tangerine' => __( 'Tangerine', 'vw-eco-nature' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-eco-nature' ),
        'VT323' => __( 'VT323', 'vw-eco-nature' ),
        'Varela Round' => __( 'Varela Round', 'vw-eco-nature' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-eco-nature' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-eco-nature' ),
        'Volkhov' => __( 'Volkhov', 'vw-eco-nature' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-eco-nature' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-eco-nature' ),
			'100' => esc_html__( 'Thin',       'vw-eco-nature' ),
			'300' => esc_html__( 'Light',      'vw-eco-nature' ),
			'400' => esc_html__( 'Normal',     'vw-eco-nature' ),
			'500' => esc_html__( 'Medium',     'vw-eco-nature' ),
			'700' => esc_html__( 'Bold',       'vw-eco-nature' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-eco-nature' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'vw-eco-nature' ),
			'normal'  => esc_html__( 'Normal', 'vw-eco-nature' ),
			'italic'  => esc_html__( 'Italic', 'vw-eco-nature' ),
			'oblique' => esc_html__( 'Oblique', 'vw-eco-nature' )
		);
	}
}
