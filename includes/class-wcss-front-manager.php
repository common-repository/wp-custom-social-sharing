<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Wcss_Front_Manager class. manage the contents related to front-end
 */
class Wcss_Front_Manager {

	/**
	 * Constructor class
	 */
	public function __construct() {

		$wcss_settings_options = get_option( 'wcss_settings_options' );
		$wcss_options          = $wcss_settings_options['wcss_social_sharing'];

		if ( is_array( $wcss_options['icon_position'] ) && ! empty( $wcss_options['icon_position'] ) ) {

			foreach ( $wcss_options['icon_position'] as $icon_position ) {

				if ( in_array( 'inside_image', $wcss_options['icon_position'] ) ) {

					add_filter( 'post_thumbnail_html', array( $this, 'wcss_inside_image' ), 99, 5 );

				}

				if ( in_array( 'after_content', $wcss_options['icon_position'] ) ) {

					add_filter( 'the_content', array( $this, 'wcss_buttons_after_content' ) );
				}

				if ( in_array( 'above_content', $wcss_options['icon_position'] ) ) {

					add_filter( 'the_content', array( $this, 'wcss_buttons_above_content' ) );
				}

				if ( in_array( 'float_left', $wcss_options['icon_position'] ) ) {

					add_filter( 'the_content', array( $this, 'wcss_buttons_float_left' ) );
				}
			}
		}

		add_action( 'wp_enqueue_scripts', array( $this, 'wcss_enqueue_scripts' ) ); // enqueue scripts and styles.
		add_shortcode( 'wcss_shortcode', array( $this, 'wcss_button_html_shortcode' ) ); // add shortcode.
		add_action( 'wp_head', array( $this, 'wcss_display_custom_color' ) ); // add action to wp_head.
		add_action( 'wp_footer', array( $this, 'wcss_display_all_networks_popup' ) ); // add action to wp_head.

	}

	/**
	 * Enqueue Front End scripts and styles
	 */
	public function wcss_enqueue_scripts() {

		$this->wcss_dequeue_other_fontawesome(); // dequeue font-awesome if exists.
		wp_enqueue_style( 'wcss-font-awesome', WCSS_PLUGIN_URL . 'assets/css/all.min.css' );
		wp_enqueue_style( 'wcss-front-end-style', WCSS_PLUGIN_URL . 'assets/css/wcss-front-end-style.css', '', time() );
		wp_enqueue_script( 'wcss-front-script', WCSS_PLUGIN_URL . 'assets/js/wcss-front-end.js', array( 'jquery' ), '2.1', true );
	}

	/**
	 * Check for any other font-awesome enqueued
	 */
	public function wcss_dequeue_other_fontawesome() {

		global $wp_styles;

		if ( ! empty( $wp_styles->registered ) ) {
			foreach ( $wp_styles->registered as $index => $styles ) {
				if ( ( strpos( $styles->src, 'font-awesome.min.css' ) !== false ) || ( strpos( $styles->src, 'font-awesome.css' ) !== false ) ) {
					wp_dequeue_style( $styles->handle );
					wp_deregister_style( $styles->handle );
				}
			}
		}
	}

	/**
	 * Posts content filter returned with buttons html
	 */
	public function wcss_buttons_after_content( $content ) {

		global $post;
		$wcss_settings_options = get_option( 'wcss_settings_options' );
		$wcss_options          = $wcss_settings_options['wcss_social_sharing'];
		$return_content        = $content;

		if ( is_single() || is_page() ) {

			if ( in_array( $post->post_type, $wcss_options['post_type'] ) ) {

				$return_content = $content . $this->wcss_button_html( '', 'wcss-after-content' );
			}
			return $return_content;
		} else {
			return $content;
		}
	}

	/**
	 * Share buttons below title filter
	 */
	public function wcss_buttons_above_content( $content ) {

		global $post;

		$wcss_settings_options = get_option( 'wcss_settings_options' );
		$wcss_options          = $wcss_settings_options['wcss_social_sharing'];

		$return_content = $content;

		if ( is_single() || is_page() ) {

			if ( in_array( $post->post_type, $wcss_options['post_type'] ) ) {

				$return_content = $this->wcss_button_html( '', 'wcss-below-title' ) . $content;

			}
			return $return_content;

		} else {
			return $content;
		}
	}

