<?php
/**
 * Pro customizer section.
 *
 * @since  2.0.5
 * @access public
 *
 * @package zerif-lite
 */

/**
 * Class Zerif_Customizer_Upsell_Features
 */
class Zerif_Customizer_Upsell_Features extends WP_Customize_Section {
	/**
	 * The type of customize section being rendered.
	 *
	 * @since  2.0.5
	 * @access public
	 * @var    string
	 */
	public $type = 'zerif-upsell-features-1';
	/**
	 * Upsell text to output.
	 *
	 * @since  2.0.5
	 * @access public
	 * @var    string
	 */
	public $upsell_text = '';
	/**
	 * Link before URL.
	 *
	 * @since  2.0.5
	 * @access public
	 * @var    string
	 */
	public $upsell_link_url_before = '';
	/**
	 * Link before text.
	 *
	 * @since  2.0.5
	 * @access public
	 * @var    string
	 */
	public $upsell_link_text_before = '';
	/**
	 * Link after text.
	 *
	 * @since  2.0.5
	 * @access public
	 * @var    string
	 */
	public $upsell_link_text_after = '';
	/**
	 * Link after URL.
	 *
	 * @since  2.0.5
	 * @access public
	 * @var    string
	 */
	public $upsell_link_url_after = '';
	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  2.0.5
	 * @access public
	 */
	public function json() {
		$json                = parent::json();
		$json['upsell_text'] = wp_kses_post( $this->upsell_text );
		return $json;
	}
	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  2.0.5
	 * @access public
	 * @return void
	 */
	protected function render_template() {
		?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<p class="frontpage-sections-upsell">
				<# if ( data.upsell_text ) { #>
					{{{data.upsell_text}}}
				<# } #>
			</p>
		</li>
		<?php
	}
}
