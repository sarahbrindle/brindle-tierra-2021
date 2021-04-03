<?php
if ( ! function_exists( 'generate_base_css' ) ) {
	/**
	 * Generate the CSS in the <head> section using the Theme Customizer.
	 *
	 * @since 0.1
	 */
	function generate_base_css() {
		$settings = wp_parse_args(
			get_option( 'generate_settings', array() ),
			generate_get_defaults()
		);

		$css = new GeneratePress_CSS();

		$common_text_color       = $settings['common_text_color'];
		$common_primary_color    = $settings['common_primary_color'];
		$common_secondary_color  = $settings['common_secondary_color'];
		$common_button_color     = $settings['common_button_color'];
		
		$common_text_color       = $common_text_color." !important";
		$common_primary_color    = $common_primary_color." !important";
		$common_secondary_color  = $common_secondary_color." !important";
		$common_button_color     = $common_button_color." !important";
		
		$css->set_selector( 'body' );
		$css->add_property( 'background-color', $settings['content_background_color'] );
		$css->add_property( 'color', $common_text_color );

		//Button Color
		$css->set_selector( '.tp-button-wraper a,.main-navigation .main-nav > ul > li.nav-btn a,.main-navigation .main-nav > ul > li.nav-phone a,.insta-section input[type="submit"],.contact-form input[type="submit"],.resp-tab-active,.main-navigation .main-nav ul li.nav-btn[class*="current-menu-"] > a' );
		$css->add_property( 'background-color', $common_button_color );
		$css->add_property( 'color', '#FFFFFF !important' );

		//Button Color Hover
		$css->set_selector( '.tp-button-wraper a:hover,.main-navigation .main-nav > ul > li.nav-btn a:hover, .main-navigation .main-nav > ul > li.nav-phone a:hover,.resp-tab-item:hover' );
		$css->add_property( 'background-color', $common_primary_color );
		$css->add_property( 'color', '#FFFFFF !important' );

		$css->set_selector( '.main-navigation .main-nav ul li.nav-btn[class*="current-menu-"] > a:hover');
		$css->add_property( 'background-color', $common_primary_color );
		$css->add_property( 'background', $common_primary_color );		
		$css->add_property( 'color', '#FFFFFF !important' );

		$css->set_selector( '.main-navigation .main-nav > ul > li.nav-btn a:hover');
		$css->add_property( 'background-color', $common_primary_color );			
		$css->add_property( 'color', '#FFFFFF !important' );

		$css->set_selector( '.main-navigation .main-nav > ul > li.nav-btn a:hover');
		$css->add_property( 'background-color', $common_primary_color );			
		$css->add_property( 'color', '#FFFFFF !important' );


		$css->set_selector( '.contact-form input[type="submit"]:hover,.insta-section input[type="submit"]:hover,.gform_wrapper input[type=submit]:hover');
		$css->add_property( 'background-color', $common_primary_color );			
		$css->add_property( 'color', '#FFFFFF !important' );

	

		
		

		$css->set_selector( 'h1, h2, h3' );
		$css->add_property( 'color', $common_primary_color );

		$css->set_selector( 'h2 em, h3 em' );
		$css->add_property( 'color', $common_secondary_color );

		//Footer
		$css->set_selector( '.site-footer' );
		$css->add_property( 'background-color', $settings['footer_widget_background_color'] );
		//Menu
		
		/*Common Text Color*/
		$css->set_selector( '.main-navigation .main-nav > ul > li' );
		$css->add_property( 'color', $common_text_color);
		$css->set_selector( '.main-navigation .main-nav > ul > li > a:hover' );
		$css->add_property( 'color', $common_secondary_color );


		$css->set_selector( '.main-navigation .main-nav ul li.current_page_item > a,.main-navigation .main-nav ul li a:hover, .main-navigation .main-nav ul li[class*="current-menu-"] > a,.main-navigation .menu-bar-item:hover > a' );
		$css->add_property( 'color', $common_secondary_color );

		$css->set_selector( '.main-navigation .menu-toggle' );
		$css->add_property( 'background-color', $common_primary_color );			
		$css->add_property( 'color', '#FFFFFF !important' );

		$css->set_selector( '.main-navigation.toggled .main-nav > ul' );
		$css->add_property( 'background-color', $common_primary_color );

		
		

		
		
		
		if ( generate_get_option( 'logo_width' ) ) {
			$css->set_selector( '.site-header .header-image' );
			$css->add_property( 'width', absint( generate_get_option( 'logo_width' ) ), false, 'px' );
		}
		

		do_action( 'generate_base_css', $css );

		return apply_filters( 'generate_base_css_output', $css->css_output() );
	}
}