	/**
	 * Float left sharing button html
	 */
	public function wcss_buttons_float_left( $content ) {

		global $post;

		$wcss_settings_options = get_option( 'wcss_settings_options' );
		$wcss_options          = $wcss_settings_options['wcss_social_sharing'];

		$return_content = $content;

		if ( is_single() || is_page() ) {

			if ( in_array( $post->post_type, $wcss_options['post_type'] ) ) {
				$return_content = $content . $this->wcss_button_html( '', 'wcss-fixed-content' );
			}
			return $return_content;
		} else {
			return $content;
		}
	}

	/**
	 * Social sharing with images
	 */
	public function wcss_inside_image( $html, $post_id, $post_thumbnail_id, $size, $attr ) {

		$return_content = '';

		$return_content .= $this->wcss_button_html( '', 'wcss-featured-image' );

		$return = '<div class="wcss-featured-image-wrap">' . $html . $return_content . '</div>';

		return $return;
	}

	/**
	 * Social sharing shortcode
	 */
	public function wcss_button_html_shortcode( $atts ) {
		$value = shortcode_atts(
			array(
				'above_content' => false,
				'below_content' => false,
				'float_left'    => false,
			),
			$atts
		);
		if ( $value['above_content'] ) {

			$icon_position = 'wcss-below-title';

		} elseif ( $value['below_content'] ) {

			$icon_position = 'wcss-after-content';

		} elseif ( $value['float_left'] ) {

			$icon_position = 'wcss-fixed-content';
		}

		ob_start();

		$return_content = ob_get_clean();

		return $return_content;
	}

	/**
	 * Returns Buttons html
	 */
	public function wcss_button_html( $title = '', $icon_position = '' ) {
		global $post;

		$wcss_settings_options = get_option( 'wcss_settings_options' );
		$wcss_options          = $wcss_settings_options['wcss_social_sharing'];
		$default_count         = $wcss_options['default_count'];
		$enabled_icons         = $wcss_options['enabled_icons'];
		$icon_count            = 1;

		if ( is_archive() || is_home() || ( is_front_page() && is_home() ) ) {
			return '';
		}

		$button_size        = esc_attr( $wcss_options['button_size'] );
		$before_button_text = esc_attr( $wcss_options['button_label'] );

		$button_order   = esc_attr( $wcss_options['button_order'] );
		$exploded_order = explode( ',', rtrim( $button_order, ',' ) );

		$title         = ( ! empty( $title ) ) ? esc_att( $title ) : esc_attr( get_the_title( $post->ID ) );
		$post_title    = urlencode( html_entity_decode( $title ) );
		$get_permalink = urlencode( apply_filters( 'wcss_filter_permalink', get_permalink( $post->ID ) ) );

		$return_content  = '<div class="social-sharing wcss-social-sharing ' . esc_attr( $icon_position ) . ' wcss-icon-enabled">';
		$return_content .= sprintf( __( '<h3 class="wcss-title share-button-title">%s</h3>', 'wcss-social-share' ), $before_button_text );
		$return_content .= '<ul>';

		foreach ( $exploded_order as $key => $icon_value ) {
			if ( 'yes' === $wcss_options[ $icon_value ]['enable'] ) {
				if ( $icon_count <= $default_count ) {
					$return_content .= $this->wcss_render_button( $wcss_options, $icon_value, $get_permalink, $button_size, $post, $post_title );
					++$icon_count;
				}
			}
		}

		if ( $default_count < count( $enabled_icons ) ) {

			$return_content .= sprintf(
				__( '<li class="wcss-all-networks" ><a href="#" class="wcss-all-network-link %1$s" title="%2$s"></a></li>', 'wcss-social-share' ),
				'wcss-' . $button_size,
				__( 'All Networks', 'wcss-social-share' )
			);
		}

		$return_content .= '</ul></div>';
		?>
		<?php

		return $return_content;
	}


