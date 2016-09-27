<?php
/**
 * Pro customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Zerif_Customizer_Upsell_Pro extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'zerif-upsell';

	/**
	 * Label text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $label_text = '';

	/**
	 * Label URL.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $label_url = '';


	/**
	 * Button 1 URL.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $btn1_url = '';

	/**
	 * Button 1 Text.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $btn1_text = '';

	/**
	 * Button 2 URL.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $btn2_text = '';

	/**
	 * Button 2 Text.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $btn2_url = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function json() {
		$json = parent::json();

		$json['label_text'] = $this->label_text;
		$json['label_url'] = esc_url($this->label_url);
		$json['btn1_text'] = $this->btn1_text;
		$json['btn1_url'] = esc_url($this->btn1_url);
		$json['btn2_text'] = $this->btn2_text;
		$json['btn2_url'] = esc_url($this->btn2_url);

		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() { ?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<# if ( data.label_text && data.label_url ) { #>
				<a class="zerif-upgrade-to-pro-button" href="{{data.label_url}}" class="button" target="_blank">
					{{data.label_text}}
				</a>
			<# } #>
			<# if ( data.btn1_text && data.btn1_url ) { #>
				<a href="{{data.btn1_url}}" class="button upsell-button" target="_blank">
					{{data.btn1_text}}
				</a>
			<# } #>
			<# if ( data.btn2_text && data.btn2_url ) { #>
				<a href="{{data.btn2_url}}" class="button upsell-button" target="_blank">
					{{data.btn2_text}}
				</a>
			<# } #>
		</li>
	<?php
	}
}