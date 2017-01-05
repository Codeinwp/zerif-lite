<?php
/**
 * Pro customizer section.
 *
 * @since  2.0.5
 * @access public
 */
class Zerif_Customizer_Upsell_Pro extends WP_Customize_Section {
	/**
	 * The type of customize section being rendered.
	 *
	 * @since  2.0.5
	 * @access public
	 * @var    string
	 */
	public $type = 'zerif-upsell-pro';
	/**
	 * Upsell title to output.
	 *
	 * @since  2.0.5
	 * @access public
	 * @var    string
	 */
	public $upsell_title = '';
	/**
	 * Label text to output.
	 *
	 * @since  2.0.5
	 * @access public
	 * @var    string
	 */
	public $label_text = '';
	/**
	 * Label URL.
	 *
	 * @since  2.0.5
	 * @access public
	 * @var    string
	 */
	public $label_url = '';
	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  2.0.5
	 * @access public
	 * @return void
	 */
	public function json() {
		$json = parent::json();
		$json['upsell_title'] = $this->upsell_title;
		$json['label_text'] = $this->label_text;
		$json['label_url'] = esc_url($this->label_url);
		return $json;
	}
	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  2.0.5
	 * @access public
	 * @return void
	 */
	protected function render_template() { ?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{data.upsell_title}}
				<# if ( data.label_text && data.label_url ) { #>
					<a class="button button-secondary alignright" href="{{data.label_url}}" target="_blank">
						{{data.label_text}}
					</a>
				<# } #>
			</h3>
		</li>
		<?php
	}
}