	/**
	 * Return function for buttons
	 **/
	public function wcss_render_button( $wcss_options, $value, $get_permalink, $button_size, $post, $post_title ) {

		$escaped_js = esc_js( 'return wcss_load_popup(this)' );

		$return_content = '';

		switch ( $value ) {

			case 'facebook':
				if ( 'yes' == $wcss_options['facebook']['enable'] ) {

					$facebookURL     = 'https://www.facebook.com/sharer/sharer.php?u=' . $get_permalink;
					$return_content .= sprintf(
						__( '<li class="wcss-facebook" ><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-facebook"><i class="wcss-icon fab fa-facebook-f"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$facebookURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Facebook', 'wcss-social-share' ),
						__( 'Facebook', 'wcss-social-share' )
					);
				}
				break;

			case 'twitter':
				if ( 'yes' == $wcss_options['twitter']['enable'] ) {
					$twitterURL      = 'https://twitter.com/intent/tweet?text=' . $post_title . '&url=' . $get_permalink;
					$return_content .= sprintf(
						__( '<li class="wcss-twitter"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-twitter"><i class="wcss-icon fab fa-twitter"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$twitterURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Twitter', 'wcss-social-share' ),
						__( 'Twitter', 'wcss-social-share' )
					);
				}
				break;

			case 'pinterest':
				if ( 'yes' == $wcss_options['pinterest']['enable'] ) {
					$post_thumbnail  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					$thumbnail_url   = ! empty( $post_thumbnail[0] ) ? $post_thumbnail[0] : '';
					$pinterestURL    = 'https://pinterest.com/pin/create/button/?url=' . $get_permalink . '&media=' . $thumbnail_url . '&description=' . $post_title;
					$return_content .= sprintf(
						__( '<li class="wcss-pinterest"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-pinterest"><i class="wcss-icon fab fa-pinterest-p"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$pinterestURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Pinterest', 'wcss-social-share' ),
						__( 'Pinterest', 'wcss-social-share' )
					);
				}
				break;

			case 'linkedin':
				if ( 'yes' == $wcss_options['linkedin']['enable'] ) {
					$linkedInURL     = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $get_permalink . '&title=' . $post_title;
					$return_content .= sprintf(
						__( '<li class="wcss-linkedin"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-linkedin"><i class="wcss-icon fab fa-linkedin-in"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$linkedInURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on LinkedIn', 'wcss-social-share' ),
						__( 'LinkedIn', 'wcss-social-share' )
					);
				}
				break;

			case 'blogger':
				if ( 'yes' == $wcss_options['blogger']['enable'] ) {
					$bloggerURL      = 'https://www.blogger.com/blog_this.pyra?t&u=' . $get_permalink . '&n=' . $post_title;
					$return_content .= sprintf(
						__( '<li class="wcss-blogger"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-blogger"><i class="wcss-icon fab fa-blogger-b"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Blogger', 'wcss-social-share' ),
						__( 'Blogger', 'wcss-social-share' )
					);
				}
				break;

			case 'buffer':
				if ( 'yes' == $wcss_options['buffer']['enable'] ) {
					$bloggerURL      = 'https://bufferapp.com/add?url=' . $get_permalink . '&title=' . $post_title;
					$return_content .= sprintf(
						__( '<li class="wcss-buffer"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-buffer"><i class="wcss-icon fab fa-buffer"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Buffer', 'wcss-social-share' ),
						__( 'Buffer', 'wcss-social-share' )
					);
				}
				break;

			case 'digg':
				if ( 'yes' == $wcss_options['digg']['enable'] ) {
					$bloggerURL      = 'http://digg.com/submit?url=' . $get_permalink . '&title=' . $post_title;
					$return_content .= sprintf(
						__( '<li class="wcss-digg"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-digg"><i class="wcss-icon fab fa-digg"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Digg', 'wcss-social-share' ),
						__( 'Digg', 'wcss-social-share' )
					);
				}
				break;

			case 'email':
				if ( 'yes' == $wcss_options['email']['enable'] ) {
					$bloggerURL      = 'https://mail.google.com/mail/u/0/?view=cm&fs=1&body=' . $get_permalink . '&su=' . $post_title . '&ui=2&tf=1';
					$return_content .= sprintf(
						__( '<li class="wcss-email"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-gmail"><i class="wcss-icon far fa-envelope"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Gmail', 'wcss-social-share' ),
						__( 'Gmail', 'wcss-social-share' )
					);
				}
				break;

			case 'flipboard':
				if ( 'yes' == $wcss_options['flipboard']['enable'] ) {
					$bloggerURL      = 'https://share.flipboard.com/bookmarklet/popout?title=' . $post_title . '&url=' . $get_permalink;
					$return_content .= sprintf(
						__( '<li class="wcss-flipboard"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-flipboard"><i class="wcss-icon fab fa-flipboard"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Flipboard', 'wcss-social-share' ),
						__( 'Flipboard', 'wcss-social-share' )
					);
				}
				break;

			case 'odnoklassniki':
				if ( 'yes' == $wcss_options['odnoklassniki']['enable'] ) {
					$bloggerURL      = 'https://connect.ok.ru/offer?url=' . $get_permalink . '&title=' . $post_title;
					$return_content .= sprintf(
						__( '<li class="wcss-odnoklassniki"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-odnoklassniki"><i class="wcss-icon fab fa-odnoklassniki"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Odnoklassniki', 'wcss-social-share' ),
						__( 'Odnoklassniki', 'wcss-social-share' )
					);
				}
				break;

			case 'pocket':
				if ( 'yes' == $wcss_options['pocket']['enable'] ) {
					$bloggerURL      = 'https://getpocket.com/save?url=' . $get_permalink;
					$return_content .= sprintf(
						__( '<li class="wcss-pocket"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-pocket"><i class="wcss-icon fab fa-get-pocket"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Pocket', 'wcss-social-share' ),
						__( 'Pocket', 'wcss-social-share' )
					);
				}
				break;

			case 'reddit':
				if ( 'yes' == $wcss_options['reddit']['enable'] ) {
					$bloggerURL      = 'https://reddit.com/submit?url=' . $get_permalink . '&title=' . $post_title;
					$return_content .= sprintf(
						__( '<li class="wcss-reddit"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-reddit"><i class="wcss-icon fab fa-reddit"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Reddit', 'wcss-social-share' ),
						__( 'Reddit', 'wcss-social-share' )
					);
				}
				break;

			case 'skype':
				if ( 'yes' == $wcss_options['skype']['enable'] ) {
					$bloggerURL      = 'https://web.skype.com/share?url=' . $get_permalink;
					$return_content .= sprintf(
						__( '<li class="wcss-skype"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-skype"><i class="wcss-icon fab fa-skype"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Skype', 'wcss-social-share' ),
						__( 'Skype', 'wcss-social-share' )
					);
				}
				break;

			case 'stumbleupon':
				if ( 'yes' == $wcss_options['stumbleupon']['enable'] ) {
					$bloggerURL      = 'http://www.stumbleupon.com/badge?url=' . $get_permalink . '&title=' . $post_title;
					$return_content .= sprintf(
						__( '<li class="wcss-stumbleupon"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-stumbleupon"><i class="wcss-icon fab fa-stumbleupon"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Stumbleupon', 'wcss-social-share' ),
						__( 'Stumbleupon', 'wcss-social-share' )
					);
				}
				break;

			case 'telegram':
				if ( 'yes' == $wcss_options['telegram']['enable'] ) {
					$bloggerURL      = 'https://telegram.me/share/url?url=' . $get_permalink . '&title=' . $post_title;
					$return_content .= sprintf(
						__( '<li class="wcss-telegram"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-telegram"><i class="wcss-icon fab fa-telegram"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Telegram', 'wcss-social-share' ),
						__( 'Telegram', 'wcss-social-share' )
					);
				}
				break;

			case 'tumblr':
				if ( 'yes' == $wcss_options['tumblr']['enable'] ) {
					$bloggerURL      = 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . $get_permalink . '&title=' . $post_title . '&caption=' . $post_title;
					$return_content .= sprintf(
						__( '<li class="wcss-tumblr"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-tumblr"><i class="wcss-icon fab fa-tumblr"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Tumblr', 'wcss-social-share' ),
						__( 'Tumblr', 'wcss-social-share' )
					);
				}
				break;

			case 'whatsapp':
				if ( 'yes' == $wcss_options['whatsapp']['enable'] ) {
					$whatsappURL     = 'whatsapp://send?text=' . $post_title . ' ' . $get_permalink;
					$return_content .= sprintf(
						__( '<li class="wcss-whatsapp"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-whatsapp"><i class="wcss-icon fab fa-whatsapp"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$whatsappURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Whatsapp', 'wcss-social-share' ),
						__( 'Whatsapp', 'wcss-social-share' )
					);
				}
				break;

			case 'xing':
				if ( 'yes' == $wcss_options['xing']['enable'] ) {
					$bloggerURL      = 'https://www.xing.com/app/user?op=share&url=' . $get_permalink;
					$return_content .= sprintf(
						__( '<li class="wcss-xing"><a href="%1$s" onclick="%2$s" class="%3$s" target="_blank" title="%4$s"><span class="wcss-icon-xing"><i class="wcss-icon fab fa-xing"></i></span> <span class="wcss-text">%5$s</span> </a></li>', 'wcss-social-share' ),
						$bloggerURL,
						$escaped_js,
						'wcss-share-btn wcss-' . $button_size,
						__( 'Share on Xing', 'wcss-social-share' ),
						__( 'Xing', 'wcss-social-share' )
					);
				}
				break;

			// facebook,twitter,pinterest,linkedin,blogger,buffer,digg,email,flipboard,odnoklassniki,pocket,reddit,skype,stumbleupon,telegram,tumblr,whatsapp,xing.

		}

		return $return_content;

	}

