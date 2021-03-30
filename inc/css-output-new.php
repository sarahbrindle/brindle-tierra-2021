<?php
$css->set_selector( 'body' );
		$css->add_property( 'background-color', $settings['background_color'] );
		//$css->add_property( 'color', $settings['text_color'] );

		$css->add_property( 'color', $settings['common_text_color'] );

		$css->set_selector( '.tp-button-wraper a,.tp-button-wraper a:hover,.main-navigation .main-nav > ul > li.nav-btn a,.main-navigation .main-nav > ul > li.nav-phone a,.main-navigation .main-nav > ul > li.nav-btn a:hover, .main-navigation .main-nav > ul > li.nav-phone a:hover,.insta-section input[type="submit"],.contact-form input[type="submit"],.main-navigation .main-nav ul li.nav-btn[class*="current-menu-"] > a,.resp-tab-active, .resp-tab-item:hover' );
		$css->add_property( 'background-color', $settings['common_button_color'] );
		$css->add_property( 'color', '#FFFFFF' );

		
		

		$css->set_selector( 'h1, h2, h3' );
		$css->add_property( 'color', $settings['common_primary_color'] );

		$css->set_selector( 'h2 em, h3 em' );
		$css->add_property( 'color', $settings['common_secondary_color'] );