	/**
	 * Print style to wp-head
	 */
	public function wcss_display_custom_color() {
		$wcss_settings_options = get_option( 'wcss_settings_options' );
		$wcss_options          = $wcss_settings_options['wcss_social_sharing'];

		if ( isset( $wcss_options['border_radius'] ) && ! empty( $wcss_options['border_radius'] ) ) {

			?>
			<style type="text/css">
				.wcss-below-title.wcss-social-sharing .wcss-share-btn, .wcss-after-content.wcss-social-sharing .wcss-share-btn, .wcss-below-title.wcss-social-sharing .wcss-all-network-link, .wcss-after-content.wcss-social-sharing .wcss-all-network-link {
					border-radius: <?php echo $wcss_options['border_radius']; ?>px;
				}
			</style>
			<?php
		}
	}

	/**
	 * A popup section to display all the social networks
	 */
	public function wcss_display_all_networks_popup() {

		global $post;

		$wcss_settings_options = get_option( 'wcss_settings_options' );
		$wcss_options          = $wcss_settings_options['wcss_social_sharing'];
		$button_order          = esc_attr( $wcss_options['button_order'] );
		$exploded_order        = explode( ',', rtrim( $button_order, ',' ) );
		$button_size           = esc_attr( $wcss_options['button_size'] );
		$title                 = ( ! empty( $title ) ) ? esc_att( $title ) : esc_attr( get_the_title( $post->ID ) );
		$post_title            = urlencode( html_entity_decode( $title ) );
		$get_permalink         = urlencode( apply_filters( 'wcss_filter_permalink', get_permalink( $post->ID ) ) );

		/*popup of all the button*/
		echo '<div class="wcss-all-networks-container">';
		echo '<div class="wcss-popup-overlay"></div><div class="wcss-popup-wrapper"><a class="wcss-close-btn" href="#">X</a><ul>';
		foreach ( $exploded_order as $key => $icon_value ) {
			echo $this->wcss_render_button( $wcss_options, $icon_value, $get_permalink, $button_size, $post, $post_title );
		}
		echo '</ul></div></div>';
		/*end popup of all the button*/
	}

}

$wcss_front = new Wcss_Front_Manager();
